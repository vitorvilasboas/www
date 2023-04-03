<?php

class dimensao_classe {
          var $resultado;
	  var $registros;
	  	  	  
	  function dimensao_classe(){
	  	$this->con = new conexao();
	  }
	  function listar(){    
	        $sql = "select * from dimensao";
		$this->resultado = $this->con->banco->Execute($sql);
	  }
	  function excluir(){
	        $sql = "delete from dimensao where DIM_CODIGO = ".$_REQUEST['dim_codigo'];
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
	        $sql = "insert into dimensao (dim_nome) values ('".$_REQUEST['dim_nome']."','1')";
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
		$sql = "select * from dimensao where DIM_CODIGO = ".$_REQUEST['dim_codigo'];
		$this->resultado = $this->con->banco->Execute($sql);
		$this->registros = $this->resultado->FetchNextobject();			
	  }
	  function gravar_alterar(){	       
	        $sql = "update dimensao set DIM_NOME = '".$_REQUEST['dim_nome']."' WHERE DIM_CODIGO = ".$_REQUEST['dim_codigo'];
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
