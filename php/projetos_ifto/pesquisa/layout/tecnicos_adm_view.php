
<section>
    <div class="head_form">        
        <div class="titulo_view">Visualizar Técnicos Admistrativos</div>
        <div class="pesquisar_view">
            <form action="index.php?p=tecnicos_adm&action=pesquisar" method="post">
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
        <div class="t_descricao_view" >Nome</div >
        <div class="t_icoview">
            <a href="index.php?p=tecnicos_adm&action=cadastro">
                <img src="imagens/add.png" />&nbsp;&nbsp;Novo
            </a>
        </div>
    </div>
    <?php
    $registros = $registro;
    $cont = count($registros);
    for($i=0;$i<$cont;$i++){
    $nome = $opcao->select_nome_tecnicos_adm($registros[$i]['TADM_USU_CODIGO']);    
    ?> 
    <div class="dados<?php echo listazebrada($i) ?>">
        <div class="d_idview<?php echo listazebrada($i) ?>"><?php echo $registros[$i]['TADM_CODIGO']; ?></div>
        <div class="d_descricao_view<?php echo listazebrada($i) ?>"><?php echo $nome[0]['usu_nome']  ?></div>
        <div class="d_icoview<?php echo listazebrada($i) ?>"><a href="index.php?p=tecnicos_adm&action=view_alterar&tadm_codigo=<?php echo $registros[$i]['TADM_CODIGO']; ?>"><img src="imagens/editar.png" />&nbsp;&nbsp;Alterar</a></div>
        <div class="d_icoview<?php echo listazebrada($i) ?>"><a href="index.php?p=tecnicos_adm&action=excluir&tadm_codigo=<?php echo $registros[$i]['TADM_CODIGO']; ?>"><img src="imagens/excluir.png" />&nbsp;&nbsp;Excluir</a></div>
        <div class="d_icoview<?php echo listazebrada($i) ?>"><a href="index.php?p=tecnicos_adm&action=detalhes&tadm_codigo=<?php echo $registros[$i]['TADM_CODIGO']; ?>"><img src="imagens/detalhes.png" />&nbsp;&nbsp;Detalhes</a></div>
    </div>
    <?php } ?> 
 
 
     <div class="view_cont">
         <div class="cadastrados">
             <p><?php echo contar_cadastros($cont); ?></p>
         </div>
     </div>
</div>  
</section>

