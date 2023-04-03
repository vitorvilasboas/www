<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$session['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
   <div id="pagina">
         <h1 class="titulo1">Confirmar Usuários</h1>
         <form  class="formulario"method="post" action="usuadm.php?pa=usuarios_acao&acao=confirmar_participacao">               
               <table class="tabelas">
                   <tr>
                        <th class="th276t">Pesquisar</th>
                        <td class="td700">
                            <select class="input_700" name="usu_nome">
                                <?php echo $opcao->usuario_confirmar();?>
                            </select> 
                       </td> 
                   </tr>
               </table>
             <input class="btn" type="submit" name="confirmar" value="Confirmar"/>
         </form>
   
   </div>
<?php 
  }
}
?>
