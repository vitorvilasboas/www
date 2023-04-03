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
	  		$sql = ("select * from periodicos;");
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
	  function alterar()
	  {
			$sql = "select * from periodicos where PER_CODIGO = ".$_REQUEST['per_codigo'];
			$this->resultado = $this->con->banco->Execute($sql);
			$this->registros = $this->resultado->FetchNextobject();
			
	  }
	  function gravar_alterar()
	  {
	  /*	$link = $_POST['foto_link'];
    	$arquivo = $_FILES['foto_nome'];
	  	
		if(($arquivo['type'] == 'image/jpg') or ($arquivo['type'] == 'image/jpeg') or ($arquivo['type'] == 'image/pjpeg')){
			if(!($arquivo['size'] > 1024000)){
				if(!(file_exists('uploads/indice.txt'))){
					$cria = fopen('uploads/indice.txt', 'a+');
					fclose($cria);	
					$grava = fopen('uploads/indice.txt', 'w');
					fwrite($grava, '0');
					fclose($grava);
					$valor = '0';
				}else{
					$le = fopen('uploads/indice.txt', 'r');
					$valor = fgets($le);
					fclose($le);
					$valor++;
					$grava = fopen('uploads/indice.txt', 'w');
					fwrite($grava, $valor);
					fclose($grava);
				}
				move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$valor.'.jpg');
			
			    if(mysql_query ("update fotos set FOTO_LINK = '$link', FOTO_NOME = '".$valor.".jpg' where FOTO_CODIGO = ".$_REQUEST['foto_codigo']))
				//if(mysql_query ("INSERT INTO fotos VALUES(NULL, '$link', '".$valor.".jpg')"))
			
				{
					alerta ("Upload Alterado com Sucesso!");	
				}
			}else{alerta ("São somente permitidos arquivos com no maximo 1MB!");}
		}else{alerta ("O Formato do arquivo é inválido, por favor faça o upload de arquivos JPG ou JPEG");}
	 */}
         /*
         function ver()
	  {    
	  		$sql = ("select * from periodicos where VID_CODIGO='".$_REQUEST['vid_codigo']."'");
			$this->resultado = $this->con->banco->Execute($sql);
			if($this->registros = $this->resultado->FetchNextObject()){
                        echo '<object width="500" height="400">
                                <param name="movie" name="wmode" value="transparent"/>
                                    <embed src="uploads/periodicos/'.$this->registros->VID_VIDEO.'" type="application/x-mplayer2" autostart="TRUE" wmode="transparent" width="500" height="400">
                            </object>';
                        }
          }
         function destaques()
	  {    
	  		$sql = ("select * from periodicos order by VID_CODIGO desc limit 3");
			$this->resultado = $this->con->banco->Execute($sql);

	                
      }
  */   	  
  }
	  

           
     
?>