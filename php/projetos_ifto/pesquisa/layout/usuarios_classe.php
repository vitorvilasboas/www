<?php
class usuarios_classe{
    var $con;
    function usuarios_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_usuarios($usu_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM usuarios where usu_codigo='.$usu_codigo);                        
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
    function select_nome_usuarios($usu_usu_codigo){              
         try{
            $this->nome = $this->con->query('SELECT usu_nome FROM usuarios where usu_codigo='.$usu_usu_codigo);                        
            $this->nome->execute();
            if($this->nome->rowCount()>0){
               return $this->nome->fetchAll(PDO::FETCH_ASSOC);
               
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_usuarios(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM usuarios');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_usuarios($usu_camp_codigo,$usu_nome,$usu_sexo,$usu_cpf,$usu_senha,$usu_nivel,$usu_endereco,$usu_email,$usu_cep,$usu_data_nasc,$usu_celular,$usu_fone,$usu_data_cadastro,$usu_foto,$usu_cidade,$usu_estado,$usu_tipo){
        try{
            $this->insert = $this->con->prepare("INSERT into usuarios (usu_camp_codigo,usu_nome,usu_sexo,usu_cpf,usu_senha,usu_nivel,usu_endereco,usu_email,usu_cep,usu_data_nasc,usu_celular,usu_fone,usu_data_cadastro,usu_foto,usu_cidade,usu_estado,usu_tipo) VALUES ('$usu_camp_codigo','$usu_nome','$usu_sexo','$usu_cpf','$usu_senha','$usu_nivel','$usu_endereco','$usu_email','$usu_cep','$usu_data_nasc','$usu_celular','$usu_fone','$usu_data_cadastro','$usu_foto','$usu_cidade','$usu_estado','$usu_tipo')");
            $this->insert->bindValue(':usu_camp_codigo',$usu_camp_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':usu_nome',$usu_nome,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_cpf',$usu_cpf,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_sexo',$usu_sexo,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_senha',$usu_senha,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_nivel',$usu_nivel,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_endereco',$usu_endereco,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_email',$usu_email,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_cep',$usu_cep,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_data_nasc',$usu_data_nasc,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_celular',$usu_celular,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_fone',$usu_fone,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_data_cadastro',$usu_data_cadastro,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_foto',$usu_foto,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_cidade',$usu_cidade,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_estado',$usu_estado,PDO::PARAM_STR);
            $this->insert->bindValue(':usu_tipo',$usu_tipo,PDO::PARAM_INT);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
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
    function delete_usuarios($usu_codigo){
        try{
            $this->deletar = $this->con->query('delete from usuarios where usu_codigo ='.$usu_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function update_usuarios($usu_camp_codigo,$usu_nome,$usu_sexo,$usu_cpf,$usu_endereco,$usu_email,$usu_cep,$usu_data_nasc,$usu_celular,$usu_fone,$usu_cidade,$usu_estado,$usu_codigo){
        try{
            $this->update = $this->con->prepare("update usuarios set usu_camp_codigo='$usu_camp_codigo',usu_nome='$usu_nome',usu_sexo='$usu_sexo',usu_cpf='$usu_cpf',usu_endereco='$usu_endereco',usu_email='$usu_email',usu_cep='$usu_cep',usu_data_nasc='$usu_data_nasc',usu_celular='$usu_celular',usu_fone='$usu_fone',usu_cidade='$usu_cidade',usu_estado='$usu_estado' where usu_codigo=".$usu_codigo);
            $this->update->bindValue(':usu_codigo',$usu_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':usu_camp_codigo',$usu_camp_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':usu_nome',$usu_nome,PDO::PARAM_STR);
            $this->update->bindValue(':usu_sexo',$usu_sexo,PDO::PARAM_STR);
            $this->update->bindValue(':usu_cpf',$usu_cpf,PDO::PARAM_STR);
            $this->update->bindValue(':usu_endereco',$usu_endereco,PDO::PARAM_STR);
            $this->update->bindValue(':usu_email',$usu_email,PDO::PARAM_STR);
            $this->update->bindValue(':usu_cep',$usu_cep,PDO::PARAM_STR);
            $this->update->bindValue(':usu_data_nasc',$usu_data_nasc,PDO::PARAM_STR);
            $this->update->bindValue(':usu_celular',$usu_celular,PDO::PARAM_STR);
            $this->update->bindValue(':usu_fone',$usu_fone,PDO::PARAM_STR);
            $this->update->bindValue(':usu_cidade',$usu_cidade,PDO::PARAM_STR);
            $this->update->bindValue(':usu_estado',$usu_estado,PDO::PARAM_STR);
            if($this->update->execute()){
                msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function update_foto_usuarios($usu_foto,$usu_codigo){
        try{
            $this->update_foto = $this->con->prepare("update usuarios set usu_foto='$usu_foto', where usu_codigo=".$usu_codigo);
            $this->update_foto->bindValue(':usu_codigo',$usu_codigo,PDO::PARAM_INT);
            $this->update_foto->bindValue(':usu_foto',$usu_foto,PDO::PARAM_STR);
            if($this->update_foto->execute()){
                msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function update_senha_usuarios($usu_senha,$usu_nivel,$usu_codigo){
        try{
            $this->update_senha = $this->con->prepare("update usuarios set usu_senha='".md5($usu_senha)."',usu_nivel='$usu_nivel' where usu_codigo=".$usu_codigo);
            $this->update_senha->bindValue(':usu_codigo',$usu_codigo,PDO::PARAM_INT);
            $this->update_senha->bindValue(':usu_senha',$usu_senha,PDO::PARAM_STR);
            $this->update_senha->bindValue(':usu_nivel',$usu_nivel,PDO::PARAM_STR);
            if($this->update_senha->execute()){
                msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function pesquisar_usuarios($pesquisar){         
        try{ 
            $this->pesquisar_usuarios = $this->con->query("SELECT * FROM usuarios WHERE usu_nome like'%$pesquisar%' or usu_cpf like'%$pesquisar%'");                        
            $this->pesquisar_usuarios->execute();
            if($this->pesquisar_usuarios->rowCount()>0){
               return $this->pesquisar_usuarios->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>