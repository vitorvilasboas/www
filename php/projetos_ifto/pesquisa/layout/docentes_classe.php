<?php
class docentes_classe{
    var $con;
    function docentes_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_docentes($doc_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM docentes where doc_codigo='.$doc_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_nome_docentes($doc_usu_codigo){              
         try{
            $this->nome = $this->con->query('SELECT usu_nome FROM usuarios where usu_codigo='.$doc_usu_codigo);                        
            $this->nome->execute();
            if($this->nome->rowCount()>0){
               return $this->nome->fetchAll(PDO::FETCH_ASSOC);
               
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
    function select_todos_docentes(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM docentes');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_docentes($doc_usu_codigo,$doc_siape,$doc_area,$doc_admissao,$doc_regime_trabalho,$doc_titulacao){
        try{
            $this->insert = $this->con->prepare("INSERT into docentes (doc_usu_codigo,doc_siape,doc_area,doc_admissao,doc_regime_trabalho,doc_titulacao) VALUES ('$doc_usu_codigo','$doc_siape','$doc_area','$doc_admissao','$doc_regime_trabalho','$doc_titulacao')");
            $this->insert->bindValue(':doc_usu_codigo',$doc_usu_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':doc_siape',$doc_siape,PDO::PARAM_STR);
            $this->insert->bindValue(':doc_area',$doc_area,PDO::PARAM_STR);
            $this->insert->bindValue(':doc_admissao',$doc_admissao,PDO::PARAM_STR);
            $this->insert->bindValue(':doc_regime_trabalho',$doc_regime_trabalho,PDO::PARAM_STR);
            $this->insert->bindValue(':doc_titulacao',$doc_titulacao,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_docentes($doc_codigo){
        try{
            $this->deletar = $this->con->query('delete from docentes where doc_codigo ='.$doc_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_docentes($doc_usu_codigo,$doc_siape,$doc_area,$doc_admissao,$doc_regime_trabalho,$doc_titulacao,$doc_codigo){
        try{
            $this->update = $this->con->prepare("update docentes set doc_usu_codigo='$doc_usu_codigo', doc_siape='$doc_siape', doc_area='$doc_area', doc_admissao='$doc_admissao', doc_regime_trabalho='$doc_regime_trabalho',doc_titulacao='$doc_titulacao' where doc_codigo=".$doc_codigo);
            $this->update->bindValue(':doc_codigo',$doc_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':doc_usu_codigo',$doc_usu_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':doc_siape',$doc_siape,PDO::PARAM_STR);
            $this->update->bindValue(':doc_area',$doc_area,PDO::PARAM_STR);
            $this->update->bindValue(':doc_admissao',$doc_admissao,PDO::PARAM_STR);
            $this->update->bindValue(':doc_regime_trabalho',$doc_regime_trabalho,PDO::PARAM_STR);
            $this->update->bindValue(':doc_titulacao',$doc_titulacao,PDO::PARAM_STR);
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
    function pesquisar_docentes($pesquisar){         
        try{ 
            $this->pesquisar_docentes = $this->con->query("SELECT * FROM usuarios inner join docentes on doc_usu_codigo = usu_codigo WHERE usu_nome like'%$pesquisar%' or usu_cpf like'%$pesquisar%'");                        
            $this->pesquisar_docentes->execute();
            if($this->pesquisar_docentes->rowCount()>0){
               return $this->pesquisar_docentes->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>