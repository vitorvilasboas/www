<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
function parameters()
{
	static $result = array(
		0 => "view",
		1 => "owner",
		2 => "id",
		3 => "root",
		4 => "filename",
		5 => "type"
	);

	return $result;
}
function NexevoContactBuildRoute(&$query)
{
	$segments = array();
	$parameters = parameters();

	foreach ($parameters as $name)
	{
		if (isset($query[$name]))
		{
			$segments[] = $query[$name];
			unset($query[$name]);
		}
		else
		{
			break;
		}
	}

	return $segments;
}
function NexevoContactParseRoute($segments)
{
	$vars = array();
	$parameters = parameters();

	foreach ($parameters as $index => $name)
	{
		if (isset($segments[$index]))
		{
			$vars[$name] = preg_replace('/[^A-Z0-9_]/i', "", $segments[$index]);
		}
		else
		{
			break;
		}
	}
	return $vars;
}
