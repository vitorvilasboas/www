<?php

class respostas_classe {
          var $resultado;
	  var $registros;
	  	  	  
	  function respostas_classe(){
	  	$this->con = new conexao();
	  }
	  function listar(){    
	        $sql = "select * from respostas";
		$this->resultado = $this->con->banco->Execute($sql);
	  }
	  function excluir(){
	        $sql = "delete from respostas where RESP_CODIGO = ".$_REQUEST['resp_codigo'];
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
	        $sql = "insert into respostas (resp_nome) values ('".$_REQUEST['resp_nome']."')";
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
		$sql = "select * from respostas where RESP_CODIGO = ".$_REQUEST['resp_codigo'];
		$this->resultado = $this->con->banco->Execute($sql);
		$this->registros = $this->resultado->FetchNextobject();			
	  }
	  function gravar_alterar(){	       
	        $sql = "update respostas set RESP_NOME = '".$_REQUEST['resp_nome']."' WHERE RESP_CODIGO = ".$_REQUEST['resp_codigo'];
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
