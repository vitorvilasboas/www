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
             <h2 class="titulo1">O que é o Flisol?</h2> 
             <p>
                 O FLISOL (Festival Latinoamericano de Instalação de Software Livre) é
                 o maior evento de divulgação de Software Livre da América Latina. 
                 Ele acontece desde 2005 e seu principal objetivo é promover o uso de 
                 software livre, apresentando sua filosofia, seu alcance, avanços e 
                 desenvolvimento ao público em geral.
              </p>
              <p>
                  Com esta finalidade, diversas comunidades locais de Software Livre 
                  (em cada país, em cada cidade/localidade), organizam simultaneamente
                  eventos em que se instala gratuitamente e totalmente legal, software 
                  livre nos computadores levados pelos participantes. Também, paralelamente,
                  são oferecidas apresentações, palestras e oficinas, sobre temas locais,
                  nacionais e latinoamericanos sobre Software Livre, com toda sua variedade 
                  de expressões: artística, acadêmica, empresarial e social.
                </p>
                <p>
                    Essa é a 1ª Edição do flisol Araguatins, e será realizada no Instituto
                    Federal de Educação Ciência e Tecnologia do Tocantins - <i>campus</i> Araguatins.
                </p>
				<br />
				<!--
				<p>Informações de Horário de Onibus<br />
				Manhã<br /> Ida - 07:10hs, 07:20hs e Volta - 11:30hs e 12:00hs
				</p> 
				<p>
				Tarde<br /> Ida - 13:30hs e Volta - 18:00hs
				</p> 
				<br />
				<p>Programação do Flisol</p>
				<br />
				<p>08:00 - Abertura</p>
				<p>08:45 - Lançamento do Aplicativo Educacional Infantil AlfaBeta</p>
				<p>09:00 às 12:00 - Criando Site com Joomla!<br />
				Local: Laboratório 01  - Vitor M. Vilas Boas, Leandro Wernech e Luciano Ribeiro
				</p>
				<p>09:00 às 12:00 - Minicurso de Linux Educacional<br />
				Local: Laboratório de Redes  - Lorram Marinho Sampaio e Luciana Moura
				</p>
				<p>09:00 às 12:00 - Introdução a Linguagem de Programação C<br />
				Local: Laboratório 20  - Adeilson Marques Cardoso e Jucilene Cardoso
				</p>
				<p>09:00 às 12:00 - Esteganografia<br />
				Local: Laboratório 21  - Ramásio Ferreira de Melo
				</p>
				<p>09:00 às 12:00 - Install Fest de Linux Educacional<br />
				Local: Laboratório Auditório - Paulo Erick e Equipe.
				</p>
				<br />
				<p>12:00 às 14:00 - Intervalo para almoço</p>
				<br />
				<p>14:00 às 17:00 - Instalação e Utilização do LibreOffice<br />
				Local: Laboratório 21  - Michaell Douglas de Oliveira e Dinicley Souza Alves
				</p>
				<p>14:00 às 17:00 - Minicurso Básico de modelagem e animação com Blender 3D<br />
				Local: Laboratório 01 - Cassio Lima de Sousa </p>
				<p>14:00 às 17:00 - Minicurso de HTML5<br />
				Local: Laboratório 20  - Thiago Guimarães Tavares
				</p>
				<p>14:00 às 17:00 - Introdução a Programação Java com Swing <br />
				Local: Laboratório 02  - Rogério Pereira de Sousa</p>
				<p>14:00 às 17:00 - Install Fest de Ubuntu <br />
				Local: Laboratório Auditório - Cleuso Veloso Rodrigues e Equipe</p>
				<p>17:00 às 18:00 - Apresentação de Trabalhos
				Local: Laboratório Auditório 
				</p>
				<p>18:00 - Encerramento </p>
                -->
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
           
        
