<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

class NexevoInstaller
{
	private $InstallLog;

	protected $component_name;
	protected $extension_name;
	protected $event;


	public function __construct($parent)
	{
	}


	public function install($parent)
	{
		$this->initialize($parent);

		$this->InstallLog->Write("Running " . $this->event . " on: " . PHP_OS . " | " . $_SERVER["SERVER_SOFTWARE"] . " | php " . PHP_VERSION . " | safe_mode: " . intval(ini_get("safe_mode")) . " | interface: " . php_sapi_name());

		$this->chain_install($parent);
		$this->logo($parent);
	}


	public function uninstall($parent)
	{
	}


	public function update($parent)
	{
	}


	public function preflight($type, $parent)
	{
		$jversion = new JVersion();
		$jmin = (string)$parent->get("manifest")->attributes()->{"version"};
		$jmax = (string)$parent->get("manifest")->{"version"};

		if (version_compare($jversion->RELEASE, $jmin, "<"))
		{

			JFactory::getApplication()->enqueueMessage("Nexevo Contact " . $jmax . " only works on Joomla " . $jmin . "+", "error");
			JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_installer', false));
		}

		$this->component_name = $parent->get("element");
		$this->extension_name = substr($this->component_name, 4);
		$this->event = $type;
	}


	public function postflight($type, $parent)
	{
		$this->check_environment($parent);
		$this->InstallLog->Write("Component installation seems successfull.");
	}


	protected function initialize(&$parent)
	{
		(include_once JPATH_ROOT . "/components/" . $parent->get('element') . "/helpers/nlogger.php") or die(JText::sprintf("JLIB_FILESYSTEM_ERROR_READ_UNABLE_TO_OPEN_FILE", "nlogger.php"));
		$this->InstallLog = new NLogger("installscript", "install");
	}


	private function chain_install(&$parent)
	{
		$manifest = $parent->get("manifest");
		$extensions = isset($manifest->chain->extension) ? $manifest->chain->extension : new stdClass();
		$this->InstallLog->Write("Found " . count($extensions) . " chained extensions.");

		$result = array();
		foreach ($extensions as $extension)
		{
			$installer = new JInstaller();

			$attributes = $extension->attributes();
			$item = $parent->getParent()->getPath("source") . "/" . $attributes["directory"] . "/" . $attributes["name"];
			$result["type"] = strtoupper((string)$attributes["type"]);
			$result["result"] = $installer->install($item) ? "SUCCESS" : "ERROR";
			$this->results[(string)$attributes["name"]] = $result;
			$this->InstallLog->Write("Installing " . $result["type"] . "... [" . $result["result"] . "]");
		}

		$result["type"] = "COMPONENT";
		$result["result"] = "SUCCESS";
		$this->results[$this->component_name] = $result;
	}


	private function check_environment(&$parent)
	{
		$this->check_permissions($parent);

		$files = JFolder::files(JPATH_ROOT . "/components/" . $parent->get("element") . "/helpers", ".php") or $files = array();
		foreach ($files as $file)
		{

			(include_once JPATH_ROOT . "/components/" . $parent->get('element') . "/helpers/" . $file)
				or $this->InstallLog->Write(JText::sprintf("JLIB_FILESYSTEM_ERROR_READ_UNABLE_TO_OPEN_FILE", $file));

			$name = JFile::stripExt($file);
			$classname = $name . "CheckEnvironment";
			if (class_exists($classname))
			{
				$installerclass = new $classname();
			}
		}
	}


	private function check_permissions(&$parent)
	{
		$permissions = fileperms(JPATH_ADMINISTRATOR . "/index.php");
		$buffer = sprintf("Determining correct file permissions...  [%o]", $permissions);
		$this->InstallLog->Write($buffer);
		if ($permissions)
		{
			$files = JFolder::files(JPATH_ROOT . "/components/" . $parent->get("element") . '/lib', ".php", false, true);
			foreach ($files as $file)
			{
				$this->set_permissions($file, $permissions);
			}
		}

		$permissions = fileperms(JPATH_ADMINISTRATOR);
		$buffer = sprintf("Determining correct directory permissions...  [%o]", $permissions);
		$this->InstallLog->Write($buffer);
		if ($permissions)
		{
			$this->set_permissions(JPATH_ROOT . "/components", $permissions);
			$this->set_permissions(JPATH_ROOT . "/components/" . $parent->get("element"), $permissions);
			$this->set_permissions(JPATH_ROOT . "/components/" . $parent->get("element") . "/lib", $permissions);
		}

	}


	private function set_permissions($filename, $permissions)
	{
		jimport("joomla.client.helper");
		$ftp_config = JClientHelper::getCredentials("ftp");

		if ($ftp_config["enabled"])
		{
			jimport("joomla.client.ftp");
			jimport("joomla.filesystem.path");
			$jpath_root = JPATH_ROOT;
			$filename = JPath::clean(str_replace(JPATH_ROOT, $ftp_config["root"], $filename), "/");
			$ftp = new JFTP($ftp_config);
			$result = intval($ftp->chmod($filename, $permissions));
		}
		else
		{
			$result = intval(@chmod($filename, $permissions));
		}

		$this->InstallLog->Write("setting permissions for [$filename]... [$result]");
		return $result;
	}


	private function logo(&$parent)
	{
		$manifest = $parent->get("manifest");
		echo(
			'<style type="text/css">' .
				'@import url("' . JUri::base(true) . "/components/" . $this->component_name . "/css/install.css" . '");' .
				'</style>' .
				'<img ' .
				'class="install_logo" width="130" height="130" ' .
				'src="' . JUri::root() . "/media/" . $this->component_name . "/images/". $this->extension_name ."-logo.jpg" . '" ' .
				'alt="' . JText::_((string)$manifest->name) . ' Logo" ' .
				'/>' .
				'<div class="install_container">' .
					'<div style="height:auto;">' .
						'<h2 class="install_title">' . JText::_((string)$manifest->name) . '</h2>' .
						'<div class="clear"></div>' .
						'<div class="install_desc">'.JText::_((string)$manifest->desc).'</div>' .
					'</div>');
		foreach ($this->results as $name => $extension)
		{
			echo(
				'<div class="install_row">' .
					'<div class="install_' . strtolower($extension["type"]) . ' install_icon">' . JText::_("COM_INSTALLER_TYPE_" . $extension["type"]) . '</div>' .
					'<div class="install_icon">' . $name . '</div>' .
					'<div class="install_' . strtolower($extension["result"]) . ' install_icon">' . JText::sprintf("COM_INSTALLER_INSTALL_" . $extension["result"], "") . '</div>' .
					'</div>'
			);

		}
		echo('</div>');
	}

}
