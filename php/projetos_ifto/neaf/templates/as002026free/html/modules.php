<?php
defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * themeHtml5 (chosen themeHtml5 tag and font headder tags)
 */
 
function modChrome_themeHtml5($module, &$params, &$attribs)
{
  $moduleTag      = $params->get('module_tag');
  $headerTag      = htmlspecialchars($params->get('header_tag'));
  $headerClass    = $params->get('header_class');
  $bootstrapSize  = $params->get('bootstrap_size');
  $moduleClass    = !empty($bootstrapSize) ? ' span' . (int) $bootstrapSize . '' : '';
  $moduleclassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

  if (!empty ($module->content))
  {
    $html  = "<{$moduleTag} class=\"moduletable {$moduleclassSfx} {$moduleClass}\">";
	$html .= "<div class=\"moduletable-wrapper\">";
	
    if ((bool) $module->showtitle)
    {
      $html .= "<{$headerTag} class=\"module_title {$headerClass}\">{$module->title}</{$headerTag}>";
    }

    $html .= $module->content;
	$html .= "</div>";
    $html .= "</{$moduleTag}>";

    echo $html;
  }
}


function modChrome_html5nosize($module, &$params, &$attribs)
{
  $moduleTag      = $params->get('module_tag');
  $headerTag      = htmlspecialchars($params->get('header_tag'));
  $headerClass    = $params->get('header_class');
  $bootstrapSize  = $params->get('bootstrap_size');
  //$moduleClass    = !empty($bootstrapSize) ? ' span' . (int) $bootstrapSize . '' : '';
  $moduleclassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

  if (!empty ($module->content))
  {
    $html  = "<{$moduleTag} class=\"moduletable {$moduleclassSfx}\">";
	/*$html .= "<div class=\"moduletable-wrapper\">";	*/

    if ((bool) $module->showtitle){
      $html .= "<{$headerTag} class=\"module_title {$headerClass}\">{$module->title}</{$headerTag}>";
    }
	$html .= "<div class=\"moduletable-wrapper\">";
    $html .= $module->content;
	$html .= "</div>";	
    $html .= "</{$moduleTag}>";

    echo $html;
  }
}



function modChrome_modal($module, &$params, &$attribs)
{
  $moduleTag      = $params->get('module_tag');
  $headerTag      = htmlspecialchars($params->get('header_tag'));
  $headerClass    = $params->get('header_class');
  $bootstrapSize  = $params->get('bootstrap_size');
  // $moduleClass    = !empty($bootstrapSize) ? ' span' . (int) $bootstrapSize . '' : '';
  $moduleclassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

  if (!empty ($module->content))
  {
    $html = "<div class=\"modal fade moduletable {$moduleclassSfx} loginPopup\" id=\"modal\">";
      $html .= "<button type=\"button\" class=\"close modalClose\">×</button>";

      if ((bool) $module->showtitle){
        $html .= "<div class=\"modal-header\">";
          $html .= "<{$headerTag} class=\"{$headerClass}\">{$module->title}</{$headerTag}>";
        $html .= "</div>";
      }

      $html .= "<div class=\"modal-body\">";
          $html .= $module->content;
        $html .= "</div>";

      $html .= "</{$moduleTag}>";

    echo $html;
  }
}


function modChrome_wshadow($module, &$params, &$attribs)
{
  $moduleTag      = $params->get('module_tag');
  $headerTag      = htmlspecialchars($params->get('header_tag'));
  $headerClass    = $params->get('header_class');
  $bootstrapSize  = $params->get('bootstrap_size');
  $moduleClass    = !empty($bootstrapSize) ? ' span' . (int) $bootstrapSize . '' : '';
  $moduleclassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

  if (!empty ($module->content))
  {
    $html  = "<{$moduleTag} class=\"moduletable wshadow {$moduleclassSfx} {$moduleClass}\">";

    if ((bool) $module->showtitle)
    {
      $html .= "<{$headerTag} class=\"module_title {$headerClass}\">{$module->title}</{$headerTag}>";
    }

    $html .= $module->content;
    $html .= "</{$moduleTag}>";

    $html .=  "<div class=\"shadow span{$bootstrapSize}\"><span></span></div>";

    echo $html;
  }
}
