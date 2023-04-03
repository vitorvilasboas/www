<?php
	require ('Connections/conecta.php');
	
class projetos_classe
  {
      var $resultado;
      var $registros;
      var $opcao;  	  	  
	  function projetos_classe()
	  {
	  		$this->con = new conexao();
	  }
          function listar(){
              $sql = ("select * from projetos order by proj_codigo desc");
              $this->resultado = $this->con->banco->Execute($sql);
          }
          
          function detalhes(){             
           $codigo=$_REQUEST['codigo'];
           $sql ="select * from projetos where PROJ_CODIGO =".$codigo;
           $this->resultado = $this->con->banco->Execute($sql);
    
          }

          function gravar_incluir()
	  {
              if(!$_FILES['proj_foto']){
        		
                  $titulo = $_REQUEST['proj_titulo'];
			$foto = '';
			$texto = $_REQUEST['proj_texto'];
			$data = date('d/m/Y - H:i:s');
                        $status = 'Em Andamento';
                  $sql = ("insert into projetos(proj_titulo,proj_foto,proj_texto,proj_data,proj_status) values ('$titulo','$foto','$texto','$data','$status')");
	                
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
              }else{
                        require ('caracteres.php');
			$titulo = $_REQUEST['proj_titulo'];
			$foto = str_replace($troca, $recebe, $_FILES['proj_foto']['name']);
			$texto = $_REQUEST['proj_texto'];
			$data = date('d/m/Y - H:i:s');
                        $status= 'Em Andamento';
			
			if(!preg_match('/image\/(jpeg|jpg|png|gif)$/i', $_FILES['proj_foto']['type']))
			{ 
				echo "Formato invalido"; 
				return true;
			}
	
			if(file_exists("uploads/img_proj/$foto"))
			{
				$i = 1;
	
				while(file_exists("uploads/img_proj/[$i]$foto"))
				{
		
					$i++;
	
				}
	
				$foto = "[".$i."]".$foto;
		
			}
	
			move_uploaded_file($_FILES['proj_foto']['tmp_name'], "uploads/img_proj/".$foto);

    		$sql = ("insert into projetos(proj_titulo,proj_foto,proj_texto,proj_data,proj_status) values ('$titulo','$foto','$texto','$data','$status')");
	                
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

			//header("Location: index.php?p=ver_projetos");
                    }
                
                }
		
		function excluir()
		{
			$sql = mysql_query("SELECT * FROM projetos WHERE proj_codigo = '".$_GET['codigo']."'");
			while($row = mysql_fetch_array($sql))
			{
				$foto = $row['proj_foto'];

			}
	
			unlink("uploads/img_proj/".$foto);
	
			$sql = mysql_query("DELETE FROM projetos WHERE proj_codigo = '".$_GET['codigo']."'");
	
			//header("Location: usuadm.php?pa=ver_projetos&acao=listar");
		}
	
	}
?>
