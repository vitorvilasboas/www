<?php

/**
 * @package     pwebbox
 * @version 	2.0.10
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 * @author      Piotr Moćko
 */
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formrule');

/**
 * Form Rule class for the Joomla Framework.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormRulePwebDlid extends JFormRule
{

    /**
     * Method to save Download ID.
     *
     * @param   SimpleXMLElement  $element  The SimpleXMLElement object representing the <field /> tag for the form field object.
	 * @param   mixed             $value    The form field value to validate.
	 * @param   string            $group    The field name group control value. This acts as as an array container for the field.
	 *                                      For example if the field has name="foo" and the group value is set to "bar" then the
	 *                                      full field name would end up being "bar[foo]".
	 * @param   JRegistry         $input    An optional JRegistry object with the entire data set to validate against the entire form.
	 * @param   JForm             $form     The form object for which the field is being tested.
	 *
	 * @return  boolean  True if the value is valid, false otherwise.
	 *
	 * @since   11.1
	 * @throws  UnexpectedValueException if rule is invalid.
	 */
	public function test(SimpleXMLElement $element, $value, $group = null, JRegistry $input = null, JForm $form = null)
    {
        $authorized = JFactory::getUser()->authorise('core.manage', 'com_installer');

        if ($authorized AND strlen($value) AND ! preg_match('/^[a-f0-9]{25,32}$/i', $value))
        {
            return false;
        }
        elseif ($value === null)
        {
            $value = '';
        }

        // Get all update sites from Perfect-Web.co
        $update_sites = $this->getUpdateSites();
        foreach ($update_sites as $update_site)
        {
            // Update DLID only if it is current extension
            if ($authorized AND (
                    ($update_site->element == 'mod_pwebbox' AND $update_site->type == 'module')
                    OR ( $update_site->folder == 'everything_in_everyway' AND $update_site->type == 'plugin')
                    OR ( $update_site->element == 'perfect_everything_in_everyway' AND $update_site->type == 'plugin')
                    ))
            {
                $this->updateUpdateSite($update_site->id, $update_site->server, null, $value);
            }
            // Update all other Perfect-Web.co extensions
            else
            {
                $this->updateUpdateSite($update_site->id, $update_site->server);
            }
        }

        return true;
    }

    protected function getUpdateSites()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);

        $query->select('us.update_site_id AS id, ' . (version_compare(JVERSION, '3.2.2', '>=') ? 'us.extra_query' : 'us.location') . ' AS server'
            . ', e.type, e.element, e.folder, e.client_id AS client')
            ->from('#__update_sites_extensions AS ue')
            ->join('LEFT', '#__extensions AS e ON ue.extension_id = e.extension_id')
            ->join('INNER', '#__update_sites AS us ON us.update_site_id = ue.update_site_id')
            ->where('us.location LIKE ' . $db->quote('%'.$db->escape('://www.perfect-web.co/index.php?option=com_ars&view=update&task=stream&format=xml&id=').'%', false));

        $db->setQuery($query);
        try
        {
            $update_sites = $db->loadObjectList();
        }
        catch (Exception $e)
        {
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

}
