<?php
require 'Connections/conecta.php';

class it_cursos_classe{
          var $resultado;
	  var $registros;
	  var $opcao;
	  	  	  
	  function it_cursos_classe(){
              $this->con = new conexao();
	  }

          function listar_minicursos(){
              $sql=("select usu_codigo,usu_nome,mcso_codigo, mcso_horario,mcso_valor, mcso_titulo, mcso_condutor, mcso_resumo, mcso_status,ic_situacao FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO WHERE MCSO_STATUS='Ativo' AND USU_CODIGO = '".$_SESSION['codigo']."'");
              $this->resultado = $this->con->banco->Execute($sql);
	  }

          function excluir_participante(){
              $sql = 'delete from itens_minicursos where IC_MCSO_CODIGO = "'.$_REQUEST['mcso_codigo'].'" and IC_USU_CODIGO = "'.$_REQUEST['iu_codigo'].'"';
			if ($this->resultado = $this->con->banco->Execute($sql)){
                                $sql_select=("select mcso_cont_vagas from minicursos where MCSO_CODIGO='".$_REQUEST['mcso_codigo']."'");
                                $this->resultado = $this->con->banco->Execute($sql_select);
                                if($this->registros=$this->resultado->FetchNextObject()){
                                    $vagas=$this->registros->MCSO_CONT_VAGAS;
                                    $vagas=$vagas-1;
                                }
                                $sql_update=("update minicursos set  MCSO_CONT_VAGAS='$vagas' where MCSO_CODIGO='".$_REQUEST['mcso_codigo']."'" );
				$this->resultado = $this->con->banco->Execute($sql_update);
                                alerta("Excluido com sucesso");
			          return true;
			}
			else{
				alerta("Não foi excluido");
				return false;
	 		}
          }
          function lista_participantes(){
                $minicurso=$_REQUEST['mcso_codigo'];
                $sql=("select  usu_codigo,usu_nome from usuarios inner join  itens_minicursos on  IC_USU_CODIGO= USU_CODIGO where IC_MCSO_CODIGO='$minicurso' order by USU_NOME");
                $this->resultado=$this->con->banco->Execute($sql);
          }
                
          
}

	//$opcao=new it_cursos_classe();

?>
