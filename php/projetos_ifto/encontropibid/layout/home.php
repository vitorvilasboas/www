<div id="pagina">
    <h1 class="titulo1">Pagina Inicial</h1>
    <div class="home">
        <div class="home_inscricao">
             
             <div id="relogio">
                        <p id="contador"></p>
             </div>
            <a href="index.php?p=inscricoes"><img src="imagens/inscricao.png" /></a>
        </div>
        <div class="home_banner">
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
        <div class="home_publicidades">
                Realização
                <img src="imagens/logo_uft.png" />
        </div>              
                                 
        
        <div class="home_noticias_destaque">
             <h2 class="titulo1">IV Encontro do PIBID do IFTO</h2>
             <p>O Programa Institucional de Bolsa de Iniciação à Docência – PIBID, do Instituto Federal de Educação,
                 Ciência e Tecnologia do Tocantins - IFTO, desenvolve atividades pedagógicas e práticas metodológicas
                 com resultados significativos no processo educacional das escolas públicas tocantinenses.
             </p>
             <p>
                No dias 04 de Dezembro, o Instituto Federal de Educação, Ciência e Tecnologia do Tocantins realizará
                o IV Encontro do PIBID do IFTO, intitulado "PIBID IFTO e(m) Perspectivas", envolvendo alunos dos cursos de licenciaturas dos 
                Campi Palmas, Paraíso, Porto Nacional, Gurupi e Araguatins e seus respectivos Professores 
                Supervisores e Coordenadores de Área.
             </p>
             <p>
                O evento oportunizará a comunidade acadêmica e escolar conhecer e participar dos trabalhos desenvolvidos
                pelo PIBID/IFTO, por meio de palestras, mesas redondas, oficinas e relatos de experiências.
             </p>
             <p>
                O IV Encontro do PIBID do IFTO será realizado no Campus de Paraíso, situado no Setor Industrial, 
                Zona Rural - Paraíso do Tocantins - TO.
             </p><br />
             <p>
                Programação: <br />
                <a href="Programacao_Geral.pdf" > Programação Geral </a><br />
                <a href="Programacao_apresentacoes.pdf" > Programação Com todas as Atividades</a>
                
             </p>
             <table border="0" cellspacing="1" >
                  <tr>
                      <th style ="font-size: 13px; background:#d2d2d2; padding: 5px;">Data e Horário</th>
                      <th style ="font-size: 13px; background:#d2d2d2;padding: 5px;">Palestra/Oficina/Mini-curso</th>
                      <th style ="font-size: 13px; background:#d2d2d2;padding: 5px;">Valor R$</th>
                      <th style ="font-size: 13px; background:#d2d2d2;padding: 5px;">Nº de Vagas</th>
                  </tr>
              <?php
                   $sql=("select * from minicursos  where mcso_ano = 2015 order by mcso_horario");
                   $resultado= $con->banco->Execute($sql);
                   while($registros=$resultado->FetchNextObject()){
               ?>
                  <tr>
                    <td style ="font-size: 12px; background:#f4f4f4; padding: 3px; text-align: center;"><?php echo $registros->MCSO_HORARIO;?></td>  
                    <td style ="font-size: 12px; background:#f4f4f4; padding: 3px;"><?php echo $registros->MCSO_TITULO;?></td>
                    <td style ="font-size: 12px; background:#f4f4f4; padding: 3px; text-align: center;"><?php if($registros->MCSO_VALOR=='0.00'){echo '<span> Gratuito </span>';} else {echo '<span>'.$registros->MCSO_VALOR.'</span>';} ?></td>
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
           
        
