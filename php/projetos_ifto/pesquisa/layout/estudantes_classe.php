<?php
class estudantes_classe{
    var $con;
    function estudantes_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_estudantes($est_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM estudantes where est_codigo='.$est_codigo);                        
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
    function select_nome_estudantes($est_usu_codigo){              
         try{
            $this->nome = $this->con->query('SELECT usu_nome FROM usuarios where usu_codigo='.$est_usu_codigo);                        
            $this->nome->execute();
            if($this->nome->rowCount()>0){
               return $this->nome->fetchAll(PDO::FETCH_ASSOC);
               
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_estudantes(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM estudantes');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_estudantes($est_usu_codigo,$est_matricula,$est_ano_ingresso,$est_curso_codigo){
        try{
            $this->insert = $this->con->prepare("INSERT into estudantes (est_usu_codigo,est_matricula,est_ano_ingresso,est_curso_codigo) VALUES ('$est_usu_codigo','$est_matricula','$est_ano_ingresso','$est_curso_codigo')");
            $this->insert->bindValue(':est_usu_codigo',$est_usu_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':est_curso_codigo',$est_curso_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':est_matricula',$est_matricula,PDO::PARAM_STR);
            $this->insert->bindValue(':est_ano_ingresso',$est_ano_ingresso,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_estudantes($est_codigo){
        try{
            $this->deletar = $this->con->query('delete from estudantes where est_codigo ='.$est_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_estudantes($est_usu_codigo,$est_matricula,$est_ano_ingresso,$est_curso_codigo,$est_codigo){
        try{
            $this->update = $this->con->prepare("update estudantes set est_usu_codigo='$est_usu_codigo', est_matricula='$est_matricula', est_ano_ingresso='$est_ano_ingresso', est_curso_codigo='$est_curso_codigo' where est_codigo=".$est_codigo);
            $this->update->bindValue(':est_codigo',$est_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':est_usu_codigo',$est_usu_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':est_curso_codigo',$est_curso_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':est_matricula',$est_matricula,PDO::PARAM_STR);
            $this->update->bindValue(':est_ano_ingresso',$est_ano_ingresso,PDO::PARAM_STR);
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
    function select_cursos(){
        try{ 
            $this->listar_select_cursos = $this->con->query('select * from cursos order by curso_nome');                        
            $this->listar_select_cursos->execute();
            if($this->listar_select_cursos->rowCount()>0){
               return $this->listar_select_cursos->fetchAll(PDO::FETCH_ASSOC); 
            }

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    function pesquisar_estudantes($pesquisar){         
        try{ 
            $this->pesquisar_estudantes = $this->con->query("SELECT * FROM usuarios inner join estudantes on est_usu_codigo = usu_codigo WHERE usu_nome like'%$pesquisar%' or usu_cpf like'%$pesquisar%'");                        
            $this->pesquisar_estudantes->execute();
            if($this->pesquisar_estudantes->rowCount()>0){
               return $this->pesquisar_estudantes->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>