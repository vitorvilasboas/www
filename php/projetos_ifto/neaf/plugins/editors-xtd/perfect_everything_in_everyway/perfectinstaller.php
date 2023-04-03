<?php

/**
 * @package     pwebbox
 * @version    2.0.10
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

if (!class_exists('PerfectInstaller')) {

    class PerfectInstaller
    {

        protected $manifest = null;
        protected $old_manifest = null;
        protected $extension = null;
        protected $is_pro = null;

        /**
         * Constructor
         *
         * @param   JAdapterInstance $adapter The object responsible for running this script
         */
        public function __construct(JAdapterInstance $adapter)
        {

        }

        /**
         * Called before any type of action
         *
         * @param   string $route Which action is happening (install|uninstall|discover_install|update)
         * @param   JAdapterInstance $adapter The object responsible for running this script
         *
         * @return  boolean  True on success
         */
        public function preflight($route, JAdapterInstance $adapter)
        {
            $parent = $adapter->getParent();
            $this->manifest = $parent->getManifest();
            $this->loadExtensionFromManifest();

            if ($route == 'update' || $route == 'uninstall') {
                $this->loadExtensionId();
            }

            $this->loadExtensionManifestCache();
            
            // Detect PRO version
            if ($this->extension->element == 'mod_pwebbox')
            {
                if (version_compare($this->old_manifest->get('version', '2.0.0'), '2.0.12', '<'))
                {
                    $installed_plugins = JFolder::folders(JPATH_PLUGINS . '/everything_in_everyway');

                    $pro_plugins = array(
                        'acymailing',
                        'any_module',
                        'article',
                        'bing_maps',
                        'box_embedded_folder',
                        //'cookie_policy',
                        //'custom_html',
                        //'facebook_page_plugin',
                        'facebook_embedded_post',
                        'flexi_article',
                        'freshmail',
                        'google_drive_embedded_folder',
                        'google_maps',
                        //'iframe',
                        'instagram_embedded_post',
                        'instagram_feed',
                        'k2_article',
                        //'link',
                        'mailchimp',
                        'seblod_article',
                        'spotify',
                        'twitter_embedded_tweet',
                        'twitter_feed',
                        'vimeo_video',
                        'youtube_video',
                        'youtube_gallery',
                        'zoo_article',
                    );

                    $this->is_pro = count(array_intersect($pro_plugins, $installed_plugins)) > 0;
                }
                else
                {
                    $this->is_pro = (strpos((string) $this->manifest->name, ' PRO') !== false);
                }
            }
        }

        /**
         * Called after any type of action
         *
         * @param   string $route Which action is happening (install|uninstall|discover_install|update)
         * @param   JAdapterInstance $adapter The object responsible for running this script
         *
         * @return  boolean  True on success
         */
        public function postflight($route, JAdapterInstance $adapter)
        {
            $update_extension = array();

            if ($this->is_pro === true AND strpos((string) $this->manifest->name, ' PRO') === false)
            {
                // Change extension name
                $parent = $adapter->getParent();
                $name   = (string) $this->manifest->name . ' PRO';

                $update_extension['name']           = $name;
                $manifest_cache                     = json_decode($parent->generateManifestCache());
                $manifest_cache->name               = $name;
                $update_extension['manifest_cache'] = json_encode($manifest_cache);
            }

            if ($route == 'install' OR $route == 'discover_install')
            {
                // Enable extension
                $update_extension['enabled'] = 1;
            }

            // Update extension
            if (!empty($update_extension))
            {
                $db = JFactory::getDBO();

                $query = $db->getQuery(true)
                        ->update($db->quoteName('#__extensions'));

                foreach ($update_extension as $key => $value)
                {
                    $query->set($db->quoteName($key) . ' = ' . $db->quote($value));
                }

                $query->where(array(
                    $db->quoteName('type') . ' = ' . $db->quote($this->extension->type),
                    $db->quoteName('element') . ' = ' . $db->quote($this->extension->element),
                    $db->quoteName('folder') . ' = ' . $db->quote($this->extension->folder),
                    $db->quoteName('client_id') . ' = ' . $db->quote($this->extension->client_id)
                ));

                $db->setQuery($query);

                try
                {
                    $db->execute();
                }
                catch (Exception $e)
                {
                    echo $e->getMessage();
                }
            }

            $update_site_exists = false;
            // Get all update sites from Perfect-Web.co
            $update_sites       = $this->getUpdateSites();
            foreach ($update_sites as $update_site)
            {
                $version = null;
                if ($this->extension->element == $update_site->element AND $this->extension->type == $update_site->type AND $this->extension->folder == $update_site->folder)
                {
                    $update_site_exists = true;
                    $version = isset($this->manifest->version) ? (string) $this->manifest->version : null;

                    if (is_bool($this->is_pro))
                    {
                        // Change update server location for module
                        $replace = array('&id=44', '&id=13'); // PRO, FREE
                        if ($this->is_pro)
                        {
                            $replace = array_reverse($replace);
                        }

                        if (version_compare(JVERSION, '3.2.2', '>='))
                        {
                            $update_site->location = str_replace($replace[0], $replace[1], $update_site->location);
                            $this->changeUpdateSiteLocation($update_site->id, $update_site->location);
                        }
                        else
                        {
                            $update_site->server = str_replace($replace[0], $replace[1], $update_site->server);
                        }
                    }
                }

                $this->updateUpdateSite($update_site->id, $update_site->server, $version);
            }

            // Create update site for current extension if does not exists
            if (!$update_site_exists)
            {
                $name    = isset($this->manifest->name) ? str_replace(' PRO', '', (string) $this->manifest->name) : 'Perfect Extension';
                $version = isset($this->manifest->version) ? (string) $this->manifest->version : null;
                $this->createUpdateSite($name, $version);
            }
        }

        /**
         * Get Akeeba Release System update stream id
         *
         * @return int
         */
        protected function getUpdateStreamId()
        {
            return isset($this->manifest->perfect_update_id) ? (int)$this->manifest->perfect_update_id : 0;
        }

        protected function loadExtensionFromManifest()
        {
            if (!isset($this->extension) || empty($this->extension)) {
                $this->extension = JTable::getInstance('extension');

                $this->extension->type = strtolower((string)$this->manifest->attributes()->type);
                $this->extension->folder = isset($this->manifest->attributes()->group) ? strtolower((string)$this->manifest->attributes()->group) : '';
                $this->extension->client_id = 0;

                if ($cname = (string)$this->manifest->attributes()->client) {
                    // Attempt to map the client to a base path
                    $client = JApplicationHelper::getClientInfo($cname, true);
                    if ($client !== false) {
                        $this->extension->client_id = $client->id;
                    }
                }

                $type = $this->extension->type;
                if ($type == 'component') {
                    $name = strtolower(JFilterInput::getInstance()->clean((string)$this->manifest->name, 'cmd'));
                    if (substr($name, 0, 4) == 'com_') {
                        $this->extension->element = $name;
                    } else {
                        $this->extension->element = 'com_' . $name;
                    }
                } elseif ($type == 'package') {
                    $this->extension->element = 'pkg_' . strtolower(JFilterInput::getInstance()->clean((string)$this->manifest->packagename, 'cmd'));
                } elseif ($type == 'module' || $type == 'plugin') {
                    if (count($this->manifest->files->children())) {
                        foreach ($this->manifest->files->children() as $file) {
                            if ((string)$file->attributes()->$type) {
                                $this->extension->element = strtolower((string)$file->attributes()->$type);
                                break;
                            }
                        }
                    }
                }

                if (!$this->extension->element) {
                    $this->extension->element = strtolower(str_replace('InstallerScript', '', __CLASS__));
                }
            }
        }

        protected function loadExtensionId()
        {
            if (!isset($this->extension->extension_id) || empty($this->extension->extension_id)) {
                $db = JFactory::getDBO();
                $query = $db->getQuery(true)
                    ->select('extension_id')
                    ->from('#__extensions')
                    ->where(array(
                        $db->quoteName('type') . ' = ' . $db->quote($this->extension->type),
                        $db->quoteName('element') . ' = ' . $db->quote($this->extension->element),
                        $db->quoteName('folder') . ' = ' . $db->quote($this->extension->folder),
                        $db->quoteName('client_id') . ' = ' . $db->quote($this->extension->client_id)
                    ));

                $db->setQuery($query);
                try {
                    $this->extension->extension_id = (int)$db->loadResult();
                } catch (Exception $e) {
                    $this->extension->extension_id = 0;
                }
            }

            return ($this->extension->extension_id > 0);
        }

        protected function loadExtensionManifestCache()
        {
            if (!isset($this->old_manifest) || empty($this->old_manifest)) {
                jimport('joomla.registry.registry');

                $db = JFactory::getDBO();
                $query = $db->getQuery(true)
                    ->select('manifest_cache')
                    ->from('#__extensions');

                if ($this->extension->extension_id) {
                    $query->where($db->quoteName('extension_id') . ' = ' . (int)$this->extension->extension_id);
                } else {
                    $query->where(array(
                        $db->quoteName('type') . ' = ' . $db->quote($this->extension->type),
                        $db->quoteName('element') . ' = ' . $db->quote($this->extension->element),
                        $db->quoteName('folder') . ' = ' . $db->quote($this->extension->folder),
                        $db->quoteName('client_id') . ' = ' . $db->quote($this->extension->client_id)
                    ));
                }

                $db->setQuery($query);
                try {
                    $manifest_cache = $db->loadResult();
                } catch (Exception $e) {
                    $manifest_cache = null;
                }

                $this->old_manifest = new JRegistry($manifest_cache);
            }
        }

        protected function getUpdateSites()
        {
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);

            $query->select('us.update_site_id AS id, ' . (version_compare(JVERSION, '3.2.2', '>=') ? 'us.extra_query' : 'us.location') . ' AS server, us.location'
                . ', e.type, e.element, e.folder, e.client_id AS client')
                ->from('#__update_sites_extensions AS ue')
                ->join('LEFT', '#__extensions AS e ON ue.extension_id = e.extension_id')
                ->join('INNER', '#__update_sites AS us ON us.update_site_id = ue.update_site_id')
                ->where('us.location LIKE ' . $db->quote('%'.$db->escape('://www.perfect-web.co/index.php?option=com_ars&view=update&task=stream&format=xml&id=').'%', false));

            $db->setQuery($query);
            try {
                $update_sites = $db->loadObjectList();
            } catch (Exception $e) {
                $update_sites = null;
            }

            return $update_sites ? $update_sites : array();
        }

        protected function updateUpdateSite($update_site_id, $url_query, $version = null, $dlid = null)
        {
            $db = JFactory::getDBO();

            $update_site = new stdClass();
            $update_site->update_site_id = $update_site_id;

            //parse url of extra_query ( basically extracting vars )
            $url = parse_url($url_query);

            if (version_compare(JVERSION, '3.2.2', '>='))
            {
                $url_query = isset($url['path']) ? $url['path'] : '';
            }
            else
            {
                $url_query = isset($url['query']) ? $url['query'] : '';
            }

            parse_str($url_query, $url_vars);

            if ($version !== null)
                $url_vars['version'] = $version;

            $url_vars['jversion'] = JVERSION;
            $url_vars['host'] = JUri::root();

            if ($dlid !== null)
            {
                if (isset($url_vars['dlid']) AND $url_vars['dlid'] != $dlid)
                {
                    // purge updates cache after changing Download ID
                    $query = $db->getQuery(true)
                            ->delete('#__updates')
                            ->where('update_site_id = ' . (int) $update_site_id);
                    $db->setQuery($query);
                    try
                    {
                        $db->execute();
                    }
                    catch (Exception $e)
                    {

                    }
                }
                $url_vars['dlid'] = $dlid;
            }

            if (version_compare(JVERSION, '3.2.2', '>='))
            {
                $url['path'] = http_build_query($url_vars);
                $update_site->extra_query = $url['path'];
            }
            else
            {
                $url['query'] = http_build_query($url_vars);
                $update_site->location = 'https://' . $url['host'] . $url['path'] . '?' . $url['query'];
            }

            try
            {
                return $db->updateObject('#__update_sites', $update_site, 'update_site_id');
            }
            catch (Exception $e)
            {
                return false;
            }
        }

        protected function createUpdateSite($name, $version = null, $dlid = null)
        {
            if (!$this->loadExtensionId() || !($update_stream_id = $this->getUpdateStreamId()))
			{
				return false;
			}

			$db = JFactory::getDBO();

			$update_site = new stdClass();
			$update_site->name = $name;
			$update_site->type = 'extension';
			$update_site->enabled = 1;
			$update_site->location = 'https://www.perfect-web.co/index.php?option=com_ars&view=update&task=stream&format=xml&id=' . $update_stream_id;

            $url_query = array(
                'version' => $version ? $version : '1.0.0',
                'jversion' => JVERSION,
                'host' => JUri::root()
            );
            if ($dlid !== null)
                $url_query['dlid'] = $dlid;

            if (version_compare(JVERSION, '3.2.2', '>='))
            {
                $update_site->extra_query = http_build_query($url_query);
            }
            else
            {
                $update_site->location .= '&' . http_build_query($url_query);
            }

            try
            {
                $db->insertObject('#__update_sites', $update_site, 'update_site_id');

                $update_site_extension = new stdClass();
                $update_site_extension->update_site_id = $update_site->update_site_id;
                $update_site_extension->extension_id = $this->extension->extension_id;
                $db->insertObject('#__update_sites_extensions', $update_site_extension, 'update_site_id');
            }
            catch (Exception $e)
            {
                return false;
            }
            return true;
        }

        protected function changeUpdateSiteLocation($update_site_id, $location)
        {
            $db = JFactory::getDbo();

            $update_site = new stdClass();
            $update_site->update_site_id = $update_site_id;
            $update_site->location = $location;

            try
            {
                return $db->updateObject('#__update_sites', $update_site, 'update_site_id');
            }
            catch (Exception $e)
            {
                return false;
            }
        }

        /**
         * Called on installation
         *
         * @param   JAdapterInstance $adapter The object responsible for running this script
         *
         * @return  boolean  True on success
         */
        public function install(JAdapterInstance $adapter)
        {

            //Only for everyway installation we add a button for creating instance of module
            if ($this->extension->folder == 'everything_in_everyway')
                $this->createModuleInstanceMessage();
        }

        /**
         * Called on update
         *
         * @param   JAdapterInstance $adapter The object responsible for running this script
         *
         * @return  boolean  True on success
         */
        public function update(JAdapterInstance $adapter)
        {

        }

        /**
         * Display Message for creating module instance with installed plugins
         */
        protected function createModuleInstanceMessage()
        {
            $app = JFactory::getApplication();

            // Get mod_pwebbox id from extensions table.
            $db = JFactory::getDbo();

            $query = $db->getQuery(true);

            $query
                ->select($db->quoteName('extension_id'))
                ->from($db->quoteName('#__extensions'))
                ->where($db->quoteName('element') . ' = ' . $db->quote('mod_pwebbox'));

            $db->setQuery($query);

            try {
                $result = $db->loadResult();
            } catch (Exception $e) {
                echo $e->getMessage();
            }

            $icon = '';
            // For J!2.5 integration.
            if (is_file(JPATH_ROOT . '/media/jui/css/icomoon.css')) {
                $icon = '<i class="icon-plus icon-white"></i> ';
            }

            $message_type = 'notice';
            if (!empty($result)) {
                $onclick = 'onclick="location.href=\'index.php?option=com_modules&task=module.add&eid=' . $result . '#plugin-' . $this->extension->element . '\'"';

                $message_info = 'Create new module to display ' . (isset($this->manifest->name) ? (string) $this->manifest->name : 'Perfect Extension');
                $message_info .= ' <button ' . $onclick . ' type="button" class="btn btn-success hasTooltip" id="pweb_plugin_create_instance" title="To see your content on the website you need to use this plugin with Perfect Everything in Lightbox & more module. Clicking here will create a new module instance and redirect you there.">'
                    . $icon . 'Create'
                    . '</button>';
            } else {
                $message_info = 'Module Perfect Everything in Everyway is not installed! You must install it to display this plugin on the website.';
                $message_type = 'warning';
            }

            $app->enqueueMessage($message_info, $message_type);
        }

    }
}