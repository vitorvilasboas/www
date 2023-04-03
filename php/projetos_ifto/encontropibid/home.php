<div id="pagina">
    <h1 class="titulo1">Pagina Inicial</h1>
    <div class="home">
        <div class="home_banner_600">
                 <center>
                        <script language="JavaScript">
                            var j,d="",l="",m="",p="",q="",z="",list= new Array(),list2=new Array()
                            <?php
                                require 'Connections/conecta.php';
                                $sql=("select * from banners");
                                $resultado= $con->banco->Execute($sql);
                                while($registros=$resultado->FetchNextObject()){
                            ?>
                                    list[list.length]='uploads/banners/<?php echo $registros->BAN_IMAGEM ?>';
                                    list2[list2.length]='<?php echo $registros->BAN_LINK ?>';
                             <?php 
                                }
                             ?>
                                j=parseInt(Math.random()*list.length);
                                j=(isNaN(j))?0:j;
                                document.write("<a href='"+list2[j]+"' target='_blank'><img name='seqSlideShow' src='"+list[j]+"' border=0 ></a>");
                                function seqSlideShow(t,l) {
                                 x=document.seqSlideShow;
                                 j=l;
                                 j++;
                                    if (j==list.length) j=0;
                                        x.src=list[j];
                                        setTimeout("seqSlideShow("+t+","+j+")",t);
                                     }
                          </script>
                          <script language="JavaScript"> seqSlideShow(3000,0); </script>
                  </center>
        </div>
        <div class="home_banner_360">
               <div class="home_banner_360_160E">
                   <a href="index.php?p=inscricoes"><img src="imagens/inscricao.png" /></a>
               </div>
               <div class="home_banner_360_160D">
                    <div id="relogio">
                        <p id="contador"></p>
                    </div>
               </div>
               <div class="home_banner_360_320T">
                   Publicidades
               </div>                                 
        </div>
        <div class="home_noticias_destaque">
             <h2 class="titulo1">Forum Tocantinense de Tecnologia da Informação</h2> 
             
                
        </div>
        <div class="home_noticias_todas">
              <h2 class="titulo1">Últimas Notícias</h2>                              
                <?php
                 require'Connections/config.php';
                 $sql_noticias = 'SELECT * FROM noticias limit 10';
                 try{
                    $query_noticias= $conecta->prepare($sql_noticias);
                    $query_noticias->execute();
	
                    $resultado_noticias = $query_noticias->fetchAll(PDO::FETCH_ASSOC);
	
                 }catch(PDOexception $error_noticias){
                    echo 'Erro ao selecionar noticias';
                 }	
                foreach($resultado_noticias as $res_noticias){
                    $not_codigo      = $res_noticias['not_codigo'];
                    $not_data        = $res_noticias['not_data'];
                    $not_titulo      = $res_noticias['not_titulo'];
                    $not_foto      = $res_noticias['not_foto'];
                ?>  
                <div>
                     <a href="index.php?p=noticias&codigo=<?php echo $not_codigo;?>">
                           <?php 
                           echo '<span><p class="home_texto1"><img border="0" src="imagens/plus.png">&nbsp;'.$not_data.' </p></span>';  
                           echo '<p class="home_texto2">'.$not_titulo.'</p>';
                           ?> 
                      </a>
                </div>
                <?php
                }
                ?>   
       </div>     
    </div>
</div>
           
        
