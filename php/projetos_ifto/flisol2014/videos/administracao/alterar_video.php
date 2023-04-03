<?php
ob_start();
?>
<?php session_start(); ?>
 <?php require_once('../bd/videos.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "ON";
$MM_donotCheckaccess = "false";


function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 

  $isValid = False; 


  if (!empty($UserName)) { 
 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE video SET nome_youtube=%s, url_youtube=%s, status_youtube=%s, data_youtube=%s, texto_youtube=%s WHERE id=%s",
                       GetSQLValueString($_POST['nome_youtube'], "text"),
                       GetSQLValueString($_POST['url_youtube'], "text"),
                       GetSQLValueString($_POST['status_youtube'], "text"),
                       GetSQLValueString($_POST['data_youtube'], "date"),
                       GetSQLValueString($_POST['texto_youtube'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_videos, $videos);
  $Result1 = mysql_query($updateSQL, $videos) or die(mysql_error());

  $updateGoTo = "alterar_video.php?alterar=sucesso";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_AtualizarVideo = "-1";
if (isset($_GET['id'])) {
  $colname_AtualizarVideo = $_GET['id'];
}
mysql_select_db($database_videos, $videos);
$query_AtualizarVideo = sprintf("SELECT * FROM video WHERE id = %s", GetSQLValueString($colname_AtualizarVideo, "int"));
$AtualizarVideo = mysql_query($query_AtualizarVideo, $videos) or die(mysql_error());
$row_AtualizarVideo = mysql_fetch_assoc($AtualizarVideo);
$totalRows_AtualizarVideo = mysql_num_rows($AtualizarVideo);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="../css/site.css" rel="stylesheet" type="text/css" />
<Script Language="JavaScript">
 function Fecha_Redireciona(link) {
  window.opener.location = link;
  self.close();
 }
</Script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GERENCIAMENTO DE VIDEOS</title>
<style type="text/css">
<!--
.style1 {color: #FF0000;
	font-weight: bold;
}
-->
</style>
<script src="../js/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../js/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../js/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../js/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div align="center"><a href="" onClick="javascript: Fecha_Redireciona('index.php');">Fechar página.</a>
  <p align="center">
    <?php if ( isset($_GET['alterar']) ) {  ?>
  </p>
  <p align="center" class="style3">O <span class="style1">Vídeo </span> foi alterado com sucesso.<br />
  </p>
  <div align="center">
    <?php } ?>
  </div>
</div>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nome:</td>
      <td><span id="sprytextfield1">
        <input type="text" name="nome_youtube" value="<?php echo htmlentities($row_AtualizarVideo['nome_youtube'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">dados errado.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id do youtube:</td>
      <td><span id="sprytextfield4">
        <input type="text" name="url_youtube" value="<?php echo htmlentities($row_AtualizarVideo['url_youtube'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">dados errado.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status:</td>
      <td><select name="status_youtube">
        <option value="ON" <?php if (!(strcmp("ON", htmlentities($row_AtualizarVideo['status_youtube'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>ON</option>
        <option value="OFF" <?php if (!(strcmp("OFF", htmlentities($row_AtualizarVideo['status_youtube'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>OFF</option>
      </select>
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Data:</td>
      <td><span id="sprytextfield3">
      <input type="text" name="data_youtube" value="<?php echo htmlentities($row_AtualizarVideo['data_youtube'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">dados errado.</span><span class="textfieldInvalidFormatMsg">A data esta errada.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Descrição:</td>
      <td><span id="sprytextarea1">
      <textarea name="texto_youtube" cols="50" rows="5"><?php echo htmlentities($row_AtualizarVideo['texto_youtube'], ENT_COMPAT, 'utf-8'); ?></textarea>
      <span id="countsprytextarea1">&nbsp;</span> <span class="textareaRequiredMsg">dados errado.</span><span class="textareaMinCharsMsg">N&ugrave;mero m&iacute;nimo de car&aacute;teres n&atilde;o encontrados.</span><span class="textareaMaxCharsMsg">N&ugrave;mero m&aacute;ximo excedido de car&aacute;teres.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="ALTERAR" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_AtualizarVideo['id']; ?>" />
</form>
<p>&nbsp;</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"dd/mm/yyyy", validateOn:["blur", "change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"], counterId:"countsprytextarea1", minChars:3, maxChars:500, counterType:"chars_count"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur", "change"]});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($AtualizarVideo);
?>
<!-- ldeveloper.com por valor mantenha os cretidos -->
<!-- desenvolvido por lucas de souza (lucas_ita_2008@hotmail.com)
obs: agradece ao yuri ramalho pelo player (yuriramalho@hotmail.com)
 -->