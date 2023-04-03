<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

class NexevoContactControllerEnquiries extends JControllerAdmin
{
	protected $text_prefix = "COM_NEXEVOCONTACT";


	public function getModel($name = "Enquiry", $prefix = "NexevoContactModel", $config = array("ignore_request" => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}


	public function export()
	{

		$model = $this->getModel("Export", "NexevoContactModel", array("ignore_request" => true));
		$items = $model->getItems();
		$this->csv($items);
		$model->mark($items);
		JFactory::getApplication()->close();
	}


	protected function csv($items)
	{
		header("Content-Type: text/csv");
		header('Content-Disposition: attachment; filename="' . JText::_("COM_NEXEVOCONTACT_SUBMENU_ENQUIRIES") . '.csv"');

		$delimiter = "\t";
		$enclosure = '"';

		$fp = fopen("php://output", "w");

		if ((bool)count($items))
		{
			$keys = array_keys($items[0]);
			fputcsv($fp, $keys, $delimiter, $enclosure);
		}

		foreach ($items as $item)
		{
			fputcsv($fp, $item, $delimiter, $enclosure);
		}

		fclose($fp);
	}
}
