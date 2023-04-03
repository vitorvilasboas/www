<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

if (file_exists(dirname(__FILE__) . '/form/perfectinstaller.php'))
    require_once dirname(__FILE__) . '/form/perfectinstaller.php';
elseif (file_exists(JPATH_ROOT . '/modules/mod_pwebbox/perfectinstaller.php'))
    require_once JPATH_ROOT . '/modules/mod_pwebbox/perfectinstaller.php';
else
    return false;

class plgEverything_in_everywayFacebook_page_pluginInstallerScript extends PerfectInstaller
{

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

        // Check if mod_pwebfblikebox is on server.
        if (JFolder::exists(JPATH_ROOT . '/modules/mod_pwebfblikebox')) {
            $app = JFactory::getApplication();
            $app->enqueueMessage("You have successfully upgraded Perfect Like Box Sidebar to Perfect Facebook Page Plugin in Everyway. All your settings has been copied to new modules. We have unpublished all Perfect Like Box Sidebar modules. Check the new modules and uninstall Perfect Like Box Sidebar when you are sure that upgrade went well.", "info");
            // Add notification to mod_pwebfblikebox module.
            $mod_pwebfblikebox_pweb_file = JPATH_ROOT . '/modules/mod_pwebfblikebox/form/fields/pweb.php';
            if (JFile::exists($mod_pwebfblikebox_pweb_file)) {
                $err_notification = 'JFactory::getApplication()->enqueueMessage("You have updated Perfect Facebook Like Box Sidebar to Perfect Facebook Page Plugin in Everyway. All your settings from this module has been copied to a new module. Please don\'t use this module anymore.", "error");' . PHP_EOL;
                $fblikebox_pweb_file_content_old = file_get_contents($mod_pwebfblikebox_pweb_file);

                if (!strpos($fblikebox_pweb_file_content_old, 'You have updated Perfect Facebook Like Box Sidebar to Perfect Facebook Page Plugin in Everyway.')) {
                    $get_input_position = strpos($fblikebox_pweb_file_content_old, '$doc = JFactory::getDocument();');
                    $fblikebox_pweb_file_content_new = substr_replace($fblikebox_pweb_file_content_old, $err_notification, $get_input_position, 0);

                    JFile::write($mod_pwebfblikebox_pweb_file, $fblikebox_pweb_file_content_new);
                }
            }

            // Create new EE module instance with plugin facebook_likebox set for every instance of mod_pwebfblikebox.
            $db = JFactory::getDBO();

            $query = $db->getQuery(true);
            $query->select('id')
                ->from($db->quoteName('#__modules'))
                ->where($db->quoteName('module') . ' = ' . $db->quote('mod_pwebfblikebox'));
            $db->setQuery($query);

            try {
                $modules = $db->loadObjectList();
            } catch (Exception $e) {
                $modules = false;
            }

            if (is_array($modules)) {
                require_once JPATH_ADMINISTRATOR . '/components/com_modules/models/module.php';

                foreach ($modules as $module) {
                    $module_model = new ModulesModelModule();
                    $fb_module = $module_model->getItem($module->id);

                    $fb_module = new JRegistry($fb_module);

                    $fb_module->set('params', new JRegistry($fb_module->get('params')));

                    // Convert some parameters from mod_pwebfblikebox to EE params.
                    $layout = $fb_module->get('params')->get('layout');
                    $handler = '';
                    $effect = '';
                    switch ($layout) {
                        case '_:sidebar':
                            $handler = 'tab';
                            $effect = 'slidebox:slide_in_full';
                            break;

                        case '_:static':
                            $handler = 'static';
                            $effect = 'static:none';
                            break;

                        case '_:tab':
                            $handler = 'tab';
                            $effect = 'static:none';
                            break;

                        default:
                            $handler = 'tab';
                            $effect = 'slidebox:slide_in';
                            break;
                    }
                    // Toggler text
                    $tab_type = $fb_module->get('params')->get('tab');
                    $toggler_rotate = '';
                    $toggler_align = $fb_module->get('params')->get('align');
                    $toggler_height = '';
                    if ($toggler_align == 'left') {
                        $toggler_rotate = '1';
                    } else {
                        $toggler_rotate = '-1';
                    }
                    $gallery_image = '';
                    switch ($tab_type) {
                        case 'facebook-black':
                            if ($toggler_align == 'left')
                            {
                                $gallery_image = 'f-black-left.png';
                            }
                            else
                            {
                                $gallery_image = 'f-black-right.png';
                            }
                            $toggler_height = 97;
                            break;

                        case 'f-white':
                            $gallery_image = 'f-white.png';
                            $toggler_rotate = 0;
                            $toggler_height = 35;
                            break;

                        case 'f-black':
                            $gallery_image = 'f-black.png';
                            $toggler_rotate = 0;
                            $toggler_height = 35;
                            break;

                        default:
                            if ($toggler_align == 'left')
                            {
                                $gallery_image = 'f-white-left.png';
                            }
                            else
                            {
                                $gallery_image = 'f-white-right.png';
                            }  
                            $toggler_height = 97;
                            break;
                    }

                    $box_height = 160;
                    if ($fb_module->get('params')->get('show_header', 1))
                    {
                        $box_height = 220;
                    }
                    if ($fb_module->get('params')->get('show_stream'))
                    {
                        $box_height += 120;
                    }
                    $data = array(
                        'title' => $fb_module->get('title'),
                        'note' => $fb_module->get('note'),
                        'module' => 'mod_pwebbox',
                        'showtitle' => $fb_module->get('showtitle'),
                        'published' => 1,
                        'publish_up' => $fb_module->get('publish_up'),
                        'publish_down' => $fb_module->get('publish_down'),
                        'client_id' => $fb_module->get('client_id'),
                        'position' => $fb_module->get('position'),
                        'access' => $fb_module->get('access'),
                        'ordering' => $fb_module->get('ordering'),
                        'content' => $fb_module->get('content'),
                        'language' => $fb_module->get('language'),
                        'assignment' => $fb_module->get('assignment'),
                        'assigned' => $fb_module->get('assigned'),
                        'asset_id' => $fb_module->get('asset_id'), //??
                        'rules' => $fb_module->get('rules'),

                        // Params
                        'params' => array(
                            'plugin' => 'facebook_page_plugin',
                            // Plugin config
                            'plugin_config' => array(
                                'params' => array(
                                    'href' => $fb_module->get('params')->get('href'),
                                    'box_type' => $fb_module->get('params')->get('box_type'),
                                    'width' => $fb_module->get('params')->get('width', 280),
                                    'height' => $fb_module->get('params')->get('height', $box_height),
                                    'pretext' => $fb_module->get('params')->get('pretext'),
                                    'small_header' => (int)(!$fb_module->get('params')->get('show_header', 1)),
                                    'show_facepile' => $fb_module->get('params')->get('show_faces'),
                                    'show_posts' => $fb_module->get('params')->get('show_stream'),
                                    'fb_jssdk' => $fb_module->get('params')->get('fb_jssdk'),
                                    'fb_appid' => $fb_module->get('params')->get('fb_appid'),
                                    'fb_root' => $fb_module->get('params')->get('fb_root'),
                                    'track_social' => $fb_module->get('params')->get('track_social'),
                                )
                            ),
                            // Location & effects.
                            'handler' => $handler,
                            'effect' => $effect,
                            'toggler_position' => $toggler_align,
                            'open_event' => $fb_module->get('params')->get('open_event'),
                            'close_event' => $fb_module->get('params')->get('close_event'),
                            'offset' => $fb_module->get('params')->get('top'),
                            'close_other' => $fb_module->get('params')->get('close_other'),
                            // Theme
                            // Default theme.
                            'theme' => 'fbnavy',
                            'rounded' => $fb_module->get('params')->get('style_radius', 1),
                            'shadow' => $fb_module->get('params')->get('style_shadow', 1),
                            'gradient' => 2,
                            'text_color' => '#000000',
                            'font_size' => '12px',
                            'font_family' => 'Open Sans, sans-serif',
                            'bg_color' => $fb_module->get('params')->get('background', '#98A8C7'),
                            'bg_opacity' => 1,
                            'toggler_bg' => '#133783',
                            'toggler_font_family' => 'Arial, Helvetica, sans-serif',
                            'toggler_icon' => 0,
                            'toggler_image' => 'gallery',
                            'toggler_image_gallery_image' => $gallery_image,
                            'toggler_font' => 'NotoSans-Regular',
                            'toggler_slide' => 1,
                            'toggler_vertical' => 1,
                            'toggler_rotate' => $toggler_rotate,
                            'toggler_height' => $toggler_height,
                            'accordion_boxed' => 0,
                            // Advanced
                            'debug' => $fb_module->get('params')->get('debug'),
                            'moduleclass_sfx' => $fb_module->get('params')->get('moduleclass_sfx'),
                            'cache' => $fb_module->get('params')->get('cache'),
                            'cache_time' => $fb_module->get('params')->get('cache_time'),
                            'module_tag' => $fb_module->get('params')->get('module_tag'),
                            'bootstrap_size' => $fb_module->get('params')->get('bootstrap_size'),
                            'header_tag' => $fb_module->get('params')->get('header_tag'),
                            'header_class' => $fb_module->get('params')->get('header_class'),
                            'style' => $fb_module->get('params')->get('style'),
                        ),
                    );

                    $module_model->save($data); // uncoment to save

                    // Set mod_pwebfblikebox disabled.
                    $query->clear()
                        ->update($db->quoteName('#__modules'))
                        ->set($db->quoteName('published') . ' = 0')
                        ->where($db->quoteName('id') . ' = ' . (int)$module->id);
                    $db->setQuery($query);

                    try {
                        $db->execute();
                    } catch (Exception $e) {

                    }
                }
            }
        }
    }
}