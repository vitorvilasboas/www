<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
require_once "ndispatcher.php";

class DatabaseDispatcher extends NDispatcher
{	
	public function Process()
	{
		if (!(bool) $this->Params->get('delivery_db', true))
		{
			return true;
		}
		
		$prefix = JFactory::getApplication()->owner == 'module' ? '-' : '';
		$oid = $prefix . JFactory::getApplication()->oid;
		$fileds_json = $this->getFiledsJson();
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->insert($db->quoteName('#__nexevocontact_enquiries'));
		$query->set($db->quoteName('form_id') . '=' . $db->quote($oid));
		$query->set($db->quoteName('date') . '=' . $db->quote(JFactory::getDate()->toSql()));
		$query->set($db->quoteName('ip') . '=' . $db->quote($this->ClientIPaddress()));
		$query->set($db->quoteName('url') . '=' . $db->quote($this->CurrentURL()));
		$query->set($db->quoteName('fields') . '=' . $db->quote($fileds_json));
		$db->setQuery((string) $query);
		try
		{
			$db->execute();
		}
		catch (RuntimeException $e)
		{
			$this->MessageBoard->Add(JText::_('COM_NEXEVOCONTACT_ERR_DATABASE'), NexevoMessageBoard::error);
			$this->Logger->Write($e->getMessage());
			return false;
		}
		
		$this->Logger->Write('Enquiry saved to the database.');
		return true;
	}
	
	
	protected function getFiledsJson()
	{
		$body = array();
		foreach ($this->FieldsBuilder->Fields as $field)
		{
			switch ($field['Type'])
			{
				case 'sender':
				case 'text':
				case 'textarea':
				case 'dropdown':
				case 'checkbox':
				case 'calendar':
					$body[] = array($field['Type'], $field['Name'], $field['Value']);
			}
		
		}
		
		return json_encode($body);
	}

}