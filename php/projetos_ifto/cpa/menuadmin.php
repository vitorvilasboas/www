<div id="conteudo_geral">
     <div id="menusub">
                    <ul>
                        <li><a href="#">Usuários&raquo;</a>
                            <ul>
                                <li><a href="usuadm.php?pa=usuarios_acao&acao=incluir">Cadastrar</a></li>
                                <li><a href="usuadm.php?pa=usuarios_acao&acao=listar">Atualizar</a>
                            </ul>
                        </li>
                        <li><li><a href="#">Campus&raquo;</a>
                            <ul>                             
                                <li><a href="usuadm.php?pa=campus_acao&acao=incluir">Cadastrar</a></li>
                                <li><a href="usuadm.php?pa=campus_acao&acao=listar">Atualizar</a></li>
                            </ul>
                        <li><a href="#">Cursos&raquo;</a> 
                            <ul>
                                <li><a href="usuadm.php?pa=cursos_acao&acao=incluir">Cadastrar</a></li>
                                <li><a href="usuadm.php?pa=cursos_acao&acao=listar">Atualizar</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dimensão&raquo;</a>
                            <ul>                             
                                <li><a href="usuadm.php?pa=dimensao_acao&acao=incluir">Cadastrar</a></li>
                                <li><a href="usuadm.php?pa=dimensao_acao&acao=listar">Atualizar</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Atribuir Cursos&raquo;</a> 
                            <ul>
                                <li><a href="usuadm.php?pa=cursos_dos_campi_acao&acao=incluir">Cadastrar</a></li>
                                <li><a href="usuadm.php?pa=cursos_dos_campi_acao&acao=listar">Atualizar</a></li>
                            </ul>
                        </li>                       
                        <li><a href="#">Questões&raquo;</a>
                            <ul>    
                                <li><a href="usuadm.php?pa=questoes_acao&acao=incluir">Cadastrar</a></li>
                                <li><a href="usuadm.php?pa=questoes_acao&acao=listar">Atualizar</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Respostas&raquo;</a>
                            <ul>
                                <li><a href="usuadm.php?pa=respostas_acao&acao=incluir">Cadastrar</a></li>
                                <li><a href="usuadm.php?pa=respostas_acao&acao=listar">Atualizar</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Questionario&raquo;</a>
                            <ul>
							    <?php
								@session_start();
								if($_SESSION['tipo_usuario']=='1'){
									echo '<li><a href="usuadm.php?pa=cursos">iniciar</a></li>';
								}else if($_SESSION['tipo_usuario']=='2'){
									echo '<li><a href="usuadm.php?pa=questionario_acao&acao=iniciar">iniciar</a></li>';									
								}else if($_SESSION['tipo_usuario']=='3'){
									echo '<li><a href="usuadm.php?pa=questionario_acao&acao=iniciar">iniciar</a></li>';
								}
								?>
                                <li><a href="usuadm.php?pa=questionario_acao&acao=listar_questoes&ano=2013">2013</a></li>  
                                <li><a href="usuadm.php?pa=questionario_acao&acao=listar_questoes&ano=2014">2014</a></li>  
                                <li><a href="usuadm.php?pa=questionario_acao&acao=listar_questoes&ano=2015">2015</a></li>                  
								
                            </ul> 
                        </li>
                        <li><a href="#">Relatórios&raquo;</a>
                        <li><a href="usuadm.php?pa=relatorioderespostas&op=iniciar">Respostas</a></li>   
                        </li>
                    </ul>
                    
</div>