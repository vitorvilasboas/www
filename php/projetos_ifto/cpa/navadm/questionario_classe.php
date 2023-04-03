<?php

class questionario_classe
  {
          var $resultado;
	  var $registros;
	  var $ordenar;
          var $opcao;
	  	  
	  function questionario_classe()
	  {
	  		$this->con = new conexao();
	  }


          function listar_dimensoes()
	  {     
	        $sql_dim = ("select * from dimensao where DIM_TIPO_USUARIO=".$_SESSION['tipo_usuario']." order by DIM_PERGUNTA");
                $this->resultado_dim = $this->con->banco->Execute($sql_dim); 

                
	  }
	  function excluir()
	  {
	        $sql = "delete from questoes where QUES_CODIGO = ".$_REQUEST['ques_codigo'];
			if ($this->resultado = $this->con->banco->Execute($sql))
			{
				alerta("Excluido com sucesso");
				return true;
			}
			else
			{
				alerta("Não foi excluido");
				return false;
	 		}
	  }
	  function gravar_incluir() 
	  {
              //$sql = "select  ques_nome,resp_nome from itens_quest_respostas inner join  questoes
              //      on QUES_CODIGO = FKQUES_CODIGO inner join  respostas 
              //      on  RESP_CODIGO = FKRESP_CODIGO inner join  usuarios on  USU_CODIGO = FKUSU_CODIGO";
              //$this->resultado = $this->con->banco->Execute($sql);
              //if($this->registros=$this->resultado->FetchNextObject()){
              //    alerta("Você já respondeu o questionário. Obrigado!");
				
              //}else{
              
              
              foreach(array($_REQUEST['questoes']) as $key=>$ques[]){
                             
                  foreach(array($_REQUEST['respostas']) as $key=>$resp[]){
                      for($i=1; $i<=$_REQUEST['contador']; $i++){
                      echo $questoes=$key=$ques[0][$i];
                      echo $resposta=$key=$resp[0][$i];
                    
                   
                  $sql = ("insert into itens_quest_respostas (fkques_codigo,fkresp_codigo,fkusu_codigo) values ('$questoes','$resposta','".$_SESSION['codigo']."')");
			$this->resultado = $this->con->banco->Execute($sql);
		
                        
                }
          }
          alerta("Questionário respondido com sucesso! Obrigado!");
          //}
              }
          }
          
	  function listar_questoes()
	  {
		$sql = "SELECT fkcurso_codigo,ques_nome, resp_nome,fk_ano FROM itens_quest_respostas
                        INNER JOIN questoes ON QUES_CODIGO = FKQUES_CODIGO
                        INNER JOIN respostas ON RESP_CODIGO = FKRESP_CODIGO
                        INNER JOIN usuarios ON USU_CODIGO = FKUSU_CODIGO
                        WHERE fk_ano = '".$_REQUEST['ano']."' and fkusu_codigo =".$_SESSION['codigo'];
                $this->resultado = $this->con->banco->Execute($sql);
			
	  }
          function dimensao()
	  {     
		$sql = "select  dim_nome from questoes inner join dimensao 
                    on FKDIM_CODIGO = DIM_CODIGO where FKTDU_CODIGO='".$_REQUEST['categoria']."'";
                $this->resultado = $this->con->banco->Execute($sql);
			
	  }
          function listar_campus(){
            $retorna='';
             $sql = "select  * from campus order by campus_nome";
             $this->resultado = $this->con->banco->Execute($sql);
             while($this->registros = $this->resultado->FetchNextObject()){
		    $selecionado = '';
				  if($this->registros->CAMPUS_NOME);
				  {
					  $selecionado = 'deselected';
				  }
		          $retorna = $retorna . '<option value="'.$this->registros->CAMPUS_CODIGO.'"'.$selecionado.'>'.$this->registros->CAMPUS_NOME.'</option>'; 
			  
			  }

			  return $retorna;
        }
   	function listar_cursos(){
            $retorna='';
             $sql = "select  * from cursos order by curso_nome";
             $this->resultado = $this->con->banco->Execute($sql);
             while($this->registros = $this->resultado->FetchNextObject()){
		    $selecionado = '';
				  if($this->registros->CURSO_NOME);
				  {
					  $selecionado = 'deselected';
				  }
		          $retorna = $retorna . '<option value="'.$this->registros->CURSO_CODIGO.'"'.$selecionado.'>'.$this->registros->CURSO_NOME.'</option>'; 
			  
			  }

			  return $retorna;
        }
          
	  function estudantes(){
              
          $sql_resposta = ("select fkusu_codigo,fkcurso_codigo,fke_ano,fkcampus_codigo from estudantes where fke_ano = '2015' and fkusu_codigo='".$_SESSION['codigo']."' and fkcurso_codigo='".$_SESSION['curso']."' and fkcampus_codigo='1' ");
          $this->resultado_resposta = $this->con->banco->Execute($sql_resposta);
          if($this->registro_resposta = $this->resultado_resposta->fetchnextobject()==''){
          //if(($this->registro_resposta->FKCURSO_CODIGO=='') and ($this->registro_resposta->FKUSU_CODIGO='')){
              
                  foreach(array($_REQUEST['questoes']) as $key=>$ques[]){
                             
                      foreach(array($_REQUEST['respostas']) as $key=>$resp[]){
                           for($i=1; $i<=$_REQUEST['contador']; $i++){
                                $questoes=$key=$ques[0][$i];
                                $resposta=$key=$resp[0][$i];
                    
                   
                                $sql = ("insert into itens_quest_respostas (fkques_codigo,fkresp_codigo,fkusu_codigo,fk_ano,fkcurso_codigo) values ('$questoes','$resposta','".$_SESSION['codigo']."','2015','".$_SESSION['curso']."')");
                                $this->resultado = $this->con->banco->Execute($sql);
		
                        
                            }
                      }
                      $sql_insert = ("insert into estudantes (fkusu_codigo,fkcurso_codigo,fkcampus_codigo,fke_ano,respondeu_data) values ('".$_SESSION['codigo']."','".$_SESSION['curso']."','1','2015','".date('d/m/Y H:i:s')."')");
	              if($this->resultado = $this->con->banco->Execute($sql_insert)){
                      alerta("O questionario foi respondido com sucesso");
                      }
                  }
                  
             }else {alerta("Você já respondeu o questionário!");}
                  
       	     }
         function docentes(){
          $sql_resposta = ("select fkusu_codigo,fkcurso_codigo,fkd_ano,fkcampus_codigo from docentes where fkd_ano = '2015' and fkusu_codigo='".$_SESSION['codigo']."' and fkcampus_codigo='1' ");
          $this->resultado_resposta = $this->con->banco->Execute($sql_resposta);
          if($this->registro_resposta = $this->resultado_resposta->fetchnextobject()==''){
              //if(($this->registro_resposta->FKCURSO_CODIGO==$_SESSION['curso']) and ($this->registro_resposta->FKUSU_CODIGO=$_SESSION['codigo'])){
              
                  foreach(array($_REQUEST['questoes']) as $key=>$ques[]){
                             
                      foreach(array($_REQUEST['respostas']) as $key=>$resp[]){
                           for($i=1; $i<=$_REQUEST['contador']; $i++){
                                 $questoes=$key=$ques[0][$i];
                                 $resposta=$key=$resp[0][$i];
                    
                   
                                $sql = ("insert into itens_quest_respostas (fkques_codigo,fkresp_codigo,fkusu_codigo,fk_ano) values ('$questoes','$resposta','".$_SESSION['codigo']."','2015')");
                                $this->resultado = $this->con->banco->Execute($sql);
		
                        
                            }
                      }
                      $sql_insert = ("insert into docentes (fkusu_codigo,fkcampus_codigo,fkd_ano,respondeu_data) values ('".$_SESSION['codigo']."','1','2015','".date('d/m/Y H:i:s')."')");
	              if($this->resultado = $this->con->banco->Execute($sql_insert)){
                      alerta("O questionario foi respondido com sucesso");
                      }
                  }
                  
             }else {alerta("Você já respondeu o questionário!");}
                  
       	     }
         function tecnicos_adm(){
          $sql_resposta = ("select fkusu_codigo,fkcurso_codigo,fkta_ano,fkcampus_codigo from tecnicos_adm where fkta_ano = '2015' and fkusu_codigo='".$_SESSION['codigo']."' and  fkcampus_codigo='1' ");
          $this->resultado_resposta = $this->con->banco->Execute($sql_resposta);
          if($this->registro_resposta = $this->resultado_resposta->fetchnextobject()==''){
              //if(($this->registro_resposta->FKCURSO_CODIGO==$_SESSION['curso']) and ($this->registro_resposta->FKUSU_CODIGO=$_SESSION['codigo'])){
              
                  foreach(array($_REQUEST['questoes']) as $key=>$ques[]){
                             
                      foreach(array($_REQUEST['respostas']) as $key=>$resp[]){
                           for($i=1; $i<=$_REQUEST['contador']; $i++){
                                 $questoes=$key=$ques[0][$i];
                                 $resposta=$key=$resp[0][$i];
                    
                   
                                $sql = ("insert into itens_quest_respostas (fkques_codigo,fkresp_codigo,fkusu_codigo,fk_ano) values ('$questoes','$resposta','".$_SESSION['codigo']."','2015')");
                                $this->resultado = $this->con->banco->Execute($sql);
		
                        
                            }
                      }
                      $sql_insert = ("insert into tecnicos_adm (fkusu_codigo,fkcurso_codigo,fkcampus_codigo,fkta_ano,respondeu_data) values ('".$_SESSION['codigo']."','1','2015','".date('d/m/Y H:i:s')."')");
	              if($this->resultado = $this->con->banco->Execute($sql_insert)){
                      alerta("O questionario foi respondido com sucesso");
                      }
                  }
                  
             }else {echo "Você já respondeu o questionário!";}
                  
       	     }
			
     }

?>

