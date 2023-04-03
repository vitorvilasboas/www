<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>
   <div id="pagina">
       <h1 class="titulo1">Faça a sua programação de participação no evento</h1>
       <form class="formulario" method="post" action="usucom.php?pc=mcursopart">
            <h3 style="color:red;background: #fff; border:1px solid #b5c4cf;">Atenção : Você pode participar de apenas um mini-curso em cada horário! </h3>
            <table class="tabelas">
                   <?php
                   require_once "Connections/conecta.php";
                   $sql = "select * from minicursos where mcso_status='Ativo'";
                   $resultado = $con->banco->Execute($sql);
                   while($registro = $resultado->FetchNextObject()){
                   ?> 
                        <input type="hidden" name="codigo" value="<?php echo $_SESSION['codigo'];?>"/> 
                        <input type="hidden" name="horario" value="<?php echo $registro->MCSO_HORARIO;?>"/>
                        <tr>
                            <th class="th120t">Horário</th><td class="td600"> <?php echo $registro->MCSO_HORARIO;?><th class="th70t">Valor R$</th></td><th class="th70t">Vagas</th><th class="th70t">Disponiveis</th><th class="th70t">Participar</th>
                        </tr>                                   
                        <tr>
                            <th class="th120t">Título</th><td class="td600"> <?php echo $registro->MCSO_TITULO;?></td>
                            <td class="td70"><?php if($registro->MCSO_VALOR=='0.00'){echo '<span> Gratuito </span>';} else {echo '<span>'.$registro->MCSO_VALOR.'</span>';} ?></td><td class="td70"><?php echo $registro->MCSO_VAGAS;?></td><td class="td70"><?php $disponiveis=$registro->MCSO_VAGAS-$registro->MCSO_CONT_VAGAS; if($disponiveis=='0'){ echo "<span>Lotado</span>";}else {echo $disponiveis;}?></td><td class="td70"><input class="input_radio" type="checkbox" name="minicursos[]" value="<?php echo $registro->MCSO_CODIGO ?>"/>Nº <?php echo $registro->MCSO_CODIGO ?></td>
                        </tr>
                        <tr>
                            <th class="th120t">Professor</th><td class="td800" colspan="5"> <?php echo $registro->MCSO_CONDUTOR;?></td>
                        </tr>
                        <tr>
                            <th class="th120t">Resumo</th><td class="td800" colspan="5"> <?php echo $registro->MCSO_RESUMO;?></td>
                        </tr>
                        <tr>
                            <td class="tdespaco" colspan="6">_</td>
                        </tr>              
                <?php    
                    }
                ?>
           </table>                                 
           <input class="btn" type="submit" value="Inscrever" />                         
       </form>  
   </div>
<?php 
    }        
 }                 
?>