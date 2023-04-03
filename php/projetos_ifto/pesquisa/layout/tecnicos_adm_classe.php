<?php
class tecnicos_adm_classe{
    var $con;
    function tecnicos_adm_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_tecnicos_adm($tadm_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM tecnicos_adm where tadm_codigo='.$tadm_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
            function select_cpf_usuario($usu_cpf){              
         try{
            $this->listar = $this->con->query("SELECT * FROM usuarios where usu_cpf='$usu_cpf'");                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_nome_tecnicos_adm($tadm_usu_codigo){              
         try{
            $this->nome = $this->con->query('SELECT usu_nome FROM usuarios where usu_codigo='.$tadm_usu_codigo);                        
            $this->nome->execute();
            if($this->nome->rowCount()>0){
               return $this->nome->fetchAll(PDO::FETCH_ASSOC);
               
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_tecnicos_adm(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM tecnicos_adm');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_tecnicos_adm($tadm_usu_codigo,$tadm_siape,$tadm_cargo,$tadm_admissao,$tadm_titulacao){
        try{
            $this->insert = $this->con->prepare("INSERT into tecnicos_adm (tadm_usu_codigo,tadm_siape,tadm_cargo,tadm_admissao,tadm_titulacao) VALUES ('$tadm_usu_codigo','$tadm_siape','$tadm_cargo','$tadm_admissao','$tadm_titulacao')");
            $this->insert->bindValue(':tadm_usu_codigo',$tadm_usu_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':tadm_siape',$tadm_siape,PDO::PARAM_STR);
            $this->insert->bindValue(':tadm_cargo',$tadm_cargo,PDO::PARAM_STR);
            $this->insert->bindValue(':tadm_admissao',$tadm_admissao,PDO::PARAM_STR);
            $this->insert->bindValue(':tadm_titulacao',$tadm_titulacao,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_tecnicos_adm($tadm_codigo){
        try{
            $this->deletar = $this->con->query('delete from tecnicos_adm where tadm_codigo ='.$tadm_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_tecnicos_adm($tadm_usu_codigo,$tadm_siape,$tadm_cargo,$tadm_admissao,$tadm_titulacao,$tadm_codigo){
        try{
            $this->update = $this->con->prepare("update tecnicos_adm set tadm_usu_codigo='$tadm_usu_codigo', tadm_siape='$tadm_siape', tadm_cargo='$tadm_cargo', tadm_admissao='$tadm_admissao',tadm_titulacao='$tadm_titulacao' where tadm_codigo=".$tadm_codigo);
            $this->update->bindValue(':tadm_codigo',$tadm_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':tadm_usu_codigo',$tadm_usu_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':tadm_siape',$tadm_siape,PDO::PARAM_STR);
            $this->update->bindValue(':tadm_cargo',$tadm_cargo,PDO::PARAM_STR);
            $this->update->bindValue(':tadm_admissao',$tadm_admissao,PDO::PARAM_STR);
            $this->update->bindValue(':tadm_titulacao',$tadm_titulacao,PDO::PARAM_STR);
            if($this->update->execute()){
                msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function select_usuarios(){
        try{ 
            $this->listar_select_usuarios = $this->con->query('select * from usuarios order by usu_nome');                        
            $this->listar_select_usuarios->execute();
            if($this->listar_select_usuarios->rowCount()>0){
               return $this->listar_select_usuarios->fetchAll(PDO::FETCH_ASSOC); 
            }

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    function pesquisar_tecnicos_adm($pesquisar){         
        try{ 
            $this->pesquisar_tecnicos_adm = $this->con->query("SELECT * FROM usuarios inner join tecnicos_adm on tadm_usu_codigo = usu_codigo WHERE usu_nome like'%$pesquisar%' or usu_cpf like'%$pesquisar%'");                        
            $this->pesquisar_tecnicos_adm->execute();
            if($this->pesquisar_tecnicos_adm->rowCount()>0){
               return $this->pesquisar_tecnicos_adm->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>