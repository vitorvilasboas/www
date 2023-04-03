<?php
include 'Connections/conecta.php';
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
	  function validar_avaliacao($codigo)
	  {
		$sql = "SELECT count(autoa_usu_codigo) as total from auto_avaliacao where autoa_usu_codigo =".$codigo;
                $this->resultado = $this->con->banco->Execute($sql);
                $this->registros = $this->resultado->FetchNextObject();
                return $this->registros->TOTAL;			
	  }
          function cadastrar($questao,$resposta,$usuario,$ano){
              $sql_insert = ("insert into auto_avaliacao (autoa_questao,autoa_resposta,autoa_usu_codigo,autoa_ano) values ('$questao','$resposta','$usuario','$ano')");
              if($this->resultado = $this->con->banco->Execute($sql_insert)){
                  alerta("O questionário foi respondido com sucesso");
              }else{
                  alerta("Houve um erro ao responder o questionário!");
              }
          }

			
     }

?>

