<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
	$inc_dir = realpath(dirname(__FILE__));
	require_once($inc_dir . '/nlogger.php');
	include_once(realpath(dirname(__FILE__) . "/../" . substr(basename(realpath(dirname(__FILE__) . "/..")), 4) . ".inc"));


	class NMimeType
	{
		public $Allowed = array();
		public $Mimetype;

		public function __construct()
		{
		}


		public function Check($filename, &$cparams)
		{
			if (!(bool)$cparams->get("upload_filter", 1)) return true;

			
			if ((bool)$cparams->get("upload_audio", 0)) $this->Allowed[] = "/^audio\//";
			if ((bool)$cparams->get("upload_video", 0)) $this->Allowed[] = "/^video\//";
			if ((bool)$cparams->get("upload_images", 0)) $this->Allowed[] = "/^image\//";
			if ((bool)$cparams->get("upload_archives", 0))
			{
				$this->Allowed[] = "/^application\/.*zip/";
				$this->Allowed[] = "/^application\/x-compress/";
				$this->Allowed[] = "/^application\/x-compressed/";
				$this->Allowed[] = "/^application\/x-gzip/";
				$this->Allowed[] = "/^application\/x-rar/";
			}
			if ((bool)$cparams->get("upload_documents", 0))
			{
				$this->Allowed[] = "/^(application|text)\/rtf/";
				$this->Allowed[] = "/^application\/pdf/";
				$this->Allowed[] = "/^application\/msword/";
				$this->Allowed[] = "/^application\/vnd.ms-/";
				$this->Allowed[] = "/^application\/vnd\.openxmlformats-officedocument\./";
				$this->Allowed[] = "/^application\/x-mspublisher/";
				$this->Allowed[] = "/^application\/x-mswrite/";
				$this->Allowed[] = "/^application\/vnd\.oasis\.opendocument\.text/";
			}

			$this->Mimetype = $this->read_mimetype($filename);

			if ($this->Mimetype == "disabled") return true;

			
			$this->Mimetype = preg_replace("/;.*/", "", $this->Mimetype);

			foreach ($this->Allowed as $allowed_type)
			{
				if ((bool)preg_match($allowed_type, $this->Mimetype)) return true;
			}

			return false;
		}
		private function read_mimetype($filename)
		{
			$db = JFactory::getDBO();
			$sql = "SELECT value FROM #__" . $GLOBALS["ext_name"] . "_settings WHERE name = 'mimefilter';";
			$db->setQuery($sql);
			$method = $db->loadResult();
			if (!$method)
			{
				return "";
			}

			$result = $this->$method($filename);
			return $result;
		}
		private function use_fileinfo($filename)
		{
			$minfo = new finfo(FILEINFO_MIME);
			return $minfo->file($filename);
		}
		private function use_mimecontent($filename)
		{
			return mime_content_type($filename);
		}
		private function disabled($filename)
		{
			return "disabled";
		}

	}
	class nmimetypeCheckEnvironment
	{
		protected $InstallLog;

		public function __construct()
		{
			$this->InstallLog = new NLogger("nmimetype", "install");
			$this->InstallLog->Write("--- Determining if this system is able to detect file mime types ---");

			switch (true)
			{
				case $this->fileinfo_usable(): $value = "use_fileinfo"; break;
				case $this->mimecontent_usable(): $value = "use_mimecontent"; break;
				default: $value = "disabled";
			}

			$db = JFactory::getDBO();
			$sql = "REPLACE INTO #__" . $GLOBALS["ext_name"] . "_settings (name, value) VALUES ('mimefilter', '$value');";
			$db->setQuery($sql);
			$result = $db->query();

			$this->InstallLog->Write("--- Method choosen to detect file mime types is [$value] ---");
			return $result;
		}
		private function fileinfo_usable()
		{
			if (!extension_loaded('fileinfo'))
			{
				$this->InstallLog->Write("fileinfo extension not found");
				return false;
			}
			$this->InstallLog->Write("fileinfo extension found. Let's see if it works.");

			$minfo = @new finfo(FILEINFO_MIME);

			$result = true;
			$result &= $this->test(@$minfo->file($this->filename("test.mp3")), "/^audio\//");
			$result &= $this->test(@$minfo->file($this->filename("test.mp4")), "/^video\//");
			$result &= $this->test(@$minfo->file($this->filename("test.jpg")), "/^image\//");
			$result &= $this->test(@$minfo->file($this->filename("test.zip")), "/^application\/.*zip/");
			$result &= $this->test(@$minfo->file($this->filename("test.pdf")), "/^application\/pdf/");
			return $result;
		}
		private function mimecontent_usable()
		{
			if (!function_exists('mime_content_type'))
			{
				$this->InstallLog->Write("mime_content_type() function not found");
				return false;
			}
			$this->InstallLog->Write("mime_content_type() function found. Let's see if it works.");

			$result = true;
			$result &= $this->test(mime_content_type($this->filename("test.mp3")), "/^audio\//");
			$result &= $this->test(mime_content_type($this->filename("test.mp4")), "/^video\//");
			$result &= $this->test(mime_content_type($this->filename("test.jpg")), "/^image\//");
			$result &= $this->test(mime_content_type($this->filename("test.zip")), "/^application\/.*zip/");
			$result &= $this->test(mime_content_type($this->filename("test.pdf")), "/^application\/pdf/");
			return $result;
		}
		private function test($detected, $expected)
		{
			$result = preg_match($expected, $detected);
			$this->InstallLog->Write("testing detected mimetype [$detected] seeking expected string [$expected]... [" . intval($result) . "]");
			return $result;
		}
		private function filename($filename)
		{
			return JPATH_ROOT . "/media/" . $GLOBALS["com_name"] . "/mimetypes/" . $filename;
		}

	}