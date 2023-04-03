<?php
class cursos_classe{
    var $con;
    function cursos_classe(){
        $this->con = conexao();
    }
    //------------funcao campus-----------------------------------
    function select_cursos($curso_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM cursos where curso_codigo='.$curso_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_cursos(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM cursos');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_cursos($curso_nome,$curso_camp_codigo){
        try{
            $this->insert = $this->con->prepare("INSERT into cursos (curso_camp_codigo,curso_nome) VALUES ('$curso_camp_codigo','$curso_nome')");
            $this->insert->bindValue(':curso_camp_codigo',$curso_camp_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':curso_nome',$curso_nome,PDO::PARAM_STR);           
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_cursos($curso_codigo){
        try{
            $this->deletar = $this->con->query('delete from cursos where curso_codigo ='.$curso_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_cursos($curso_nome,$curso_camp_codigo,$curso_codigo){
        try{
            $this->update = $this->con->prepare("update cursos set curso_nome='$curso_nome',curso_camp_codigo='$curso_camp_codigo' where curso_codigo=".$curso_codigo);
            $this->update->bindValue(':curso_codigo',$curso_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':curso_camp_codigo',$curso_camp_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':curso_nome',$curso_nome,PDO::PARAM_STR);
            if($this->update->execute()){
                msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function select_campus(){
        try{ 
            $this->listar_select_campus = $this->con->query('select * from campus order by camp_nome');                        
            $this->listar_select_campus->execute();
            if($this->listar_select_campus->rowCount()>0){
               return $this->listar_select_campus->fetchAll(PDO::FETCH_ASSOC); 
            }

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    function pesquisar_cursos($pesquisar){         
        try{ 
            $this->pesquisar_cursos = $this->con->query("SELECT * FROM cursos WHERE curso_nome like'%$pesquisar%'");                        
            $this->pesquisar_cursos->execute();
            if($this->pesquisar_cursos->rowCount()>0){
               return $this->pesquisar_cursos->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
}
?>