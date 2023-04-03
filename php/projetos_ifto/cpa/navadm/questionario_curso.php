
<div id="pagina">
   <h3 class="titulo1">Selecione o curso, que você vai responder o questionario. </h3> 
   <?php if($_SESSION['tipo_usuario']=='1'){?>     
        <form class="formulario" action="usuadm.php?pa=questionario_acao&acao=estudantes" method="post" enctype="multiparm/form-data">              
               <table class="tabelas">
                   <input type="hidden" name="categoria" value="<?php echo $_REQUEST['perfil'];?>" />
                        <tr>
                            <th class="th276t">Informe o campus onde você estuda.</th>
                            <td class="td700">
                                <select class="input_700" name="fkcampus_codigo">
                                    <option>Selecione</option>
                                    <?php echo $opcao->listar_campus(); ?>
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <th class="th276t">Qual é o seu curso?</th>
                            <td class="td700">
                                <select class="input_700" name="fkcurso_codigo">
                                    <option>Selecione</option>
                                    <?php echo $opcao->listar_cursos(); ?>
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <th class="th276t">Qual o período você está cursando?</th>
                            <td class="td700">
                                <select class="input_700" name="periodo">
                                    <option >Selecione</option>
                                    <option value="1">1º Período</option>
                                    <option value="2">2º Período</option>
                                    <option value="3">3º Período</option>
                                    <option value="4">4º Período</option>
                                    <option value="5">5º Período</option>
                                    <option value="6">6º Período</option>
                                    <option value="7">7º Período</option>
                                    <option value="8">8º Período</option>
                                    <option value="9">9º Período</option>
                                    <option value="10">10º Período</option>
                                </select>
                                
                            </td>
                        </tr>

                   </table>
            <input class="btn"type="submit" name="enviar" value="Continuar" />
        </form>
   <?php } elseif($_SESSION['tipo_usuario']=='2'){?>     
        <form class="formulario" action="usuadm.php?pa=questionario_acao&acao=docentes" method="post" enctype="multiparm/form-data">              
               <table class="tabelas">
                   <input type="hidden" name="categoria" value="<?php echo $_REQUEST['perfil'];?>" />
                        <tr>
                            <th class="th276t">Informe o seu campus.</th>
                            <td class="td700">
                                <select class="input_700" name="fkcampus_codigo">
                                    <option>Selecione</option>
                                    <?php echo $opcao->listar_campus(); ?>
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <th class="th276t">Selecione o curso superior que você quer responder.</th>
                            <td class="td700">
                                <select class="input_700" name="fkcurso_codigo">
                                    <option>Selecione</option>
                                    <?php echo $opcao->listar_cursos(); ?>
                                </select>
                                
                            </td>
                        </tr>
                   </table>
            <input class="btn"type="submit" name="enviar" value="Continuar" />
        </form>
   <?php } elseif($_SESSION['tipo_usuario']=='3'){?>     
        <form class="formulario" action="usuadm.php?pa=questionario_acao&acao=tecnicos_adm" method="post" enctype="multiparm/form-data">              
               <table class="tabelas">
                   <input type="hidden" name="categoria" value="<?php echo $_REQUEST['perfil'];?>" />
                        <tr>
                            <th class="th276t">Informe o seu campus.</th>
                            <td class="td700">
                                <select class="input_700" name="fkcampus_codigo">
                                    <option>Selecione</option>
                                    <?php echo $opcao->listar_campus(); ?>
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <th class="th276t">Selecione o curso superior que você quer responder.</th>
                            <td class="td700">
                                <select class="input_700" name="fkcurso_codigo">
                                    <option>Selecione</option>
                                    <?php echo $opcao->listar_cursos(); ?>
                                </select>
                                
                            </td>
                        </tr>
                   </table>
            <input class="btn"type="submit" name="enviar" value="Continuar" />
        </form>
   <?php }?>
</div>

