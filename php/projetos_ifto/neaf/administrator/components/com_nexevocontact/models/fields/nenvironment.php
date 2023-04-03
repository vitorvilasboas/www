<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
jimport('joomla.form.formfield');

class JFormFieldNEnvironment extends JFormField
{
	protected $type = 'NEnvironment';


	public function __construct(JForm $form = null)
	{
		parent::__construct($form);

		static $resources = true;
		if ($resources)
		{
			$resources = false;
			$name = basename(realpath(dirname(__FILE__) . "/../.."));
			$document = JFactory::getDocument();

			$type = strtolower($this->type);
			if (file_exists(JPATH_ADMINISTRATOR . "/components/" . $name . "/js/" . $type . ".js"))
			{
				$document->addScript(JUri::current() . "?option=" . $name . "&amp;view=loader&amp;filename=" . $type . "&amp;type=js");
			}

			if (file_exists(JPATH_ADMINISTRATOR . "/components/" . $name . "/css/" . $type . ".css"))
			{
				$document->addStyleSheet(JUri::base(true) . "/components/" . $name . "/css/" . $type . ".css");
			}

			$scope = JFactory::getApplication()->scope;
			if (file_exists(JPATH_ADMINISTRATOR . "/components/" . $name . "/js/" . $scope . ".js"))
			{
				$document->addScript(JUri::current() . "?option=" . $name . "&amp;view=loader&amp;filename=" . $scope . "&amp;type=js");
			}

			if (file_exists(JPATH_ADMINISTRATOR . "/components/" . $name . "/css/" . $scope . ".css"))
			{
				$document->addStyleSheet(JUri::base(true) . "/components/" . $name . "/css/" . $scope . ".css");
			}
		}

	}


	protected function getInput()
	{
		return "";
	}


	protected function getLabel()
	{
		return "";
	}
}
