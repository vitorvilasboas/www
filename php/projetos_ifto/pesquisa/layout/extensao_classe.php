<?php
class extensao_classe{
    var $con;
    function extensao_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_extensao($ext_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM extensao where ext_codigo='.$ext_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_nome_extensao($ext_usu_codigo){              
         try{
            $this->nome = $this->con->query('SELECT usu_nome FROM usuarios where usu_codigo='.$ext_usu_codigo);                        
            $this->nome->execute();
            if($this->nome->rowCount()>0){
               return $this->nome->fetchAll(PDO::FETCH_ASSOC);
               
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_extensao(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM extensao');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_extensao($ext_usu_codigo,$ext_portaria,$ext_data_portaria,$ext_assinatura){
        try{
            $this->insert = $this->con->prepare("INSERT into extensao (ext_usu_codigo,ext_portaria,ext_data_portaria,ext_assinatura) VALUES ('$ext_usu_codigo','$ext_portaria','$ext_data_portaria','$ext_assinatura')");
            $this->insert->bindValue(':ext_usu_codigo',$ext_usu_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':ext_portaria',$ext_portaria,PDO::PARAM_STR);
            $this->insert->bindValue(':ext_data_portaria',$ext_data_portaria,PDO::PARAM_STR);
            $this->insert->bindValue(':ext_assinatura',$ext_assinatura,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_extensao($ext_codigo){
        try{
            $this->deletar = $this->con->query('delete from extensao where ext_codigo ='.$ext_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_extensao($ext_usu_codigo,$ext_portaria,$ext_data_portaria,$ext_assinatura,$ext_codigo){
        try{
            $this->update = $this->con->prepare("update extensao set ext_usu_codigo='$ext_usu_codigo', ext_portaria='$ext_portaria', ext_data_portaria='$ext_data_portaria', ext_assinatura='$ext_assinatura' where ext_codigo=".$ext_codigo);
            $this->update->bindValue(':ext_codigo',$ext_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':ext_usu_codigo',$ext_usu_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':ext_portaria',$ext_portaria,PDO::PARAM_STR);
            $this->update->bindValue(':ext_data_portaria',$ext_data_portaria,PDO::PARAM_STR);
            $this->update->bindValue(':ext_assinatura',$ext_assinatura,PDO::PARAM_STR);
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
    function pesquisar_extensao($pesquisar){         
        try{ 
            $this->pesquisar_extensao = $this->con->query("SELECT * FROM usuarios inner join extensao on ext_usu_codigo = usu_codigo WHERE usu_nome like'%$pesquisar%' or usu_cpf like'%$pesquisar%'");                        
            $this->pesquisar_extensao->execute();
            if($this->pesquisar_extensao->rowCount()>0){
               return $this->pesquisar_extensao->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>