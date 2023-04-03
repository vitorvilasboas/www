<div id="pagina">
    <div class="home">
        <?php
        @session_start();     
if((!$_SESSION['email'])&&(!$_SESSION['senha'])&&(!($_SESSION['atribuicao']))){
        require('index.php');
} else { 
   if($_SESSION['atribuicao']=='Representante'){
       require "Connections/conecta.php";
       $sql="SELECT * from equipe where eqp_curso='".$_SESSION['curso']."' and eqp_periodo='".$_SESSION['periodo']."'";
       $resultado = $con->banco->Execute($sql);
       if($registros = $resultado->FetchNextObject()){
           alerta($_SESSION['nome'].", você já inscreveu uma equipe para o ".$_SESSION['periodo']." Periodo de ".$_SESSION['curso'].".");
       } else {
        if(isset($_POST['inscrever'])){
                $sql_musica="SELECT * from equipe where eqp_musica='".$_REQUEST['eqp_musica']."'";
                $resultado = $con->banco->Execute($sql_musica);
                if($registros = $resultado->FetchNextObject()){
                    alerta("Uma música com este título já está cadastrada. Escolha outra música e tente novamente mais tarde.");
                }else{
                    $sql_cad_equipe  = "INSERT into equipe (eqp_curso,eqp_periodo,eqp_tematica,eqp_professor,eqp_video,eqp_musica,eqp_autor_mus) VALUES ('".$_REQUEST['eqp_curso']."','".$_REQUEST['eqp_periodo']."','".$_REQUEST['eqp_tematica']."','".$_REQUEST['eqp_professor']."','".$_REQUEST['eqp_video']."','".$_REQUEST['eqp_musica']."','".$_REQUEST['eqp_autor_musica']."')";
                    if($resultado = $con->banco->Execute($sql_cad_equipe)){
                        $sql_set_eqp_int="SELECT * from equipe where eqp_curso='".$_REQUEST['eqp_curso']."' and eqp_periodo='".$_SESSION['periodo']."'";
                        $resultado = $con->banco->Execute($sql_set_eqp_int);
                        if($registros = $resultado->FetchNextObject()){
                             $sql_atualiza="update integrante set int_eqp_codigo='".$registros->EQP_CODIGO."' where int_email ='".$_SESSION['email']."'";
                             $resultado = $con->banco->Execute($sql_atualiza);
                             $_SESSION['int_eqp_codigo2'] = $registros->EQP_CODIGO;
                             $qtd_integrantes=2;
                             $saida=0;
                             while(($qtd_integrantes <= 50) /*&& ($saida==0)*/){
                                 if(isset($_REQUEST['int_'.$qtd_integrantes.'_nome'])){
                                    //alerta("Tem  ".$_REQUEST['int_'.$qtd_integrantes.'_nome']);
                                    $sql_novo_int  = "INSERT into integrante (int_nome,int_curso,int_periodo,int_atribuicao,int_eqp_codigo) VALUES ('".$_REQUEST['int_'.$qtd_integrantes.'_nome']."','".$_REQUEST['int_'.$qtd_integrantes.'_curso']."','".$_REQUEST['int_'.$qtd_integrantes.'_periodo']."','".$_REQUEST['int_'.$qtd_integrantes.'_atribuicao']."','".$registros->EQP_CODIGO."')";
                                    $resultado = $con->banco->Execute($sql_novo_int);  
                                /*} else {
                                    $saida=1;
                                    alerta("CADASTRADO.");*/
                               }
                                $qtd_integrantes++;
                            }
                         //require 'navcom/equipe_comprovante_pdf.php';
                         }
                    } else {
                        alerta("Ocorreu um problema durante o cadastro da equipe. Tente novamente mais tarde.");
                    }
                }
            }
  }
}
require 'navcom/equipe_comprovante_pdf.php';
}
            ?>
    </div>
</div>