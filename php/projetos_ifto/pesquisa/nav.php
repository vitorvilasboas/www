<nav>
    <ul>
        <?php
        @session_start();
        if(isset($_SESSION['nivel']) and $_SESSION['nivel']=='admin'){
        ?>
        <li><a href="index.php?p=inicio"><spam class="home"></spam> Inicio </a> </li>
        <li><a href="index.php?p=campus&action=view"><spam class="campus"></spam> Campus</a> </li>
        <li><a href="index.php?p=cursos&action=view"><spam class="cursos"></spam> Cursos</a> </li>
        <li class="dropdown" > <a href="#"><spam class="grande_area"></spam> Áreas</a>  
            <ul class="dropdown-content">
                <li><a href="index.php?p=grande_area&action=view"><spam class=""></spam> Grande Área</a> </li>
                <li><a href="index.php?p=sub_area&action=view"><spam class=""></spam> Sub-área</a> </li>
            </ul>
        </li>
        <li class="dropdown" > <a href="index.php?p=diretorio&action=view"><spam class="usuarios"></spam> Diretório</a>  </li>
        <li class="dropdown" > <a href="index.php?p=usuarios&action=view"><spam class="usuarios"></spam> Usuários</a>  
            <ul class="dropdown-content">
                <li><a href="index.php?p=docentes&action=view"><spam class="docentes"></spam> Docentes</a> </li>
                <li><a href="index.php?p=estudantes&action=view"><spam class="estudantes"></spam> Estudantes</a> </li>
                <li><a href="index.php?p=tecnicos_adm&action=view"><spam class="tecnicos_adm"></spam> Tec. Admin.</a> </li>
            </ul>
        </li>
        <li class="dropdown" > <a href="index.php?p=coordenacoes&action=view"><spam class="ensino"></spam> Coordenações</a> </li>
        <li class="dropdown" > <a href="index.php?p=projetos&action=view"><spam class="pesquisador"></spam> Projetos</a></li>
        <li><a href="index.php?p=logout&op=logout"><spam class="sair"></spam>Sair</a></li>
       <?php
        }else{
        ?> 
        <li><a href="index.php?p=login"><spam class="login2"></spam>Login</a></li>
        <li><a href="index.php?p=sobre"><spam class="info"></spam>A instituição</a></li>
       
            <?php
        }
        ?> 
    </ul>
</nav>


