<?php

    echo '<pre>';

    print_r($_POST);

    echo '</pre>';

    //Montando o texto
    $titulo = str_replace('#','-',$_POST['titulo']);
    $categoria = str_replace('#','-',$_POST['categoria']);
    $descricao = str_replace('#','-',$_POST['descricao']);
    //implode('#',$_POST);

    $texto = $titulo.'#'.$categoria.'#'.$descricao.PHP_EOL;
    
    //http://php.net/manual/pt_BR/function.fopen.php
    //Abrindo o arquivo
    $arquivo = fopen('arquivo.hd','a');

    //Escrevendo texto no arquivo
    fwrite($arquivo,$texto);

    //Fechando o arquivo
    fclose($arquivo);

    //echo $texto;
    header('Location: abrir_chamado.php')
?>