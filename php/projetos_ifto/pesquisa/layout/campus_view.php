
<section>
    <div class="head_form">        
        <div class="titulo_view">Visualizar campus</div>
        <div class="pesquisar_view">
            <form action="index.php?p=campus&action=pesquisar" method="post">
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
            <a href="index.php?p=campus&action=cadastro">
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
        <div class="d_idview<?php echo listazebrada($i) ?>"><?php echo $registros[$i]['CAMP_CODIGO']; ?></div>
        <div class="d_descricao_view<?php echo listazebrada($i) ?>"><?php echo $registros[$i]['CAMP_NOME']; ?></div>
        <div class="d_icoview<?php echo listazebrada($i) ?>"><a href="index.php?p=campus&action=view_alterar&camp_codigo=<?php echo $registros[$i]['CAMP_CODIGO']; ?>"><img src="imagens/editar.png" />&nbsp;&nbsp;Alterar</a></div>
        <div class="d_icoview<?php echo listazebrada($i) ?>"><a href="index.php?p=campus&action=excluir&camp_codigo=<?php echo $registros[$i]['CAMP_CODIGO']; ?>"><img src="imagens/excluir.png" />&nbsp;&nbsp;Excluir</a></div>
        <div class="d_icoview<?php echo listazebrada($i) ?>"><a href="index.php?p=campus&action=detalhes&camp_codigo=<?php echo $registros[$i]['CAMP_CODIGO']; ?>"><img src="imagens/detalhes.png" />&nbsp;&nbsp;Detalhes</a></div>
    </div>
    <?php } ?> 
 
 
     <div class="view_cont">
         <div class="cadastrados">
             <p><?php echo contar_cadastros($cont); ?></p>
         </div>
     </div>
</div>  
</section>

