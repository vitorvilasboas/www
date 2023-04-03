<?php
include 'Connections/conecta.php';

class fotos_classe{
          var $resultado;
	  var $registros;
	  var $opcao;
	  	  	  
	  function fotos_classe(){
                $this->con = new conexao();
	  }	  
	  function listar(){    
	  	$sql = ("select * from fotos;");
		$this->resultado = $this->con->banco->Execute($sql);
			
	  }	 
	  function excluir(){
		if($sql = "select * from fotos where FOTO_CODIGO = ".$_REQUEST['foto_codigo']){
		       $this->resultado = $this->con->banco->Execute($sql);
                       if($this->registros = $this->resultado->FetchNextobject()){                               
                            $foto=$this->registros->FOTO_NOME;
                            unlink("uploads/fotos/".$foto);	
                            $sql = "delete from fotos where FOTO_CODIGO = ".$_REQUEST['foto_codigo'];
                            $this->resultado = $this->con->banco->Execute($sql);
                        }
                        alerta("Excluido com sucesso");
			return true;
		 }
		 else{
		     alerta("Não foi excluido");
		     return false;
	 	}
	  }	  
	  function gravar_incluir()
	  {
		$link = $_POST['foto_link'];
    		$arquivo = $_FILES['foto_nome'];				
		if(($arquivo['type'] == 'image/jpg') or ($arquivo['type'] == 'image/jpeg') or ($arquivo['type'] == 'image/pjpeg')){
		      if(!($arquivo['size'] > 2048000)){
		            if(!(file_exists('uploads/fotos/indice.txt'))){
				   $cria = fopen('uploads/fotos/indice.txt', 'a+');
				   fclose($cria);	
				   $grava = fopen('uploads/fotos/indice.txt', 'w');
				   fwrite($grava, '0');
				   fclose($grava);
				   $valor = '0';
			     }
                             else{
				   $le = fopen('uploads/fotos/indice.txt', 'r');
				   $valor = fgets($le);
				   fclose($le);
				   $valor++;
				   $grava = fopen('uploads/fotos/indice.txt', 'w');
				   fwrite($grava, $valor);
				   fclose($grava);
			     }
			     move_uploaded_file($arquivo['tmp_name'], 'uploads/fotos/'.$valor.'.jpg');			
			     if($sql= "INSERT fotos (foto_link,foto_nome) VALUES('$link', '".$valor.".jpg')"){
                                     $this->resultado = $this->con->banco->Execute($sql);                                              
				     alerta ("Upload Realizado com Sucesso!");	
			     }
		      }
                      else{
                           alerta ("São somente permitidos arquivos com no maximo 2MB!");}
	        }else{
                      alerta ("O Formato do arquivo é inválido, por favor faça o upload de arquivos JPG ou JPEG");}
	  }
	  function alterar(){
		$sql = "select * from fotos where FOTO_CODIGO = ".$_REQUEST['foto_codigo'];
		$this->resultado = $this->con->banco->Execute($sql);
		$this->registros = $this->resultado->FetchNextobject();			
	  }
	  function gravar_alterar(){
	  	$link = $_POST['foto_link'];
                $arquivo = $_FILES['foto_nome'];	  	
		if(($arquivo['type'] == 'image/jpg') or ($arquivo['type'] == 'image/jpeg') or ($arquivo['type'] == 'image/pjpeg')){
			if(!($arquivo['size'] > 2048000)){
				if(!(file_exists('uploads/fotos/indice.txt'))){
				     $cria = fopen('uploads/fotos/indice.txt', 'a+');
				     fclose($cria);	
				     $grava = fopen('uploads/fotos/indice.txt', 'w');
				     fwrite($grava, '0');
				     fclose($grava);
				     $valor = '0';
				}
                                else{
				     $le = fopen('uploads/fotos/indice.txt', 'r');
				     $valor = fgets($le);
				     fclose($le);
				     $valor++;
				     $grava = fopen('uploads/fotos/indice.txt', 'w');
				     fwrite($grava, $valor);
				     fclose($grava);
				}
				move_uploaded_file($arquivo['tmp_name'], 'uploads/fotos/'.$valor.'.jpg');
			
			        if(mysql_query ("update fotos set FOTO_LINK = '$link', FOTO_NOME = '".$valor.".jpg' where FOTO_CODIGO = ".$_REQUEST['foto_codigo'])){
                                    alerta ("Upload Alterado com Sucesso!");	
                                }
		        }
                        else{
                             alerta ("São somente permitidos arquivos com no maximo 2MB!");
                        }
	          }
                  else{
                      alerta ("O Formato do arquivo é inválido, por favor faça o upload de arquivos JPG ou JPEG");                
                  }
            }	  	
  }	  
?>