<?php
/**
 * @package     pwebbox
 * @version 	2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

/**
 * Plug-in to enable loading Perfect Everything in Everyway modules into content (e.g. articles)
 * This uses the {everything_in_everyway} syntax
 */
class PlgContentPerfect_everything_in_everyway extends JPlugin
{
	protected static $pweb_ee_mods = array();

	/**
	 * Constructor
	 *
	 * @param   object  &$subject  The object to observe
	 * @param   array   $config    An optional associative array of configuration settings.
	 *                             Recognized key values include 'name', 'group', 'params', 'language'
	 *                             (this list is not meant to be comprehensive).
	 *
	 * @since   1.5
	 */
	public function __construct(&$subject, $config = array())
	{
            // Set for this plugin max ordering - that way it will be triggered as the last from other content plugins.
            $db = JFactory::getDbo();
            
            $conditions = array(
                            $db->quoteName('type') . ' = ' . $db->quote('plugin'), 
                            $db->quoteName('folder') . ' = ' . $db->quote('content'), 
                            $db->quoteName('element') . ' = ' . $db->quote('perfect_everything_in_everyway'), 
                        );            
            
            $query = $db->getQuery(true);
            
            $query->select('MAX(ordering)')
                    ->from($db->quoteName('#__extensions'))
                    ->where(array(
                        $db->quoteName('type') . ' = ' . $db->quote('plugin'),
                        $db->quoteName('folder') . ' = ' . $db->quote('content'),
                            ));
            
            $db->setQuery($query);
            
            try 
            {
                $max_ordering = $db->loadResult();
            } 
            catch (Exception $ex) 
            {
                $max_ordering = null;
            } 
            
            if ($max_ordering)
            {
                $query = $db->getQuery(true);

                $query->select($db->quoteName('ordering'))
                        ->from($db->quoteName('#__extensions'))
                        ->where($conditions);

                $db->setQuery($query);  
                
                try 
                {
                    $eecontent_ordering = $db->loadResult();
                } 
                catch (Exception $ex) 
                {
                    $eecontent_ordering = null;
                }   
                
                if ($eecontent_ordering < $max_ordering)
                {
                    $max_ordering++;
                    
                    $query = $db->getQuery(true);

                    $query->update($db->quoteName('#__extensions'))
                            ->set($db->quoteName('ordering') . ' = ' . $max_ordering)
                            ->where($conditions);

                    $db->setQuery($query);  
                    
                    try 
                    {
                        $db->execute();
                    } 
                    catch (Exception $ex) {}                      
                }
            }
            
            parent::__construct($subject, $config);
        }        
        
	/**
	 * Plugin that loads module within content
	 *
	 * @param   string   $context   The context of the content being passed to the plugin.
	 * @param   object   &$article  The article object.  Note $article->text is also available
	 * @param   mixed    &$params   The article params
	 * @param   integer  $page      The 'page' number
	 *
	 * @return  mixed   true if there is an error. Void otherwise.
	 */
	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{
		// Don't run this plugin when the content is being indexed
		if ($context == 'com_finder.indexer')
		{
			return true;
		}

		// Simple performance check to determine whether bot should process further
		if (strpos($article->text, 'everything_in_everyway') === false)
		{
			return true;
		}
                
		// Expression to search for(modules)
		$regexmod	= '/{everything_in_everyway\s(.*?)}/i';

		// Find all instances of plugin and put in $matchesmod for loadmodule
                // $matchesmod[0] is full pattern match, $matchesmod[1] is the id
		preg_match_all($regexmod, $article->text, $matchesmod, PREG_SET_ORDER);

		// If no matches, skip this
		if ($matchesmod)
		{
			foreach ($matchesmod as $matchmod)
			{
                                $mod_id = (int) $matchmod[1];

				$output = $this->_loadmod($mod_id);

				// We should replace only first occurrence in order to allow positions with the same name to regenerate their content:
				$article->text = preg_replace("|$matchmod[0]|", addcslashes($output, '\\$'), $article->text, 1);
			}
		}
	}

	/**
	 * This is always going to get the first instance of the module type unless
	 * there is a title.
	 *
	 * @param   id  $mod_id  The module id
	 *
	 * @return  mixed
	 */
	protected function _loadmod($mod_id)
	{
		if (isset(self::$pweb_ee_mods[$mod_id]))
                {
                    return self::$pweb_ee_mods[$mod_id];
                }
                
		$document	= JFactory::getDocument();
		$renderer	= $document->loadRenderer('module');

                $mod            = self::getModule($mod_id);
                
		if ($mod)
                {
                    ob_start();

                    echo $renderer->render($mod);

                    self::$pweb_ee_mods[$mod_id] = ob_get_clean();

                    return self::$pweb_ee_mods[$mod_id];
                }
                else 
                {
                    return null;
                }
	}
        
	/**
	 * Get module
	 *
	 * @param   id  $mod_id  The module id         
         * 
	 * @return  mixed
	 */
	public static function getModule($mod_id)
	{
		$app = JFactory::getApplication();
		$Itemid = $app->input->getInt('Itemid');
		$groups = implode(',', JFactory::getUser()->getAuthorisedViewLevels());
		$lang = JFactory::getLanguage()->getTag();
		$clientId = (int) $app->getClientId();

		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select('m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid')
			->from('#__modules AS m')
			->join('LEFT', '#__modules_menu AS mm ON mm.moduleid = m.id')
			->where('m.published = 1')
			->join('LEFT', '#__extensions AS e ON e.element = m.module AND e.client_id = m.client_id')
			->where('e.enabled = 1')
			->where('m.id = ' . (int)$mod_id);

		$date = JFactory::getDate();
		$now = $date->toSql();
		$nullDate = $db->getNullDate();
		$query->where('(m.publish_up = ' . $db->quote($nullDate) . ' OR m.publish_up <= ' . $db->quote($now) . ')')
			->where('(m.publish_down = ' . $db->quote($nullDate) . ' OR m.publish_down >= ' . $db->quote($now) . ')')
			->where('m.access IN (' . $groups . ')')
			->where('m.client_id = ' . $clientId)
			->where('(mm.menuid = ' . (int) $Itemid . ' OR mm.menuid <= 0)');

		// Filter by language
		if ($app->isSite() && $app->getLanguageFilter())
		{
			$query->where('m.language IN (' . $db->quote($lang) . ',' . $db->quote('*') . ')');
		}

		// Set the query
		$db->setQuery($query);

		try
		{
			$module = $db->loadObject();
		}
		catch (Exception $e)
		{
			return null;
		}

		return $module;
	}        
}
