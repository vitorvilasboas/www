<?php
    include 'topo.php';
    include 'menu.php';
    include 'principal.php';
    include 'rodape.php';

    //require 'principal2.php';
    //require 'rodape.php';
    require_once 'rodape.php';
?>
    <!--
        include X require X require_once
        include: Not Found do arquivo incluido NÃO interrompe o processamento do restante do código/página.
        require: Not Found do arquivo requerido INTERROMPE o processamento do restante do código/página.
        require_once: NEvita que um mesmo arquivo seja incluido ou requerido mais de uma vez na mesma página.
    -->          