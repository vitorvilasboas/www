<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
<?php
	require ('Connections/conecta.php');
	
class noticias_classe
  {
      var $resultado;
      var $registros;
      var $opcao;  	  	  
	  function noticias_classe()
	  {
	  		$this->con = new conexao();
	  }
          function listar(){
              $sql = ("select * from noticias order by not_codigo desc");
              $this->resultado = $this->con->banco->Execute($sql);
          }
          
          function detalhes(){             
           $codigo=$_REQUEST['codigo'];
           $sql ="select * from noticias where NOT_CODIGO =".$codigo;
           $this->resultado = $this->con->banco->Execute($sql);
    
          }

          function gravar_incluir()
	  {
              if($_FILES['img']['name']==''){
        		
                  $titulo = $_REQUEST['not_titulo'];
			$foto = '';
			$noticia = $_REQUEST['not_noticia'];
			$data = date('d/m/Y - H:i:s');
                        $tipo='noticias';
                        $fk_projeto=$_REQUEST['not_proj_codigo'];
                  $sql = ("insert into noticias(not_titulo,not_foto,not_noticia,not_data,not_tipo,not_proj_codigo) values ('$titulo','$foto','$noticia','$data','$tipo','$fk_projeto')");
	                
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
			$titulo = $_REQUEST['not_titulo'];
			$noticia = $_REQUEST['not_noticia'];
			$data = date('d/m/Y - H:i:s');
                        $tipo ='noticias';
                        $fk_projeto=$_REQUEST['not_proj_codigo'];
			
                        $permitido =array('image/jpg','image/png','image/jpeg','image/gif');
              
                        if(in_array($_FILES['img']['type'], $permitido)){
                 	
                                $arquivo=upload($_FILES['img']['tmp_name'],str_replace($troca, $recebe, $_FILES['img']['name']),320,'uploads/img_not/');


                                $sql = ("insert into noticias(not_titulo,not_foto,not_noticia,not_data,not_tipo,not_proj_codigo) values ('$titulo','$arquivo','$noticia','$data','$tipo',$fk_projeto)");
	                
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
                    }
                }
		
		function excluir()
		{
			$sql = mysql_query("SELECT * FROM noticias WHERE not_codigo = '".$_GET['codigo']."'");
			while($row = mysql_fetch_array($sql))
			{
				$foto = $row['not_foto'];

			}
	
			unlink("uploads/img_not/".$foto);
	
			$sql = mysql_query("DELETE FROM noticias WHERE not_codigo = '".$_GET['codigo']."'");
	
			//header("Location: usuadm.php?pa=ver_noticias&acao=listar");
		}
                function noticias_pesquisar(){
                        $busca = $_POST['busca'];
                        $sql =("SELECT * FROM noticias WHERE NOT_TITULO like'%$busca%' or NOT_NOTICIA like'%$busca%'");
                        $this->resultado = $this->con->banco->Execute($sql);
           }

	
	}
?>
<?php }} ?>