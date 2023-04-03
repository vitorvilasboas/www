<?php
    
    session_start();
    if(!isset($_SESSION["on_nome"]) || !isset($_SESSION["on_codigo"])) { // Verifica se existem os dados da sessão de login
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
    } else  {        
?>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <link rel="stylesheet" href="estilo.css" type="text/css" 
                    media="screen">
                <title>SISCOP - IFTO</title>
                <script language="javascript">
                    c=0
                    du="";
                    function escondediv(dv,n){		
                        for(i=1;i<=n;i++){			
                            if(i==dv ){
                                if(du!=dv){
                                    document.getElementById('mdiv'+i).style.display="inline"
                                    du=dv
                                }else{
                                    du=""
                                    document.getElementById('mdiv'+i).style.display="none"
                                }
                            }else{
                                document.getElementById('mdiv'+i).style.display="none"				  					
                            }								
                        }		
                    }
                    function reveza(qq){
                        document.getElementById(qq).className="itens_menu_r"
                    }
                    function volta(qq){
                        document.getElementById(qq).className="itens_menu"
                    }
                    //Coloque aqui o número de itens de menu
                    n_divs='4'
                </script>
            </head>
            <body bgcolor="#2E6515">
                <div id="box_geral">
                    
                        <a href="principal.php?p=home"><div id="topo"></div></a>
                    <hr>
                    <div id="inter"></div>
                    <hr>
                    <div id="conteudo_geral">                
                        <div id="menu">
                            <?php
                                
                                if(!isset($_SESSION["on_nome"]) || !isset($_SESSION["on_codigo"])) {// Verifica se existem os dados da sessão de login
                                    echo '<meta http-equiv="refresh" content="0; url=index.php" />';//URL mostrado apenas de exemplo
                                } else  {
                                    if(($_SESSION["on_permissao"])=='Avaliador') {
                                        if($_SESSION["on_senha"]==(md5(md5($_SESSION["on_siape"])))){
                                            ?>
                                            <div class="titulo_menu">
                                                <a href="principal.php?p=usuario&acao=alterarsenha">Alterar Senha</a>
                                            </div>
                                            
                                            <div class="titulo_menu">
                                                <a href="sair.php?p=home">Sair</a>
                                            </div>
                                            <?php
                                        } else {
                                           // echo $_SESSION["on_senha"].'     '.md5(md5($_SESSION["on_siape"])).'     '.$_SESSION["on_permissao"];
                                        ?>
                                            <!--    Inicio Menu     -->
                                            <div class="titulo_menu">
                                                <a href="principal.php?p=home">Home</a>
                                            </div>

                                            <div class="titulo_menu"  >
                                                <a href="javascript:void(escondediv('1',n_divs))">Requisições</a>
                                            </div>
                                            <div id="mdiv1"  class="submenu" style="display:none">
                                                <ul>
                                                    <li><a href="principal.php?p=requisicao&acao=listar_por_usuario" onmouseover="reveza('um')" onmouseout="volta('um')">Minhas Requisições</a></li>
                                                    <li><a href="principal.php?p=requisicao&acao=cadastrar">Nova Requisição</a></li>
                                                    <li><a href="principal.php?p=requisicao&acao=listar_pendentes">Requisições Pendentes</a></li>
                                                    <li><a href="principal.php?p=requisicao&acao=buscar">Buscar Requisição</a></li>
                                                </ul>
                                            </div>

                                            <div class="titulo_menu"  >
                                                <a href="javascript:void(escondediv('2',n_divs))">Relatórios</a>
                                            </div>
                                            <div id="mdiv2"  class="submenu" style="display:none">
                                                <ul>
                                                    <li><a href="principal.php?p=requisicao&acao=relatorio">Requisições</a></li>
                                                    <li><a href="principal.php?p=usuario&acao=relatorio">Usuários</a></li>
                                                    <li><a href="principal.php?p=departamento&acao=relatorio">Departamentos</a></li>
                                                </ul>
                                            </div>
                                            
                                            <div class="titulo_menu">
                                                <a href="principal.php?p=usuario&acao=alterarsenha">Alterar Senha</a>
                                            </div>
                                            
                                            <div class="titulo_menu">
                                                <a href="sair.php?p=home">Sair</a>
                                            </div>
                                            <!--    Fim Menu     -->
                                        <?php
                                        }
                                    } else if(($_SESSION["on_permissao"])=='Requerente'){
                                        if($_SESSION["on_senha"]==(md5(md5($_SESSION["on_siape"])))){
                                            ?>
                                            <div class="titulo_menu">
                                                <a href="principal.php?p=usuario&acao=alterarsenha">Alterar Senha</a>
                                            </div>
                                            
                                            <div class="titulo_menu">
                                                <a href="sair.php?p=home">Sair</a>
                                            </div>
                                            <?php
                                        } else {
                                        ?>
                                            <!--    Inicio Menu     -->
                                            <div class="titulo_menu">
                                                <a href="principal.php?p=home">Home</a>
                                            </div>

                                            <div class="titulo_menu"  >
                                                <a href="javascript:void(escondediv('1',n_divs))">Requisições</a>
                                            </div>
                                            <div id="mdiv1"  class="submenu" style="display:none">
                                                <ul>
                                                    <li><a href="principal.php?p=requisicao&acao=listar_por_usuario" onmouseover="reveza('um')" onmouseout="volta('um')">Minhas Requisições</a></li>
                                                    <li><a href="principal.php?p=requisicao&acao=cadastrar">Nova Requisição</a></li>
                                                </ul>
                                            </div>

                                            <div class="titulo_menu"  >
                                                <a href="javascript:void(escondediv('2',n_divs))">Relatórios</a>
                                            </div>
                                            <div id="mdiv2"  class="submenu" style="display:none">
                                                <ul>
                                                    <li><a href="principal.php?p=requisicao&acao=relatorio">Requisições</a></li>
                                                </ul>
                                            </div>

                                            <div class="titulo_menu">
                                                <a href="principal.php?p=usuario&acao=alterarsenha">Alterar Senha</a>
                                            </div>
                                            
                                            <div class="titulo_menu">
                                                <a href="sair.php?p=home">Sair</a>
                                            </div>
                                            <!--    Fim Menu     -->
                                        <?php
                                        }
                                    } else if(($_SESSION["on_permissao"])=='Reprografia'){
                                        if($_SESSION["on_senha"]==(md5(md5($_SESSION["on_siape"])))){
                                            ?>
                                            <div class="titulo_menu">
                                                <a href="principal.php?p=usuario&acao=alterarsenha">Alterar Senha</a>
                                            </div>
                                            
                                            <div class="titulo_menu">
                                                <a href="sair.php?p=home">Sair</a>
                                            </div>
                                            <?php
                                        } else {
                                        ?>
                                            <!--    Inicio Menu     -->
                                            <div class="titulo_menu">
                                                <a href="principal.php?p=home">Home</a>
                                            </div>

                                            <div class="titulo_menu"  >
                                                <a href="javascript:void(escondediv('1',n_divs))">Requisições</a>
                                            </div>
                                            <div id="mdiv1"  class="submenu" style="display:none">
                                                <ul>
                                                    <li><a href="principal.php?p=requisicao&acao=listar_pendentes">Requisições Pendentes</a></li>
                                                </ul>
                                                <!--<font size="1px" color="#ffffff">_</font>-->
                                            </div>

                                            <div class="titulo_menu"  >
                                                <a href="javascript:void(escondediv('2',n_divs))">Relatórios</a>
                                            </div>
                                            <div id="mdiv2"  class="submenu" style="display:none">
                                                <ul>
                                                    <li><a href="principal.php?p=requisicao&acao=relatorio">Requisições</a></li>
                                                </ul>
                                            </div>

                                            <div class="titulo_menu">
                                                <a href="principal.php?p=usuario&acao=alterarsenha">Alterar Senha</a>
                                            </div>
                                            
                                            <div class="titulo_menu">
                                                <a href="sair.php?p=home">Sair</a>
                                            </div>
                                            <!--    Fim Menu     -->
                                        <?php
                                        }
                                    } else if(($_SESSION["on_permissao"])=='Root'){
                                        ?>
                                            <!--    Inicio Menu     -->
                                            <div class="titulo_menu">
                                                <a href="principal.php?p=home">Home</a>
                                            </div>

                                            <div class="titulo_menu"  >
                                                <a href="javascript:void(escondediv('1',n_divs))">Requisições</a>
                                            </div>
                                            <div id="mdiv1"  class="submenu" style="display:none">
                                                <ul>
                                                    <li><a href="principal.php?p=requisicao&acao=listar_por_usuario" onmouseover="reveza('um')" onmouseout="volta('um')">Minhas Requisições</a></li>
                                                    <li><a href="principal.php?p=requisicao&acao=cadastrar">Nova Requisição</a></li>
                                                    <li><a href="principal.php?p=requisicao&acao=listar_pendentes">Requisições Pendentes</a></li>
                                                    <li><a href="principal.php?p=requisicao&acao=buscar">Buscar Requisição</a></li>
                                                </ul>
                                            </div>

                                            <div class="titulo_menu"  >
                                                <a href="javascript:void(escondediv('2',n_divs))">Usuários</a>
                                            </div>
                                            <div id="mdiv2"  class="submenu" style="display:none">
                                                <ul>
                                                    <li><a href="principal.php?p=usuario&acao=cadastrar">Novo Usuário</a></li>
                                                    <li><a href="principal.php?p=usuario&acao=manter_buscar">Manter Usuário</a></li>
                                                </ul>
                                            </div> 

                                            <div class="titulo_menu"  >
                                                <a href="javascript:void(escondediv('3',n_divs))">Departamentos</a>
                                            </div>
                                            <div id="mdiv3"  class="submenu" style="display:none">
                                                <ul>
                                                    <li><a href="principal.php?p=departamento&acao=cadastrar">Novo Departamento</a></li>
                                                    <li><a href="principal.php?p=departamento&acao=manter_buscar">Manter Departamento</a></li>
                                                </ul>
                                            </div>

                                            <div class="titulo_menu"  >
                                                <a href="javascript:void(escondediv('4',n_divs))">Relatórios</a>
                                            </div>
                                            <div id="mdiv4"  class="submenu" style="display:none">
                                                <ul>
                                                    <li><a href="principal.php?p=requisicao&acao=relatorio">Requisições</a></li>
                                                    <li><a href="principal.php?p=usuario&acao=relatorio">Usuários</a></li>
                                                    <li><a href="principal.php?p=departamento&acao=relatorio">Departamentos</a></li>
                                                </ul>
                                            </div>

                                            <div class="titulo_menu"><a href="principal.php?p=usuario&acao=alterarsenha">Alterar Senha</a></div> 
                                            <div class="titulo_menu"><a href="sair.php?p=home">Sair</a></div>
                                            <!--    Fim Menu     -->
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="dados_usuario">
                                <p>
                                    Bem Vindo, <font color="#666666"><?php echo $_SESSION["on_nome"];?></font>
                                </p>
                        </div>
                        <div id="conteudo">
                            <?php 
                             //else {
                                include 'paginas.php';
                            //}
                            ?>
                        </div>
                    </div>         
                    <div id="rodape"><hr><font>Instituto Federal	de	Educação, Ciência e Tecnologia do Tocantins - Campus Araguatins 
                        <br>Copyright (c) 2013. IFTO - Campus Araguatins. 
                        <br>Desenvolvido por <a href="http://lattes.cnpq.br/5675605268102409"  target="_blank">Vitor Vilas Boas</a>.</font>
                    </div>

                </div>
            </body>
        </html>
<?php
    }
?>

        
