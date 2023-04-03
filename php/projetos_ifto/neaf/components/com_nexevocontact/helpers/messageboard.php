<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
class NexevoMessageBoard
{
	const success = 0x01;
	const info = 0x02;
	const warning = 0x04;
	const error = 0x08;

	protected $Level = 0;
	protected $Messages = array();
	public static $Levels = array(
		NexevoMessageBoard::success => "success",
		NexevoMessageBoard::info => "info",
		NexevoMessageBoard::warning => "warning",
		NexevoMessageBoard::error => "error"
	);


	public function Add($message, $level = 0)
	{
		$this->Messages[] = $message;
		$this->RaiseLevel($level);
	}


	public function Append($messages, $level = 0)
	{
		$this->Messages += $messages;
		$this->RaiseLevel($level);
	}


	public function Clear()
	{
		$this->Messages[] = array();
		$this->Level = 0;
	}


	public function RaiseLevel($level)
	{
		if ($level > $this->Level) $this->Level = $level;
	}


	public function Display()
	{
		echo $this->__toString();
	}


	public function __toString()
	{
		$result = "";
		if (!count($this->Messages)) return $result;

		$result .= '<div class="alert alert-' . NexevoMessageBoard::$Levels[$this->Level] . '">' .
			'<ul class="nexevo_messages">';

		foreach ($this->Messages as $message)
		{
			$result .= '<li>' . $message . '</li>';
		}

		$result .= '</ul>' .
			'</div>';

		return $result;
	}
}