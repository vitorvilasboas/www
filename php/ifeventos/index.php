<?php 
    session_start();
    include 'topo.php';    
    if( isset($_SESSION['usuario']) && isset($_SESSION['senha']) ){
    	require 'menu.php';
    	include 'principal.php';
    } else {
    	include 'login.php';
    }
    require_once 'rodape.php';             
?>