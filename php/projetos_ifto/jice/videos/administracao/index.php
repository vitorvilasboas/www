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

mysql_select_db($database_videos, $videos);
$query_ListaVideos = "SELECT id, nome_youtube, url_youtube, status_youtube, data_youtube FROM video ORDER BY id DESC";
$ListaVideos = mysql_query($query_ListaVideos, $videos) or die(mysql_error());
$row_ListaVideos = mysql_fetch_assoc($ListaVideos);
$totalRows_ListaVideos = mysql_num_rows($ListaVideos);

mysql_select_db($database_videos, $videos);
$query_ListaAdmin = "SELECT id, nome, email, status, `data` FROM administracao ORDER BY id DESC";
$ListaAdmin = mysql_query($query_ListaAdmin, $videos) or die(mysql_error());
$row_ListaAdmin = mysql_fetch_assoc($ListaAdmin);
$totalRows_ListaAdmin = mysql_num_rows($ListaAdmin);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GERENCIAMENTO DE VIDEOS</title>
<script src="../js/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../js/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link href="../css/site.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000;
	font-weight: bold;
}
.style2 {	color: #00CC00;
	font-weight: bold;
}
.style4 {	font-family: tahoma, verdana, sans-serif;
	font-size: 12px;
}
.style6 {
	color: #FF0000;
	font-weight: bold;
	font-family: Tahoma, Verdana, Arial;
	font-size: 12px;
}
.style7 {font-size: 12px}
.style8 {font-size: 10px}
-->
</style>
</head>

<body>
<p class="style6">&nbsp;</p>
<p class="contentpagetitle"><span class="style7 style7 style7 style7">Ola, <?php echo $_SESSION['MM_Username']; ?>, Seja bem vindo ! | <a href="<?php echo $logoutAction ?>">Sair</a></span></p>
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">PRINCIPAL</li>
    <li class="TabbedPanelsTab" tabindex="0">LISTA DE VÍDEOS</li>
    <li class="TabbedPanelsTab" tabindex="0">LISTA DE ADMINISTRADORES</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <p class="style4">L-VIDEO:</p>
      <p class="style4">Sistema de gerenciamento de vídeo com link do youtube, com cadastro, alteração e excluir de vídeos e com opção de cadastro de usuarios.<br />
        Conteudo:</p>
      <p class="style4">Lista de vídeo<br />
        Cadastro de vídeos<br />
        Alteração de vídeos<br />
        Excluir vídeos<br />
        Opção de altera status de vídeos (<span class="style2">ON</span>) - (<span class="style1">OFF</span>)</p>
      <p class="style4">Lista de usuários<br />
        Cadastro de usuários<br />
        Alteração de usuários<br />
        Excluir usuários<br />
        Opção de altera status de usuário (<span class="style2">ON</span>) - (<span class="style1">OFF</span>)</p>
    </div>
    <div class="TabbedPanelsContent">
      <p><a href="" onClick="window.open('cadastrar_video.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=400,left=25,top=25'); return false;">Cadastrar vídeo</a></p>
      <div align="center">
        <?php if(@$row_ListaVideos['nome_youtube'] != '') { ?>
      </div>
      <table width="89%" align="center" class="contentheading">
        <tr>
          <td width="10%" bgcolor="#FFFFFF"><div align="center" class="style8">Id:</div></td>
          <td width="23%" bgcolor="#FFFFFF"><div align="center" class="style8">Nome:</div></td>
          <td width="3%" bgcolor="#FFFFFF"><div align="center" class="style8">Url:</div></td>
          <td width="24%" bgcolor="#FFFFFF"><div align="center" class="style8">Status:</div></td>
          <td width="22%" bgcolor="#FFFFFF"><div align="center" class="style8">Data:</div></td>
          <td width="18%" bgcolor="#FFFFFF"><div align="center" class="style8">Opção:</div></td>
        </tr>
        <?php do { ?>
          <tr>
            <td bgcolor="#E5E5E5"><div align="center"><span class="style8"><?php echo $row_ListaVideos['id']; ?></span></div></td>
            <td bgcolor="#E5E5E5"><div align="center"><?php echo $row_ListaVideos['nome_youtube']; ?></div></td>
            <td bgcolor="#E5E5E5"><div align="center"><a href="http://www.youtube.com/watch?v=<?php echo $row_ListaVideos['url_youtube']; ?>" target="_blank">Ver</a></div></td>
            <td bgcolor="#E5E5E5"><div align="center"><?php echo $row_ListaVideos['status_youtube']; ?></div></td>
            <td bgcolor="#E5E5E5"><div align="center"><?php echo $row_ListaVideos['data_youtube']; ?></div></td>
            <td bgcolor="#E5E5E5"><div align="center"><a href="" onClick="window.open('alterar_video.php?id=<?php echo $row_ListaVideos['id']; ?>','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=400,left=25,top=25'); return false;">Alterar</a> |<a href="" onClick="window.open('deletar_video.php?id=<?php echo $row_ListaVideos['id']; ?>','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=400,left=25,top=25'); return false;"> DELETAR</a></div></td>
          </tr>
          <?php } while ($row_ListaVideos = mysql_fetch_assoc($ListaVideos)); ?>
      </table>
      <div align="center">
        <p>
          <?php } else { ?>
</p>
        <div>
          <div align="center">
            <p>ainda n&atilde;o tem nenhum vídeo inserido</p>
          </div>
        </div>
        <p>
          <?php } ?>
        </p>
        <p>&nbsp;</p>
      </div>
    </div>
    <div class="TabbedPanelsContent">
      <p><a href="" onClick="window.open('cadastrar_admin.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=400,left=25,top=25'); return false;">Cadastrar administrador</a></p>
      <div align="center">
        <?php if(@$row_ListaAdmin['nome'] != '') { ?>
      </div>
      <table align="center">
        <tr>
          <td width="94" bgcolor="#FFFFFF"><div align="center">Id:</div></td>
          <td width="118" bgcolor="#FFFFFF"><div align="center">Nome:</div></td>
          <td width="43" bgcolor="#FFFFFF"><div align="center">E-mail:</div></td>
          <td width="121" bgcolor="#FFFFFF"><div align="center">Status:</div></td>
          <td width="138" bgcolor="#FFFFFF"><div align="center">Data:</div></td>
          <td width="138" bgcolor="#FFFFFF">OPÇÃO</td>
        </tr>
        <?php do { ?>
          <tr bgcolor="#E5E5E5">
            <td><div align="center"><?php echo $row_ListaAdmin['id']; ?></div></td>
            <td><div align="center"><?php echo $row_ListaAdmin['nome']; ?></div></td>
            <td><div align="center"><a href="mailto:<?php echo $row_ListaAdmin['email']; ?>">Ver</a><a href="<?php echo $row_ListaAdmin['email']; ?>" target="_blank"></a></div></td>
            <td><div align="center"><?php echo $row_ListaAdmin['status']; ?></div></td>
            <td><div align="center"><?php echo $row_ListaAdmin['data']; ?></div></td>
            <td><a href="" onClick="window.open('alterar_admin.php?id=<?php echo $row_ListaAdmin['id']; ?>','index','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=400,left=25,top=25'); return false;">ALTERAR</a> | <a href="" onClick="window.open('deletar_admin.php?id=<?php echo $row_ListaAdmin['id']; ?>','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=400,left=25,top=25'); return false;">DELETAR</a></td>
          </tr>
          <?php } while ($row_ListaAdmin = mysql_fetch_assoc($ListaAdmin)); ?>
      </table>
      <div align="center">
        <p>
          <?php } else { ?>
        </p>
        <div>
          <div align="center">
            <p>ainda n&atilde;o tem nenhum administrador inserido</p>
          </div>
        </div>
        <p>
          <?php } ?>
        </p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($ListaVideos);

mysql_free_result($ListaAdmin);
?>
<!-- ldeveloper.com por valor mantenha os cretidos -->
<!-- desenvolvido por lucas de souza (lucas_ita_2008@hotmail.com)
obs: agradece ao yuri ramalho pelo player (yuriramalho@hotmail.com)
 -->