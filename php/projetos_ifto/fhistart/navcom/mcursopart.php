<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>
    <div id="pagina">
     <?php
         require 'Connections/conecta.php';                
         $usuario=$_REQUEST['codigo'];
         //$minicurso=$_REQUEST['minicursos'];        
         foreach($_POST['minicursos'] as $cont => $minicurso) {
         //$sql = "select * from itens_minicursos";
         //$resultado = $con->banco->Execute($sql);
         //if($registro = $resultado->FetchNextObject()){// abre listar os minicuros
             
            
         //    $ic_mcso_codigo=$registro->IC_MCSO_CODIGO;
             $sql_cont=("select count(*)as total from itens_minicursos where ic_usu_codigo='$usuario' and ic_mcso_codigo='$minicurso'");
             $resultado_cont = $con->banco->Execute($sql_cont);           
             foreach($resultado_cont as $chave => $linha){//abre foreach
	        $total = $linha['total'];
		}//fecha foreach			
		if($total==0){//abre verificar se o usuario já está participando do minicurso
                    $sql_valida=("select * from minicursos where MCSO_CODIGO='$minicurso'");
                    $resultado_valida = $con->banco->Execute($sql_valida);
                         foreach($resultado_valida as $linha){
                         $vagas=$linha['mcso_vagas'];
                         $contador=$linha['mcso_cont_vagas'];
                    }
                        if($contador<$vagas){// Verifica se tem vagas
                        
                            $sql=("insert into itens_minicursos (ic_usu_codigo,ic_mcso_codigo) values ($usuario,$minicurso)");
                            if($resultado = $con->banco->Execute($sql)){//abre insert de itens_minicursos 
           
                                $sql_minicursos=("select * from minicursos where MCSO_CODIGO='$minicurso'");
                                $resultado = $con->banco->Execute($sql_minicursos);
                                if($registro=$resultado->FetchNextObject()){//abre o atualizador do contador
                                    $mcso_cont_vagas=$registro->MCSO_CONT_VAGAS;
                                    $total=$mcso_cont_vagas + 1;
                                    $sql_update ="UPDATE minicursos SET MCSO_CONT_VAGAS = '$total' WHERE MCSO_CODIGO ='$minicurso'";
                                    $resultado = $con->banco->Execute($sql_update);
                                    }//abre o atualizador do contador     
                              
                              ?>
                                <div class="image_error">
                                     <h3>O Cadastro do mini-curso nº <?php echo $minicurso;?> foi realizado com sucesso!</h3> 
                                     <h3><a href="usuadm.php?pa=ver_minicursos">Veja os mini-cursos que você vai participar!</a></h3>
                                </div>
                              <?php
                              }//fecha a inserção de dados em itens_minicursos
                              else{ // abre senão cadastrar itens_minicursos
                              ?>
                                <div class="image_error">
                                    <h3>Não foi cadastrado!</h3> 
                                    <h3><a href="usucom.php?pc=ver_minicursos">Veja os mini-cursos que você vai participar!</a></h3>
                                </div>
                            <?php
                        }//fecha o senão cadastrar itens_minicursos
                     }// fecha Verifica se tem vagas
                     else{//Se não haver vagas
      ?>
                        <div class="image_error">
                            <h3>O Mini curso nº <?php echo $minicurso;?> não possui vagas!</h3>
                            <h3><a href="usucom.php?pc=minicursos">Voltar</a></h3>
                        </div> 
    <?php
                     }//fecha Se não haver vagas
                
                }// fecha verificar se o usuario já está participando do minicurso
                else{// se já estiver participando 
    ?>
                <div class="image_error">
                    <h3>Você já está participando do mini-curso nº <?php echo $minicurso;?>!</h3> 
                    <h3><a href="usucom.php?pc=ver_minicursos">Veja os mini-cursos que você vai participar!</a></h3>
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