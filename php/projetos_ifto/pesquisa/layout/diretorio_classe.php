<?php
class diretorio_classe{
    var $con;
    function diretorio_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_diretorio($dip_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM diretorio_pesquisa where dip_codigo='.$dip_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_diretorio(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM diretorio_pesquisa');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_diretorio($dip_sba_codigo,$dip_titulo,$dip_lider,$dip_vicelider,$dip_data_criacao){
        try{
            $this->insert = $this->con->prepare("INSERT into diretorio_pesquisa (dip_sba_codigo,dip_titulo,dip_lider,dip_vicelider,dip_data_criacao) VALUES ('$dip_sba_codigo','$dip_titulo','$dip_lider','$dip_vicelider','$dip_data_criacao')");
            $this->insert->bindValue(':dip_sba_codigo',$dip_sba_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':dip_titulo',$dip_titulo,PDO::PARAM_STR);
            $this->insert->bindValue(':dip_lider',$dip_lider,PDO::PARAM_STR);
            $this->insert->bindValue(':dip_vicelider',$dip_vicelider,PDO::PARAM_STR);
            $this->insert->bindValue(':dip_data_criacao',$dip_data_criacao,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_diretorio($dip_codigo){
        try{
            $this->deletar = $this->con->query('delete from diretorio_pesquisa where dip_codigo ='.$dip_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_diretorio($dip_sba_codigo,$dip_titulo,$dip_lider,$dip_vicelider,$dip_data_criacao,$dip_codigo){
        try{
            $this->update = $this->con->prepare("update diretorio_pesquisa set dip_sba_codigo='$dip_sba_codigo', dip_titulo='$dip_titulo', dip_lider='$dip_lider', dip_vicelider='$dip_vicelider', dip_data_criacao='$dip_data_criacao' where dip_codigo=".$dip_codigo);
            $this->update->bindValue(':dip_codigo',$dip_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':dip_sba_codigo',$dip_sba_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':dip_titulo',$dip_titulo,PDO::PARAM_STR);
            $this->update->bindValue(':dip_lider',$dip_lider,PDO::PARAM_STR);
            $this->update->bindValue(':dip_vicelider',$dip_vicelider,PDO::PARAM_STR);
            $this->update->bindValue(':dip_data_criacao',$dip_data_criacao,PDO::PARAM_STR);
            if($this->update->execute()){
                msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function select_sub_area(){
        try{ 
            $this->listar_select_sub_area = $this->con->query('select * from sub_area order by sba_descricao');                        
            $this->listar_select_sub_area->execute();
            if($this->listar_select_sub_area->rowCount()>0){
               return $this->listar_select_sub_area->fetchAll(PDO::FETCH_ASSOC); 
            }

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    function pesquisar_diretorio($pesquisar){         
        try{ 
            $this->pesquisar_diretorio = $this->con->query("SELECT * FROM diretorio_pesquisa WHERE dip_titulo like'%$pesquisar%' or dip_lider like'%$pesquisar%'");                        
            $this->pesquisar_diretorio->execute();
            if($this->pesquisar_diretorio->rowCount()>0){
               return $this->pesquisar_diretorio->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>