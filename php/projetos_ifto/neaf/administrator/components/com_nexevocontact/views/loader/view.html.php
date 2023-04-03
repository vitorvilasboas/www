<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
jimport('joomla.application.component.view');

class NexevoContactViewLoader extends JViewLegacy
{
	protected $Input;

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->Input = JFactory::getApplication()->input;
	}
	function display($tpl = null)
	{
		$type = $this->Input->get("type", "");
		preg_match('/^[a-z_-]+$/', $type) or $type = "";
		jimport("nexevocontact.loader." . $type) or die(JText::_("JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND"));
		$view = $this->Input->get("v", "");
		preg_match('/^[a-z_-]+$/', $view) or $view = "";
		$view = $view ? "/views/" . $view : "";
		$option = $this->Input->get("option", "");
		$classname = $type . "Loader";
		$loader = new $classname();
		$loader->IncludePath = JPATH_ADMINISTRATOR . "/components/$option" . $view;
		$loader->Show();
	}
}