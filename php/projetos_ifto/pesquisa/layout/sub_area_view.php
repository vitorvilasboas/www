
<section>
    <div class="head_form">        
        <div class="titulo_view">Visualizar Sub-área</div>
        <div class="pesquisar_view">
            <form action="index.php?p=sub_area&action=pesquisar" method="post">
                <label>
                    <input type="search" name="busca" placeholder="Pesquisar">
                    <input type="submit" name="pesquisa" value=""/>
                </label>
            </form>
        
        </div>
    </div> 
 <div class="viewcadastros">
    <div class="titulo">
        <div class="t_idview">Código</div >
        <div class="t_descricao_view" >Descrição</div >
        <div class="t_icoview">
            <a href="index.php?p=sub_area&action=cadastro">
                <img src="imagens/add.png" />&nbsp;&nbsp;Novo
            </a>
        </div>
    </div>
    <?php
    $registros = $registro;
    $cont = count($registros);
    for($i=0;$i<$cont;$i++){
        
    ?> 
    <div class="dados<?php echo listazebrada($i) ?>">
        <div class="d_idview<?php echo listazebrada($i) ?>"><?php echo $registros[$i]['SBA_CODIGO']; ?></div>
        <div class="d_descricao_view<?php echo listazebrada($i) ?>"><?php echo $registros[$i]['SBA_DESCRICAO']; ?></div>
        <div class="d_icoview<?php echo listazebrada($i) ?>"><a href="index.php?p=sub_area&action=view_alterar&sba_codigo=<?php echo $registros[$i]['SBA_CODIGO']; ?>"><img src="imagens/editar.png" />&nbsp;&nbsp;Alterar</a></div>
        <div class="d_icoview<?php echo listazebrada($i) ?>"><a href="index.php?p=sub_area&action=excluir&sba_codigo=<?php echo $registros[$i]['SBA_CODIGO']; ?>"><img src="imagens/excluir.png" />&nbsp;&nbsp;Excluir</a></div>
        <div class="d_icoview<?php echo listazebrada($i) ?>"><a href="index.php?p=sub_area&action=detalhes&sba_codigo=<?php echo $registros[$i]['SBA_CODIGO']; ?>"><img src="imagens/detalhes.png" />&nbsp;&nbsp;Detalhes</a></div>
    </div>
    <?php } ?> 
 
 
     <div class="view_cont">
         <div class="cadastrados">
             <p><?php echo contar_cadastros($cont); ?></p>
         </div>
     </div>
</div>  
</section>

