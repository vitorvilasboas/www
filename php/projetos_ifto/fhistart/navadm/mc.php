<?php
require 'Connections/conecta.php';
     
    class mc_funcao{
        var $resultado;
	var $registros;
	           
        function mc_funcao(){
            $this->con=new conexao();
        }
        
        function mc_listar(){            
            $usuario=$_REQUEST['usuario'];
            $minicurso=$_REQUEST['minicursos'];        
         
            $sql = "select * from itens_minicursos";
            $this->resultado = $this->con->banco->Execute($sql);
            if($this->registros = $this->resultado->FetchNextObject())// abre listar os minicuros
            {
                return true;
            }
            else
            {
                    //alerta("Não foi listado");
                return false;
            }
             
        } 

        function verifica_participacao(){                             
             $usuario=$_REQUEST['usuario'];
             foreach($_POST['minicursos'] as $cont => $minicursos) {
             //$minicurso=$_REQUEST['minicursos'];
             //$ic_mcso_codigo=$this->registros->IC_MCSO_CODIGO;
            
             $sql=("select count(*)as TOTAL from itens_minicursos where IC_USU_CODIGO='$usuario' and IC_MCSO_CODIGO='$minicursos'");
             $this->resultado = $this->con->banco->Execute($sql);           
             $this->registros=$this->resultado->FetchNextObject();            
             return $this->registros->TOTAL; 
        } 
        }
        function verifica_horario(){                             
             //$usuario=$_REQUEST['usuario'];
             //$minicurso=$_REQUEST['minicursos'];
             //$horario=$_REQUEST['horario'];
            
             $sql=("select mcso_horario from minicursos inner join itens_minicursos on ic_mcso_codigo=mcso_codigo where mcso_horario='$horario' and ic_usu_codigo='$usuario'");
             $this->resultado = $this->con->banco->Execute($sql);           
             if($this->registros=$this->resultado->FetchNextObject()){            
             return true;
             }
//return $this->registros->TOTAL; 
        }
  

        function contador_vagas(){ 
            foreach($_POST['minicursos'] as $cont => $minicursos) {
              $sql=("select * from minicursos where MCSO_CODIGO='$minicursos'");
              $this->resultado = $this->con->banco->Execute($sql);
              foreach($this->resultado as $linha){
                   $vagas=$linha['mcso_vagas'];
                   $contador=$linha['mcso_cont_vagas'];
              }
              if($contador<=$vagas){// Verifica se tem vagas
                    return true;
              }
              else{
                   alerta("Esse curso não possui vagas!");
                   return false;
              }
         }
        }
         
         function inserir_chave_part_minicursos(){                               
              $usuario=$_REQUEST['usuario'];
              foreach($_POST['minicursos'] as $cont => $minicursos) {
              //$minicurso=$_REQUEST['minicursos'];                
              $sql=("insert into itens_minicursos (ic_usu_codigo,ic_mcso_codigo) values ($usuario,$minicursos)");
              if($this->resultado = $this->con->banco->Execute($sql)){//abre insert de itens_minicursos
                    //alerta("Cadastrado com sucesso!");
                    return true;
              }
              else{
                    alerta("Não foi cadastrado!");
                    return false;
              }
              }
          }
          function seleciona_minicurso(){                                     
              $usuario=$_REQUEST['usuario'];
              foreach($_POST['minicursos'] as $cont => $minicursos) {           
              $sql=("select * from minicursos where MCSO_CODIGO='$minicursos'");
              $this->resultado = $this->con->banco->Execute($sql);
              if($this->registros=$this->resultado->FetchNextObject()){//abre o atualizador do contador
                     $mcso_cont_vagas=$this->registros->MCSO_CONT_VAGAS;
                     $total=$mcso_cont_vagas + 1;
                     $sql ="UPDATE minicursos SET MCSO_CONT_VAGAS = '$total' WHERE MCSO_CODIGO ='$minicursos'";
                     if($this->resultado = $this->con->banco->Execute($sql)){
                              //alerta("atualizado com sucesso!");
                          return true;
                     }
                     else{
                          alerta("Não foi atualizado!");
                          return false;
                     }
               }
               return true;
         }
         }         
                             
 }  
 
 $f_minicursos = new mc_funcao();
          
 ?>