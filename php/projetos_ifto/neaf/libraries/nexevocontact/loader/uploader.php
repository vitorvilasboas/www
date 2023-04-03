<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
require_once JPATH_COMPONENT . "/helpers/nlogger.php";
require_once JPATH_COMPONENT . "/helpers/nmimetype.php";
require_once "loader.php";

define('KB', 1024);

class uploaderLoader extends UncachableLoader
{
	protected function type()
	{
		return "uploader";
	}


	protected function content_header()
	{
	}


	protected function content_footer()
	{
	}


	protected function load()
	{
		switch (true)
		{
			case isset($_GET['qqfile']):
				$um = new XhrUploadManager();
				break;

			case isset($_FILES['qqfile']):
				$um = new FileFormUploadManager();
				break;

			case JFactory::getApplication()->input->get("action", 0) == "deletefile":
				$um = new XhrDeleteManager();
				break;

			default:
				$result = array('error' => JFactory::getLanguage()->_($GLOBALS["COM_NAME"] . '_ERR_NO_FILE'));
				exit(htmlspecialchars(json_encode($result), ENT_NOQUOTES));
		}
		$um->Params = & $this->Params;
		$result = $um->HandleUpload(JPATH_COMPONENT . '/uploads/');
		echo(htmlspecialchars(json_encode($result), ENT_NOQUOTES));
	}
}


abstract class NUploadManager
{
	protected $Log;


	abstract protected function save_file($path);


	abstract protected function get_file_name();


	abstract protected function get_file_size();


	function __construct()
	{
		$this->Log = new NLogger();
	}


	public function HandleUpload($uploadDirectory)
	{
		if (!(bool)$this->Params->get("uploaddisplay", 0))
		{
			return array('error' => " [upload disabled]");
		}

		if (!is_writable($uploadDirectory))
		{
			return array('error' => JFactory::getLanguage()->_($GLOBALS["COM_NAME"] . '_ERR_DIR_NOT_WRITABLE'));
		}

		$size = $this->get_file_size();
		if ($size == 0) 
		{
			return array('error' => JFactory::getLanguage()->_($GLOBALS["COM_NAME"] . '_ERR_FILE_EMPTY'));
		}

		$max = $this->Params->get("uploadmax_file_size", 0) * KB; 
		if ($size > $max)
		{
			return array('error' => JFactory::getLanguage()->_($GLOBALS["COM_NAME"] . '_ERR_FILE_TOO_LARGE'));
		}

		$realname = $this->get_file_name();
		$filename = preg_replace("/[^\w\.-_]/", "_", $realname);
		$filename = uniqid() . "-" . $filename;
		$full_filename = $uploadDirectory . $filename;

		if (!$this->save_file($full_filename))
		{
			return array('error' => JFactory::getLanguage()->_($GLOBALS["COM_NAME"] . '_ERR_SAVE_FILE'));
		}

		$mimetype = new NMimeType();
		if (!$mimetype->Check($full_filename, $this->Params))
		{
			unlink($full_filename);
			return array('error' => JFactory::getLanguage()->_($GLOBALS["COM_NAME"] . '_ERR_MIME') . " [" . $mimetype->Mimetype . "]");
		}

		$chunk_size = 1048576; 
		$back_step = -4; 
		$handle = fopen($full_filename, "rb");
		do
		{
			$content = fread($handle, $chunk_size);
			fseek($handle, $back_step, SEEK_CUR);
		if (strpos($content, '<?php') !== false)
		{
				fclose($handle);
			unlink($full_filename);
			return array('error' => JFactory::getLanguage()->_($GLOBALS["COM_NAME"] . '_ERR_MIME') . " [forbidden content]");
		}
		} while (strlen($content) == $chunk_size);
		fclose($handle);
		$forbidden_extensions = '/^ph(p[345st]?|t|tml|ar)$/';
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		if (preg_match($forbidden_extensions, $extension))
		{
			unlink($full_filename);
			return array('error' => JFactory::getLanguage()->_($GLOBALS["COM_NAME"] . '_ERR_MIME') . " [forbidden extension]");
		}
		if (class_exists("ZipArchive"))
		{
			$zip = new ZipArchive();
			$parts = pathinfo($full_filename);
			$zipname = $parts["dirname"] . "/" . $parts["filename"] . ".zip";
			if ($zip->open($zipname, ZIPARCHIVE::CREATE) && $zip->addFile($full_filename, $filename) && $zip->close())
			{
				unlink($full_filename);
				$filename = $parts["filename"] . ".zip";
			}
		}

		$owner = JFactory::getApplication()->input->get("owner", NULL);
		$id = JFactory::getApplication()->input->get("id", NULL);

		$jsession = JFactory::getSession();
		$namespace = "nexevocontact_" . $owner . "_" . $id;
		$filelist = $jsession->get("filelist", array(), $namespace);
		$filelist[] = array(
			"filename" => $filename,
			"realname" => $realname,
			"size" => $size
		);
		$jsession->set("filelist", $filelist, $namespace);

		end($filelist);
		$last = key($filelist);

		$this->Log->Write("File " . $filename . " uploaded succesful.");
		return array("success" => true, "index" => $last);
	}
}


class XhrUploadManager extends NUploadManager
{

	public function __construct()
	{
		parent::__construct();
	}


	protected function save_file($path)
	{
		$input = fopen("php://input", "r");
		$target = fopen($path, "w");

		$realSize = stream_copy_to_stream($input, $target);

		fclose($input);
		fclose($target);

		return ($realSize == $this->get_file_size());
	}


	protected function get_file_name()
	{
		return $_GET['qqfile'];
	}


	protected function get_file_size()
	{
		if (isset($_SERVER["CONTENT_LENGTH"])) return (int)$_SERVER["CONTENT_LENGTH"];
		return 0;
	}

}

class FileFormUploadManager extends NUploadManager
{
	public function __construct()
	{
		parent::__construct();
	}


	protected function save_file($path)
	{
		return move_uploaded_file($_FILES['qqfile']['tmp_name'], $path);
	}


	protected function get_file_name()
	{
		return $_FILES['qqfile']['name'];
	}


	protected function get_file_size()
	{
		return $_FILES['qqfile']['size'];
	}

}


class XhrDeleteManager
{
	public function HandleUpload($uploadDirectory)
	{
		$fileindex = JFactory::getApplication()->input->get("fileindex", 0);
		$owner = JFactory::getApplication()->input->get("owner", NULL);
		$id = JFactory::getApplication()->input->get("id", NULL);
		$namespace = "nexevocontact_" . $owner . "_" . $id;
		$jsession = JFactory::getSession();
		$filelist = $jsession->get("filelist", array(), $namespace);

		if (!isset($filelist[$fileindex]))
		{
			return array("error" => "Index not found");
		}

		$deleted = @unlink($uploadDirectory . $filelist[$fileindex]["filename"]);
		if (!$deleted)
		{
			return array("error" => "Unable to delete the file");
		}

		unset($filelist[$fileindex]);
		$jsession->set("filelist", $filelist, $namespace);

		return array("success" => true);
	}
}

