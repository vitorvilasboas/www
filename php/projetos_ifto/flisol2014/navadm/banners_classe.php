<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
<?php
include 'Connections/conecta.php';

class banners_classe {
          var $resultado;
	  var $registros;
          var $opcao;
	  	  	  
	  function banners_classe(){
                $this->con = new conexao();
	  }
	  function listar(){    
                $sql = "select * from banners";
                $this->resultado = $this->con->banco->Execute($sql);
	  }
	  function excluir(){
                $sql = "delete from banners where BAN_CODIGO = ".$_REQUEST['ban_codigo'];
                if($this->resultado = $this->con->banco->Execute($sql))
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
	  function gravar_incluir(){
                  //codigo para envio da imagem para o servidor
		   //define os tipos de arquivos que será aceito
		   $tipos_arquivos = array(".jpg",".JPG",".gif",".GIF",".png",".PNG");
		   //pega o nome do arquivo escolhido
		   $nome_arquivo = $_FILES['ban_nome']['name'];
                   //pega a extensao (tipo do arquivo que deverá ser jpg gif png)
		   $tipo = strrchr($nome_arquivo,".");
		   if (in_array($tipo,$tipos_arquivos))
		   {
			     if (move_uploaded_file($_FILES['ban_nome']['tmp_name'],"uploads/banners/".$nome_arquivo))	
				 {
				  $sql = ("insert into banners (ban_imagem,ban_link) values ('$nome_arquivo','".$_REQUEST['ban_link']."')");
                                  if ($this->resultado = $this->con->banco->Execute($sql)){
                                         alerta("Cadastro Realizado com sucesso");
                                         return true;
                                   }
                                   else{
                                         alerta("Não foi cadastrado");
                                         return false;
                                 }
				 }
		   }
	   }
	  	
     }

?>
<?php }} ?>