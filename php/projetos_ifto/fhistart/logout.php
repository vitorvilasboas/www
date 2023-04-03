<?php
//include("valida.php");
?>
     
     <div id="box_topo_menu"> 
         <div style="float:left;">
         <?php 
            if(!isset($_SESSION['nome'])){
                echo '<img src="imagens/user.png" alt="user.png"/>&nbsp; Olá:<b> Visitante!</b>';
                echo '<a href="index.php?p=login"> &nbsp;&nbsp; <img src="imagens/unlock.png" alt="unlock.png"/>&nbsp;&nbsp;Login</a>';
            }else{
                echo '<img src="imagens/user.png" alt="user.png"/>&nbsp; Olá: <b>'.$_SESSION['nome'].'</b>';
                echo '<a href="index.php?op=logout">&nbsp;&nbsp;<img src="imagens/lock.png" alt="lock.png"/>&nbsp;&nbsp;Sair</a>';
                if(isset($_GET['op']) AND ($_GET['op']=="logout")){
                    session_start();
                    unset($_SESSION['codigo']);
                    unset($_SESSION['cpf']);
                    unset($_SESSION['senha']);
                    unset($_SESSION['nome']);
                    unset($_SESSION['nivel']);
                    session_destroy();
                header("Location:index.php");
            exit;
	}
            }
         ?>
         </div>
         <div style="float: right; padding-right: 10px;">
         <?php
         if(date('m')=='1'){$data='Janeiro';}
         elseif(date('m')=='2'){$data='Fevereiro';}
         elseif(date('m')=='3'){$data='Março';}
         elseif(date('m')=='4'){$data='Abril';}
         elseif(date('m')=='5'){$data='Maio';}
         elseif(date('m')=='6'){$data='Junho';}
         elseif(date('m')=='7'){$data='Julho';}
         elseif(date('m')=='8'){$data='Agosto';}
         elseif(date('m')=='9'){$data='Setembro';}
         elseif(date('m')=='10'){$data='Outubro';}
         elseif(date('m')=='11'){$data='Novembro';}
         elseif(date('m')=='12'){$data='Dezembro';}
         
         echo "hoje é dia ".date('d')." de ".$data." de ".date('Y'); ?>   <input type="text" name="pesquisa"/><input type="submit" name="acesso" value="Buscar"/>
         </div>
        <?php
        
    ?>
     </div>

        