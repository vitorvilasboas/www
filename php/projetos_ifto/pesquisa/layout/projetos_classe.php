<?php
class projetos_classe{
    var $con;
    function projetos_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_projetos($proj_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM projetos where proj_codigo='.$proj_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
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
function select_diretorio_pesquisa(){
        try{ 
            $this->listar_select_pesquisa = $this->con->query('select * from diretorio_pesquisa order by dip_titulo');                        
            $this->listar_select_pesquisa->execute();
            if($this->listar_select_pesquisa->rowCount()>0){
               return $this->listar_select_pesquisa->fetchAll(PDO::FETCH_ASSOC); 
            }

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    function select_nome_projetos($proj_usu_codigo){              
         try{
            $this->nome = $this->con->query('SELECT usu_nome FROM usuarios where usu_codigo='.$proj_usu_codigo);                        
            $this->nome->execute();
            if($this->nome->rowCount()>0){
               return $this->nome->fetchAll(PDO::FETCH_ASSOC);
               
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_projetos(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM projetos');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_projetos($proj_usu_codigo,$proj_livro,$proj_camp_codigo,$proj_dip_codigo,$proj_curso_codigo,$proj_tipo,$proj_sba_codigo,$proj_nome,$proj_data_inicio,$proj_data_fim,$proj_situacao,$proj_edital,$proj_processo,$proj_cadastro){

        try{
            $this->insert = $this->con->prepare("INSERT into projetos (proj_usu_codigo,proj_camp_codigo,proj_dip_codigo,proj_curso_codigo,proj_tipo,proj_sba_codigo,proj_nome,proj_data_inicio,proj_data_fim,proj_situacao,proj_edital,proj_processo,proj_livro,proj_cadastro) VALUES ('$proj_usu_codigo','$proj_camp_codigo','$proj_dip_codigo','$proj_curso_codigo','$proj_tipo','$proj_sba_codigo','$proj_nome','$proj_data_inicio','$proj_data_fim','$proj_situacao','$proj_edital','$proj_processo','$proj_livro','$proj_cadastro')");
            $this->insert->bindValue(':proj_camp_codigo',$proj_camp_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':proj_usu_codigo',$proj_usu_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':proj_dip_codigo',$proj_dip_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':proj_curso_codigo',$proj_curso_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':proj_tipo',$proj_tipo,PDO::PARAM_INT);
            $this->insert->bindValue(':proj_sba_codigo',$proj_sba_codigo,PDO::PARAM_INT);
            $this->insert->bindValue(':proj_nome',$proj_nome,PDO::PARAM_STR);
            $this->insert->bindValue(':proj_data_inicio',$proj_data_inicio,PDO::PARAM_STR);
            $this->insert->bindValue(':proj_data_fim',$proj_data_fim,PDO::PARAM_STR);
            $this->insert->bindValue(':proj_situacao',$proj_situacao,PDO::PARAM_STR);
            $this->insert->bindValue(':proj_edital',$proj_edital,PDO::PARAM_STR);
            $this->insert->bindValue(':proj_processo',$proj_processo,PDO::PARAM_STR);
            $this->insert->bindValue(':proj_livro',$proj_livro,PDO::PARAM_STR);
            $this->insert->bindValue(':proj_cadastro',$proj_cadastro,PDO::PARAM_STR);
            if($this->insert->execute()){
                msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
                
   
    }
    function delete_projetos($proj_codigo){
        try{
            $this->deletar = $this->con->query('delete from projetos where proj_codigo ='.$proj_codigo);                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }
    function update_projetos($proj_usu_codigo,$proj_livro,$proj_camp_codigo,$proj_dip_codigo,$proj_curso_codigo,$proj_tipo,$proj_sba_codigo,$proj_nome,$proj_data_inicio,$proj_data_fim,$proj_situacao,$proj_edital,$proj_processo,$proj_codigo){   
          
        try{
            $this->update = $this->con->prepare("update projetos set proj_usu_codigo='$proj_usu_codigo',proj_camp_codigo='$proj_camp_codigo',proj_dip_codigo='$proj_dip_codigo',proj_curso_codigo='$proj_curso_codigo',proj_tipo='$proj_tipo',proj_sba_codigo='$proj_sba_codigo',proj_nome='$proj_nome',proj_data_inicio='$proj_data_inicio',proj_data_fim='$proj_data_fim',proj_situacao='$proj_situacao',proj_edital='$proj_edital',proj_processo='$proj_processo',proj_livro='$proj_livro' where proj_codigo=".$proj_codigo);
            $this->update->bindValue(':proj_codigo',$proj_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':proj_camp_codigo',$proj_camp_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':proj_usu_codigo',$proj_usu_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':proj_dip_codigo',$proj_dip_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':proj_curso_codigo',$proj_curso_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':proj_tipo',$proj_tipo,PDO::PARAM_INT);
            $this->update->bindValue(':proj_sba_codigo',$proj_sba_codigo,PDO::PARAM_INT);
            $this->update->bindValue(':proj_nome',$proj_nome,PDO::PARAM_STR);
            $this->update->bindValue(':proj_data_inicio',$proj_data_inicio,PDO::PARAM_STR);
            $this->update->bindValue(':proj_data_fim',$proj_data_fim,PDO::PARAM_STR);
            $this->update->bindValue(':proj_situacao',$proj_situacao,PDO::PARAM_STR);
            $this->update->bindValue(':proj_edital',$proj_edital,PDO::PARAM_STR);
            $this->update->bindValue(':proj_processo',$proj_processo,PDO::PARAM_STR);
            $this->update->bindValue(':proj_livro',$proj_livro,PDO::PARAM_STR);
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
    function pesquisar_projetos($pesquisar){         
        try{ 
            $this->projetosr_projetos = $this->con->query("SELECT * FROM usuarios inner join projetos on proj_usu_codigo = usu_codigo WHERE usu_nome like'%$pesquisar%' or usu_cpf like'%$pesquisar%'");                        
            $this->projetosr_projetos->execute();
            if($this->projetosr_projetos->rowCount()>0){
               return $this->projetosr_projetos->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>