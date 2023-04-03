<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$session['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
   <div id="pagina">
       <h1 class="titulo1"> Emissão de Certificados</h1>
       <h3 class="titulo2">O Certificado emitido para:<br /><br />
       <?php
       require 'Connections/conecta.php';           
       //$cert_data=date('d/m/Y');
        $cert_data='23/02/2015';
       foreach($_POST['usuarios'] as $cont => $usuario){
            $sql=("insert into certificados(cert_data,cert_usu_codigo,cert_mcso_codigo) values ('$cert_data','$usuario','".$_POST['curso']."')");
            if($resultado=$con->banco->Execute($sql)){
                  $sql = "update usuarios set USU_STATUS='confirmado' WHERE USU_CODIGO=".$usuario;
	          $resultado = $con->banco->Execute($sql);
                  echo '<div class="titulo">';
                            
                           $sql = "select usu_nome from usuarios where usu_codigo=".$usuario;
                           $resultado=$con->banco->Execute($sql);
                           if($registros = $resultado->FetchNextObject()){
                               echo '<img src="imagens/b_usrcheck.png" />  '.$registros->USU_NOME;
                          }                            
                  
            }else{ 
                  echo '<div class="image_error">
                            <h3>O Certificado não foi emitido!</h3> 
                        </div>';
            }
       }
       echo   '</h3> 
                <h3><a href="usuadm.php?pa=usuarios_acao&acao=emitir">Voltar e emitir outro!</a></h3>
              </div>';
       ?>
           <br />
           <br />
    </div>
<?php 
   }
}
 ?>