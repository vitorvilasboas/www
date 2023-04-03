<?php
/**
 * @package     pwebbox
 * @version    2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

class JFormFieldPwebVersion extends JFormField
{

    protected $type = 'PwebVersion';

    protected function getInput()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('manifest_cache')
            ->from('#__extensions')
            ->where(array(
                'type = ' . $db->quote($this->element['ext_type']),
                'element = ' . $db->quote($this->element['ext_element']),
                'folder = ' . $db->quote($this->element['ext_folder']),
                'client_id = ' . $db->quote($this->element['ext_client'])
            ));
        $db->setQuery($query);
        try {
            $manifest = $db->loadResult();
        } catch (RuntimeException $e) {
            $manifest = null;
        }

        $version = 'unknow';
        if ($manifest) {
            $manifest = new JRegistry($manifest);
            $version = $manifest->get('version');
        }

        $ext_name = $manifest->get('name', 0);

        // Display update stream
//        if (strpos($ext_name, 'PRO') == false) {
//
//            JFactory::getDocument()->addScriptDeclaration(
//                '(function(){' .
//                'var pw=document.createElement("script");pw.type="text/javascript";pw.async=true;' .
//                'pw.src="https://www.perfect-web.co/index.php?option=com_ars&view=update&task=stream&format=raw&extension=mod_pwebbox&version=' . $version . '&jversion=' . JVERSION . '&host=' . urlencode(JUri::root()) . '";' .
//                'var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(pw,s);' .
//                '})();'
//            );
//
//        }

        return '<div style="padding-top:5px"><strong id="pweb-version" class="badge badge-inverse">' . $version . '</strong></div>';
    }

}
