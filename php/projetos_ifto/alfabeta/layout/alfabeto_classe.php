<?php
include 'conexao/conecta.php';
class alfabeto_classe 
{
      var $resultado;
      var $registros;
      var $opcao;
      
      function alfabeto_classe(){
          $this->con = new conexao();
      }
      function lista_alfabeto(){
          $sql = "select * from alfabeto";
          $this->resultado=$this->con->banco->Execute($sql);
      }  
      function lista_cores(){
          $sql = "select * from cores";
          $this->resultado=$this->con->banco->Execute($sql);
      }     
      function lista_numeros(){
          $sql = "select * from numeros";
          $this->resultado=$this->con->banco->Execute($sql);
      }    
      function lista_vogais(){
          $sql = "select * from alfabeto where codigo=1 or codigo=5 or codigo=9 or codigo=15 or codigo=21";
          $this->resultado=$this->con->banco->Execute($sql);
      }  
      function lista_consoantes(){
          $sql = "select * from alfabeto where codigo<>1 AND codigo<>5 AND codigo<>9 AND codigo<>15 AND codigo<>21";
          $this->resultado=$this->con->banco->Execute($sql);
      }
}
?>
