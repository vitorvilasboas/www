<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
require_once "loader.php";

class cssLoader extends CachableLoader
{
	public function __construct()
	{
		parent::__construct();
		$this->headers[] = 'Content-Type: text/css; charset=utf-8';
	}

	protected function type()
	{
		return "css";
	}

	protected function content_header()
	{

	}

	protected function content_footer()
	{

	}
}


