<?php
class ensino_classe{
    var $con;
    function ensino_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_ensino($ens_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM ensino where ens_codigo='.$ens_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_nome_ensino($ens_usu_codigo){              
         try{
            $this->nome = $this->con->query('SELECT usu_nome FROM usuarios where usu_codigo='.$ens_usu_codigo);                        
            $this->nome->execute();
            if($this->nome->rowCount()>0){
               return $this->nome->fetchAll(PDO::FETCH_ASSOC);
               
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_ensino(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM ensino');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_ensino($ens_usu_codigo,$ens_portaria,$ens_data_portaria,$ens_assinatura){
        try{
            $this->insert = $this->con->prepare("INSERT into ensino (ens_usu_codigo,ens_portaria,ens_data_portaria,ens_assinatura) VALUES ('$ens_usu_codigo','$ens_portaria','$ens_data_portaria','$ens_assinatura')");
            $this->insert->bindValue(':ens_usu_codigo',$ens_usu_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':ens_portaria',$ens_portaria,PDO::PARAM_STR);
            $this->insert->bindValue(':ens_data_portaria',$ens_data_portaria,PDO::PARAM_STR);
            $this->insert->bindValue(':ens_assinatura',$ens_assinatura,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_ensino($ens_codigo){
        try{
            $this->deletar = $this->con->query('delete from ensino where ens_codigo ='.$ens_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_ensino($ens_usu_codigo,$ens_portaria,$ens_data_portaria,$ens_assinatura,$ens_codigo){
        try{
            $this->update = $this->con->prepare("update ensino set ens_usu_codigo='$ens_usu_codigo', ens_portaria='$ens_portaria', ens_data_portaria='$ens_data_portaria', ens_assinatura='$ens_assinatura' where ens_codigo=".$ens_codigo);
            $this->update->bindValue(':ens_codigo',$ens_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':ens_usu_codigo',$ens_usu_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':ens_portaria',$ens_portaria,PDO::PARAM_STR);
            $this->update->bindValue(':ens_data_portaria',$ens_data_portaria,PDO::PARAM_STR);
            $this->update->bindValue(':ens_assinatura',$ens_assinatura,PDO::PARAM_STR);
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
    function pesquisar_ensino($pesquisar){         
        try{ 
            $this->pesquisar_ensino = $this->con->query("SELECT * FROM usuarios inner join ensino on ens_usu_codigo = usu_codigo WHERE usu_nome like'%$pesquisar%' or usu_cpf like'%$pesquisar%'");                        
            $this->pesquisar_ensino->execute();
            if($this->pesquisar_ensino->rowCount()>0){
               return $this->pesquisar_ensino->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>