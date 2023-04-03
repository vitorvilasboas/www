<?php
      		
                        require 'Connections/conecta.php';
                        require ('caracteres.php');
			$link = $_REQUEST['vid_link'];
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
	                
                if ($resultado = $con->banco->Execute($sql))
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
                    
?>
