<?php defined("_JEXEC") or die('Restricted access');
/**

 @Nexevo Responsive Conact Form             
 @author Nexevo Technologies <info@nexevo.in>    
 @link http://www.Nexevo.in 
 @copyright (C) 2010 - 2011 Nexevo-Extension      
 @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

**/
global $sh_LANG;
$sefConfig = & shRouter::shGetConfig();  
$shLangName = '';
$shLangIso = '';
$title = array();
$shItemidString = '';
$dosef = shInitializePlugin( $lang, $shLangName, $shLangIso, $option);
if ($dosef == false) 
	
{
return;	
}
shRemoveFromGETVarsList('Itemid');
shRemoveFromGETVarsList('lang');
shRemoveFromGETVarsList('option');
isset($task) || $task = null;
isset($Itemid) || $Itemid = null;
isset($view) || $view = null;
if ($view == "nexevocontact")
{
	shRemoveFromGETVarsList("view");
}
$title[] = getMenuTitle($option, $task, $Itemid, null, $shLangName);
if ($dosef){
   $string = shFinalizePlugin( $string, $title, $shAppendString, $shItemidString, 
      (isset($limit) ? @$limit : null), (isset($limitstart) ? @$limitstart : null), 
      (isset($shLangName) ? @$shLangName : null));
}      

  
