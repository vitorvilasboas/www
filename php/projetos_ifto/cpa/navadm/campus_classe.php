<?php

class campus_classe {
          var $resultado;
	  var $registros;
	  	  	  
	  function campus_classe(){
	  	$this->con = new conexao();
	  }
	  function listar(){    
	        $sql = "select * from campus";
		$this->resultado = $this->con->banco->Execute($sql);
	  }
	  function excluir(){
	        $sql = "delete from campus where CAMPUS_CODIGO = ".$_REQUEST['campus_codigo'];
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
	        $sql = "insert into campus (campus_nome,inst_codigo) values ('".$_REQUEST['campus_nome']."','1')";
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
		$sql = "select * from campus where CAMPUS_CODIGO = ".$_REQUEST['campus_codigo'];
		$this->resultado = $this->con->banco->Execute($sql);
		$this->registros = $this->resultado->FetchNextobject();			
	  }
	  function gravar_alterar(){	       
	        $sql = "update campus set CAMPUS_NOME = '".$_REQUEST['campus_nome']."' WHERE CAMPUS_CODIGO = ".$_REQUEST['campus_codigo'];
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
