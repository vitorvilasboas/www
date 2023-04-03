<div id="pagina">
     <h1 class="titulo1">Todas as noticias</h1>
     <form class="noticias">         
          <?php
          if(!isset($_REQUEST['op'])=="detalhes"){                      
                require_once'Connections/config.php';
                $sql_noticias = 'SELECT * FROM noticias order by not_codigo desc';
                try{
                    $query_noticias= $conecta->prepare($sql_noticias);
                    $query_noticias->execute();
                    $resultado_noticias = $query_noticias->fetchAll(PDO::FETCH_ASSOC);	
                 }catch(PDOexception $error_noticias){
                     echo 'Erro ao selecionar noticias';
                 }
	         foreach($resultado_noticias as $res_noticias){
                 $not_codigo    = $res_noticias['not_codigo'];
                 $not_foto      = $res_noticias['not_foto'];
                 $not_titulo    = $res_noticias['not_titulo'];
                 $not_noticia   = $res_noticias['not_noticia'];
                 $not_data      = $res_noticias['not_data'];
                 $not_visitas   = $res_noticias['not_visitas'];
          ?>
         <fieldset>
    	  <h2 class="titulo2">
               <a  href="index.php?p=noticias&op=detalhes&codigo=<?php echo $not_codigo;?>">
	           <?php echo $not_titulo;?>
               </a>
          </h2>
          
                 <img class="noticias_img" src="uploads/img_not/<?php echo $not_foto;?>" /> 
           
         
          <p>
              <?php echo substr($not_noticia,0,700);?>
              <a href="index.php?p=noticias&op=detalhes&codigo=<?php echo $not_codigo;?>">
                  <span>[ Leia + ]</span> 
              </a>
          </p>
          <br />
          <p class="noticias_publicacao">
              <?php echo "Publicada em "; echo $not_data;?>
          </p> 
          </fieldset>
         <hr />
          <?php
          }
          ?>
    </form>
    <?php
    }else{
          require_once'Connections/config.php';
          $sql_noticias = "select * from noticias where not_codigo ='".$_REQUEST['codigo']."'";
          try{
              $query_noticias= $conecta->prepare($sql_noticias);
              $query_noticias->execute();
              $resultado_noticias = $query_noticias->fetchAll(PDO::FETCH_ASSOC);
          }catch(PDOexception $error_noticias){
              echo 'Erro ao selecionar noticias';
          }
          foreach($resultado_noticias as $res_noticias){
          $not_codigo    = $res_noticias['not_codigo'];
          $not_foto      = $res_noticias['not_foto'];
          $not_titulo    = $res_noticias['not_titulo'];
          $not_noticia   = $res_noticias['not_noticia'];
          $not_data      = $res_noticias['not_data'];
          $not_visitas   = $res_noticias['not_visitas'];	                                                          
    }    
    ?> 		
    <form class="noticias">
          <h2 class="noticias_titulo"><?php echo $not_titulo; ?> </h2>
          <p>
                 <img class="noticias_img" src="uploads/img_not/<?php echo $not_foto;?>" /> 
          </p> 			
	  <p>
              <?php echo $not_noticia;?> 
          </p>
          <br />  
          <p>
              Publicado dia <?php echo $not_data; ?>
          </p>
          <hr />         
          <p>
              <a  href="javascript:history.back();">Voltar</a>
          </p>             
     </form>
     <?php
     }
     ?>  
</div>
