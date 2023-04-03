<div id="pagina">
    <h1>Estatisticas</h1>
    
    <?php
    require 'Connections/conecta.php';
    $sql =  "SELECT count(modalidade) as qtd,tpt_descricao  FROM artigos  inner join modalidades on tpt_codigo = modalidade group by modalidade";
    $resultado = $con->banco->Execute($sql);
    while($registros = $resultado->FetchNextObject()){
        echo $registros->QTD.' - '. $registros->TPT_DESCRICAO."<br />";
    }
    ?>
</div>
