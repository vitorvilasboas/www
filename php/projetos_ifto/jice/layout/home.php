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
             <h2 class="titulo1">Jornada de Iniciação Científica e Extensão</h2> 
			 <h2 class="titulo2">Objetivos</h2>
             <p>
                 O objetivo é estimular os estudantes por meio da iniciação científica e dar aos professores de educação profissional e tecnológica a oportunidade de trocar ideias entre as áreas afins. Será um espaço de divulgação e desenvolvimento do pensamento técnico-científico, bem como produção e discussão de trabalhos resultantes dos projetos de pesquisa e de extensão dos estudantes e professores do IFTO e demais instituições.

              </p>
              <p>
                  Este importante evento é promovido pelo IFTO desde 2010, e representa oportunidade
                  de divulgação e desenvolvimento do pensamento técnico-científico, bem como produção 
                  e discussão de trabalhos resultantes dos projetos de pesquisa dos estudantes e professores 
                  do IFTO e de demais instituições. Além disso, a Jice é espaço para a troca de experiências 
                  entre docentes, técnicos administrativos, estudantes e colaboradores no âmbito da iniciação científica.

              </p>   
                   
              <p>
                    Este ano, o evento contará com palestras, mesa-redonda, minicursos, oficinas, apresentação 
                   de trabalhos de pesquisa e extensão nas modalidades pôster e oral, além de atividades culturais. 
                   Os melhores trabalhos serão agraciados com o “Prêmio Jovem Cientista Francisco Filho”. A premiação é 
                   realizada desde 2013, com o intuito de incentivar e estimular a participação de estudantes nos programas
                   de pesquisa e extensão e, desde o ano passado, recebeu novo nome para homenagear o professor Francisco Filho.

                </p>
                
                <p>
                    São esperados para o evento cerca de 400 participantes. Todos estão convidados à 6ª Jice do IFTO.
                </p>
                 <p>
                    
	         <h2 class="titulo2">Público-alvo:</h2>
			 <p>

                  1. estudantes de iniciação científica do IFTO;<br /><br />

                  2. estudantes envolvidos em projetos de extensão;<br /><br />

                  3. Estudantes dos cursos do IFTO;<br /><br />

                  4. Pesquisadores com projetos de pesquisa e extensão cadastrados no IFTO, com ou sem auxílio<br /><br />

                  5. comunidade acadêmica externa.<br /><br />
				  
				  6. Previsão de 800 participantes<br /><br />
                </p>


                <p >
                     O evento contará com palestras, mesa-redonda, minicursos, oficinas, apresentação de trabalhos de pesquisa e extensão nas modalidades pôster e oral, premiação dos melhores trabalhos, além de atividades culturais e homenagem ao Professor Francisco Filho. A programação será divulgada em agosto.
                </p>
                <h2 class="titulo2">Prêmio jovem cientista Francisco Filho</h2>
		
                <p>
                       O IFTO conta, deste 2009, com o Programa de Iniciação Científica – PIC/IFTO, que disponibiliza bolsas para os estudantes do IFTO para incentivá-los à prática de pesquisa aplicada, desenvolvendo atividades científicas e tecnológicas no IFTO, com o envolvimento de docentes, técnicos administrativos e colaboradores. O PIC/ IFTO tem por objetivo contribuir para a formação de recursos humanos qualificados para a atividade de pesquisa aplicada e profissional, estimulando os participantes a desenvolverem atividades científica, tecnológica, profissional e artístico-cultural com o propósito de despertar o pensamento crítico, científico e a criatividade, além de possibilitar uma maior integração entre os diferentes níveis de ensino da Instituição.

                </p>
				
                <p>
                       A JICE é o momento para a troca de experiências e apresentação dos resultados alcançados nas pesquisas de todos os envolvidos no PIC/IFTO, sendo a participação apresentação de trabalhos peça chave e obrigatória aos bolsistas PIC/IFTO.
                </p>
				
                
                <p>
                        Para reforçar e estimular a participação dos bolsistas, em 2013 a Pró-reitoria de Pesquisa passou a premiar os melhores trabalhos, nas modalidades artigo, apresentação oral e pôster. A partir de 2015 esta premiação passou a se chamar “Prêmio Jovem Cientista Francisco Filho”.
                </p>
				<h2 class="titulo2"> Lista de Minicursos/Workshop/Oficina </h2>
                <table size="100%" border="0" cellspacing="1" >
                   <tr>
                      <th style ="font-size: 13px; background:#d2d2d2; padding: 5px; width: 100px;">Data e Horário</th>
                      <th style ="font-size: 13px; background:#d2d2d2;padding: 5px; width: 450px; ">Workshop/Oficina/Minicurso</th>
                      <th style ="font-size: 13px; background:#d2d2d2;padding: 5px; width: 100px; ">Nº de Vagas</th>
                  </tr>
                  <?php
                   $sql=("select * from minicursos where MCSO_ANO = '2016' order by mcso_horario");
                   $resultado= $con->banco->Execute($sql);
                   while($registros=$resultado->FetchNextObject()){
                   ?>
                  <tr>
                    <td style ="font-size: 12px; background:#f4f4f4; padding: 3px; text-align: center;"><?php echo $registros->MCSO_HORARIO;?></td>  
                    <td style ="font-size: 12px; background:#f4f4f4; padding: 3px;"><?php echo $registros->MCSO_TITULO.' / '.$registros->MCSO_CONDUTOR;?></td>
                    <td style ="font-size: 12px; background:#f4f4f4; padding: 3px; text-align: center;"><?php echo $registros->MCSO_VAGAS;?></td>
                  </tr>
              <?php
                   }
              ?>
              </table>
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
           
   





     
