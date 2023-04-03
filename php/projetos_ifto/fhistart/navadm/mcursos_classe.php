<?php
require ('Connections/conecta.php');

class mcursos_classe {
          var $resultado;
	  var $registros;
	  	  	  
	  function mcursos_classe(){
	  	$this->con = new conexao();
	  }
	  function listar(){    
	        $sql = "select * from minicursos";
		$this->resultado = $this->con->banco->Execute($sql);
	  }
	  function excluir(){
	        $sql = "delete from minicursos where MCSO_CODIGO = ".$_REQUEST['mcso_codigo'];
		if ($this->resultado = $this->con->banco->Execute($sql)){
			alerta("Excluido com sucesso");
			return true;
		}
		else{
			alerta("Não foi excluido");
			return false;
	 	}
	  }
	  function gravar_incluir(){
	        $sql = "insert into minicursos (mcso_horario,mcso_titulo,mcso_vagas,mcso_condutor,mcso_resumo) values ('".$_REQUEST['mcso_horario']."','".$_REQUEST['mcso_titulo']."','".$_REQUEST['mcso_vagas']."','".$_REQUEST['mcso_condutor']."','".$_REQUEST['mcso_resumo']."')";
		if ($this->resultado = $this->con->banco->Execute($sql)){
			alerta("Cadastro Realizado com sucesso");
			return true;
		}
		else{
			alerta("Não foi cadastrado");
			return false;
		}
	  }
	  function alterar(){
		$sql = "select * from minicursos where MCSO_CODIGO = ".$_REQUEST['mcso_codigo'];
		$this->resultado = $this->con->banco->Execute($sql);
		$this->registros = $this->resultado->FetchNextobject();			
	  }
	  function gravar_alterar(){	       
	        $sql = "update minicursos set MCSO_HORARIO = '".$_REQUEST['mcso_horario']."', MCSO_TITULO = '".$_REQUEST['mcso_titulo']."',MCSO_VAGAS = '".$_REQUEST['mcso_vagas']."', MCSO_CONDUTOR = '".$_REQUEST['mcso_condutor']."', MCSO_RESUMO = '".$_REQUEST['mcso_resumo']."' WHERE MCSO_CODIGO = ".$_REQUEST['mcso_codigo'];
	        if ($this->resultado = $this->con->banco->Execute($sql)){
                        alerta("Alterado com sucesso");
			return true;
		}
	        else{
			alerta("Não foi alterado");
			return false;
                }
	  }
   	
}
?>
