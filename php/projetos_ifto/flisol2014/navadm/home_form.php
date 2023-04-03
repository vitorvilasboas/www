       <?php	
       if ($_REQUEST['acao']=='incluir'){	
       ?>
       <div id="pagina">
        <h1 class="titulo1">Incluir a Situação da participação</h1>
        <br />
        <form   action="usuadm.php?pa=home_acao&acao=gravar_incluir" enctype="multipart/form-data" method="post">
		<?php
		if(isset($_GET['usuario'])){ 
		    echo '<input type="hidden" name="usuario" value="'.$_GET['usuario'].'" />';
			}
	    else{ echo '';}
		?>
            <fieldset>
                <legend class="titulo3">Escolha um dos  tipos de opções de Participação</legend>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição Gratuita" checked="enabled"/>
                        Inscrição Gratuita - Você poderá participar do evento, sem receber certificado de participação.
                    </label>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição com 1 (um) minicurso do evento e certificado de participação" />
                        Inscrição R$ 5,00 - Você poderá participar de 1 (um) minicurso do evento e receber certificado de participação.
                    </label>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição com 2 (dois) minicursos do evento e certificado de participação" />
                        Inscrição R$ 10,00 - Você poderá participar de 2 (dois) minicursos do evento e receber certificado de participação.
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
        <form   action="usuadm.php?pa=home_acao&acao=gravar_alterar" enctype="multipart/form-data" method="post">
		<?php
		if(isset($_GET['usuario'])){ 
		    echo '<input type="hidden" name="usuario" value="'.$_GET['usuario'].'" />';
			}
	    else{ echo '';}
		?>
            <fieldset>
                <legend class="titulo3">Escolha um dos  tipos de opções de Participação</legend>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição Gratuita" checked="enabled"/>
                        Inscrição Gratuita - Você poderá participar do evento, sem receber certificado de participação.
                    </label>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição com 1 (um) minicurso do evento e certificado de participação" />
                        Inscrição R$ 5,00 - Você poderá participar de 1 (um) minicurso do evento e receber certificado de participação.
                    </label>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição com 2 (dois) minicursos do evento e certificado de participação" />
                        Inscrição R$ 10,00 - Você poderá participar de 2 (dois) minicursos do evento e receber certificado de participação.
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
            <p>Você está participando do evendo com <?php echo $opcao->registros->TP_INSCRICAO;?></p>
            <?php
            } 
            ?>
    </div>
     <?php
     } 
     ?>
 
  
