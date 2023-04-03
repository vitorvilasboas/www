<div id="conteudo_geral">
     <div id="menusub">
                   <ul>
                        
                                
                                <?php
								@session_start();
								if($_SESSION['tipo_usuario']=='1'){
									echo '<li><a href="usucom.php?pc=cursos">iniciar</a></li>';
								}else if($_SESSION['tipo_usuario']=='2'){
									echo '<li><a href="usucom.php?pc=questionario_acao&acao=iniciar">iniciar</a></li>';									
								}else if($_SESSION['tipo_usuario']=='3'){
									echo '<li><a href="usucom.php?pc=questionario_acao&acao=iniciar">iniciar</a></li>';
								}
								?>
                                <li><a href="usucom.php?pc=questionario_acao&acao=listar_questoes&ano=2013">respostas em 2013</a></li>   
                                <li><a href="usucom.php?pc=questionario_acao&acao=listar_questoes&ano=2014">respostas em 2014</a></li>
                                <li><a href="usucom.php?pc=questionario_acao&acao=listar_questoes&ano=2015">respostas em 2015</a></li> 
                                <li><a href="usucom.php?pc=usuarios_acao&acao=alterar_senha">Alterar senha</a></li>
                                <li><a href="usucom.php?pc=usuarios_acao&acao=listar">Minhas informações pessoais</a></li>
                        								
                            
                        
                    </ul>
                    
</div>