<?php
include 'conecta.php';

class requisicao_classe 
{
      var $resultado;
      var $resultado2;
      var $registros;
      var $opcao;
       
      function requisicao_classe()
      {
          $this->con = new conexao();
      }

      function listar_por_usuario()
      {
          $sql=("select * from requisicao where usu_codigo='".$_SESSION['on_codigo']."' ORDER BY req_codigo DESC");
          $this->resultado= $this->con->banco->Execute($sql);
          $this->resultado2= $this->con->banco->Execute($sql);
      }
      
      function listar_todas()
      {
          if($_SESSION["on_permissao"]=="Root"){
              $sql=("select * from requisicao ORDER BY req_codigo DESC");
          } else if($_SESSION["on_permissao"]=="Avaliador"){
              $sql=("select * from requisicao ORDER BY req_codigo DESC");
          } else if($_SESSION["on_permissao"]=="Requerente"){
              $sql=("select * from requisicao where usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
          } else if($_SESSION["on_permissao"]=="Reprografia"){
              $sql=("select * from requisicao where req_status='Autorizado' or req_status='Impresso' ORDER BY req_codigo DESC");
          }
          $this->resultado= $this->con->banco->Execute($sql);
          $this->resultado2= $this->con->banco->Execute($sql);  
      }
          
      function cancelar()
      {
                $sql=("update requisicao set REQ_STATUS='Cancelado', REQ_AUT='".$_SESSION['on_codigo']."'  where REQ_CODIGO=".$_REQUEST['req_codigo']);
                if($this->resultado= $this->con->banco->Execute($sql))
                {
                            ?>
                    <script>
                    alert('A requisição foi cancelada!');
                    </script>
                    <!--<br>
                    <center><font class="fonte_msg_ok"><b>A requisição foi cancelada!</b></font></center>
                    <br>-->
                    <?php
                    return true;
                }
                else
                {
                            ?>
                    <script>
                    alert('Erro! Problemas no cancelamento da requisição!');
                    </script>
                    <?php
                    return false;
                }
      }

      function cadastrar()
      {
           $data=$_REQUEST['data1'];
           $data = explode("/", $data);
           list($dia, $mes, $ano) = $data;
           $data = "$ano/$mes/$dia";
            if(isset($_SESSION['req_atual_just'])){//verificação inicial... cadastro da primeira requisição da sessão inicial... evita o warning de criação das sessions logo abaixo
                if(($_SESSION['req_atual_just']==$_REQUEST['cmp_justificativa'])&&($_SESSION['req_atual_mncops']==($_REQUEST['cmp_ncopias']))&&($_SESSION['req_atual_msg']==$_REQUEST['cmp_msg'])&&($_SESSION['req_atual_status']=='Aguardando')){
                    return false;
                } else {
                    //$_UP['pasta'] = "arquivos/";
                    $nome_arq = "";
                    if(($_FILES['cmp_arquivo']['name']) != ''){
                        $nome_arq = $_SESSION['on_codigo']."_".$_FILES['cmp_arquivo']['name'];
                    }
                   // if(($_FILES['cmp_arquivo']['size'] < 2048000)){
                    move_uploaded_file($_FILES['cmp_arquivo']['tmp_name'], "arquivos/".$nome_arq);
                    $sql=("insert into requisicao(usu_codigo,req_dep,req_data,req_tcopias,req_status,req_just,req_mnpags,req_mncops,req_end,req_msg,req_dtentrega) values ('".$_SESSION['on_codigo']."',".$_SESSION['on_usu_dep'].",NOW(),'".(($_REQUEST['cmp_ncopias'])*($_REQUEST['cmp_npag']))."','Aguardando','".$_REQUEST['cmp_justificativa']."','".$_REQUEST['cmp_npag']."','".$_REQUEST['cmp_ncopias']."','$nome_arq','".$_REQUEST['cmp_msg']."','".$data."')");
                    if($this->resultado= $this->con->banco->Execute($sql)){
                        $sql=("select * from requisicao where req_codigo=(select max(req_codigo) from requisicao)");
                        $this->resultado2=$this->con->banco->Execute($sql);
                        while($this->registros=$this->resultado2->FetchNextObject()){
                            $_SESSION['req_atual_data']=$this->registros->REQ_DATA;
                            $_SESSION['req_atual_just']=$this->registros->REQ_JUST;
                            $_SESSION['req_atual_mncops']=$this->registros->REQ_MNCOPS;
                            $_SESSION['req_atual_msg']=$this->registros->REQ_MSG;
                            $_SESSION['req_atual_status']=$this->registros->REQ_STATUS;
                        }
                        ?>
                    <script>
                    alert('Requisição Cadastrada com Sucesso!');
                    </script>
                <?php
                        return true;    
                    } else {
                        ?>
                    <script>
                    alert('Erro! Problemas na gravação da requisição!');
                    </script>
                <?php
                        return false;
                    }
                 /* } else {//if tamanho
                        ?>
                        <br>
                        <center><font class="fonte_msg_erro"><b>Cadastro NÃO EFETUADO! Somente são permitidos arquivos com no maximo 2MB!</b></font></center>
                        <br>
                        <?php
                        return false;
                  }*/
                }
            } else {
                //if(($_FILES['cmp_arquivo']['size'] < 2048000)){
                    $_UP['pasta'] = 'arquivos/';
                    $nome_arq = $_SESSION['on_siape']."_".$_FILES['cmp_arquivo']['name'];
                    move_uploaded_file($_FILES['cmp_arquivo']['tmp_name'], "arquivos/".$nome_arq);
                    $sql=("insert into requisicao(usu_codigo,req_dep,req_data,req_tcopias,req_status,req_just,req_mnpags,req_mncops,req_end,req_msg,req_dtentrega) values ('".$_SESSION['on_codigo']."',".$_SESSION['on_usu_dep'].",NOW(),'".(($_REQUEST['cmp_ncopias'])*($_REQUEST['cmp_npag']))."','Aguardando','".$_REQUEST['cmp_justificativa']."','".$_REQUEST['cmp_npag']."','".$_REQUEST['cmp_ncopias']."','$nome_arq','".$_REQUEST['cmp_msg']."','".$data."')");
                    if($this->resultado= $this->con->banco->Execute($sql)){
                        $sql=("select * from requisicao where req_codigo=(select max(req_codigo) from requisicao)");
                        $this->resultado2=$this->con->banco->Execute($sql);
                        while($this->registros=$this->resultado2->FetchNextObject()){
                            $_SESSION['req_atual_data']=$this->registros->REQ_DATA;
                            $_SESSION['req_atual_just']=$this->registros->REQ_JUST;
                            $_SESSION['req_atual_mncops']=$this->registros->REQ_MNCOPS;
                            $_SESSION['req_atual_msg']=$this->registros->REQ_MSG;
                            $_SESSION['req_atual_status']=$this->registros->REQ_STATUS;
                        }
                    ?>
                    <script>
                    alert('Requisição Cadastrada com Sucesso!');
                    </script>
                    <?php
                        return true;    
                    } else {
                                ?>
                    <script>
                    alert('Erro! Problemas na gravação da requisição!');
                    </script>
                    <?php
                        return false;
                    }
               /* } else {//if tamanho
                        ?>
                        <br>
                        <center><font class="fonte_msg_erro"><b>Cadastro NÃO EFETUADO! Somente são permitidos arquivos com no maximo 2MB!</b></font></center>
                        <br>
                        <?php
                        return false;
                  }*/
            }
      }
           
      function autorizar()
          {
                $sql=("update requisicao set REQ_STATUS='Autorizado', REQ_AUT='".$_SESSION['on_codigo']."'  where REQ_CODIGO='".$_GET['req_codigo']."'");
                $this->resultado= $this->con->banco->Execute($sql);
                ?>
                <script>
                    alert('Requisição Autorizada!');
                </script>
                <?php
          }
      
      function rejeitar()
          {
                $sql=("update requisicao set REQ_STATUS='Rejeitado', REQ_AUT='".$_SESSION['on_codigo']."'  where REQ_CODIGO='".$_GET['req_codigo']."'");
                $this->resultado= $this->con->banco->Execute($sql);
                ?>
                <script>
                    alert('Requisição Rejeitada!');
                </script>
                <?php
          }
      
      function imprimir()
        {
            $sql=("update requisicao set REQ_STATUS='Impresso'  where REQ_CODIGO='".$_GET['req_codigo']."'");
            $this->resultado= $this->con->banco->Execute($sql);
                ?>
                <script>
                    alert('Status da Requisição alterado para IMPRESSO!');
                </script>
                <?php
        }
      
      function detalhar()
        {
            if($_SESSION['on_permissao']=="Requerente"){
                $sql=("select * from requisicao where req_codigo='".$_GET['req_codigo']."' and usu_codigo='".$_SESSION['on_codigo']."'");
                $this->resultado= $this->con->banco->Execute($sql);
                $this->resultado2= $this->con->banco->Execute($sql);
            } else if($_SESSION['on_permissao']=="Avaliador"){
                $sql=("select * from requisicao where req_codigo='".$_GET['req_codigo']."'");
                $this->resultado= $this->con->banco->Execute($sql);
                $this->resultado2= $this->con->banco->Execute($sql);
            } else if($_SESSION['on_permissao']=="Reprografia"){
                $sql=("select * from requisicao where req_codigo='".$_GET['req_codigo']."' and req_status='Autorizado'");
                $this->resultado= $this->con->banco->Execute($sql);
                $this->resultado2= $this->con->banco->Execute($sql);
            } else {
                $sql=("select * from requisicao where req_codigo='".$_GET['req_codigo']."'");
                $this->resultado= $this->con->banco->Execute($sql);
                $this->resultado2= $this->con->banco->Execute($sql);
            }
        }
      
      function listar_por_status()
        {
          if($_SESSION['on_permissao']=="Root"){
              $sql=("select * from requisicao where req_status='Autorizado' or req_status='Aguardando' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
          } else if($_SESSION['on_permissao']=="Reprografia"){
              $sql=("select * from requisicao where req_status='Autorizado' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
          } else if($_SESSION['on_permissao']=="Avaliador"){
              $sql=("select * from requisicao where req_status='Aguardando' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
          } 
        } 
      
      function buscar_alterar()
      {
          $sql=("select * from requisicao where REQ_CODIGO='".$_GET['req_codigo']."'");
          $this->resultado= $this->con->banco->Execute($sql);
          $this->registros= $this->resultado->FetchNextObject();
      } 
      
      function bd_alterar()
      {
            $data2=$_REQUEST['data1'];
            $data2 = explode("/", $data2);
            list($dia2, $mes2, $ano2) = $data2;
            $data2 = "$ano2/$mes2/$dia2";
            if(!($_FILES['cmp_arquivo']['size'] > 2048000)){
            if(($_FILES['cmp_arquivo']['name']) != ''){
                $nome_arq = $_SESSION['on_codigo']."_".$_FILES['cmp_arquivo']['name'];
                move_uploaded_file($_FILES['cmp_arquivo']['tmp_name'], "arquivos/".$nome_arq);
                $sql=("update requisicao set REQ_JUST='".$_REQUEST['cmp_justificativa']."', REQ_DTENTREGA='".$data2."', REQ_MSG='".$_REQUEST['cmp_msg']."', REQ_END='$nome_arq' where REQ_CODIGO=".$_GET['req_codigo']);  
            } else {
                $sql=("update requisicao set REQ_JUST='".$_REQUEST['cmp_justificativa']."', REQ_DTENTREGA='".$data2."', REQ_MSG='".$_REQUEST['cmp_msg']."' where REQ_CODIGO=".$_GET['req_codigo']);  
            }
            if($this->resultado=$this->con->banco->Execute($sql)){
                ?>
                    <script>
                    alert('Requisição Alterada com Sucesso!');
                    </script>
                <?php
                return true;
            } else {
                ?>
                    <script>
                    alert('Requisição Não alterada! Ocorreu um erro!');
                    </script>
                <?php
                return false;
            }
                  } else {//if tamanho
                        ?>
                        <script>
                        alert('Alteração NÃO EFETUADA! Somente são permitidos arquivos com no maximo 2MB!');
                        </script>
                        <?php
                        return false;
                  }
      }
      
      function buscar()
      {
              $sql=("select * from requisicao where req_codigo=".$_REQUEST['cmp_cod_req']);
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);    
      }
}
?>
