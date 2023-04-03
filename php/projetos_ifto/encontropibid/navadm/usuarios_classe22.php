<?php
require ('Connections/conecta.php');

class usuarios_classe 
  {
          var $resultado;
	  var $registros;
	  	  	  
	  function usuarios_classe()
	  {
	  		$this->con = new conexao();
	  }
	  function listar()
	  {    
	        $sql = "select * from usuarios";
			$this->resultado = $this->con->banco->Execute($sql);
	  }
	  function excluir()
	  {
	        $sql = "delete from usuarios where USU_CODIGO = ".$_REQUEST['usu_codigo'];
			if ($this->resultado = $this->con->banco->Execute($sql))
			{
				alerta("Excluido com sucesso");
				return true;
			}
			else
			{
				alerta("Não foi excluido");
				return false;
	 		}
	  }
	  function gravar_incluir()
	  {
	        $sql = "insert into usuarios (usu_nome,usu_cpf,usu_senha,usu_nivel,usu_email,usu_sexo,usu_data_nasc,usu_celular,usu_telefone,usu_endereco,usu_cidade,usu_uf,usu_cep,usu_instituicao,usu_modalidade,usu_portador,usu_data_cadastro) values ('".$_REQUEST['usu_nome']."','".$_REQUEST['usu_cpf']."','".md5($_REQUEST['usu_senha'])."','".$_REQUEST['usu_nivel']."','".$_REQUEST['usu_email']."','".$_REQUEST['usu_sexo']."','".$_REQUEST['usu_data_nasc']."','".$_REQUEST['usu_celular']."','".$_REQUEST['usu_telefone']."','".$_REQUEST['usu_endereco']."','".$_REQUEST['usu_cidade']."','".$_REQUEST['usu_uf']."','".$_REQUEST['usu_cep']."','".$_REQUEST['usu_instituicao']."','".$_REQUEST['usu_modalidade']."','".$_REQUEST['usu_portador']."','".$_REQUEST['usu_data_cadastro']."')";
			if ($this->resultado = $this->con->banco->Execute($sql))
			{
				alerta("Cadastro Realizado com sucesso");
				return true;
			}
			else
			{
				alerta("Não foi cadastrado");
				return false;
			}
	  }
	  function alterar()
	  {
			$sql = "select * from usuarios where USU_CODIGO = ".$_REQUEST['usu_codigo'];
			$this->resultado = $this->con->banco->Execute($sql);
			$this->registros = $this->resultado->FetchNextobject();
			
	  }
	  function gravar_alterar()
	  {	       
	        $sql = "update usuarios set USU_NOME = '".$_REQUEST['usu_nome']."', USU_CPF = '".$_REQUEST['usu_cpf']."',USU_SENHA = '".md5($_REQUEST['usu_senha'])."', USU_NIVEL = '".$_REQUEST['usu_nivel']."', USU_EMAIL = '".$_REQUEST['usu_email']."', USU_SEXO ='".$_REQUEST['usu_sexo']."', USU_DATA_NASC ='".$_REQUEST['usu_data_nasc']."', USU_CELULAR ='".$_REQUEST['usu_celular']."', USU_TELEFONE ='".$_REQUEST['usu_telefone']."', USU_ENDERECO = '".$_REQUEST['usu_endereco']."', USU_CIDADE ='".$_REQUEST['usu_cidade']."', USU_UF ='".$_REQUEST['usu_uf']."', USU_CEP ='".$_REQUEST['usu_cep']."', USU_INSTITUICAO ='".$_REQUEST['usu_instituicao']."', USU_MODALIDADE = '".$_REQUEST['usu_modalidade']."',USU_PORTADOR ='".$_REQUEST['usu_portador']."', USU_DATA_CADASTRO ='".$_REQUEST['usu_data_cadastro']."' WHERE USU_CODIGO = ".$_REQUEST['usu_codigo'];
			   if ($this->resultado = $this->con->banco->Execute($sql))
			   {
                                alerta("Alterado com sucesso");
				return true;
			   }
			   else
			   {
				alerta("Não foi alterado");
				return false;
                           }
	  }
          function listar_estados()
	   {
		      $retorna = '';   
			  $sql = "select * from usuarios order by USU_UF";
			  $resultado = $this->con->banco->Execute($sql); 	
			  if($registros = $resultado->FetchNextObject())
			  {
				  $selecionado = '';
				  if($this->registros->USU_UF);
				  {
					  $selecionado = 'selected';
				  }
		          $retorna = $retorna . '<option value="'.$registros->USU_UF.'"'.$selecionado.'>'.$registros->USU_UF.'</option>'; 
			  
			  }

			  return $retorna;
	   }
          function usuario_confirmar()
	   {
		      $retorna = '';   
			  $sql = "select * from usuarios order by USU_NOME";
			  $resultado = $this->con->banco->Execute($sql); 	
			  while($registros = $resultado->FetchNextObject())
			  {
				  $selecionado = '';
				  if($registros->USU_CODIGO);
				  {
					  $selecionado = 'selected';
				  }
		          $retorna = $retorna . '<option value="'.$registros->USU_NOME.'"'.$selecionado.'>'.$registros->USU_NOME.'</option>'; 
			  
			  }

			  return $retorna;
	   }
           function confirmado()
	  {	       
	        $sql = "update usuarios set USU_STATUS='confirmado' WHERE USU_NOME='".strtolower($_REQUEST['usu_nome']."'");
			   if ($this->resultado = $this->con->banco->Execute($sql))
			   {
                                alerta("Alterado com sucesso");
				return true;
			   }
			   else
			   {
				alerta("Não foi alterado");
				return false;
                           }
	  }
          function listar_modalidade()
	   {
		      $retorna = '';   
			  $sql = "select * from usuarios order by USU_MODALIDADE";
			  $resultado = $this->con->banco->Execute($sql); 	
			  if($registros = $resultado->FetchNextObject())
			  {
				  $selecionado = '';
				  if($this->registros->USU_MODALIDADE);
				  {
					  $selecionado = 'selected';
				  }
		          $retorna = $retorna . '<option value="'.$registros->USU_MODALIDADE.'"'.$selecionado.'>'.$registros->USU_MODALIDADE.'</option>'; 
			  
			  }

			  return $retorna;
	   }
           function confirmar_participacao()
           {
               
               $sql=("SELECT usu_codigo, upper(usu_nome), mcso_codigo, mcso_titulo, mcso_condutor FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO WHERE USU_NOME ='". strtoupper($_REQUEST['usu_nome'])."'");
               $this->resultado=$this->con->banco->Execute($sql);
                            
           }
           function usuarios_pesquisar(){
               $busca = $_POST['busca'];
               $sql =("SELECT * FROM usuarios WHERE USU_NOME like'%$busca%' or USU_CPF like'%$busca%'");
               $this->resultado = $this->con->banco->Execute($sql);
           }
		
     
		
     }

?>
