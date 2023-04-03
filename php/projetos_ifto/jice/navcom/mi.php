<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$session['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>
<div id="pagina">
            <form class="inscricao" method="post" action="usucom.php?pc=mcursopart">
            <h1>Escolha os mini-cursos que deseja participar</h1>
            <h3 style="color:red;">Atenção : </h3>
            <h3 style="color:red;">* Você pode participar de apenas um mini-curso em cada horário! </h3>
            <?php
                require_once "Connections/conecta.php";
                $sql = "select * from minicursos";
                $resultado = $con->banco->Execute($sql);
                while($registro = $resultado->FetchNextObject()){
            ?> 
                <input type="hidden" name="codigo" value="<?php echo $_SESSION['codigo'];?>"/>
                <table class="ver_minicursos">
                    <tr>
                        <td class="td100">Horario</td><td class="td140"> <?php echo $registro->MCSO_HORARIO;?></td><td class="td70t">Vagas</td><td class="td70t">Disponiveis</td><td class="td70t">Participar</td>
                    </tr>                                   
                    <tr>
                        <td class="td100">Titulo</td><td class="td470"> <?php echo $registro->MCSO_TITULO;?></td><td class="td70"><?php echo $registro->MCSO_VAGAS;?></td><td class="td70"><?php $disponiveis=$registro->MCSO_VAGAS-$registro->MCSO_CONT_VAGAS; if($disponiveis=='-1'){ echo "Lotado";}else {echo $disponiveis;}?></td><td class="td70"><input class="input_radio" type="checkbox" name="minicursos[]" value="<?php echo $registro->MCSO_CODIGO ?>"/>Nº <?php echo $registro->MCSO_CODIGO ?></td>
                    </tr>
                    <tr>
                        <td class="td100">Palestrante</td><td class="td620" colspan="4"> <?php echo $registro->MCSO_CONDUTOR;?></td>
                    </tr>
                    <tr>
                        <td class="td100">Resumo</td><td class="td620" colspan="4"> <?php echo $registro->MCSO_RESUMO;?></td>
                    </tr>
                </table>
                <br />
                <?php    
                    }
                ?>
                                  
                <input class="btn" type="submit" value="Inscrever" />
                           
       </form>
    
</div>
<?php 
        }        
   }                 
 ?>