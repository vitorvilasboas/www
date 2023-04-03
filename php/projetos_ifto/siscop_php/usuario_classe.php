<?php
include 'conecta.php';

class usuario_classe 
{
      var $resultado;
      var $resultado2;
      var $registros;
      var $opcao;
      var $tudocerto = null;
      
      function usuario_classe()
      {
          $this->con = new conexao();
      }

        
      function alterar_senha()
      {
          $sql=("select * from usuario where usu_codigo='".$_SESSION['on_codigo']."'");
          $this->resultado= $this->con->banco->Execute($sql);
          if($this->registros=$this->resultado->FetchNextObject()){
              $senha=$this->registros->USU_SENHA;
              if(($senha)==(md5($_REQUEST['cmp_satual']))){
                  $sql=("update usuario set USU_SENHA='".md5($_REQUEST['cmp_snova1'])."' where usu_codigo='".$_SESSION['on_codigo']."'");
                  if($this->resultado= $this->con->banco->Execute($sql)){
                     $_SESSION['on_senha']=md5($_REQUEST['cmp_snova1']);
                        header("location: sair_alterarsenha.php");
                  }
              } else {
                    ?>
                    <script>alert('Alteração NÃO pode ser realizada, a senha atual informada está incorreta!\nTente Novamente!');</script>
                    <?php
                    return false;
              }
          }
      }
          
      function excluir()
      {
        $sql=("delete from usuario where USU_CODIGO=".$_GET['usu_codigo']);
            if($this->resultado= $this->con->banco->Execute($sql))
            {
                ?>
                    <script>
                                alert('Usuário excluido com Sucesso!');
                    </script>
                <?php
                return true;
            }
            else
            {
                ?>
                    <script>
                                alert('Exclusão não efetuada!<br>O usuário não pode ser excluido por que possui requisições cadastradas!');
                    </script>
                <?php
                return false;
            }
      }
      
      function buscar()
      {
          if($_REQUEST['cmp_siape_usu']!="" && $_REQUEST['cmp_siape_usu']!=" "){
              $sql=("select * from usuario where usu_siape=".$_REQUEST['cmp_siape_usu']);
          } else if($_REQUEST['cmp_cod_usu']!="" && $_REQUEST['cmp_cod_usu']!=" "){
              $sql=("select * from usuario where usu_codigo=".$_REQUEST['cmp_cod_usu']);
          } else if($_REQUEST['cmp_cpf_usu']!="" && $_REQUEST['cmp_cpf_usu']!=" "){
              $sql=("select * from usuario where usu_cpf='".$_REQUEST['cmp_cpf_usu']."'");
          }
          $this->resultado= $this->con->banco->Execute($sql);
          $this->resultado2= $this->con->banco->Execute($sql);    
      }
      
      function buscar_alterar()
      {
          $sql=("select * from usuario where USU_CODIGO='".$_GET['usu_codigo']."'");
          $this->resultado= $this->con->banco->Execute($sql);
          $this->registros= $this->resultado->FetchNextObject();
      }
      
      function bd_alterar()
      {
          //verificando se cpf já existe... bloqueando F5 (reenvio de formulário)
          $sql=("select * from usuario where usu_cpf='".$_REQUEST['cp_cpf']."' and usu_codigo<>".$_GET['usu_codigo']);
          $this->resultado= $this->con->banco->Execute($sql);
          if($this->registros=$this->resultado->FetchNextObject()){        
              ?>
                    <script>
                                alert('Usuário com este CPF já cadastrado no sistema!');
                    </script>
                <?php
                $_SESSION['verificaAlt']='0';
              return false;
          } 
          else {
              $sql=("select * from usuario where usu_siape='".$_REQUEST['cp_siape']."' and usu_codigo<>".$_GET['usu_codigo']);
              $this->resultado= $this->con->banco->Execute($sql);
              if($this->registros=$this->resultado->FetchNextObject()){
                  ?>
                <script>
                                alert('Usuário com este SIAPE já cadastrado no sistema!');
                            </script>
                <?php
                $_SESSION['verificaAlt']='0';
              return false;
              } else {
                $sql=("select * from usuario where usu_login='".$_REQUEST['cp_login']."' and usu_codigo<>".$_GET['usu_codigo']);
                $this->resultado= $this->con->banco->Execute($sql);
                if($this->registros=$this->resultado->FetchNextObject()){
                    ?>
                    <script>
                                alert('O login informado já está sendo utilizado por outro usuário!');
                    </script>
                    <?php
                    $_SESSION['verificaAlt']='0';
                    return false;
                } else {                       
                    $sql=("select * from departamento where dep_nome='".$_REQUEST['campo_lotacao']."'");//obtendo o código do departamento de lotação para inserção na tupla do usuário
                    $this->resultado0=$this->con->banco->Execute($sql);
                    while($this->registros0=$this->resultado0->FetchNextObject()){
                        if($_REQUEST['reset_senha']=="SIM"){
                            //inserindo os dados na tabela usuário
                            $sql=("update usuario set DEP_CODIGO='".$this->registros0->DEP_CODIGO."', USU_NOME='".$_REQUEST['cp_nome']."', USU_CPF='".$_REQUEST['cp_cpf']."', USU_SIAPE='".$_REQUEST['cp_siape']."', USU_PERMISSAO='".$_REQUEST['campo_permissao']."', USU_EMAIL='".$_REQUEST['cp_email']."', USU_LOTACAO='".$_REQUEST['campo_lotacao']."', USU_FUNCAO='".$_REQUEST['cp_funcao']."', USU_LOGIN='".$_REQUEST['cp_login']."', USU_SENHA='".md5($_REQUEST['cp_siape'])."' where USU_CODIGO=".$_GET['usu_codigo']);
                            if($this->resultado2= $this->con->banco->Execute($sql)){
                                        ?>
                            <script>
                                alert('Usuário Alterado com Sucesso!');
                            </script>
                            
                            <?php
                                $_SESSION['verificaAlt']='1';
                                return true;
                            } else {
                                $_SESSION['verificaAlt']='0';
                                return false;
                            }
                        } else {
                            //inserindo os dados na tabela usuário
                            $sql=("update usuario set DEP_CODIGO='".$this->registros0->DEP_CODIGO."', USU_NOME='".$_REQUEST['cp_nome']."', USU_CPF='".$_REQUEST['cp_cpf']."', USU_SIAPE='".$_REQUEST['cp_siape']."', USU_PERMISSAO='".$_REQUEST['campo_permissao']."', USU_EMAIL='".$_REQUEST['cp_email']."', USU_LOTACAO='".$_REQUEST['campo_lotacao']."', USU_FUNCAO='".$_REQUEST['cp_funcao']."', USU_LOGIN='".$_REQUEST['cp_login']."' where USU_CODIGO=".$_GET['usu_codigo']);
                            if($this->resultado2= $this->con->banco->Execute($sql)){
                                        ?>
                            <script>
                                alert('Usuário Alterado com Sucesso!');
                            </script>
                            <?php
                                $_SESSION['verificaAlt']='1';
                                return true;
                            } else {
                                $_SESSION['verificaAlt']='0';
                                return false;
                            } 
                        }
                    }
                }    
            }
         }
      }
      
      function cadastrar1()
      {
          //verificando se cpf já existe... bloqueando F5 (reenvio de formulário)
          $sql=("select * from usuario where usu_cpf='".$_REQUEST['cp_cpf']."' or usu_siape=".$_REQUEST['cp_siape']);
          $this->resultado= $this->con->banco->Execute($sql);
          if($this->registros=$this->resultado->FetchNextObject()){        
              ?>
                <script>
                    alert('Usuário com este CPF/SIAPE já cadastrado no sistema!');
                </script>
                
                <!--<br>
                <center><font class="fonte_msg_erro"><b>Usuário com este CPF/SIAPE já cadastrado no sistema!</b></font></center>
                <br>-->
                <?php
                $_SESSION['verificaCadastro']='0';
              return false;
          } else {
              $sql=("select * from usuario where usu_login='".$_REQUEST['cp_login']."'");
              $this->resultado= $this->con->banco->Execute($sql);
              if($this->registros=$this->resultado->FetchNextObject()){
                  ?>
                <script>
                    alert('O login informado já está sendo utilizado por outro usuário!');
                </script>
                <?php
                $_SESSION['verificaCadastro']='0';
              return false;
            } else {                       
              $sql=("select * from departamento where dep_nome='".$_REQUEST['campo_lotacao']."'");//obtendo o código do departamento de lotação para inserção na tupla do usuário
              $this->resultado0=$this->con->banco->Execute($sql);
              while($this->registros0=$this->resultado0->FetchNextObject()){
                //inserindo os dados na tabela usuário
                $sql=("insert into usuario(dep_codigo,usu_nome,usu_cpf,usu_siape,usu_permissao,usu_email,usu_lotacao,usu_funcao,usu_login,usu_senha) values  ('".$this->registros0->DEP_CODIGO."','".$_REQUEST['cp_nome']."','".$_REQUEST['cp_cpf']."','".$_REQUEST['cp_siape']."','".$_REQUEST['campo_permissao']."','".$_REQUEST['cp_email']."','".$_REQUEST['campo_lotacao']."','".$_REQUEST['cp_funcao']."','".$_REQUEST['cp_login']."','".md5($_REQUEST['cp_siape'])."')");
                if($this->resultado2= $this->con->banco->Execute($sql)){
                            ?>
                <script>
                    alert('Usuário Cadastrado com Sucesso!');
                </script>
                <?php
                    $_SESSION['verificaCadastro']='1';
                    $this->tudocerto = '1ok';
                    return true;
                } else {
                    return false;
                }
              }          
          }
        }    
      }
      
      function cadastrar2(){
          //verificando se cpf já existe... bloqueando F5 (reenvio de formulário)
          if($this->tudocerto=='1ok'){
            $sql=("select * from usuario where usu_codigo=(select max(usu_codigo) from usuario)");//obtendo o código do usuário que acabou de ser gravado para atualizar as tabelas específicas
            $this->resultado3=$this->con->banco->Execute($sql);
            while($this->registros3=$this->resultado3->FetchNextObject()){
                if($_REQUEST['campo_perfil']=='administrativo'){
                    $sql=("insert into administrativo (usu_codigo,adm_cargo) values ('".$this->registros3->USU_CODIGO."','".$_REQUEST['cp_cargo']."')");//inserindo na tabela administrativo
                    if($this->resultado2= $this->con->banco->Execute($sql)){      
                        //echo "\nTabela Administrativo atualizada.\n";
                        $this->tudocerto = '2ok';
                        return true;
                    } else {
                        return false;
                    }           
                }   else {
                    $sql=("insert into professor (usu_codigo,prof_area) values ('".$this->registros3->USU_CODIGO."','".$_REQUEST['cp_area']."')");//inserindo na tabela professor
                    if($this->resultado6= $this->con->banco->Execute($sql)){
                        //echo "\nTabela Professor aualizada!\n";
                        $this->tudocerto = '2ok';
                        return true;
                    } else {
                        return false;
                    }
                }

            }
          }
      }
      
      function cadastrar3(){
          if($this->tudocerto=='2ok'){
          //verificando se cpf já existe... bloqueando F5 (reenvio de formulário)
            $sql=("select * from usuario where usu_codigo=(select max(usu_codigo) from usuario)");//obtendo o código do usuário que acabou de ser gravado para atualizar as tabelas específicas
            $this->resultado3=$this->con->banco->Execute($sql);
            while($this->registros3=$this->resultado3->FetchNextObject()){
                if($_REQUEST['campo_perfil']=='administrativo'){            
                    $sql=("select * from administrativo where adm_codigo=(select max(adm_codigo) from administrativo)");//obtendo o código do administrativo que acabou de ser gravado para atualizar a tabela usuário
                    $this->resultado4=$this->con->banco->Execute($sql);
                    while($this->registros4=$this->resultado4->FetchNextObject()){
                        $sql=("update usuario set adm_codigo=".$this->registros4->ADM_CODIGO." where usu_codigo=".$this->registros3->USU_CODIGO);//atualizando a tabela usuário com o código do administrativo
                        if($this->resultado4= $this->con->banco->Execute($sql)){
                            //echo "\nTabela Usuário atualizada completamente.";
                            return true;
                        }   else {
                            return false;
                        }
                    }
                }   else {
                    $sql=("select * from professor where prof_codigo=(select max(prof_codigo) from professor)");//obtendo o código do professor que acabou de ser gravado para atualizar a tabela usuário
                    $this->resultado5=$this->con->banco->Execute($sql);
                    while($this->registros5=$this->resultado5->FetchNextObject()){
                        $sql=("update usuario set prof_codigo=".$this->registros5->PROF_CODIGO." where usu_codigo=".$this->registros3->USU_CODIGO); //atualizando a tabela usuário com o código do professor
                        if($this->resultado4= $this->con->banco->Execute($sql)){
                            //echo "\nTabela Usuário atualizada completamente.\n";
                            return true;
                        }   else {
                            return false;
                        }
                    }
                }
            }
          }
      }
      
      function relatorio_usuarios(){
          if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from usuario where dep_codigo=".$this->registros->DEP_CODIGO." ORDER BY usu_codigo ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from usuario where usu_codigo='8000000800'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else {
              $sql=("select * from usuario where usu_permissao<>'Root' ORDER BY usu_codigo ASC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      
}

?>
