<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
require_once __DIR__ . "/../nexevoview.html.php";

class NexevoContactViewEnquiries extends NexevoView
{
	protected $items;
	protected $pagination;
	protected $state;

	public function display($tpl = null)
	{
		$this->items		= $this->get("Items");
		$this->pagination	= $this->get("Pagination");
		$this->state		= $this->get("State");
		$this->filterForm    = $this->get("FilterForm");
		$this->activeFilters = $this->get("ActiveFilters");
		$this->addSubmenu("enquiries");
		$this->addToolbar();

		parent::display($tpl);
	}
	protected function addToolbar()
	{
		$bar = JToolBar::getInstance("toolbar");
		JToolbarHelper::title(JText::_("COM_NEXEVOCONTACT_SUBMENU_ENQUIRIES"), "list-2");
		JToolbarHelper::deleteList(JText::_("COM_NEXEVOCONTACT_ARE_YOU_SURE"), "enquiries.delete", "JACTION_DELETE");
		if (JFactory::getUser()->authorise("core.admin", "com_nexevocontact"))
		{
			JToolBarHelper::preferences("com_nexevocontact");
		}
	}

}
