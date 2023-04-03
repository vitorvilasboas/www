<?php
/**
 * @package     pwebbox
 * @version    2.0.0
 *
 * @copyright   Copyright (C) 2015 Perfect Web. All rights reserved. http://www.perfect-web.co
 * @license     GNU General Public Licence http://www.gnu.org/licenses/gpl-3.0.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

if (file_exists(__DIR__ . '/perfectinstaller.php'))
    require_once __DIR__ . '/perfectinstaller.php';
elseif (file_exists(JPATH_ROOT . '/modules/mod_pwebbox/perfectinstaller.php'))
    require_once JPATH_ROOT . '/modules/mod_pwebbox/perfectinstaller.php';
else
    return false;

class plgEditorsxtdPerfect_everything_in_everywayInstallerScript extends PerfectInstaller {}