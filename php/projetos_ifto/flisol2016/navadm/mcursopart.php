<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
    <div id="pagina">
     <?php
         require 'Connections/conecta.php';                
         $usuario=$_REQUEST['codigo'];                 
         foreach($_POST['minicursos'] as $cont => $minicurso) { //abre o loop do array da lista de minicursos
             
             $sql_cont=("select count(*)as total from itens_minicursos where ic_usu_codigo='$usuario' and ic_mcso_codigo='$minicurso'");
             $resultado_cont = $con->banco->Execute($sql_cont);           
             foreach($resultado_cont as $chave => $linha){
                //contar quantas participação no mesmo minicurso o valor deve ser:                
	        $total = $linha['total'];
		}// 0 -> não está participando ou 1 -> está participando			
		if($total==0){//abre verificar se o usuario já está participando do minicurso
                    $sql_valida=("SELECT mcso_horario,mcso_vagas,mcso_cont_vagas from minicursos WHERE MCSO_CODIGO ='$minicurso'");
                    $resultado_valida = $con->banco->Execute($sql_valida);
                         foreach($resultado_valida as $linha){
                            $horario=$linha['mcso_horario'];                         
                            $vagas=$linha['mcso_vagas'];
                            $contador=$linha['mcso_cont_vagas'];
                         }
                         if($vagas>$contador){// Verifica se tem vagas
                               $sql_horario = ("SELECT mcso_horario FROM itens_minicursos 
                                                INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO
                                                INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO
                                                WHERE USU_CODIGO = '$usuario' and MCSO_HORARIO = '$horario'");
                               $resultado_horario = $con->banco->Execute($sql_horario);
                               foreach($resultado_horario as $linha2){/* busca por horarios iguais */}
                                      if(!isset($linha2['mcso_horario'])){ //se o resuldo for vazio, realiza a inserção no bd
                                            $sql=("insert into itens_minicursos (ic_usu_codigo,ic_mcso_codigo,ic_situacao) values ($usuario,$minicurso,'Aguardando')");
                                            if($resultado = $con->banco->Execute($sql)){//abre insert de itens_minicursos 
                                                $sql_minicursos=("select * from minicursos where MCSO_CODIGO='$minicurso'");
                                                $resultado = $con->banco->Execute($sql_minicursos);
                                                if($registro=$resultado->FetchNextObject()){//abre o atualizador do contador
                                                    $mcso_cont_vagas=$registro->MCSO_CONT_VAGAS;
                                                    $total=$mcso_cont_vagas + 1;
                                                    $sql_update ="UPDATE minicursos SET MCSO_CONT_VAGAS = '$total' WHERE MCSO_CODIGO ='$minicurso'";
                                                    $resultado = $con->banco->Execute($sql_update);
                                                }//echa o atualizador do contador                                  
                                                ?>
                                                <div class="minicurso_msg">
                                                    <h1>Mensagem de Alerta!</h1><br />
                                                    <p>O Cadastro do mini-curso nº <?php echo $minicurso;?> foi realizado com sucesso!</p> 
                                                    <p><a href="usuadm.php?pa=ver_minicursos">Veja os mini-cursos que você vai participar!</a></p>
                                               </div>
                                            <?php
                                            }//fecha a inserção de dados em itens_minicursos
                                            else{ // abre senão cadastrar itens_minicursos
                                            ?>
                                                <div class="minicurso_msg">
                                                    <h1>Mensagem de Alerta!</h1><br />
                                                    <p>Não foi cadastrado!</p> 
                                                    <p><a href="usuadm.php?pa=ver_minicursos">Veja os mini-cursos que você vai participar!</a></p>
                                                </div>
                                            <?php
                                            }//fecha o senão cadastrar itens_minicursos
                        
                                        }else{// se já estiver participando 
                                            ?>
                                            <div class="minicurso_msg">
                                                <h1>Mensagem de Alerta!</h1><br />
                                                 <p>Você já está cadastrado em outro minicurso no mesmo horário do <?php echo $minicurso;?></p>
                                                <p><a href="usuadm.php?pa=ver_minicursos">Veja os mini-cursos que você vai participar!</a></p>
                                            </div>
                                        <?php
                                        }// fecha Verifica se tem vagas
                                }else{//Se não haver vagas
                                        ?>
                                <div class="minicurso_msg"> 
                                    <h1>Mensagem de Alerta!</h1><br />
                                   <p>O Mini curso nº <?php echo $minicurso;?> não possui vagas!</p>
                                    <p><a href="usuadm.php?pa=minicursos">Voltar</a></p>
                                </div> 
                                <?php
                                }//fecha Se não haver vagas
   
                }// se valor = 0, vai executar o bloco
                else{// senão valor = 1, vai apresentar a mensagem que o usuário já está partipando do minicurso
             ?>
                  <div class="minicurso_msg">
                    <h1>Mensagem de Alerta!</h1><br />
                    <p>Você já está participando do mini-curso nº <?php echo $minicurso;?>!</p> 
                    <p><a href="usuadm.php?pa=ver_minicursos">Veja os minicursos que você vai participar!</a></p>
                 </div>             
      <?php
             }//Fecha se já estiver participando
      }// fecha o listar minicursos
      ?>            
    </div>
<?php
    }
 }
 ?>