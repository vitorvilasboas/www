<?php
ob_start();
?>
<?php session_start(); ?>
<?php require_once('../bd/videos.php'); ?>
<?php

if (!isset($_SESSION)) {
  session_start();
}


$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){

  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

if ((isset($_POST['id'])) && ($_POST['id'] != "") && (isset($_GET['id']))) {
  $deleteSQL = sprintf("DELETE FROM administracao WHERE id=%s",
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_videos, $videos);
  $Result1 = mysql_query($deleteSQL, $videos) or die(mysql_error());

  $deleteGoTo = "deletar_admin.php?delete=sucesso";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_DeleteAdmin = "-1";
if (isset($_GET['id'])) {
  $colname_DeleteAdmin = $_GET['id'];
}
mysql_select_db($database_videos, $videos);
$query_DeleteAdmin = sprintf("SELECT * FROM administracao WHERE id = %s", GetSQLValueString($colname_DeleteAdmin, "int"));
$DeleteAdmin = mysql_query($query_DeleteAdmin, $videos) or die(mysql_error());
$row_DeleteAdmin = mysql_fetch_assoc($DeleteAdmin);
$totalRows_DeleteAdmin = mysql_num_rows($DeleteAdmin);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="../css/site.css" rel="stylesheet" type="text/css" />
<Script Language="JavaScript">
 function Fecha_Redireciona(link) {
  window.opener.location = link;
  self.close();
 }
</Script>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<title>GERENCIAMENTO DE VIDEOS</title><head>
<body>
    <p align="center"><a href="" onclick="javascript: Fecha_Redireciona('index.php');">Fechar p&aacute;gina.</a></p>
    <table width="100%" height="200">
      <tr>
        <td>
          <div align="center">
          <?php if($_GET['delete'] == sucesso ) { ?>
          <br />
          <br />
          <br />
          O <span class="style1">Administrador</span> foi excluida com sucesso!          </div>
          <p align="center"><br />
            <br />
            <?php } ?>
          </p>        </td>
    </tr>
      <tr>
        <td>
          <?php 
	if(@$_GET['id'] == @$row_DeleteAdmin['id']) { ?>
          <table align="center">
            <tr>
              <td colspan="2">Tem certeza que deseja realmente deletar esse administrador?( <span class="style1"><?php echo $row_DeleteAdmin['nome']; ?></span>)</td>
          </tr>
            <tr>
              <td><form id="form1" name="form1" method="post" action="deletar_admin.php?id=<?php echo $row_DeleteAdmin['id']; ?>">
                <div align="right">
                  <input name="id" type="hidden" id="id" value="<?php echo $row_DeleteAdmin['id']; ?>" />
                  <input type="submit" name="Submit" value="Deletar" />
                </div>
          </form>        </td>
          <td><form id="form2" name="form2" method="post" action="index.php">
            <div align="left">
              <input type="submit" name="Submit2" value="Cancelar" />
              </div>
          </form>        </td>
        </tr>
          </table></td>
    </tr>
  </table>
	  
	  <div align="center">
	    <p align="center"><br />
          <br />
          <?php } else { ?>
          <span class="style1">Administrador</span> n&atilde;o existe!
          <?php } ?>
        </p>
      </div>
</html>
<?php
mysql_free_result($DeleteAdmin);
?>
<!-- ldeveloper.com por valor mantenha os cretidos -->
<!-- desenvolvido por lucas de souza (lucas_ita_2008@hotmail.com)
obs: agradece ao yuri ramalho pelo player (yuriramalho@hotmail.com)
 -->