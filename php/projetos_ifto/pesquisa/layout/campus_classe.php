<?php
class campus_classe{
    var $con;
    function campus_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_campus($camp_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM campus where camp_codigo='.$camp_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_campus(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM campus');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_campus($camp_nome){
        try{
            $this->insert = $this->con->prepare("INSERT into campus (camp_nome) VALUES ('$camp_nome')");
            $this->insert->bindValue(':camp_nome',$camp_nome,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_campus($camp_codigo){
        try{
            $this->deletar = $this->con->query('delete from campus where camp_codigo ='.$camp_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_campus($camp_nome,$camp_codigo){
        try{
            $this->update = $this->con->prepare("update campus set camp_nome='$camp_nome' where camp_codigo=".$camp_codigo);
            $this->update->bindValue(':camp_codigo',$camp_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':camp_nome',$camp_nome,PDO::PARAM_STR);
            if($this->update->execute()){
                msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
        function pesquisar_campus($pesquisar){         
        try{ 
            $this->pesquisar_campus = $this->con->query("SELECT * FROM campus WHERE camp_nome like'%$pesquisar%'");                        
            $this->pesquisar_campus->execute();
            if($this->pesquisar_campus->rowCount()>0){
               return $this->pesquisar_campus->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>