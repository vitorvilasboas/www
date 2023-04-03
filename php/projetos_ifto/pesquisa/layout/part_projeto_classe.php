<?php
class part_projeto_classe{
    var $con;
    function part_projeto_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_part_projeto($pu_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM projeto_usuario where pu_codigo='.$pu_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_nome_part_projeto($pu_usu_codigo){              
         try{
            $this->nome = $this->con->query('SELECT usu_nome FROM usuarios where usu_codigo='.$pu_usu_codigo);                        
            $this->nome->execute();
            if($this->nome->rowCount()>0){
               return $this->nome->fetchAll(PDO::FETCH_ASSOC);
               
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_part_projeto(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM projeto_usuario');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_part_projeto($pu_usu_codigo,$pu_matricula,$pu_ano_ingresso,$pu_curso_codigo){
        try{
            $this->insert = $this->con->prepare("INSERT into projeto_usuario (pu_usu_codigo,pu_matricula,pu_ano_ingresso,pu_curso_codigo) VALUES ('$pu_usu_codigo','$pu_matricula','$pu_ano_ingresso','$pu_curso_codigo')");
            $this->insert->bindValue(':pu_usu_codigo',$pu_usu_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':pu_curso_codigo',$pu_curso_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':pu_matricula',$pu_matricula,PDO::PARAM_STR);
            $this->insert->bindValue(':pu_ano_ingresso',$pu_ano_ingresso,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_part_projeto($pu_codigo){
        try{
            $this->deletar = $this->con->query('delete from projeto_usuario where pu_codigo ='.$pu_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_part_projeto($pu_usu_codigo,$pu_matricula,$pu_ano_ingresso,$pu_curso_codigo,$pu_codigo){
        try{
            $this->update = $this->con->prepare("update projeto_usuario set pu_usu_codigo='$pu_usu_codigo', pu_matricula='$pu_matricula', pu_ano_ingresso='$pu_ano_ingresso', pu_curso_codigo='$pu_curso_codigo' where pu_codigo=".$pu_codigo);
            $this->update->bindValue(':pu_codigo',$pu_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':pu_usu_codigo',$pu_usu_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':pu_curso_codigo',$pu_curso_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':pu_matricula',$pu_matricula,PDO::PARAM_STR);
            $this->update->bindValue(':pu_ano_ingresso',$pu_ano_ingresso,PDO::PARAM_STR);
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
    function select_projetos(){
        try{ 
            $this->listar_select_cursos = $this->con->query('select * from projetos order by proj_nome');                        
            $this->listar_select_cursos->execute();
            if($this->listar_select_cursos->rowCount()>0){
               return $this->listar_select_cursos->fetchAll(PDO::FETCH_ASSOC); 
            }

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    function pesquisar_part_projeto($pesquisar){         
        try{ 
            $this->pesquisar_part_projeto = $this->con->query("SELECT * FROM projetos inner join part_projeto on pu_usu_codigo = usu_codigo WHERE usu_nome like'%$pesquisar%' or usu_cpf like'%$pesquisar%'");                        
            $this->pesquisar_part_projeto->execute();
            if($this->pesquisar_part_projeto->rowCount()>0){
               return $this->pesquisar_part_projeto->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>