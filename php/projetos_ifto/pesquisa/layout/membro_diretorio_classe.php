<?php
class membro_diretorio_classe{
    var $con;
    function membro_diretorio_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_diretorio_usuario($dip_codigo){              
         try{
            $this->listar = $this->con->query('SELECT  * FROM diretorio_pesquisa where dip_codigo='.$dip_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
        function select_projetos(){              
         try{
            $this->listar_projetos = $this->con->query('SELECT  * FROM projetos order by proj_nome');                        
            $this->listar_projetos->execute();
            if($this->listar_projetos->rowCount()>0){
               return $this->listar_projetos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_nome_usuario($pu_usu_codigo){              
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
    
    function select_todos_usuario(){              
         try{
            $this->listar_todos_usuario = $this->con->query('SELECT  * FROM usuarios order by usu_nome');                        
            $this->listar_todos_usuario->execute();
            if($this->listar_todos_usuario->rowCount()>0){
               return $this->listar_todos_usuario->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_usuarios($usu_codigo){              
         try{
            $this->listar_usuarios = $this->con->query('SELECT  * FROM usuarios where usu_codigo='.$usu_codigo);                        
            $this->listar_usuarios->execute();
            if($this->listar_usuarios->rowCount()>0){
               return $this->listar_usuarios->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_membros_usuarios($md_dip_codigo,$md_usu_codigo,$md_tipo,$md_entrada){
        try{
            $this->validar_insert = $this->con->prepare("select md_usu_codigo from membros_diretorio where md_dip_codigo='$md_dip_codigo' and md_usu_codigo='$md_usu_codigo'");
            $this->validar_insert->execute();
            $valor = $this->validar_insert->rowCount(PDO::FETCH_ASSOC);
            if($valor==0){
                try{
                    $this->insert_pesquisadores = $this->con->prepare("INSERT into membros_diretorio (md_dip_codigo,md_usu_codigo,md_tipo,md_entrada) VALUES ('$md_dip_codigo','$md_usu_codigo','$md_tipo','$md_entrada')");
                    $this->insert_pesquisadores->bindValue(':md_dip_codigo',$md_dip_codigo,PDO::PARAM_INT);
                    $this->insert_pesquisadores->bindValue(':md_usu_codigo',$md_usu_codigo,PDO::PARAM_INT);
                    $this->insert_pesquisadores->bindValue(':md_tipo',$md_tipo,PDO::PARAM_STR);
                    $this->insert_pesquisadores->bindValue(':md_entrada',$md_entrada,PDO::PARAM_STR);
                    if($this->insert_pesquisadores->execute()){
                        msgsucess("Cadastrado!", "O pesquisador foi incluido no projeto!");
                    }
                }catch(PDOexception $erro){
                    echo 'Erro : '.$erro->getMessage();
                }             
            }else{
                msgerro("Não foi incluido!", "O pesquisador já está participando deste projeto!");
            }
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function delete_membros_diretorio($md_codigo){
        try{
            $this->deletar = $this->con->query("delete from membros_diretorio where md_codigo ='$md_codigo'");                        
            if($this->deletar->execute()){
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }
    function select_pesquisadores($md_dip_codigo){         
        try{ 
            $this->atleta_equipe = $this->con->query("SELECT usu_codigo,usu_nome,md_codigo,md_usu_codigo,md_dip_codigo,md_tipo,md_entrada FROM usuarios inner join membros_diretorio on md_usu_codigo = usu_codigo WHERE md_dip_codigo ='$md_dip_codigo'"  );                        
            $this->atleta_equipe->execute();
            if($this->atleta_equipe->rowCount()>0){
               return $this->atleta_equipe->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    function select_area($sba_codigo){
        try{
            $this->listar_area = $this->con->query('SELECT  * FROM sub_area inner join grande_area on sba_gda_codigo = gda_codigo where sba_codigo ='.$sba_codigo);                        
            $this->listar_area->execute();
            if($this->listar_area->rowCount()>0){
               return $this->listar_area->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         } 
    }
    function select_curso_estudante($usu_codigo){
        try{
            $this->listar_estudante = $this->con->query('SELECT  * FROM estudantes inner join usuarios on est_usu_codigo = usu_codigo where usu_codigo ='.$usu_codigo);                        
            $this->listar_estudante->execute();
            if($this->listar_estudante->rowCount()>0){
               return $this->listar_estudante->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         } 
    }
    function select_cursos($curso_codigo){              
         try{
            $this->listar_cursos = $this->con->query('SELECT * FROM cursos where curso_codigo='.$curso_codigo);                        
            $this->listar_cursos->execute();
            if($this->listar_cursos->rowCount()>0){
               return $this->listar_cursos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_docentes($usu_codigo){              
         try{
            $this->listar_docentes = $this->con->query('SELECT * FROM usuarios inner join docentes on usu_codigo=doc_codigo where usu_codigo='.$usu_codigo);                        
            $this->listar_docentes->execute();
            if($this->listar_docentes->rowCount()>0){
               return $this->listar_docentes->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function executores($p){
        $op = new membro_diretorio_classe();
        $equipeusuario = $op->select_pesquisadores($p);
        $contequipe = count($equipeusuario);
            for($cte=0;$cte<$contequipe;$cte++){
                if($cte==0){
                    $nome= $equipeusuario[$cte]['usu_nome'];
                }else if($cte>1){
                    $nome.= ', '.$equipeusuario[$cte]['usu_nome'];
                }else if($cte==($contequipe-1)){
                    $nome.= ' e '.$equipeusuario[$cte]['usu_nome'];
                }
            }
        return $nome;
    }   
      
}
      
?>