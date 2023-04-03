<?php
include 'Connections/conecta.php';

class periodicos_classe
  {
          var $resultado;
	  var $registros;
	  var $opcao;
	  	  	  
	  function periodicos_classe()
	  {
	  		$this->con = new conexao();
	  }
	  
	  function listar()
	  {    
	  		$sql = ("select * from periodicos where per_usu_codigo='".$_SESSION['codigo']."';");
			$this->resultado = $this->con->banco->Execute($sql);
			
	  }	 
	  
	  function excluir()
	  {
	  		
	               $sql = ("SELECT * FROM periodicos WHERE per_codigo = '".$_REQUEST['per_codigo']."'");
			$this->resultado = $this->con->banco->Execute($sql);
                        while($this->registros = $this->resultado->FetchNextobject())
			{
				$doc = $this->registros->PER_DOC;

			}
	
			unlink("uploads/periodicos/".$doc);
	
			$sql = ("DELETE FROM periodicos WHERE per_codigo = '".$_REQUEST['per_codigo']."'");
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
                require ('caracteres.php');   
                $resumo = $_REQUEST['per_resumo'];
                $titulo = $_REQUEST['per_titulo'];
                $trocar = $_FILES['doc']['name'];
                $doc = str_replace($troca, $recebe, $trocar);
                $data = date('d/m/Y - H:i:s');
                $autores = $_REQUEST['per_autores'];
                $palavras_chave = $_REQUEST['per_pal_chave'];
                $usuario = $_SESSION['codigo'];
                        				
                if(($_FILES['doc']['type'] == 'application/pdf') or ($_FILES['doc']['type'] == 'application/msword') or ($_FILES['doc']['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')){	
                        if(file_exists("uploads/periodicos/$doc")){    
                            $i = 1;	
                            while(file_exists("uploads/periodicos/[$i]$doc")){		
                                $i++;	
                            }	
                            $doc = "[".$i."]".$doc;
                        }	
                        move_uploaded_file($_FILES['doc']['tmp_name'], "uploads/periodicos/".$doc);

                        $sql = ("insert into periodicos(per_doc,per_data,per_resumo,per_titulo,per_autores,per_pal_chave,per_usu_codigo) values ('$doc','$data','$resumo','$titulo','$autores','$palavras_chave','$usuario')");	                
                              if ($resultado = $this->con->banco->Execute($sql)){
                                    echo("Cadastro Realizado com sucesso");				
                              }
                              else {
                                    echo("Não foi cadastrado");				
			      }			
	                              
                 }
                 else {
                     echo "formato invalido";
                     
                 }
	  }
  }
	  

           
     
?>