<?php
ob_start();
?>
<?php session_start(); ?>
<?php require_once('bd/videos.php'); ?>
<?php

$maxRows_VideoDetalhes = 5;
$pg = 0;
if (isset($_GET['pg'])) {
  $pg = $_GET['pg'];
}
$startRow_VideoDetalhes = $pg * $maxRows_VideoDetalhes;

mysql_select_db($database_videos, $videos);
$query_VideoDetalhes = "SELECT * FROM video WHERE status_youtube='ON'";
$query_limit_VideoDetalhes = sprintf("%s LIMIT %d, %d", $query_VideoDetalhes, $startRow_VideoDetalhes, $maxRows_VideoDetalhes);
$VideoDetalhes = mysql_query($query_limit_VideoDetalhes, $videos) or die(mysql_error());
$row_VideoDetalhes = mysql_fetch_assoc($VideoDetalhes);

if (isset($_GET['video'])) {
  $video = $_GET['video'];
} else {
  $all_VideoDetalhes = mysql_query($query_VideoDetalhes);
  $video = mysql_num_rows($all_VideoDetalhes);
}
$totalPages_VideoDetalhes = ceil($video/$maxRows_VideoDetalhes)-1;

$queryString_VideoDetalhes = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pg") == false && 
        stristr($param, "video") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_VideoDetalhes = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_VideoDetalhes = sprintf("&video=%d%s", $video, $queryString_VideoDetalhes);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GERENCIAMENTO DE VIDEOS</title>
<link href="css/site.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #DDDDDD;
}
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style></head>

<body>
<?php do { ?>
  <table width="495" border="0" align="center">
    <tr>
      <td bgcolor="#FFFFFF">Nome:<?php echo $row_VideoDetalhes['nome_youtube']; ?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Data:<?php echo $row_VideoDetalhes['data_youtube']; ?></td>
    </tr>
    <tr>
      <td bgcolor="#E5E5E5"> <p align="center">
        <a href="http://www.youtube.com/watch?v=<?php echo $row_VideoDetalhes['url_youtube']; ?>" target="_blank"><?php echo $row_VideoDetalhes['nome_youtube']; ?></a><br>
        <object width="425" height="355">
          <param name="movie" value="<?php echo $row_VideoDetalhes['url_youtube']; ?>"</param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/<?php echo $row_VideoDetalhes['url_youtube']; ?>" type="application/x-shockwave-flash" wmode="transparent" width="425" height="355"></embed>
        </object>
      </p></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Descrição:</td>
    </tr>
    <tr>
      <td bgcolor="#E5E5E5"><div align="center"><?php echo $row_VideoDetalhes['texto_youtube']; ?><br>
        <span class="style1">.........................................................................................................................</span></div></td>
    </tr>
      </table>
  
  <table border="0" align="center">
    <tr>
      <td><?php if ($pg > 0) { // inicio ?>
            <a href="<?php printf("%s?pg=%d%s", $currentPage, 0, $queryString_VideoDetalhes); ?>">Primeiro</a>
            <?php } // fim ?>
      </td>
      <td><?php if ($pg > 0) { // inicio ?>
            <a href="<?php printf("%s?pg=%d%s", $currentPage, max(0, $pg - 1), $queryString_VideoDetalhes); ?>">Anterior</a>
            <?php } // fim ?>
      </td>
      <td><?php if ($pg < $totalPages_VideoDetalhes) { // inicioe ?>
            <a href="<?php printf("%s?pg=%d%s", $currentPage, min($totalPages_VideoDetalhes, $pg + 1), $queryString_VideoDetalhes); ?>">Pr&oacute;ximo</a>
            <?php } // fim ?>
      </td>
      <td><?php if ($pg < $totalPages_VideoDetalhes) { // inicio ?>
            <a href="<?php printf("%s?pg=%d%s", $currentPage, $totalPages_VideoDetalhes, $queryString_VideoDetalhes); ?>">&Ugrave;ltimo</a>
            <?php } // fim ?>      </td>
    </tr>
  </table>
  <?php } while ($row_VideoDetalhes = mysql_fetch_assoc($VideoDetalhes)); ?></body>
</html>
<?php
mysql_free_result($VideoDetalhes);
?>
<!-- ldeveloper.com por valor mantenha os cretidos -->
<!-- desenvolvido por lucas de souza (lucas_ita_2008@hotmail.com)
obs: agradece ao yuri ramalho pelo player (yuriramalho@hotmail.com)
 -->