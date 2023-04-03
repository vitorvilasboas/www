<?php

class cursos_classe {
          var $resultado;
	  var $registros;
	  	  	  
	  function cursos_classe(){
	  	$this->con = new conexao();
	  }
	  function listar(){    
	        $sql = "select * from cursos";
		$this->resultado = $this->con->banco->Execute($sql);
	  }
	  function excluir(){
	        $sql = "delete from cursos where CURSO_CODIGO = ".$_REQUEST['curso_codigo'];
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
	        $sql = "insert into cursos (curso_nome) values ('".$_REQUEST['curso_nome']."')";
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
		$sql = "select * from cursos where CURSO_CODIGO = ".$_REQUEST['curso_codigo'];
		$this->resultado = $this->con->banco->Execute($sql);
		$this->registros = $this->resultado->FetchNextobject();			
	  }
	  function gravar_alterar(){	       
	        $sql = "update cursos set CURSO_NOME = '".$_REQUEST['curso_nome']."' WHERE CURSO_CODIGO = ".$_REQUEST['curso_codigo'];
	        if ($this->resultado = $this->con->banco->Execute($sql)){
                        alerta("Alterado com sucesso");
			return true;
		}
	        else{
			alerta("Não foi alterado");
			return false;
                }
          
	  }
   	function listar_campus(){
             $sql = "select  curso_nome,campus_nome from cursos_dos_campi inner join  cursos on  
                     CURSO_CODIGO = FKCURSO_CODIGO inner join  campus on  CAMPUS_CODIGO = FKCAMPUS_CODIGO";
             $this->resultado = $this->con->banco->Execute($sql);
             if($registros = $resultado->FetchNextObject())
			  {
				  $selecionado = '';
				  if($this->registros->CAMPUS_NOME);
				  {
					  $selecionado = 'selected';
				  }
		          $retorna = $retorna . '<option value="'.$registros->CAMPUS_NOME.'"'.$selecionado.'>'.$registros->CAMPUS_NOME.'</option>'; 
			  
			  }

			  return $retorna;
        }
        function listar_cursos(){
             $sql = "select  curso_nome,campus_nome from cursos_dos_campi inner join  cursos on  
                     CURSO_CODIGO = FKCURSO_CODIGO inner join  campus on  CAMPUS_CODIGO = FKCAMPUS_CODIGO";
             $this->resultado = $this->con->banco->Execute($sql);
             if($registros = $resultado->FetchNextObject())
			  {
				  $selecionado = '';
				  if($this->registros->CURSO_NOME);
				  {
					  $selecionado = 'selected';
				  }
		          $retorna = $retorna . '<option value="'.$registros->CURSO_NOME.'"'.$selecionado.'>'.$registros->CURSO_NOME.'</option>'; 
			  
			  }

			  return $retorna;
        }
        function listar_campus_cursos(){
             $sql = "select  curso_nome,campus_nome from cursos_dos_campi inner join  cursos on  
                     CURSO_CODIGO = FKCURSO_CODIGO inner join  campus on  CAMPUS_CODIGO = FKCAMPUS_CODIGO";
             $this->resultado = $this->con->banco->Execute($sql);
        }
}
?>
