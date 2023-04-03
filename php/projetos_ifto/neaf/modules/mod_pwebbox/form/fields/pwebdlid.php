<?php

/**
 * @version 3.3.0
 * @package PwebBox
 * @copyright © 2015 Perfect Web sp. z o.o., All rights reserved. http://www.perfect-web.co
 * @license GNU General Public License http://www.gnu.org/licenses/gpl-3.0.html
 * @author Piotr Moćko
 */
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('Text');

/**
 * Download ID
 */
class JFormFieldPwebDlid extends JFormFieldText
{

    protected $type = 'PwebDlid';

    /**
     * Method to attach a JForm object to the field.
     *
     * @param   SimpleXMLElement  $element  The SimpleXMLElement object representing the <field /> tag for the form field object.
     * @param   mixed             $value    The form field value to validate.
     * @param   string            $group    The field name group control value. This acts as as an array container for the field.
     *                                      For example if the field has name="foo" and the group value is set to "bar" then the
     *                                      full field name would end up being "bar[foo]".
     *
     * @return  boolean  True on success.
     *
     * @since   11.1
     */
    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        $authorized = JFactory::getUser()->authorise('core.manage', 'com_installer');
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);

        // Load Download ID from update server location or extra query
        $query->select((version_compare(JVERSION, '3.2.2', '>=') ? 'us.extra_query' : 'us.location') . ' AS server, e.manifest_cache')
            ->from('#__extensions AS e')
            ->leftJoin('#__update_sites_extensions AS ue ON ue.extension_id = e.extension_id')
            ->leftJoin('#__update_sites AS us ON us.update_site_id = ue.update_site_id')
            ->where(array(
                'e.type = ' . $db->quote($element['ext_type']),
                'e.element = ' . $db->quote($element['ext_element']),
                'e.folder = ' . $db->quote($element['ext_folder']),
                'e.client_id = ' . $db->quote($element['ext_client'])
            ));

        $db->setQuery($query);
        try
        {
            $extension = $db->loadObject();
        }
        catch (Exception $e)
        {
            $extension = null;
        }

        $value = '';
        if ($authorized && $extension && $extension->server)
        {
            $url = parse_url($extension->server);
            if (version_compare(JVERSION, '3.2.2', '>='))
            {
                $url = isset($url['path']) ? $url['path'] : '';
            }
            else
            {
                $url = isset($url['query']) ? $url['query'] : '';
            }

            parse_str($url, $url_query);
            if (isset($url_query['dlid']))
            {
                $value = $url_query['dlid'];
            }
        }

        // Set value in form object
        $this->form->setValue($element['name'], $group, $value);

        // Updates feed
        $update_stream_id = 0;
        $extra_query = '';

        if ($extension && $extension->manifest_cache)
        {
            JLoader::import('joomla.registry.registry');
            $manifest = new JRegistry($extension->manifest_cache);
            if ($version = $manifest->get('version'))
            {
                $extra_query .= '&version=' . $version;
            }
            $update_stream_id = $manifest->get('perfect_update_id', 0);
        }

        $extra_query .= '&jversion=' . JVERSION . '&host=' . urlencode(JUri::root());

        if ($value)
        {
            $extra_query .= '&dlid=' . $value;
        }

        // Display update stream
        JFactory::getDocument()->addScriptDeclaration(
            'setTimeout(function(){'
            . 'var pw=document.createElement("script");pw.type="text/javascript";pw.async=true;'
            . 'pw.src="https://www.perfect-web.co/index.php?option=com_ars&view=update&task=stream&format=raw&id=' . $update_stream_id . $extra_query . '";'
            . 'var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(pw,s);'
            . '},3000);'
        );

        if (!$authorized)
        {
            $element['hidden'] = 'true';
            $element['readonly'] = 'true';
            $element['labelclass'] = 'hidden';
        }

        return parent::setup($element, $value, $group);
    }

    protected function getInput()
    {
        $html = '';

        if (JFactory::getUser()->authorise('core.manage', 'com_installer'))
        {
            if (version_compare(JVERSION, '3.0.0', '<'))
            {
                $html = '<div class="fltlft">'
                    . parent::getInput()
                    . '</div><div class="button2-left"><div class="blank">'
                    . '<a href="https://www.perfect-web.co/login/" target="_blank">'
                    . JText::_('MOD_PWEBBOX_GET_DOWNLOAD_ID') // Get Download ID
                    . '</a>'
                    . '</div></div>';
            }
            else
            {
                $html = '<div class="input-append">'
                    . parent::getInput()
                    . '<a href="https://www.perfect-web.co/login/" target="_blank" class="btn">'
                    . JText::_('MOD_PWEBBOX_GET_DOWNLOAD_ID') // Get Download ID
                    . '</a>'
                    . '</div>';
            }
        }

        return $html;
    }

}
