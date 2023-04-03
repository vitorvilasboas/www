<?php
class sub_area_classe{
    var $con;
    function sub_area_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_sub_area($sba_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM sub_area where sba_codigo='.$sba_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_sub_area(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM sub_area');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_sub_area($sba_gda_codigo,$sba_identificacao,$sba_descricao){
        try{
            $this->insert = $this->con->prepare("INSERT into sub_area (sba_gda_codigo,sba_identificacao,sba_descricao) VALUES ('$sba_gda_codigo','$sba_identificacao','$sba_descricao')");
            $this->insert->bindValue(':sba_gda_codigo',$sba_gda_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':sba_identificacao',$sba_identificacao,PDO::PARAM_STR);
            $this->insert->bindValue(':sba_descricao',$sba_descricao,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_sub_area($sba_codigo){
        try{
            $this->deletar = $this->con->query('delete from sub_area where sba_codigo ='.$sba_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_sub_area($sba_gda_codigo,$sba_identificacao,$sba_descricao,$sba_codigo){
        try{
            $this->update = $this->con->prepare("update sub_area set sba_gda_codigo='$sba_gda_codigo', sba_identificacao='$sba_identificacao', sba_descricao='$sba_descricao' where sba_codigo=".$sba_codigo);
            $this->update->bindValue(':sba_codigo',$sba_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':sba_gda_codigo',$sba_gda_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':sba_identificacao',$sba_identificacao,PDO::PARAM_STR);
            $this->update->bindValue(':sba_descricao',$sba_descricao,PDO::PARAM_STR);
            if($this->update->execute()){
                msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function select_grande_area(){
        try{ 
            $this->listar_select_grande_area = $this->con->query('select * from grande_area order by gda_descricao');                        
            $this->listar_select_grande_area->execute();
            if($this->listar_select_grande_area->rowCount()>0){
               return $this->listar_select_grande_area->fetchAll(PDO::FETCH_ASSOC); 
            }

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    function pesquisar_sub_area($pesquisar){         
        try{ 
            $this->pesquisar_sub_area = $this->con->query("SELECT * FROM sub_area WHERE sba_identificacao like'%$pesquisar%' or sba_descricao like'%$pesquisar%'");                        
            $this->pesquisar_sub_area->execute();
            if($this->pesquisar_sub_area->rowCount()>0){
               return $this->pesquisar_sub_area->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>