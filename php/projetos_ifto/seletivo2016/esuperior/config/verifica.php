<?php
    function verifica_sistema(){
        require "confGlobais.php";
        require "conectaBanco.php";
            
        $SQL = "select * from sistema where idsistema=".$codigo_sistema;
        $resultado = mysql_query($SQL);
        $linha = mysql_fetch_array($resultado);
        return ($linha["no_ar_sistema"]);
    }

    function verifica_inscricao(){
        require "confGlobais.php";
        if ( time() < $data_inicio_inscricoes || !verifica_sistema() ) {
            return 0;
        }else if ( time() <= $data_final_inscricoes ) {
            return 1;
        }
        return 2;
    }


    function verifica_consulta_inscricao() {
        require "confGlobais.php";
        if ( (time() >= $data_inicio_inscricoes) && (time() <= $data_final_consultar_inscricao) && $consultar_inscricao && verifica_sistema() ) {
            return 1;
        }    
        return 0;
    }

    function verifica_alteracao_inscricao() {
        require "confGlobais.php";
        if ( (time() >= $data_inicio_inscricoes) && (time() <= $data_final_alterar_inscricao) && $alterar_inscricao && verifica_sistema() ) {
            return 1;
        }    
        return 0;
    }

    function verifica_cartao_acesso() {
        require "confGlobais.php";
        if ( time() >= $data_inicio_inscricoes && time() <= $data_final_consultar_inscricao && $libera_cartao && verifica_sistema() ) {
            return 1;
        }    
        return 0;
    }   
    
    function verifica_boleto() {
        require "confGlobais.php";
        if (time() >= $data_inicio_inscricoes && time() <= $data_final_impressao_boleto && $libera_boleto && verifica_sistema() ) {
            return 1;
        }    
        return 0;
    }      
?>