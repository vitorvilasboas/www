<?php
session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {
	require "../funcoesGerais.php";

	if ($_POST["deferido"]==true){
		$deferido=1;
	}
	else{
		$deferido=0;
	}
	if ($_POST["cota_esc_pub"]==true){
		$cota_esc_pub=1;
	}
	else{
		$cota_esc_pub=0;
	}
	$nasc_can = formataData($_POST[nasc_can],"/","-");	
	
	$sql_atualizar = "UPDATE candidatos SET 
			opccur_can_1 = ".$_POST["opccur_can_1"].",  
			opccur_can_2 = ".$_POST["opccur_can_2"].",  			
			nome_can = '".$_POST["nome_can"]."', 
			nasc_can = '".$nasc_can."',  	
			mae_can = '".$_POST["mae_can"]."', 
			sexo_can = '".$_POST["sexo_can"]."', 
			nat_can = '".$_POST["nat_can"]."', 
			ufnat_can = '".$_POST["ufnat_can"]."', 
			orgexp_can = '".$_POST["orgexp_can"]."', 
			doc_can = '".$_POST["doc_can"]."', 
			logend_can = '".$_POST["logend_can"]."', 
			numend_can = '".$_POST["numend_can"]."', 
			comend_can = '".$_POST["comend_can"]."', 
			bairroend_can = '".$_POST["bairroend_can"]."', 
			cidend_can = '".$_POST["cidend_can"]."', 
			cepend_can = '".$_POST["cepend_can"]."', 
			ufend_can = '".$_POST["ufend_can"]."', 
			telfixo_can = '".$_POST["telfixo_can"]."', 
			telcel_can = '".$_POST["telcel_can"]."', 
			mail_can = '".$_POST["mail_can"]."', 
			hab_can = '".$_POST["hab_can"]."', 
			vateesp_can = '".$_POST["vateesp_can"]."', 
			desateesp_can = '".$_POST["desateesp_can"]."', 
			cpf_can = '".$_POST["cpf_can"]."', 
			ufdoc_can = '".$_POST["ufdoc_can"]."', 
			cota_esc_pub = ".$cota_esc_pub.", 
			deferido=".$deferido." WHERE cod_can=".$_POST["cod_can"].";";
	
	require "../config/conectaBanco.php";
	
	$resultado_atualizar = mysql_query($sql_atualizar, $conectar);
	
        require "relatorioInscricao.php";
        exit;
}
?>