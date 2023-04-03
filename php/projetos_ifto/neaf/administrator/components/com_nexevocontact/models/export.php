<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

jimport("joomla.application.component.modellist");
// include required files
JLoader::register("NexevoContactModelEnquiries", JPATH_COMPONENT . "/models/enquiries.php");

class NexevoContactModelExport extends NexevoContactModelEnquiries
{

	public function getItems()
	{
		$this->context = "com_nexevocontact.enquiries";
		$this->populateState();
		$query = $this->_getListQuery();

		$this->_db->setQuery($query);
		$items = $this->_db->loadAssocList();

		foreach ($items as &$item)
		{
			$fields = json_decode($item["fields"]);

			foreach ($fields as $field)
			{

				$item[$field[1]] = str_replace(array("\r", "\n"), " ", $field[2]);
			}
			unset($item["exported"]);
			unset($item["fields"]);
		}

		return $items;
	}


	public function mark($items)
	{
		$ids = array();
		foreach ($items as $item)
		{
			$ids[] = $item["id"];
		}
		if (!empty($ids))
		{
			$query = $this->_db->getQuery(true);
			$query->update("#__nexevocontact_enquiries");
			$query->set("exported = 1");
			$query->where("id IN (" . implode(",", $ids) . ")");
			$this->_db->setQuery($query);
			$this->_db->execute();
		}
	}

}