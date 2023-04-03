<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        header('Location:index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
        <div id="pagina"> 	
        <?php
        if ($_REQUEST['acao']=='incluir'){			
        ?>
             <h1 class="titulo1">Cadastro de Campus</h1>
             <form  class="formulario" method="post" action="usuadm.php?pa=campus_acao&acao=gravar_incluir">                
                   <table class="tabelas">
                        <tr>
                            <th class="th276t">Campus:</th><td class="td700"><input class="input_700" type="text" name="campus_nome" /></td>
                        </tr> 
                   </table>
                   <input class="btn" type="submit" name="salvar" value="Cadastrar"/>
             </form>
    
           <?php
           }else if ($_REQUEST['acao']=='alterar'){
           ?>
    
            <h1>Alterar Campus</h1>
            <form  class="formulario" method="post" action="usuadm.php?pa=campus_acao&acao=gravar_alterar">
                  <input type="hidden" name="campus_codigo" value="<?php echo $opcao->registros->CAMPUS_CODIGO;?>"/>                            
                  <table class="tabelas">
                        <tr>
                            <th class="th276t"> Campus:</th><td class="td700"><input class="input_400" type="text" name="campus_nome" value="<?php echo $opcao->registros->CAMPUS_NOME;?>"/></td>
                        </tr>                       
                   </table>                                             
                   <input class="btn" type="submit" name="salvar" value="Cadastrar"/>
             </form>  
          <?php
          } 
          ?>
     </div>
<?php 
    }
 }
 ?>