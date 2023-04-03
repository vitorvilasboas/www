<?php
                  require 'Connections/conecta.php'; 
                  $sql = "select part_usu_codigo as valor from caixa where part_ano='2015' and part_usu_codigo=".$_REQUEST['part_usu_codigo'];
                  $resultado = $con->banco->Execute($sql);
                  $registros = $resultado->FetchNextObject();
                        
                  
                     if(empty($registros)){                 
                            $sql_cred="insert into caixa  values ('".$_REQUEST['part_cred_codigo']."','".$_REQUEST['part_usu_codigo']."','".$_REQUEST['part_valor_pago']."','".date('d/m/Y H:m:s')."','".date('Y')."')";
                            if($resultado = $con->banco->Execute($sql_cred)){
							     foreach($_POST['minicursos'] as $cont => $minicurso) {
								 $sql_situacao = "update itens_minicursos set IC_SITUACAO='Credenciado' WHERE IC_USU_CODIGO='".$_REQUEST['part_usu_codigo']."' and IC_MCSO_CODIGO='$minicurso'";
								 $resultado_situacao = $con->banco->Execute($sql_situacao);
								 }
                            alerta("Cadastro Realizado com sucesso");
                            echo "<meta http-equiv='refresh' content='0;URL=usuadm.php?pa=credenciamento'>";
                        }else{
                            alerta("Não foi cadastrado");
                            echo "<meta http-equiv='refresh' content='0;URL=usuadm.php?pa=credenciamento'>";
                        }
                      } else {
                          alerta("O usuario já realizou o credenciamento");
                          echo "<meta http-equiv='refresh' content='0;URL=usuadm.php?pa=credenciamento'>";
                      
                      }
           
                  
?>
