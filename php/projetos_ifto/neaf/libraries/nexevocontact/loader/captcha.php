<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/

require_once "loader.php";

class captchaLoader extends UncachableLoader
{
	public function __construct()
	{
		parent::__construct();
		$this->headers[] = 'Content-Type: image/jpeg';
		$this->headers[] = 'Content-Disposition: inline; filename="nexevocaptcha.jpg"';
	}

	protected function type()
	{
		return "captcha";
	}

	protected function content_header()
	{
	}

	protected function content_footer()
	{
	}

	protected function load()
	{
		switch ($this->Params->get("stdcaptchatype", ""))
		{
			case 1:
				$captcha = new NMathCaptchaDrawer($this->Params);
				break;

			default:
				$captcha = new NStandardCaptchaDrawer($this->Params);
		}

		$captcha->Shuffle();
		$captcha->Draw();
	}

}



abstract class NCaptchaDrawer
{
	protected $Params;
	protected $Charset;
	protected $Question;
	protected $Answer;
	protected $Image = array();
	protected $Font = array();
	protected $Background = array();
	protected $Colors = array();

	abstract public function Shuffle();


	public function __construct(&$params)
	{
		$this->Params = $params;
		$this->LoadParams();
	}


	public function Draw()
	{
		$jsession = JFactory::getSession();
		$input = JFactory::getApplication()->input;
		$namespace = "nexevocontact_" . $input->get("owner", null) . "_" . $input->get("id", null);
		$jsession->set("captcha_answer", $this->Answer, $namespace);
		imagefill($this->Image['data'], 0, 0, $this->Colors['Background']);

		$this->DrawGrid();

		$len = strlen($this->Question);
		$space = $this->Image['width'] / $len;

		for ($p = 0; $p < 2 * $len; ++$p)
		{
			$this->Render(chr(rand(33, 126)), $p, $space / 2, $this->Colors['Disturb']);
		}

		for ($p = 0; $p < $len; ++$p)
		{
			$this->Render($this->Question[$p], $p, $space, $this->Colors['Text']);
		}

		if (JFactory::getApplication()->input->get("noimage", NULL)) return;

		imagejpeg($this->Image['data']);
		imagedestroy($this->Image['data']);
	}


	private function Render($character, $position, $space, $color)
	{
		imagettftext(
		$this->Image['data'],
		rand($this->Font['min'], $this->Font['max']),
		rand( -$this->Font['angle'], $this->Font['angle']),
		rand($position * $space + $this->Font['min'], (($position + 1 ) * $space) - $this->Font['max']),
		rand($this->Font['max'], $this->Image['height'] - $this->Font['max']),
		$color,
		$this->Font['family'],
		$character);
	}


	private function validate_hex_color($color)
	{
		return
		strlen($color) == 7 &&
		preg_match('/#[0-9a-fA-F]{6}/', $color) == 1;
	}


	private function LoadColor($key, $default)
	{
		$color = $this->Params->get($key, $default);
		if (!$this->validate_hex_color($color)) $color = $default;
		return sscanf($color, '#%2x%2x%2x');
	}


	private function LoadParams()
	{
		$this->Font['min'] = $this->Params->get("stdcaptchafontmin", "14");
		$this->Font['max'] = $this->Params->get("stdcaptchafontmax", "20");
		$this->Font['angle'] = $this->Params->get("stdcaptchaangle", "20");

		$fontdir = JPATH_SITE . "/media/" . $GLOBALS["com_name"] . "/fonts/";
		$fontname = $this->Params->get("stdcaptchafont", "-1");
		if ($fontname == "-1")
		{
			jimport("joomla.filesystem.folder");
			$fonts = JFolder::files($fontdir, '\.ttf$');
			$fontname = $fonts[rand(0, count($fonts) - 1)];
		}
		$this->Font['family'] = $fontdir . $fontname;

		$this->Image['width'] = $this->Params->get("stdcaptchawidth", "150");
		$this->Image['height'] = $this->Params->get("stdcaptchaheight", "75");
		$this->Image['data'] = imagecreate($this->Image['width'], $this->Image['height']);

		$background = $this->LoadColor("stdcaptcha_backgroundcolor", "#ffffff");
		$this->Colors['Background'] = imagecolorallocate($this->Image['data'], $background[0], $background[1], $background[2]);

		$text = $this->LoadColor("stdcaptcha_textcolor", "#191919");
		$this->Colors['Text'] = imagecolorallocate($this->Image['data'], $text[0], $text[1], $text[2]);

		$disturb = $this->LoadColor("stdcaptcha_disturbcolor", "#c8c8c8");
		$this->Colors['Disturb'] = imagecolorallocate($this->Image['data'], $disturb[0], $disturb[1], $disturb[2]);
	}

}


class NMathCaptchaDrawer extends NCaptchaDrawer
{
	public function __construct(&$params)
	{
		parent::__construct($params);
		$this->Charset = "+-*";  
	}


	public function Shuffle()
	{

		$this->Question = rand(6, 11) . substr(str_shuffle($this->Charset), 0, 1) . rand(1, 5); 
		eval("\$this->Answer = strval(" . $this->Question . ");");  
	}

	protected function DrawGrid()
	{
		$gridsize = intval(($this->Font['min'] + $this->Font['max']) / 2);
		for ($x = $gridsize; $x < $this->Image['width']; $x += $gridsize)
		{
			imageline($this->Image['data'], $x, 0, $x, $this->Image['height'], $this->Colors['Disturb']);
		}
		for ($y = $gridsize; $y < $this->Image['height']; $y += $gridsize)
		{
			imageline($this->Image['data'], 0, $y, $this->Image['width'], $y, $this->Colors['Disturb']);
		}
	}

}


class NStandardCaptchaDrawer extends NCaptchaDrawer
{
	public function __construct(&$params)
	{
		parent::__construct($params);
		$this->Charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
	}

	public function Shuffle()
	{
		$length = $this->Params->get("stdcaptcha_length", 5);  
		$this->Question = $this->Answer = substr(str_shuffle($this->Charset), 0, $length);
	}

	protected function DrawGrid()
	{

	}

}
