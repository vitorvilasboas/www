<?php
include 'Connections/conecta.php';

class videos_classe
  {
          var $resultado;
	  var $registros;
	  var $opcao;
	  	  	  
	  function videos_classe()
	  {
	  		$this->con = new conexao();
	  }
	  
	  function listar()
	  {    
	  		$sql = ("select * from videos;");
			$this->resultado = $this->con->banco->Execute($sql);
			
	  }	 
	  
	  function excluir()
	  {
	  		
	        
			$sql = "delete from videos where VID_CODIGO = ".$_REQUEST['vid_codigo'];
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
			$link = $_REQUEST['vid_link'];
                        print_r($_FILES['video']);
			$video = str_replace($troca, $recebe, $_FILES['video']['name']);
			$data = date('d/m/Y - H:i:s');
			
			if(!preg_match('/video\/(avi|flv|mp4|wmv)$/i', $_FILES['video']['type']))
			{ 
				echo "Formato invalido"; 
				return true;
			}
	
			if(file_exists("uploads/videos/$video"))
			{
				$i = 1;
	
				while(file_exists("uploads/videos/[$i]$video"))
				{
		
					$i++;
	
				}
	
				$video = "[".$i."]".$video;
		
			}
	
			move_uploaded_file($_FILES['video']['tmp_name'], "uploads/videos/".$video);

    		$sql = ("insert into videos(vid_link,vid_video,vid_data) values ('$link','$video','$data')");
	                
                if ($resultado = $this->con->banco->Execute($sql))
			{
				alerta("Cadastro Realizado com sucesso");
				return true;
			}
			else
			{
				alerta("Não foi cadastrado");
				return false;
			}


			//header("Location: index.php?p=ver_noticias");
		}
	  function alterar()
	  {
			$sql = "select * from videos where VIDEO_CODIGO = ".$_REQUEST['vid_codigo'];
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
         function ver()
	  {    
	  		$sql = ("select * from videos where VID_CODIGO='".$_REQUEST['vid_codigo']."'");
			$this->resultado = $this->con->banco->Execute($sql);
			if($this->registros = $this->resultado->FetchNextObject()){
                        echo '<object class="video_play">
                                <param name="movie" name="wmode" value="transparent"/>
                                    <embed src="uploads/videos/'.$this->registros->VID_VIDEO.'" type="application/x-mplayer2" autostart="TRUE" wmode="transparent" width="500" height="400">
                            </object>';
                        }
          }
         function destaques(){    
	  		$sql = ("select * from videos order by VID_CODIGO desc limit 5");
			$this->resultado = $this->con->banco->Execute($sql);

	                
         }
          function todos_videos()
	  {    
	  		$sql = ("select * from videos order by VID_CODIGO desc");
			$this->resultado = $this->con->banco->Execute($sql);

	                
         }
     	  
  }
	  

           
     
?>