<?php

class questoes_classe {
          var $resultado;
	  var $registros;
	  	  	  
	  function questoes_classe(){
	  	$this->con = new conexao();
	  }
	  function listar(){    
	        $sql = "select * from questoes";
		$this->resultado = $this->con->banco->Execute($sql);
	  }
	  function excluir(){
	        $sql = "delete from questoes where QUES_CODIGO = ".$_REQUEST['ques_codigo'];
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
	        $sql = "insert into questoes (ques_nome,fkdim_codigo,fktdu_codigo) values ('".$_REQUEST['ques_nome']."','".$_REQUEST['fkdim_codigo']."','".$_REQUEST['fktdu_codigo']."')";
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
		$sql = "select * from questoes where QUES_CODIGO = ".$_REQUEST['ques_codigo'];
		$this->resultado = $this->con->banco->Execute($sql);
		$this->registros = $this->resultado->FetchNextobject();			
	  }
	  function gravar_alterar(){	       
	        $sql = "update questoes set QUES_NOME = '".$_REQUEST['questoes_nome']."',DIM_CODIGO = '".$_REQUEST['dim_codigo']."',TDU_CODIGO = '".$_REQUEST['tdu_codigo']."' WHERE QUES_CODIGO = ".$_REQUEST['ques_codigo'];
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
