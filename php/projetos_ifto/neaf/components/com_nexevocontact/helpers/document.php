<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
abstract class NexevoDocument
{
	protected $Document;
	protected $Prefix;


	abstract protected function addCss($slug);


	abstract protected function addJs($slug);


	abstract public function addStyleSheet($url);


	abstract public function addScript($url);



	static public function getInstance()
	{
		
		$config = JComponentHelper::getParams("com_nexevocontact");
		
		$mode = $config->get("resources_loading", "Performance");
	
		$class = "NexevoDocument" . $mode;
		
		return new $class;
	}


	public function __construct()
	{
		$application = JFactory::getApplication();
		$this->Document = JFactory::getDocument();

		$this->Prefix = "index.php?option=" . $GLOBALS["com_name"] .
			"&view=loader" .
			"&owner=" . $application->owner .
			"&id=" . $application->oid;
	}


	public function addResource(array $values)
	{
		$slug = "";
		foreach ($values as $key => $value)
		{
			$slug .= "&" . $key . "=" . $value;
		}

		$method = "add" . ucwords($values["type"]);
		$this->{$method}($slug);
	}
}


class NexevoDocumentPerformance extends NexevoDocument
{
	protected function addCss($slug)
	{
		$this->Document->addStyleSheet(JRoute::_($this->Prefix . $slug));
	}


	protected function addJs($slug)
	{
		$this->Document->addScript(JRoute::_($this->Prefix . $slug));
	}


	public function addStyleSheet($url)
	{
		$this->Document->addStyleSheet($url);
	}


	public function addScript($url)
	{
		$this->Document->addScript($url);
	}
}


class NexevoDocumentCompatibility extends NexevoDocument
{
	protected function addCss($slug)
	{
		$this->Document->addCustomTag('<link rel="stylesheet" href="' . JRoute::_($this->Prefix . $slug) . '" type="text/css" />');
	}


	protected function addJs($slug)
	{
		$this->Document->addCustomTag('<script src="' . JRoute::_($this->Prefix . $slug) . '" type="text/javascript"></script>');
	}


	public function addStyleSheet($url)
	{
		$this->Document->addCustomTag('<link rel="stylesheet" href="' . $url . '" type="text/css" />');
	}


	public function addScript($url)
	{
		$this->Document->addCustomTag('<script src="' . $url . '" type="text/javascript"></script>');
	}
}