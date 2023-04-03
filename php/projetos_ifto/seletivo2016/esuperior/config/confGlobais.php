<?php
    $servidor = 'localhost';
    $usuario = 'sistemas';//'sistemas'; 
    $pass = '5iSt&M4sb1(0';//'5iSt&M4sb1(0';
    $db = "seletivosuperior2016"; 

    $data_inicio_inscricoes = strtotime("2015-09-28 00:00:00"); /* correto: 28/09/2015 */
    $data_final_inscricoes = strtotime("2015-10-30 23:59:59");  /* correto: 30/10/2015 */
    $data_final_impressao_boleto = strtotime("2015-10-30 23:59:59"); /* correto: 30/10/2015 */
    $data_final_alterar_inscricao = strtotime("2015-11-06 23:59:59"); /* correto: 06/11/2015 */
    $data_final_consultar_inscricao = strtotime("2016-12-31 23:59:59");

    $data_prova = "29/11/2015"; /* correto: 22/11/2015 */
    $hora_inicio_prova = "08:00";
    $hora_final_prova = "12:00";
    $hora_acesso_local = "07:30";
    $hora_saida_sem_caderno = "09:00";
    $hora_saida_com_caderno = "11:00";

    $libera_cartao = true;
    $libera_boleto = true;
    $alterar_inscricao = true;
    $consultar_inscricao = true;
    
    $valor_inscricao = "50,00";
    $data_vencimento_gru = "30/10/2015"; /* correto: 02/11/2015 */
    $codigo_recolhimento_gru = "28900-0";
    $nome_recohimento_gru = "TAXA DE INSCRICAO EM VESTIBULAR";
    $competencia_gru = "10/2015"; /* ou 11/2015 */
    $codigo_favorecido_gru = "158337";
    $nome_favorecido_gru = "INST.FED.DO TOCANTINS/CAMPUS ARAGUATINS";
    $gestao_gru = "26424";
    $codigo_correlacao_gru = "10617";
    
    $pagina_inicial = "index.php";
    $periodo_letivo = "2016/1";
		
    $codigo_local_prova = "1"; /*IFTO Campus Araguatins*/
    $codigo_sistema = "1";
    
    $instituicao = "IFTO/Campus Araguatins";
    $n_alunos_pagina = 30;
    $maximo_aluno_sala = 30;
    $minimo_aluno_sala = 3;

    $texto_manutencao = "Desculpe, o sistema est� em manunte��o. Por favor, tente mais tarde.";
    $texto_cartao_acesso = "<p class='text_grande_caps_color'>Informa��es Importantes</p>
        <ul>
            <li>As provas ser�o realizadas no dia ".$data_prova.", das ".$hora_inicio_prova." �s ".$hora_final_prova.".</li><br/>
            <li>O candidato dever� comparecer ao local das provas com anteced�ncia m�nima de 1 hora.</li><br/>
            <li>N�o ser� permitida a entrada de candidatos no local das provas ap�s o in�cio da aplica��o.</li><br/>
            <li>O candidato dever� estar munido do seu comprovante de inscri��o (cart�o de acesso ou comprovante de pagamento) e do documento informado no ato da inscri��o ou outro que contenha foto, impress�o digital e a numera��o do documento informado no ato da inscri��o e de caneta esferogr�fica de cor preta.</li><br>
            <li>O candidato ter� acesso ao local determinado para a realiza��o das provas a partir das ".$hora_acesso_local.", munido do ORIGINAL DO DOCUMENTO DE IDENTIFICA��O utilizado no ato da inscri��o e cart�o de acesso ou boleto de pagamento com comprovante de pagamento da taxa de inscri��o conforme Edital de Sele��o, e trazer, para a resolu��o das provas, l�pis, borracha e CANETA DE TINTA PRETA.</li><br/>
            <li><b>N�o ser�o aceitos como documentos de identifica��o:</b> certid�es de nascimento/casamento, t�tulos eleitorais, CPF, carteiras de estudante, carteiras funcionais sem valor de identidade, documentos n�o-identific�veis ou ilegiveis, tampouco onde se l�: \"N�o alfabetizado\" ou \"infantil\"</li><br/>
            <li>S� ser� permitida a sa�da definitiva do candidato a partir das ".$hora_saida_sem_caderno.", sem o caderno de provas; e a partir das ".$hora_saida_com_caderno.", com o caderno de provas.</li>
        </ul>";   
?>