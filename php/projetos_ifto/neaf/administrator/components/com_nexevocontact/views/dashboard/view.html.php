<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
jimport('joomla.application.component.view');

require_once __DIR__ . "/../nexevoview.html.php";

class NexevoContactViewDashboard extends NexevoView
{
	protected $e;

	public function display($tpl = null)
	{
		// Set the toolbar
		$this->addToolBar();

		// Ensure that jQuery framework is loaded
		JHtml::_("jquery.framework");

		// Load the submenu
		$this->addSubmenu("dashboard");
		$this->sidebar = JHtmlSidebar::render();

		// Display the template
		parent::display($tpl);
	}


	protected function addToolBar()
	{
		JToolBarHelper::title(JText::_("COM_NEXEVOCONTACT_SUBMENU_DASHBOARD"), "mail");
		// Options button
		if (JFactory::getUser()->authorise("core.admin", "com_nexevocontact"))
		{
			JToolBarHelper::preferences("com_nexevocontact");
		}
	}


}
