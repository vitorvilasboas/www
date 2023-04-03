
<div id="pagina">
    <div class="formulario">
        <h1 class="titulo1">Notícias</h1> 
        
    	
            <div class="busca_manutencao">
               <form method="post" action="usuadm.php?pa=noticias_acao&acao=pesquisar">
                    <div class="img_pesquisa"> 
                        <img  src="imagens/query.png"/>
                    </div>
                    <div class="div_pesquisa">
                        
                        <input class="input_pesquisa"class="input_400" type="text" name="busca"/>
                    </div>
                    <div class="div_busca">
                        
                            <input  class="input_busca" type="submit" name="pesquisar" value="Pesquisar"/>
                    </div>
                    <div class="novo_registro">
                        <a  href="usuadm.php?pa=noticias_acao&acao=incluir"><img  src="imagens/menu_add.png"/>&nbsp;&nbsp;Novo Registro</a>
                    </div>
              </form>
            
            </div>
            <div class="noticias">
                <?php
 
                if(!isset($_REQUEST['op'])=="detalhes") 
                {   
	 	
                    while($opcao->registros = $opcao->resultado->FetchNextObject()){
           

                ?>
            <fieldset>
                <h2 class="titulo2">
    			<a href="usuadm.php?pa=noticias_ver&acao=listar&op=detalhes&codigo=<?php echo $opcao->registros->NOT_CODIGO;?>">
				<?php echo $opcao->registros->NOT_TITULO;?>
                        </a>
                </h2>
                <img class="noticias_img" src="uploads/img_not/<?php echo $opcao->registros->NOT_FOTO;?>" />       
                <p>
                    <?php echo substr($opcao->registros->NOT_NOTICIA,0,208);?>               
        		<a href="usuadm.php?pa=noticias_acao&acao=detalhes&op=detalhes&codigo=<?php echo $opcao->registros->NOT_CODIGO;?>">
                            <span>[ Leia + ]</span>
                        </a>
                </p>                                     
           </fieldset>
                <br />
    			<a class="btn" href="usuadm.php?pa=noticias_acao&acao=excluir&codigo=<?php echo $opcao->registros->NOT_CODIGO;?>">Apagar Noticia</a>
                  
            <hr />    
    
    <?php
			
			}
	}else
		{
                  
                  while($opcao->registros = $opcao->resultado->FetchNextobject()){
                       
                                
                                $titulo = $opcao->registros->NOT_TITULO;
                                $foto = $opcao->registros->NOT_FOTO;
                                $noticia = $opcao->registros->NOT_NOTICIA;
                                $visitas = $opcao->registros->NOT_VISITAS;
                                $data = $opcao->registros->NOT_DATA;
                                $codigo = $_GET['codigo'];

					$total = $visitas + 1;
					$sql ="UPDATE noticias SET NOT_VISITAS = '$total' WHERE NOT_CODIGO =".$codigo;
                  }
		
		             
	?> 		
        <fieldset>
          <h2 class="noticias_titulo"><?php echo $titulo; ?> </h2>
          <p>
                 <img class="noticias_img" src="uploads/img_not/<?php echo $foto;?>" /> 
          </p> 			
	  <p>
              <?php echo $noticia;?> 
          </p>
          
        </fieldset>
            <br />  
            <p>
              <center>
                Publicado dia <?php echo $data; ?><br />
                <a  href="javascript:history.back();">Voltar</a>
               </center>
            </p>
       <hr /> 
     </div>
   
   <?php
                       
		
                }
	?>
    </div>
  
</div>

