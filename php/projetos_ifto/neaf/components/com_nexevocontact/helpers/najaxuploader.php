<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
$inc_dir = realpath(dirname(__FILE__));
require_once($inc_dir . '/ndatapump.php');
require_once(JPATH_SITE . "/components/com_nexevocontact/lib/functions.php");


class NAjaxUploader extends NDataPump
{
	public function __construct(&$params, NexevoMessageBoard &$messageboard)
	{
		parent::__construct($params, $messageboard);

		$this->Name = "NAjaxFilePump";
		$this->isvalid = true;
	}


	protected function LoadFields()
	{
		
	}



	public function Show()
	{
		if (!(bool)$this->Params->get("uploaddisplay")) return "";

		$id = $this->GetId();

		JFactory::getDocument()->addScriptDeclaration(
				"jQuery(document).ready(function () {" .
					"CreateUploadButton('nexevoupload_$id'," .
					"'" . $this->Application->owner . "'," .
					$this->Application->oid . "," .
					"'" . JRoute::_("index.php?option=com_nexevocontact&view=loader&root=none&filename=none&type=uploader&owner=" . $this->Application->owner . "&id=" . $this->Application->oid) . "');" .
				"});" . PHP_EOL
		);

		$label = "";
		$span = "";
		
		if ((bool)$this->Params->get("labelsdisplay"))
		{
			$label =
				'<label class="control-label">' .
					$this->Params->get('upload') .
					'</label>';
		}
		
		else
		{
			$span =
				'<span class="help-block">' .
					$this->Params->get('upload') .
					'</span>';
		}

		$result =
		
			'<div class="control-group">' .
				$label .

				'<div class="controls">' .
				$span .
				
				'<div id="nexevoupload_' . $id . '"></div>' . 
			   '<span class="help-block">' . JText::_($GLOBALS["COM_NAME"] . '_FILE_SIZE_LIMIT') . " " . HumanReadable($this->Params->get("uploadmax_file_size") * 1024) . '</span>' .
				'</div>' . PHP_EOL . 
				
				'<noscript>' .
				
				'<input ' .
				'type="file" ' .
			
				'name="nexevostdupload"' .
				" />" .
				'</noscript>' .
				"</div>" . PHP_EOL; 

		$jsession = JFactory::getSession();
		$namespace = "nexevocontact_" . $this->Application->owner . "_" . $this->Application->oid;
		$filelist = $jsession->get("filelist", array(), $namespace);

	
		$result .= '<div class="control-group">' .
			'<div class="controls">';

		
		$result .= '<ul id="uploadlist-' . $this->Application->owner . $this->Application->oid . '" class="qq-upload-list">';
		foreach ($filelist as $index => $file)
			{
				$result .=
					'<li class="qq-upload-success">' .
				'<span class="qq-upload-file">' . $this->format_filename($file["realname"]) . '</span>' .
				'<span class="qq-upload-size">' . HumanReadable($file["size"]) . '</span>' .
						'<span class="qq-upload-success-text">' . JTEXT::_($GLOBALS["COM_NAME"] . '_SUCCESS') . '</span>' .
				'<span class="qq-upload-remove" title="' . JTEXT::_("COM_NEXEVOCONTACT_REMOVE_TITLE") . '" onclick="deletefile(this,' . $index . ',\'' . JRoute::_("index.php?option=com_nexevocontact&view=loader&root=none&filename=none&type=uploader&owner=" . $this->Application->owner . "&id=" . $this->Application->oid) . '\')">' . JTEXT::_("COM_NEXEVOCONTACT_REMOVE_ALT") . '</span>' .
						'</li>';
			}
			$result .= '</ul>' . PHP_EOL;

		$result .= '</div>' .
			'</div>' . PHP_EOL;

		return $result;
	}


	protected function format_filename($value)
	{
		if (strlen($value) > 33)
		{
			
			if (function_exists("mb_substr")) $substr = "mb_substr";
			
			else $substr = "substr";

			$value = $substr($value, 0, 19) . '...' . $substr($value, -13);
		}
		return $value;
	}

}
