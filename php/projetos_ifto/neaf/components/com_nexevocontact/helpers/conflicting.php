<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
class NexevoConflicting
{
	protected $messages = array();


	public function __construct()
	{
		$this->check();
	}


	public function HasMessages()
	{
		return (bool)count($this->messages);
	}


	public function GetMessages()
	{
		return $this->messages;
	}


	protected function check()
	{
		$extensions = array();
		$extensions[] = new NexevoConflictingYoujoomlaTemplates();

		foreach ($extensions as $extension)
		{
			if ($extension->{"Detect"}())
			{
				if (!$extension->{"Patch"}())
				{
					JFactory::getLanguage()->load("com_nexevocontact", JPATH_ADMINISTRATOR);

					$this->messages[] = JText::_("COM_NEXEVOCONTACT_ERR_CONFLICTING_EXTENSION") .
						' <a href="' . $extension->{"Link"}() . '">' .
						JText::_("COM_NEXEVOCONTACT_DOCUMENTATION") .
						'</a>.';
				}
			}
		}
	}

}


class NexevoConflictingYoujoomlaTemplates
{
	public function Detect()
	{
		
		return (function_exists("yjsg_validate_data") && !defined("yjsg_validate_data_fixed"));
	}


	public function Patch()
	{
		$patch = '<?php defined("_JEXEC") or die(); define("yjsg_validate_data_fixed", 1); function yjsg_validate_data($array) {} ';
		$function = new ReflectionFunction("yjsg_validate_data");
		$filename = $function->getFileName();
		$result = file_put_contents($filename, $patch);
		return (bool)$result;
	}


	public function Link()
	{
		return "http://www.nexevo.in";
	}

}

?>