<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

class NLogger
{
	protected $Handle = null;
	protected $Prefix = "";
	public function __construct($prefix = null, $suffix = null)
	{
		$this->open($suffix);
		if ($prefix) $this->Prefix = "[" . $prefix . "] ";
	}
	function __destruct()
	{
		if ($this->Handle) fclose($this->Handle);
	}
	public function Write($buffer)
	{
		if (!$this->Handle) return false;
		$buffer = str_replace(array("\r", "\n"), " ", $buffer);
		fseek($this->Handle, 0, SEEK_END);
		return fwrite($this->Handle, JFactory::getDate()->format("Y-m-d H:i:s") . " " . $this->Prefix . $buffer . PHP_EOL);
	}
	protected function open($suffix = null)
	{
		if (!$suffix) $suffix = md5(JFactory::getConfig()->get("secret"));
		$this->Handle = @fopen(JFactory::getConfig()->get("log_path") . "/" . substr(basename(realpath(dirname(__FILE__) . '/..')), 4) . "-" . $suffix . ".txt", 'a+');
	}
}

