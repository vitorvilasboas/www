<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$session['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
        <div id="pagina"> 	
        <?php
        if ($_REQUEST['acao']=='incluir'){			
        ?>
             <h1 class="titulo1">Cadastro de cursos</h1>
             <form  class="formulario" method="post" action="usuadm.php?pa=mcursos_acao&acao=gravar_incluir">                
                   <table class="tabelas">
                        <tr>
                            <th class="th276t">Data e Hora:</th><td class="td700"><input class="input_400" type="text" name="mcso_horario" /></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Titulo:</th><td class="td700"><input class="input_700" type="text" name="mcso_titulo" /></td>
                        </tr>
                        <tr>
                            <th class="th276t">Vagas:</th><td class="td700"><input class="input_100" type="text" name="mcso_vagas" /></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Professor:</th><td class="td700"><input class="input_700" type="text" name="mcso_condutor" /></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Resumo:</th><td class="td700"><textarea class="input_700" heigth="6"  name="mcso_resumo" /></textarea></td>
                        </tr>                      
                   </table>                                   
                   <input class="btn" type="submit" name="salvar" value="Salvar"/>
             </form>
    
           <?php
           }else if ($_REQUEST['acao']=='alterar'){
           ?>
    
            <h1>Alterar cursos</h1>
            <form  class="formulario" method="post" action="usuadm.php?pa=mcursos_acao&acao=gravar_alterar">
                  <input type="hidden" name="mcso_codigo" value="<?php echo $opcao->registros->MCSO_CODIGO;?>"/>                            
                  <table class="tabelas">
                        <tr>
                            <th class="th276t"> Horario e Data:</th><td class="td700"><input class="input_400" type="text" name="mcso_horario" value="<?php echo $opcao->registros->MCSO_HORARIO;?>"/></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Titulo:</th><td class="td700"><input class="input_700" type="text" name="mcso_titulo" value="<?php echo $opcao->registros->MCSO_TITULO;?>"/></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Vagas:</th><td class="td700"><input class="input_100" type="text" name="mcso_vagas" value="<?php echo $opcao->registros->MCSO_VAGAS;?>"/></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Professor:</th><td class="td700"><input  class="input_700" type="text" name="mcso_condutor" value="<?php echo $opcao->registros->MCSO_CONDUTOR;?>"/></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Resumo:</th><td class="td700"><textarea  class="input_700" name="mcso_resumo"><?php echo $opcao->registros->MCSO_RESUMO;?></textarea></td>
                        </tr>                        
                   </table>                                             
                   <input class="btn" type="submit" name="salvar" value="Salvar"/>
             </form>  
          <?php
          } 
          ?>
     </div>
<?php 
    }
 }
 ?>