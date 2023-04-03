<?php
class coordenacoes_classe{
    var $con;
    function coordenacoes_classe(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function select_coordenacoes($coord_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM coordenacoes where coord_codigo='.$coord_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_nome_coordenacoes($coord_usu_codigo){              
         try{
            $this->nome = $this->con->query('SELECT usu_nome FROM usuarios where usu_codigo='.$coord_usu_codigo);                        
            $this->nome->execute();
            if($this->nome->rowCount()>0){
               return $this->nome->fetchAll(PDO::FETCH_ASSOC);
               
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function select_todos_coordenacoes(){              
         try{
            $this->listar_todos = $this->con->query('SELECT * FROM coordenacoes');                        
            $this->listar_todos->execute();
            if($this->listar_todos->rowCount()>0){
               return $this->listar_todos->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function insert_coordenacoes($coord_usu_codigo,$coord_portaria,$coord_nome,$coord_data_portaria,$coord_assinatura){
        if($_FILES['coord_assinatura']['name']==''){
            $coord_assinatura = '';
            try{
                $this->insert = $this->con->prepare("INSERT into coordenacoes (coord_usu_codigo,coord_portaria,coord_nome,coord_data_portaria,coord_assinatura) VALUES ('$coord_usu_codigo','$coord_portaria','$coord_nome','$coord_data_portaria','$coord_assinatura')");
                $this->insert->bindValue(':coord_usu_codigo',$coord_usu_codigo,PDO::PARAM_INT);
                $this->insert->bindValue(':coord_portaria',$coord_portaria,PDO::PARAM_STR);
                $this->insert->bindValue(':coord_nome',$coord_nome,PDO::PARAM_STR);
                $this->insert->bindValue(':coord_data_portaria',$coord_data_portaria,PDO::PARAM_STR);
                $this->insert->bindValue(':coord_assinatura',$coord_assinatura,PDO::PARAM_STR);
                if($this->insert->execute()){
                    msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
                }
            }catch(PDOexception $erro){
                echo 'Erro : '.$erro->getMessage();
            }
        }
        else{
            $extensao = strtolower(substr($_FILES['coord_assinatura']['name'], -4));
            $extensaoValida =array('image/jpg','image/png','image/gif');    
            $novoNome = md5(time()).$extensao;
            $diretorio = 'uploads/assinaturas/';
            
            if(in_array($_FILES['coord_assinatura']['type'], $extensaoValida)){                
                
                move_uploaded_file($_FILES['coord_assinatura']['tmp_name'], $diretorio.$novoNome);
                $coord_assinatura = $novoNome;
                   
                try{
                    $this->insert = $this->con->prepare("INSERT into coordenacoes (coord_usu_codigo,coord_portaria,coord_nome,coord_data_portaria,coord_assinatura) VALUES ('$coord_usu_codigo','$coord_portaria','$coord_nome','$coord_data_portaria','$coord_assinatura')");
                    $this->insert->bindValue(':coord_usu_codigo',$coord_usu_codigo,PDO::PARAM_INT);
                    $this->insert->bindValue(':coord_portaria',$coord_portaria,PDO::PARAM_STR);
                    $this->insert->bindValue(':coord_nome',$coord_nome,PDO::PARAM_STR);
                    $this->insert->bindValue(':coord_data_portaria',$coord_data_portaria,PDO::PARAM_STR);
                    $this->insert->bindValue(':coord_assinatura',$coord_assinatura,PDO::PARAM_STR);
                    if($this->insert->execute()){
                        msgsucess("Cadastrado!", "Os Dados foram inseridos com sucesso!");
                    }
                }catch(PDOexception $erro){
                    echo 'Erro : '.$erro->getMessage();
                }
                
            }else{
                msgsucess("Não Cadastrado! O arquivo possui extensão $extensao.", "Esse formato não é suportado, use um dos seguintes formatos de imagem: .jpg,.png, .gif!");
            }
        }    
    }
    function delete_coordenacoes($coord_codigo,$coord_id_img){
        try{
            $this->deletar = $this->con->query('delete from coordenacoes where coord_codigo ='.$coord_codigo);                        
            if($this->deletar->execute()){
                $diretorio = 'uploads/assinaturas/';
                unlink($diretorio.$coord_id_img);
                msgsucess("Excluido!", "Os Dados foram apagados!");
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }
    function update_coordenacoes($coord_usu_codigo,$coord_portaria,$coord_nome,$coord_data_portaria,$coord_assinatura,$coord_codigo,$coord_foto_anterior){   
        print_r($coord_assinatura);
        if($coord_assinatura['name']==$coord_foto_anterior or $coord_assinatura['name']==''){
            try{
                $this->update = $this->con->prepare("update coordenacoes set coord_usu_codigo='$coord_usu_codigo', coord_portaria='$coord_portaria', coord_nome='$coord_nome', coord_data_portaria='$coord_data_portaria' where coord_codigo=".$coord_codigo);
                $this->update->bindValue(':coord_codigo',$coord_codigo,PDO::PARAM_INT);
                $this->update->bindValue(':coord_usu_codigo',$coord_usu_codigo,PDO::PARAM_INT);
                $this->update->bindValue(':coord_nome',$coord_nome,PDO::PARAM_STR);
                $this->update->bindValue(':coord_portaria',$coord_portaria,PDO::PARAM_STR);
                $this->update->bindValue(':coord_data_portaria',$coord_data_portaria,PDO::PARAM_STR);
                if($this->update->execute()){
                    msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
                }
            }catch(PDOexception $erro){
                echo 'Erro : '.$erro->getMessage();
            }
        }
        else{
            $extensao = strtolower(substr($_FILES['coord_assinatura']['name'], -4));
            $extensaoValida =array('image/jpg','image/JPG','image/png','image/PNG','image/jpeg','image/JPEG','image/gif','image/GIF');    
            $novoNome = md5(time()).$extensao;
            $diretorio = 'uploads/assinaturas/';
            
            if(in_array($_FILES['coord_assinatura']['type'], $extensaoValida)){                                 
                move_uploaded_file($_FILES['coord_assinatura']['tmp_name'], $diretorio.$novoNome);
                $coord_assinatura = $novoNome;
                unlink($diretorio.$coord_foto_anterior);  
                try{
                    $this->update = $this->con->prepare("update coordenacoes set coord_usu_codigo='$coord_usu_codigo', coord_portaria='$coord_portaria', coord_nome='$coord_nome', coord_data_portaria='$coord_data_portaria', coord_assinatura='$coord_assinatura' where coord_codigo=".$coord_codigo);
                    $this->update->bindValue(':coord_codigo',$coord_codigo,PDO::PARAM_INT);
                    $this->update->bindValue(':coord_usu_codigo',$coord_usu_codigo,PDO::PARAM_INT);
                    $this->update->bindValue(':coord_nome',$coord_nome,PDO::PARAM_STR);
                    $this->update->bindValue(':coord_portaria',$coord_portaria,PDO::PARAM_STR);
                    $this->update->bindValue(':coord_data_portaria',$coord_data_portaria,PDO::PARAM_STR);
                    $this->update->bindValue(':coord_assinatura',$coord_assinatura,PDO::PARAM_STR);
                    if($this->update->execute()){
                        msgsucess("Atualizado!", "Os Dados foram atualizados com sucesso!");
                    }
                }catch(PDOexception $erro){
                    echo 'Erro : '.$erro->getMessage();
                }
                
            }else{
                msgsucess("Não Alterado! O arquivo possui extensão $extensao.", "Esse formato não é suportado, use um dos seguintes formatos de imagem: .jpg,.png, .jpeg, .gif!");
            }
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
    function pesquisar_coordenacoes($pesquisar){         
        try{ 
            $this->coordenacoesr_coordenacoes = $this->con->query("SELECT * FROM usuarios inner join coordenacoes on coord_usu_codigo = usu_codigo WHERE usu_nome like'%$pesquisar%' or usu_cpf like'%$pesquisar%'");                        
            $this->coordenacoesr_coordenacoes->execute();
            if($this->coordenacoesr_coordenacoes->rowCount()>0){
               return $this->coordenacoesr_coordenacoes->fetchAll(PDO::FETCH_ASSOC); 
            }
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
      
}
?>