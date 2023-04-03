<?php
                  require 'Connections/conecta.php'; 
                  $data = date('Y');
                  $sql = "select part_usu_codigo as valor from caixa where PART_ANO = '$data' and part_usu_codigo=".$_REQUEST['part_usu_codigo'];
                  $resultado = $con->banco->Execute($sql);
                  $registros = $resultado->FetchNextObject();
                        
                  
                     if(empty($registros)){
                            $credenciador = $_REQUEST['part_cred_codigo'];
							$usuario = $_REQUEST['part_usu_codigo'];
							$valor = $_REQUEST['part_valor_pago'];
							
							
                            $sql_cred="insert into caixa  values ('$credenciador','$usuario','$valor','$data')";
                            if($resultado = $con->banco->Execute($sql_cred)){
							     foreach($_POST['minicursos'] as $cont => $minicurso) {
								 $sql_situacao = "update itens_minicursos set IC_SITUACAO='Pago' WHERE IC_USU_CODIGO='$usuario' and IC_MCSO_CODIGO='$minicurso'";
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
