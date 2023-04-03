<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$session['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
   <div id="pagina">
       <?php
       require 'Connections/conecta.php';           
       $cert_data=date('d/m/Y');
       $usuario=$_POST['codigo']; 
       foreach($_POST['minicursos'] as $cont => $minicurso){
            $sql=("insert into certificados(cert_data,cert_usu_codigo,cert_mcso_codigo) values ('$cert_data',$usuario,$minicurso)");
            if($resultado=$con->banco->Execute($sql)){
                  $sql = "update usuarios set USU_STATUS='confirmado' WHERE USU_CODIGO=".$usuario;
	          $resultado = $con->banco->Execute($sql);
                  echo '<div class="image_error">
                            <h3>O Certificado foi emitido com sucesso!</h3> 
                            <h3><a href="usuadm.php?pa=usuarios_acao&acao=emitir">Voltar e emitir outro!</a></h3>
                        </div>';
            }else{ 
                  echo '<div class="image_error">
                            <h3>O Certificado não foi emitido!</h3> 
                            <h3><a href="usuadm.php?pa=usuarios_acao&acao=emitir">Voltar e emitir outro!</a></h3>
                        </div>';
            }
       }
       ?>
    </div>
<?php 
   }
}
 ?>