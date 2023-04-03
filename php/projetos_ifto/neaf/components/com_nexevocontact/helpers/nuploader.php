<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
jimport("joomla.filesystem.file");
jimport("joomla.filesystem.folder");
$inc_dir = realpath(dirname(__FILE__));
require_once($inc_dir . '/ndatapump.php');
require_once($inc_dir . '/nmimetype.php');

define('KB', 1024);

class NUploader extends NDataPump
{

	public function __construct(&$params, NexevoMessageBoard &$messageboard)
	{
		parent::__construct($params, $messageboard);

		$this->Name = "NFilePump";
		$this->isvalid = intval($this->DoUpload());
	}


	protected function LoadFields()
	{
	
		$this->LoadField("upload", NULL);
	}


	protected function DoUpload()
	{
	
		$file = JFactory::getApplication()->input->files->get("nexevostdupload", array());

	
		if (!$this->Submitted || !$file || $file['error'] == UPLOAD_ERR_NO_FILE) return true;

		if (!(bool)$this->Params->get("uploaddisplay", 0)) return true;

		$uploadDirectory = JPATH_SITE . "/components/" . $GLOBALS["com_name"] . "/uploads/";

		if (!is_writable($uploadDirectory))
		{
			$this->MessageBoard->Add(JText::_($GLOBALS["COM_NAME"] . '_ERR_DIR_NOT_WRITABLE'), NexevoMessageBoard::error);
			return false;
		}

	
		if ($file['error'])
		{

			$this->MessageBoard->Add(JText::sprintf($GLOBALS["COM_NAME"] . '_ERR_UPLOAD', $file['error']), NexevoMessageBoard::error);

			return false;
		}

	
		$size = $file['size'];
		if ($size == 0) 
		{
			$this->MessageBoard->Add(JText::_($GLOBALS["COM_NAME"] . '_ERR_FILE_EMPTY'), NexevoMessageBoard::error);
			return false;
		}
		$max_filesize = intval($this->Params->get("uploadmax_file_size", "0")) * KB;
		if ($size > $max_filesize)
		{
			$this->MessageBoard->Add(JText::_($GLOBALS["COM_NAME"] . '_ERR_FILE_TOO_LARGE'), NexevoMessageBoard::error);
			return false;
		}

		$mimetype = new NMimeType();
		if (!$mimetype->Check($file["tmp_name"], $this->Params))
		{
			
			$this->MessageBoard->Add(JText::_($GLOBALS["COM_NAME"] . '_ERR_MIME') . " [" . $mimetype->Mimetype . "]", NexevoMessageBoard::error);
			return false;
		}

	
		$content = file_get_contents($file["tmp_name"]);
		if (strpos($content, '<?php') !== false)
		{
			
			$this->MessageBoard->Add(JText::_($GLOBALS["COM_NAME"] . '_ERR_MIME') . " [forbidden content]", NexevoMessageBoard::error);
			return false;
		}

		
		$forbidden_extensions = '/^ph(p[345st]?|t|tml|ar)$/'; 
		$extension = pathinfo($file["name"], PATHINFO_EXTENSION);
		if (preg_match($forbidden_extensions, $extension))
		{
			
			$this->MessageBoard->Add("[forbidden extension]", NexevoMessageBoard::error);
			return false;
		}

		jimport('joomla.filesystem.file');

		$filename = preg_replace("/[^\w\.-_]/", "_", $file["name"]);

	
		$filename = uniqid() . "-" . $filename;
		$full_filename = $uploadDirectory . $filename;

		if (!JFile::upload($file["tmp_name"], $full_filename)) return false;

	
		if (class_exists("ZipArchive"))
		{
			
			$zip = new ZipArchive();
		
			$parts = pathinfo($full_filename);
			$zipname = $parts["dirname"] . "/" . $parts["filename"] . ".zip";
		
			if ($zip->open($zipname, ZIPARCHIVE::CREATE) && $zip->addFromString($filename, $content) && $zip->close())
		{
				unlink($full_filename);
				
				$filename = $parts["filename"] . ".zip";
		}
		}

	
		$jsession = JFactory::getSession();
		$namespace = "nexevocontact_" . $this->application->owner . "_" . $this->application->oid;

	
		$filelist = $jsession->get("filelist", array(), $namespace);
	
		$filelist[] = array(
			"filename" => $filename,
			"realname" => $file["name"],
			"size" => $size
		);
	
		$jsession->set("filelist", $filelist, $namespace);

		return true;
	}

}
