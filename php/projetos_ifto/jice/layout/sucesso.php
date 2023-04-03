<div id="pagina">                 
    <div class="image_error">
       <h3><?php 
       require 'Connections/conecta.php';
       $sql = "select * from artigos";
       $resultado = $con->banco->Execute($sql);
       while($registros = $resultado->FetchNextObject()){
         echo  $cod = $registros->ART_CODIGO;
         echo  $cpf1 =  mask($registros->CPF_USUARIO);
         echo  $cpf2 =  mask($registros->CPF_APRESENTADOR);
         echo  $cpf3 =  mask($registros->CPF_AUTOR1);
         echo  $cpf4 =  mask($registros->CPF_AUTOR2);
         echo  $cpf5 =  mask($registros->CPF_AUTOR3);
         echo  $cpf6 =  mask($registros->CPF_AUTOR4);
         echo  $cpf7 =  mask($registros->CPF_AUTOR5);
         echo  $cpf8 =  mask($registros->CPF_AUTOR6);
         echo '<br />'  ;
           $sql3 = "update artigos set cpf_usuario='$cpf1',cpf_apresentador= '$cpf2',cpf_autor1 = '$cpf3',cpf_autor2 = '$cpf4',cpf_autor3 = '$cpf5',cpf_autor4 = '$cpf6',cpf_autor5 = '$cpf7',cpf_autor6 = '$cpf8' where art_codigo = '$cod' ";
           if($resultado2 = $con->banco->Execute($sql3)){
               echo 'alterado';
           }
       }
       ?>
       </h3>  
    </div>
</div>