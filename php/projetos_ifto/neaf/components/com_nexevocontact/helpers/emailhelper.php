<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

class NexevoEmailHelper
{
	protected $Params;

	public function __construct(&$params)
	{
		$this->Params = $params;
	}

	public function convert($data)
	{
		return $this->{$data->select}($data);
	}

	public function submitter($data)
	{
		$application = JFactory::getApplication();
		$name = "_" . md5($this->Params->get("sender0") . $application->cid . $application->mid);
		$name = JRequest::getVar($name, NULL, "POST");
		$address = "_" . md5($this->Params->get("sender1") . $application->cid . $application->mid);
		$address = JRequest::getVar($address, NULL, "POST");
		return array($address, $name);
	}

	public function admin($data)
	{
		$application = JFactory::getApplication();
		$name = $application->getCfg("fromname");
		$address = $application->getCfg("mailfrom");
		return array($address, $name);
	}

	public function custom($data)
	{
		return array($data->email, $data->name);
	}
}


