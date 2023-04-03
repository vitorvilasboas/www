<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>       
     
     
     
     <?php	
       if ($_REQUEST['acao']=='incluir'){	
       ?>
       <div id="pagina">
        <h1 class="titulo1">Incluir a Situação da participação</h1>
        <br />
        <form   action="usucom.php?pc=home_acao&acao=gravar_incluir" enctype="multipart/form-data" method="post">
            <fieldset>
                <legend class="titulo3">Escolha um dos  tipos de opções de Participação</legend>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição Gratuita" checked="enabled"/>
                        Inscrição Gratuita - Você poderá participar do evento e receberá o certificado de participação.
                    </label>
                    <br />
                    <input class="btn" type="submit" name="enviar" value="Enviar" />
                    <br />
            </fieldset>
        </form>
    </div>
      <?php
       }else if ($_REQUEST['acao']=='alterar'){
      ?>
    
	<div id="pagina">
        <h1 class="titulo1">Alterar a Situação da participação</h1>
        <br />
        <form   action="usucom.php?pc=home_acao&acao=gravar_alterar" enctype="multipart/form-data" method="post">
            <fieldset>
                <legend class="titulo3">Escolha um dos  tipos de opções de Participação</legend>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição Gratuita" checked="enabled"/>
                        Inscrição Gratuita - Você poderá participar do evento e receberá o certificado de participação.
                    </label>
					<br />
					<input class="btn" type="submit" name="enviar" value="Enviar" />
                    <br />
            </fieldset>
        </form>
    </div>
    <?php	
       } else if ($_REQUEST['acao']=='listar'){	
       ?>
       <div id="pagina">
        <h1 class="titulo1">Situação da participação</h1>
        <br />
            <?php 
                if($opcao->registros = $opcao->resultado->FetchNextobject()){
            ?>
            <p>Seu tipo de participação no evento é:  <?php echo $opcao->registros->TP_INSCRICAO;?></p>
            <?php
            } 
            ?>
    </div>
     <?php
     } 
     ?>
 
<?php
        }
    }
 ?>  
