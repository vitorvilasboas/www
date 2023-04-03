<?php

class cursos_dos_campi_classe {
          var $resultado;
	  var $registros;
	  	  	  
	  function cursos_dos_campi_classe(){
	  	$this->con = new conexao();
	  }
	  function listar(){    
	        $sql = "select  curso_codigo,curso_nome,campus_codigo,campus_nome from cursos_dos_campi inner join  cursos on  
                     CURSO_CODIGO = FKCURSO_CODIGO inner join  campus on  CAMPUS_CODIGO = FKCAMPUS_CODIGO";
                $this->resultado = $this->con->banco->Execute($sql);
	  }
	  function excluir(){
	        $sql = "delete from cursos_dos_campi where FKCURSO_CODIGO = '".$_REQUEST['fkcurso_codigo']."' and FKCAMPUS_CODIGO = ".$_REQUEST['fkcampus_codigo'];
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
	        $sql = "insert into cursos_dos_campi (fkcampus_codigo,fkcurso_codigo) values ('".$_REQUEST['fkcampus_codigo']."','".$_REQUEST['fkcurso_codigo']."')";
		if ($this->resultado = $this->con->banco->Execute($sql)){
			alerta("Cadastro Realizado com sucesso");
			return true;
		}
		else{
			alerta("Não foi cadastrado");
			return false;
		}
	  }
	  
   	function listar_campus(){
            $retorna='';
             $sql = "select  * from campus order by campus_nome";
             $this->resultado = $this->con->banco->Execute($sql);
             while($this->registros = $this->resultado->FetchNextObject()){
		    $selecionado = '';
				  if($this->registros->CAMPUS_NOME);
				  {
					  $selecionado = 'selected';
				  }
		          $retorna = $retorna . '<option value="'.$this->registros->CAMPUS_CODIGO.'"'.$selecionado.'>'.$this->registros->CAMPUS_NOME.'</option>'; 
			  
			  }

			  return $retorna;
        }
   	function listar_cursos(){
            $retorna='';
             $sql = "select  * from cursos order by curso_nome";
             $this->resultado = $this->con->banco->Execute($sql);
             while($this->registros = $this->resultado->FetchNextObject()){
		    $selecionado = '';
				  if($this->registros->CURSO_NOME);
				  {
					  $selecionado = 'selected';
				  }
		          $retorna = $retorna . '<option value="'.$this->registros->CURSO_CODIGO.'"'.$selecionado.'>'.$this->registros->CURSO_NOME.'</option>'; 
			  
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
