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
  $updateSQL = sprintf("UPDATE administracao SET nome=%s, senha=%s, email=%s, status=%s, `data`=%s WHERE id=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['senha'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['data'], "date"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_videos, $videos);
  $Result1 = mysql_query($updateSQL, $videos) or die(mysql_error());

  $updateGoTo = "alterar_admin.php?alterar=sucesso";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_AlterarAdmin = "-1";
if (isset($_GET['id'])) {
  $colname_AlterarAdmin = $_GET['id'];
}
mysql_select_db($database_videos, $videos);
$query_AlterarAdmin = sprintf("SELECT * FROM administracao WHERE id = %s", GetSQLValueString($colname_AlterarAdmin, "int"));
$AlterarAdmin = mysql_query($query_AlterarAdmin, $videos) or die(mysql_error());
$row_AlterarAdmin = mysql_fetch_assoc($AlterarAdmin);
$totalRows_AlterarAdmin = mysql_num_rows($AlterarAdmin);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link href="../js/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center"><a href="" onclick="javascript: Fecha_Redireciona('index.php');">Fechar página.</a>
</div>
<p align="center">
  <?php if ( isset($_GET['alterar']) ) {  ?>
</p>
<p align="center" class="style3">O <span class="style1">Administrador </span> foi alterado com sucesso.<br />
</p>
<div align="center">
  <?php } ?>
</div>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nome:</td>
      <td><span id="sprytextfield1">
        <input type="text" name="nome" value="<?php echo htmlentities($row_AlterarAdmin['nome'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">dados errado.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Senha:</td>
      <td><span id="sprytextfield2">
        <input type="password" name="senha" value="<?php echo $row_AlterarAdmin['senha']; ?>" size="32" />
      <span class="textfieldRequiredMsg">dados errado.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><span id="sprytextfield3">
      <input type="text" name="email" value="<?php echo htmlentities($row_AlterarAdmin['email'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">dados errado.</span><span class="textfieldInvalidFormatMsg">O e-mail esta errada.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status:</td>
      <td><select name="status">
        <option value="ON" <?php if (!(strcmp("ON", htmlentities($row_AlterarAdmin['status'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>ON</option>
        <option value="OFF" <?php if (!(strcmp("OFF", htmlentities($row_AlterarAdmin['status'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>OFF</option>
      </select>
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Data:</td>
      <td><span id="sprytextfield4">
      <input type="text" name="data" value="<?php echo htmlentities($row_AlterarAdmin['data'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">dados errado.</span><span class="textfieldInvalidFormatMsg">A data esta errada.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="ALTERAR" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_AlterarAdmin['id']; ?>" />
</form>
<p>&nbsp;</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "date", {validateOn:["blur", "change"], format:"dd/mm/yyyy"});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($AlterarAdmin);
?>
<!-- ldeveloper.com por valor mantenha os cretidos -->
<!-- desenvolvido por lucas de souza (lucas_ita_2008@hotmail.com)
obs: agradece ao yuri ramalho pelo player (yuriramalho@hotmail.com)
 -->