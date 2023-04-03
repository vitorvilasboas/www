<?php
ob_start();
?>
<?php session_start(); ?>
<?php require_once('../bd/videos.php'); ?>
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
?>
<?php

if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=$_POST['senha'];
  $MM_fldUserAuthorization = "status";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "login.php?erro=acesso";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_videos, $videos);
  	
  $LoginRS__query=sprintf("SELECT email, senha, status FROM administracao WHERE email=%s AND senha=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $videos) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'status');
    

    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GERENCIAMENTO DE VIDEOS</title>
<script src="../js/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="../js/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
<div id="CollapsiblePanel1" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">PAINEL DE GERENCIAMENTO DE VIDEOS</div>
  <div class="CollapsiblePanelContent">
    <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
      <table width="360" border="0" align="center">
        <tr>
          <td><div align="right">E-MAIL:</div></td>
          <td><div align="left">
            <input type="text" name="email" id="email" />
          </div></td>
        </tr>
        <tr>
          <td><div align="right">SENHA:</div></td>
          <td><div align="left">
            <input type="password" name="senha" id="senha" />
          </div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input type="submit" name="button" id="button" value="LOGAR" />
          </div></td>
        </tr>
      </table>
    </form>
    <p align="center">
    <?php if ( isset($_GET['erro']) ) { ?>
  </p>
  <p align="center">O <span class="style1">login</span> e/ou a <span class="style1">senha</span> informados não conferem.</p>
  <div align="center">
    <?php } ?>
  </div>
  </div>
</div>
<script type="text/javascript">
<!--
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
//-->
</script>
</body>
</html>
<!-- ldeveloper.com por valor mantenha os cretidos -->
<!-- desenvolvido por lucas de souza (lucas_ita_2008@hotmail.com)
obs: agradece ao yuri ramalho pelo player (yuriramalho@hotmail.com)
 -->