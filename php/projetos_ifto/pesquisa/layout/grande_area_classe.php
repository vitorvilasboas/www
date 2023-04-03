<?php
class grande_area_classe{
    var $con;
    function grande_area_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_grande_area($gda_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM grande_area where gda_codigo='.$gda_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_grande_area(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM grande_area');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_grande_area($gda_identificacao,$gda_descricao){
        try{
            $this->insert = $this->con->prepare("INSERT into grande_area (gda_identificacao,gda_descricao) VALUES ('$gda_identificacao','$gda_descricao')");
            $this->insert->bindValue(':gda_identificacao',$gda_identificacao,PDO::PARAM_STR);
            $this->insert->bindValue(':gda_descricao',$gda_descricao,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_grande_area($gda_codigo){
        try{
            $this->deletar = $this->con->query('delete from grande_area where gda_codigo ='.$gda_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_grande_area($gda_identificacao,$gda_descricao,$gda_codigo){
        try{
            $this->update = $this->con->prepare("update grande_area set gda_identificacao='$gda_identificacao', gda_descricao='$gda_descricao' where gda_codigo=".$gda_codigo);
            $this->update->bindValue(':gda_codigo',$gda_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':gda_identificacao',$gda_identificacao,PDO::PARAM_STR);
            $this->update->bindValue(':gda_descricao',$gda_descricao,PDO::PARAM_STR);
            if($this->update->execute()){
                msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
        function pesquisar_grande_area($pesquisar){         
        try{ 
            $this->pesquisar_grande_area = $this->con->query("SELECT * FROM grande_area WHERE gda_identificacao like'%$pesquisar%' or gda_descricao like'%$pesquisar%'");                        
            $this->pesquisar_grande_area->execute();
            if($this->pesquisar_grande_area->rowCount()>0){
               return $this->pesquisar_grande_area->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>