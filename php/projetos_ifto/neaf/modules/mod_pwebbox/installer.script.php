<?php
/**
 * @package     pwebbox
 * @version    2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

if (file_exists(dirname(__FILE__) . '/perfectinstaller.php'))
    require_once dirname(__FILE__) . '/perfectinstaller.php';
elseif (file_exists(JPATH_ROOT . '/modules/mod_pwebbox/perfectinstaller.php'))
    require_once JPATH_ROOT . '/modules/mod_pwebbox/perfectinstaller.php';
else
    return false;

class mod_pwebboxInstallerScript extends PerfectInstaller
{

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

        parent::preflight($route, $adapter);

        if (version_compare($this->old_manifest->get('version', '2.0.0'), '2.0.0') == -1) {
            $app = JFactory::getApplication();
            $jinput = $app->input->cookie;

            // If cookie is set, check if user want to upgrade module.
            $cookie_info = $jinput->get('pwebbox_updateto_ee', 0);
            // If user want to upgrade module - return true to continue installation.
            if ($cookie_info == 1) {
                return true;
            }

            $db = JFactory::getDBO();

            // Check if there are module instances.
            $query = $db->getQuery(true);
            $query->select('COUNT(*)')
                ->from('#__modules')
                ->where($db->quoteName('module') . ' = ' . $db->quote($this->element));
            $db->setQuery($query);

            try {
                $instances_found = $db->loadResult();
            } catch (Exception $e) {
                $instances_found = null;
            }


            // If there are instances or no information about instances.
            if (is_null($instances_found) || $instances_found > 0) {
                $onclickYes = 'onclick="document.getElementById(\'pweb-update-warning\').innerHTML=\'Choose installation package again and install it.\';'
                    . 'var date=new Date();date.setTime(date.getTime()+(30*24*60*60*1000));var expires=date.toGMTString();'
                    . 'document.cookie=\'pwebbox_updateto_ee=1;expires=\'+expires+\';path=/\';'
                    . '"';
                $onclickNo = 'onclick="document.getElementById(\'pweb-update-warning\').innerHTML=\'Installation will not continue.\';'
                    . 'var date=new Date();date.setTime(date.getTime()+(30*24*60*60*1000));var expires=\'; expires=\'+date.toGMTString();'
                    . 'document.cookie=\'pwebbox_updateto_ee=-1;expires=\'+expires+\';path=/\';'
                    . '"';

                $message_info = '<div id="pweb-update-warning">Do you want to upgrade Perfect Popup Box to Everything in Everyway? ';
                $message_info .= ' <button ' . $onclickYes . ' type="button" class="btn btn-success">'
                    . 'Yes'
                    . '</button>';
                $message_info .= ' <button ' . $onclickNo . ' type="button" class="btn btn-danger">'
                    . 'No'
                    . '</button></div>';

                if (version_compare(JVERSION, '3.0.0') == -1) {
                    $message_info .= '<script type="text/javascript">window.addEvent("domready", function(){$$("#system-message > :not(.notice)").setStyle("display", "none")});</script>';
                } else {
                    $message_info .= '<script type="text/javascript">jQuery(document).ready(function($){$("#system-message-container .alert:not(.alert-info").hide()});</script>';
                }

                $app->enqueueMessage($message_info, 'notice');

                return false;
            }
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

        parent::install($adapter);

        if (version_compare(JVERSION, '3.4') == -1) {
            if (version_compare(JVERSION, '3.0.0') == -1) {
                $this->installPwebAjaxAndPwebJ3UI('ajax_and_pwebj3ui');
            } elseif (version_compare(JVERSION, '3.1.4') == -1) {
                $this->installPwebAjaxAndPwebJ3UI('ajax_and_bootstrap');
            } elseif (version_compare(JVERSION, '3.2') == -1) {
                $this->installPwebAjaxAndPwebJ3UI('ajax');
            } else {
                $this->installPwebAjaxAndPwebJ3UI('ajax_update');
            }
        }
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

        parent::update($adapter);

        $db = JFactory::getDBO();

        if (version_compare(JVERSION, '3.4') == -1) {
            if (version_compare(JVERSION, '3.0.0') == -1) {
                $this->installPwebAjaxAndPwebJ3UI('ajax_and_pwebj3ui');
            } elseif (version_compare(JVERSION, '3.1.4') == -1) {
                $this->installPwebAjaxAndPwebJ3UI('ajax_and_bootstrap');
            } elseif (version_compare(JVERSION, '3.2') == -1) {
                $this->installPwebAjaxAndPwebJ3UI('ajax');
            } else {
                $this->installPwebAjaxAndPwebJ3UI('ajax_update');
            }
        }

        if (version_compare($this->old_manifest->get('version', '2.0.0'), '2.0.0') == -1) {
            // Upgrade params.
            $query = $db->getQuery(true);
            $query->select('id, params')
                ->from('#__modules')
                ->where('module = ' . $db->quote('mod_pwebbox'));
            $db->setQuery($query);

            try {
                $modules = $db->loadObjectList();
            } catch (Exception $e) {
                $modules = false;
            }

            if (is_array($modules)) {
                foreach ($modules as $module) {
                    $params = new JRegistry($module->params);

                    // Skip new configuration.
                    if ($params->get('plugin', false) !== false) continue;

                    // Location & Effects.

                    // Set handler, position, effect.
                    $position = $params->get('position');
                    if ($position == 'left:top' || $position == 'right:top') {
                        $tmpPosArr = explode(':', $position);
                        $position = $tmpPosArr[0];
                    }
                    switch ($position) {
                        case 'static:':
                            $params->def('handler', 'button');
                            if ($params->get('layout') == 'modal') {
                                if (!$params->get('show_toggler', 1)) {
                                    $params->set('handler', 'hidden');
                                }
                                $params->def('effect', 'modal:fade');
                            } else //tab
                            {
                                $params->def('effect', 'static:none');
                            }

                            break;

                        default:
                            $params->def('handler', 'tab');
                            $params->def('toggler_position', $position);
                            if ($params->get('layout') == 'modal') {
                                if (!$params->get('show_toggler', 1)) {
                                    $params->set('handler', 'hidden');
                                }
                                $params->def('effect', 'modal:fade');
                            } elseif ($params->get('layout') == 'tab') {
                                $params->def('effect', 'static:none');
                            } else {
                                $params->def('effect', 'slidebox:slide_in');
                            }
                            break;
                    }

                    // toggler_name - no changes

                    // Location & Effects - advanced.
                    // offset - no changes
                    // open_toggler - no changes
                    // open_count - no changes
                    // open_delay - no changes
                    // cookie_lifetime - no changes
                    // close_other - no changes
                    if ($params->get('layout') == 'default') {
                        $params->def('effect_duration', $params->get('slide_duration'));
                        $slide_transition = $params->get('slide_transition');
                        if ($slide_transition == 'bounce') {
                            $slide_transition = 'easeInOutBounce';
                        } elseif ($slide_transition == 'elastic') {
                            $slide_transition = 'easeInOutElastic';
                        }

                        $params->set('effect_transition', $slide_transition);
                    }
                    $params->def('modal_disable_close', $params->get('disable_close'));
                    // onopen - no changes
                    // onclose - no changes

                    // Content.
                    $content_params = new stdClass();
                    if ($params->get('layout') == 'tab') {
                        // Set plugin.
                        $params->def('plugin', 'link');

                        // Set content of plugin.
                        $content_params->url = $params->get('tab_url');
                        $content_params->menuitem = $params->get('tab_menuitem');
                        $content_params->target = $params->get('tab_target');
                    } else {
                        switch ($params->get('content_type')) {
                            case 'article':
                                // Set plugin.
                                $params->def('plugin', 'article');

                                // Set content of plugin.
                                $content_params->article_id = $params->get('article_id');
                                $content_params->show_content_title = 0;
                                $content_params->prepare_content = $params->get('prepare_content');

                                break;

                            case 'module':
                                // Set plugin.
                                $params->def('plugin', 'any_module');

                                // Set content of plugin.
                                $content_params->module_id = $params->get('module_id');

                                break;

                            case 'iframe':
                                // Set plugin.
                                $params->def('plugin', 'iframe');

                                // Set content of plugin.
                                $content_params->iframe_url = $params->get('iframe_url');
                                $content_params->iframe_menuitem = $params->get('iframe_menuitem');

                                $iframe_width = $params->get('box_width') ? $params->get('box_width') : $params->get('modal_width');
                                $iframe_height = $params->get('box_height') ? $params->get('box_height') : $params->get('modal_height');

                                // If width and height is still empty, then set default value.
                                if (empty($iframe_width)) {
                                    $iframe_width = 500;
                                }
                                if (empty($iframe_height)) {
                                    $iframe_height = 400;
                                }

                                $content_params->width = $iframe_width;
                                $content_params->height = $iframe_height;

                                break;

                            default:
                                // Set plugin.
                                $params->def('plugin', 'custom_html');

                                // Set content of plugin.
                                $content_params->html_code = $params->get('html_code');

                                break;
                        }
                    }

                    $plugin_config = new stdClass();
                    $plugin_config->params = $content_params;
                    $params->set('plugin_config', $plugin_config);

                    // Layout.
                    $params->def('theme', 'free'); // change to default theme for Perfect Everything in Everyway.
                    // Common styles.
                    $params->def('rounded', $params->get('style_radius'));
                    $params->def('shadow', $params->get('style_shadow'));

                    // Popupbox size.
                    // box_width - no changes
                    // box_height - no changes

                    // Popupbox text.
                    $params->def('text_color', $params->get('container_font_color'));
                    $params->def('font_size', $params->get('container_font_size'));
                    $params->def('bg_opacity', $params->get('modal_opacity'));

                    // Background of box.
                    $params->def('bg_color', $params->get('container_bg', '#ffffff'));

                    // Background image of box.

                    // Toggler Button and Tab.
                    // toggler_bg - no changes
                    $params->def('toggler_color', $params->get('toggler_font_color'));

                    switch ((int)$params->get('icon')) {
                        case 0:
                            $params->def('toggler_icon', 0);

                            break;

                        case 1:
                            $params->def('toggler_icon', 'gallery');

                            break;

                        case 2:
                            $params->def('toggler_icon', 'custom');

                            break;

                        case 3:
                            $params->def('toggler_icon', 'icomoon');

                            break;

                        default:
                            $params->def('toggler_icon', 0);
                            break;
                    }

                    $gallery_icon = $params->get('icon_gallery');
                    if ($gallery_icon == 'green-plus.png') {
                        $gallery_icon = 'green-plus-red-cross.png';
                    }
                    $params->def('toggler_icon_gallery_image', $gallery_icon);
                    $params->def('toggler_icon_custom_image', $params->get('icon_custom'));
                    $params->def('toggler_icomoon', $params->get('icomoon'));
                    // toggler_font_size - no changes

                    // Vertical Toggler Tab.
                    $params->def('toggler_vertical', $params->get('vertical_toggler'));
                    // toggler_rotate - no changes

                    // Toggler size.
                    // toggler_width - no changes
                    // toggler_height - no changes

                    // Accordion.

                    // Advanced.
                    // debug - no changes
                    // rtl - no changes
                    // feed - no changes
                    // moduleclass_sfx - no changes
                    // cache_time - no changes
                    // cache - no changes

                    // Update params in database
                    $module->params = $params->toString();

                    $query->clear()
                        ->update('#__modules')
                        ->set('params = ' . $db->quote($module->params))
                        ->where('id = ' . $module->id);
                    $db->setQuery($query);

                    try {
                        $db->execute();
                    } catch (Exception $e) {

                    }
                }

                // Remove old files
                $media_files = array(
                    'css/ie.css',
                    'css/PIE.htc',
                    'css/pwebbox.css',
                    'images/font.ttf',
                    'images/icons/green-plus.png',
                    'js/jquery.transit.min.js',
                );
                $media_folders = array(
                    'css/style',
                );
                $module_files = array(
                    'form/fields/pwebadcenter.php',
                    'form/fields/pwebadwords.php',
                    'form/fields/pwebtip.php',
                    'tmpl/modal.php',
                    'tmpl/tab.php',
                );

                foreach ($media_files as $file) {
                    if (JFile::exists(JPATH_ROOT . '/media/mod_pwebbox/' . $file)) {
                        JFile::delete(JPATH_ROOT . '/media/mod_pwebbox/' . $file);
                    }
                }
                foreach ($media_folders as $folder) {
                    if (JFolder::exists(JPATH_ROOT . '/media/mod_pwebbox/' . $folder)) {
                        JFolder::delete(JPATH_ROOT . '/media/mod_pwebbox/' . $folder);
                    }
                }
                foreach ($module_files as $file) {
                    if (JFile::exists(JPATH_ROOT . '/modules/mod_pwebbox/' . $file)) {
                        JFile::delete(JPATH_ROOT . '/modules/mod_pwebbox/' . $file);
                    }
                }
            }
        }
    }

    protected function installPwebAjaxAndPwebJ3UI($type)
    {
        $app = JFactory::getApplication();

        if ($type == 'ajax_and_pwebj3ui' || $type == 'ajax_and_bootstrap') {
            $app->enqueueMessage(
                'Install also required package with'
                . ' <a href="https://www.perfect-web.co/downloads/joomla-3-ui-libraries-for-joomla-25/latest/pkg_pwebj3aiui-zip?format=raw" target="_blank">'
                . 'Perfect Joomla! 3 Ajax and User Interface</a>'
                . ($type == 'ajax_and_pwebj3ui'
                    ? ' to extend your Joomla! with native support of Ajax, jQuery and Bootstrap from Joomla! 3'
                    : ' to extend your Joomla! with native support of Ajax and update Bootstrap to version 2.3.1 from Joomla! 3.1.4+ to fix Lightbox bug'
                ) . '. <a href="javascript:void()" onclick="document.getElementById(\'install_url\').value=\'https://www.perfect-web.co/downloads/joomla-3-ui-libraries-for-joomla-25/latest/pkg_pwebj3aiui-zip?format=raw\';Joomla.submitbutton4()">'
                . 'Click here</a> to install.'
                , 'warning');
        } else {
            $app->enqueueMessage(
                'Install also required component'
                . ' <a href="https://www.perfect-web.co/downloads/joomla-3-ui-libraries-for-joomla-25/latest/pkg_pwebj3aiui-zip?format=raw" target="_blank">'
                . 'Perfect Joomla! 3 Ajax and User Interface</a>'
                . ($type == 'ajax'
                    ? ' to extend your Joomla! with native support of Ajax from Joomla! 3.4'
                    : ' to update Joomla! Ajax component to version from Joomla! 3.4+'
                ) . '. <a href="javascript:void()" onclick="document.getElementById(\'install_url\').value=\'https://www.perfect-web.co/downloads/joomla-3-ui-libraries-for-joomla-25/latest/pkg_pwebj3aiui-zip?format=raw\';Joomla.submitbutton4()">'
                . 'Click here</a> to install.'
                , 'warning');
        }
    }
}