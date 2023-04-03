<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>

    <div id="pagina">
        <h1 class="titulo1">Inicio</h1>
        <br />
		<p style="color:red; font-size:20px;text-align:justify">
		<b>Atenção</b><br />
		O pagamento das inscrições dos minicursos devem ser efetuados até 15/04/2016 até as 20:00h, quem não se credenciar terá o seu nome excluido do minicurso.<br />
		Para quem não conseguir vagas no minicurso desejado aguarde. Após as 20:00h serão liberados às vagas de quem não efetuou o credenciamento.
		<br /><br />
		</p>
		    <?php 
			    require('Connections/conecta.php');
			    $usuario = $_SESSION['codigo'];
                $sql = ("select tp_inscricao from tp_inscricao where tp_ano = '".date('Y')."' and TP_USUARIO = ".$usuario);
                $resultado = $con->banco->Execute($sql);
                if($registros = $resultado->FetchNextobject()){
            ?>
            <p class="titulo2">Seu tipo de participação no evento é:  <?php echo $registros->TP_INSCRICAO;?></p>
            <?php
            }else {echo '<p>Você ainda não escolheu nenhum tipo de participação! </p><br /><p> Por favor escolha uma das opções abaixo!</p><br />';}
            ?>
        <form class="tipoincricao" action="usucom.php?pc=home_acao&acao=gravar_incluir" method="post">
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
        }
    }
 ?> 