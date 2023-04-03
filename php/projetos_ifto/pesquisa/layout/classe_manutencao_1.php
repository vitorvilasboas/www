<?php
class classe_manutencao{
    var $con;
    function classe_manutencao(){
        $this->con = conexao();
    }
    //------------funcao onibus-----------------------------------
    function listar_onibus($bus_codigo){              
         try{
            $this->listar = $this->con->query('SELECT * FROM onibus where bus_codigo='.$bus_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function listar_todas_onibus(){
         //$this->pdo = new conexao();               
         try{
            $this->listar = $this->con->query('SELECT * FROM onibus');                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function cadastrar_onibus($bus_capacidade,$bus_gar_codigo){
        $sql  = "INSERT into onibus (bus_capacidade,bus_gar_codigo)";
        $sql.= "VALUES ('$bus_capacidade','$bus_gar_codigo')";
        try{
            $query = $this->con->prepare($sql);
            $query->bindValue(':bus_gar_codigo',$bus_gar_codigo,PDO::PARAM_INT);
            $query->bindValue(':bus_capacidade',$bus_capacidade,PDO::PARAM_STR);
            $query->execute();
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function deletar_onibus($bus_codigo){
        try{
            $this->deletar = $this->con->query('delete from onibus where bus_codigo ='.$bus_codigo);                        
            $this->deletar->execute();
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function atualizar_onibus($bus_capacidade,$bus_gar_codigo,$bus_codigo){
        $sql= "update onibus set bus_capacidade='$bus_capacidade',bus_gar_codigo='$bus_gar_codigo' where bus_codigo=".$bus_codigo;
        try{
            $query = $this->con->prepare($sql);
            $query->bindValue(':bus_gar_codigo',$bus_gar_codigo,PDO::PARAM_INT);
            $query->bindValue(':bus_capacidade',$bus_capacidade,PDO::PARAM_STR);
            $query->execute();
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function select_garagem(){
        try{ 
            $this->listar_select_onibus = $this->con->query('select * from garagem order by gar_codigo');                        
            $this->listar_select_onibus->execute();
            if($this->listar_select_onibus->rowCount()>0){
               return $this->listar_select_onibus->fetchAll(PDO::FETCH_ASSOC); 
            }

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    
    //----------------solucao------------------------------------    

        function solucao($bus,$rota,$interacao,$local,$lotacao,$tempo_servico,$horario,$tempo_percurso,$distancia_percurso,$escola){
            $sql  = "INSERT solucao (bus, rota, interacao,local,lotacao, tempo_servico, horario, tempo_percurso, distancia_percurso, escola) ";
            $sql.= "VALUES ('$bus', '$rota', '".$interacao."', '$local','$lotacao','$tempo_servico', '$horario', '$tempo_percurso', '$distancia_percurso', '$escola')";
				
            try{
                $query = $this->con->prepare($sql);
                $query->bindValue(':bus',$bus,PDO::PARAM_STR);
                $query->bindValue(':rota',$rota,PDO::PARAM_STR);
                $query->bindValue(':interacao',$interacao,PDO::PARAM_STR);
                $query->bindValue(':lotacao',$lotacao,PDO::PARAM_STR);
                $query->bindValue(':tempo_servico',$tempo_servico,PDO::PARAM_STR);
                $query->bindValue(':horario',$horario,PDO::PARAM_STR);
                $query->bindValue(':tempo_percurso',$tempo_percurso,PDO::PARAM_STR);
                $query->bindValue(':distancia_percurso',$distancia_percurso,PDO::PARAM_STR);
                $query->bindValue(':escola',$escola,PDO::PARAM_STR);
                $query->execute();
            }catch(PDOexception $erro){
                echo 'Erro : '.$erro->getMessage();
            }
        }
        function listar_rotas(){               
            try{
            
                $this->listarrotas = $this->con->prepare('SELECT * from rotas');                        
                $this->listarrotas->execute();
                if($this->listarrotas->rowCount()>0){
                    $dadoscoord = $this->listarrotas->fetchAll(PDO::FETCH_OBJ);
                    $dadoscoordjson = json_encode($dadoscoord);
                    return $dadoscoordjson;
                }	
            }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
        function criar_poliline($rota){               
         try{
            
            $this->listarpoli = $this->con->prepare('SELECT * from rotas where rota ='.$rota);                        
            $this->listarpoli->execute();
            if($this->listarpoli->rowCount()>0){
               return $this->listarpoli->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         } 
    }
    function rotas_diferentes(){               
         try{
            
            $this->listardifi = $this->con->prepare('SELECT  distinct bus,rota from rotas');                        
            $this->listardifi->execute();
            if($this->listardifi->rowCount()>0){
               return $this->listardifi->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         } 
    }
    function onibus_utilizados(){               
         try{
            
            $this->listaronibusutil = $this->con->prepare('SELECT  distinct bus from rotas');                        
            $this->listaronibusutil->execute();
            if($this->listaronibusutil->rowCount()>0){
               return $this->listaronibusutil->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         } 
    }
    function onibusDaRota($bus){               
         try{
            
            $this->listardifi = $this->con->prepare('SELECT distinct bus, rota from rotas where bus='.$bus);                        
            $this->listardifi->execute();
            if($this->listardifi->rowCount()>0){
               return $this->listardifi->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         } 
    }

    //---------------Funcoes para manutencao da funcao escola escola----------------
    function cadastrar_escola($esc_nome,$esc_inep,$esc_fone,$esc_zona,$esc_dep_admin,$esc_situacao,$esc_coord_x,$esc_coord_y,$esc_numero,$esc_endereco,$esc_cidade,$esc_estado,$esc_cep,$esc_pais,$esc_hora_min,$esc_hora_max){
        $sql  = "INSERT into escolas (esc_nome,esc_inep,esc_fone,esc_zona,esc_dep_admin,esc_situacao,esc_coord_x,esc_coord_y,esc_numero,esc_endereco,esc_cidade,esc_estado,esc_cep,esc_pais,esc_hora_min,esc_hora_max)";
        $sql.= "VALUES ('$esc_nome','$esc_inep','$esc_fone','$esc_zona','$esc_dep_admin','$esc_situacao','$esc_coord_x','$esc_coord_y','$esc_numero','$esc_endereco','$esc_cidade','$esc_estado','$esc_cep','$esc_pais','$esc_hora_min','$esc_hora_max')";
        try{
            $query = $this->con->prepare($sql);
            $query->bindValue(':esc_nome',$esc_nome,PDO::PARAM_STR);
            $query->bindValue(':esc_inep',$esc_inep,PDO::PARAM_STR);
            $query->bindValue(':esc_fone',$esc_fone,PDO::PARAM_STR);
            $query->bindValue(':esc_zona',$esc_zona,PDO::PARAM_STR);
            $query->bindValue(':esc_dep_admin',$esc_dep_admin,PDO::PARAM_STR);
            $query->bindValue(':esc_situacao',$esc_situacao,PDO::PARAM_STR);
            $query->bindValue(':esc_coord_x',$esc_coord_x,PDO::PARAM_STR);
            $query->bindValue(':esc_coord_y',$esc_coord_y,PDO::PARAM_STR);
            $query->bindValue(':esc_numero',$esc_numero,PDO::PARAM_STR);
            $query->bindValue(':esc_endereco',$esc_endereco,PDO::PARAM_STR);
            $query->bindValue(':esc_cidade',$esc_cidade,PDO::PARAM_STR);
            $query->bindValue(':esc_estado',$esc_estado,PDO::PARAM_STR);
            $query->bindValue(':esc_pais',$esc_pais,PDO::PARAM_STR);
            $query->bindValue(':esc_hora_min',$esc_hora_min,PDO::PARAM_STR);
            $query->bindValue(':esc_hora_max',$esc_hora_max,PDO::PARAM_STR);
            $query->execute();
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function deletar_escola($esc_codigo){
        try{
            $this->deletar = $this->con->query('delete from escolas where esc_codigo ='.$esc_codigo);                        
            $this->deletar->execute();
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }
    function listar_escola($esc_codigo){               
        try{
            $this->listar = $this->con->query('SELECT * FROM escolas WHERE esc_codigo = '.$esc_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
                return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }  
    }
    function listar_todas_escola(){              
        try{
            $this->listar_todas_escolas = $this->con->query('SELECT * FROM escolas');                        
            $this->listar_todas_escolas->execute();
            if($this->listar_todas_escolas->rowCount()>0){
               return $this->listar_todas_escolas->fetchAll(PDO::FETCH_ASSOC); 
            }	
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }  
    }
    function atualizar_escola($esc_nome,$esc_inep,$esc_fone,$esc_zona,$esc_dep_admin,$esc_situacao,$esc_coord_x,$esc_coord_y,$esc_numero,$esc_endereco,$esc_cidade,$esc_estado,$esc_cep,$esc_pais,$esc_hora_min,$esc_hora_max,$esc_codigo){
        $sql= "update escolas set esc_nome='$esc_nome',esc_inep='$esc_inep',esc_fone='$esc_fone',esc_zona='$esc_zona',esc_dep_admin='$esc_dep_admin',esc_situacao='$esc_situacao',esc_coord_x='$esc_coord_x',esc_coord_y='$esc_coord_y',esc_numero='$esc_numero',esc_endereco='$esc_endereco',esc_cidade='$esc_cidade',esc_estado='$esc_estado',esc_cep='$esc_cep',esc_pais='$esc_pais',esc_hora_min='$esc_hora_min',esc_hora_max='$esc_hora_max' where esc_codigo=".$esc_codigo;
        try{
            $query = $this->con->prepare($sql);
            $query->bindValue(':esc_codigo',$esc_codigo,PDO::PARAM_STR);
            $query->bindValue(':esc_nome',$esc_nome,PDO::PARAM_STR);
            $query->bindValue(':esc_inep',$esc_inep,PDO::PARAM_STR);
            $query->bindValue(':esc_fone',$esc_fone,PDO::PARAM_STR);
            $query->bindValue(':esc_zona',$esc_zona,PDO::PARAM_STR);
            $query->bindValue(':esc_dep_admin',$esc_dep_admin,PDO::PARAM_STR);
            $query->bindValue(':esc_situacao',$esc_situacao,PDO::PARAM_STR);
            $query->bindValue(':esc_coord_x',$esc_coord_x,PDO::PARAM_STR);
            $query->bindValue(':esc_coord_y',$esc_coord_y,PDO::PARAM_STR);
            $query->bindValue(':esc_numero',$esc_numero,PDO::PARAM_STR);
            $query->bindValue(':esc_endereco',$esc_endereco,PDO::PARAM_STR);
            $query->bindValue(':esc_cidade',$esc_cidade,PDO::PARAM_STR);
            $query->bindValue(':esc_estado',$esc_estado,PDO::PARAM_STR);
            $query->bindValue(':esc_pais',$esc_pais,PDO::PARAM_STR);
            $query->bindValue(':esc_hora_min',$esc_hora_min,PDO::PARAM_STR);
            $query->bindValue(':esc_hora_max',$esc_hora_max,PDO::PARAM_STR);
            $query->execute();
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function select_escolas(){
        try{ 
            $this->listar_select_escolas = $this->con->query('select * from escolas order by esc_nome');                        
            $this->listar_select_escolas->execute();
            if($this->listar_select_escolas->rowCount()>0){
               return $this->listar_select_escolas->fetchAll(PDO::FETCH_ASSOC); 
            }

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    //---------------Funcoes para garagem---------------------------------
    function listar_garagem($gar_codigo){
         //$this->pdo = new conexao();               
         try{
            $this->listar = $this->con->query('SELECT * FROM garagem where gar_codigo='.$gar_codigo);                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function listar_todas_garagem(){
         //$this->pdo = new conexao();               
         try{
            $this->listar = $this->con->query('SELECT * FROM garagem');                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function cadastrar_garagem($gar_nome,$gar_fone,$gar_coord_x,$gar_coord_y,$gar_numero,$gar_endereco,$gar_cidade,$gar_estado,$gar_cep,$gar_pais){
        $sql  = "INSERT into garagem (gar_nome,gar_fone,gar_coord_x,gar_coord_y,gar_numero,gar_endereco,gar_cidade,gar_estado,gar_cep,gar_pais)";
        $sql.= "VALUES ('$gar_nome','$gar_fone','$gar_coord_x','$gar_coord_y','$gar_numero','$gar_endereco','$gar_cidade','$gar_estado','$gar_cep','$gar_pais')";
        try{
            $query = $this->con->prepare($sql);
            $query->bindValue(':gar_nome',$gar_nome,PDO::PARAM_STR);
            $query->bindValue(':gar_fone',$gar_fone,PDO::PARAM_STR);
            $query->bindValue(':gar_coord_x',$gar_coord_x,PDO::PARAM_STR);
            $query->bindValue(':gar_coord_y',$gar_coord_y,PDO::PARAM_STR);
            $query->bindValue(':gar_numero',$gar_numero,PDO::PARAM_STR);
            $query->bindValue(':gar_endereco',$gar_endereco,PDO::PARAM_STR);
            $query->bindValue(':gar_cidade',$gar_cidade,PDO::PARAM_STR);
            $query->bindValue(':gar_estado',$gar_estado,PDO::PARAM_STR);
            $query->bindValue(':gar_cep',$gar_cep,PDO::PARAM_STR);
            $query->bindValue(':gar_pais',$gar_pais,PDO::PARAM_STR);
            $query->execute();
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function deletar_garagem($gar_codigo){
        try{
            $this->deletar = $this->con->query('delete from garagem where gar_codigo ='.$gar_codigo);                        
            $this->deletar->execute();
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function atualizar_garagem($gar_nome,$gar_fone,$gar_coord_x,$gar_coord_y,$gar_numero,$gar_endereco,$gar_cidade,$gar_estado,$gar_cep,$gar_pais,$gar_codigo){
        $sql= "update garagem set gar_nome='$gar_nome',gar_fone='$gar_fone',gar_coord_x='$gar_coord_x',gar_coord_y='$gar_coord_y',gar_numero='$gar_numero',gar_endereco='$gar_endereco',gar_cidade='$gar_cidade',gar_estado='$gar_estado',gar_cep='$gar_cep',gar_pais='$gar_pais' where gar_codigo=".$gar_codigo;
        try{
            $query = $this->con->prepare($sql);
            //$query->bindValue(':gar_codigo',$gar_codigo,PDO::PARAM_INT);
            $query->bindValue(':gar_nome',$gar_nome,PDO::PARAM_STR);
            $query->bindValue(':gar_fone',$gar_fone,PDO::PARAM_STR);
            $query->bindValue(':gar_coord_x',$gar_coord_x,PDO::PARAM_STR);
            $query->bindValue(':gar_coord_y',$gar_coord_y,PDO::PARAM_STR);
            $query->bindValue(':gar_numero',$gar_numero,PDO::PARAM_STR);
            $query->bindValue(':gar_endereco',$gar_endereco,PDO::PARAM_STR);
            $query->bindValue(':gar_cidade',$gar_cidade,PDO::PARAM_STR);
            $query->bindValue(':gar_estado',$gar_estado,PDO::PARAM_STR);
            $query->bindValue(':gar_cep',$gar_cep,PDO::PARAM_STR);
            $query->bindValue(':gar_pais',$gar_pais,PDO::PARAM_STR);
            $query->execute();
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    //-----------------Funcoes das Paradas -----------------------
    function listar_paradas($par_codigo){               
         try{
            $this->listarparadas = $this->con->prepare('SELECT * FROM paradas where par_codigo='.$par_codigo);                        
            $this->listarparadas->execute();
            if($this->listarparadas->rowCount()>0){
               return $this->listarparadas->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function listar_todas_paradas(){              
        try{
            $this->listar = $this->con->query('SELECT * FROM paradas');                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }  
    }
    function cadastrar_parada($par_nome,$par_coord_x,$par_coord_y,$par_cont_estud,$par_status,$par_numero,$par_endereco,$par_cidade,$par_estado,$par_cep,$par_pais,$par_esc_codigo){
        $sql  = "INSERT into paradas (par_nome,par_coord_x,par_coord_y,par_cont_estud,par_status,par_numero,par_endereco,par_cidade,par_estado,par_cep,par_pais,par_esc_codigo)";
        $sql.= "VALUES ('$par_nome','$par_coord_x','$par_coord_y','$par_cont_estud','$par_status','$par_numero','$par_endereco','$par_cidade','$par_estado','$par_cep','$par_pais',$par_esc_codigo)";
        try{
            $query = $this->con->prepare($sql);
            $query->bindValue(':par_esc_codigo',$par_esc_codigo,PDO::PARAM_INT);
            $query->bindValue(':par_nome',$par_nome,PDO::PARAM_STR);
            $query->bindValue(':par_coord_x',$par_coord_x,PDO::PARAM_STR);
            $query->bindValue(':par_coord_y',$par_coord_y,PDO::PARAM_STR);
            $query->bindValue(':par_cont_estud',$par_cont_estud,PDO::PARAM_STR);
            $query->bindValue(':par_status',$par_status,PDO::PARAM_STR);
            $query->bindValue(':par_numero',$par_numero,PDO::PARAM_STR);
            $query->bindValue(':par_endereco',$par_endereco,PDO::PARAM_STR);
            $query->bindValue(':par_cidade',$par_cidade,PDO::PARAM_STR);
            $query->bindValue(':par_estado',$par_estado,PDO::PARAM_STR);
            $query->bindValue(':par_cep',$par_cep,PDO::PARAM_STR);
            $query->bindValue(':par_pais',$par_pais,PDO::PARAM_STR);
            $query->execute();
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function deletar_parada($par_codigo){
        try{
            $this->deletar = $this->con->query('delete from paradas where par_codigo ='.$par_codigo);                        
            $this->deletar->execute();
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }

    function atualizar_parada($par_nome,$par_coord_x,$par_coord_y,$par_cont_estud,$par_status,$par_numero,$par_endereco,$par_cidade,$par_estado,$par_cep,$par_pais,$par_codigo,$par_esc_codigo){
        $sql= "update paradas set par_nome='$par_nome',par_coord_x='$par_coord_x',par_coord_y='$par_coord_y',par_cont_estud='$par_cont_estud',par_status='$par_status',par_numero='$par_numero',par_endereco='$par_endereco',par_cidade='$par_cidade',par_estado='$par_estado',par_cep='$par_cep',par_pais='$par_pais',par_esc_codigo='$par_esc_codigo' where par_codigo=".$par_codigo;
        try{
            $query = $this->con->prepare($sql);
            $query->bindValue(':par_esc_codigo',$par_esc_codigo,PDO::PARAM_INT);
            $query->bindValue(':par_nome',$par_nome,PDO::PARAM_STR);
            $query->bindValue(':par_coord_x',$par_coord_x,PDO::PARAM_STR);
            $query->bindValue(':par_coord_y',$par_coord_y,PDO::PARAM_STR);
            $query->bindValue(':par_cont_estud',$par_cont_estud,PDO::PARAM_STR);
            $query->bindValue(':par_status',$par_status,PDO::PARAM_STR);
            $query->bindValue(':par_numero',$par_numero,PDO::PARAM_STR);
            $query->bindValue(':par_endereco',$par_endereco,PDO::PARAM_STR);
            $query->bindValue(':par_cidade',$par_cidade,PDO::PARAM_STR);
            $query->bindValue(':par_estado',$par_estado,PDO::PARAM_STR);
            $query->bindValue(':par_cep',$par_cep,PDO::PARAM_STR);
            $query->bindValue(':par_pais',$par_pais,PDO::PARAM_STR);
            $query->execute();
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function select_paradas(){
        try{ 
            $this->listar_select_paradas = $this->con->query('select * from paradas order by par_nome');                        
            $this->listar_select_paradas->execute();
            if($this->listar_select_paradas->rowCount()>0){
               return $this->listar_select_paradas->fetchAll(PDO::FETCH_ASSOC); 
            }

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }
    }
    function listar_paradas_escolas(){               
         try{
            
            $this->listares = $this->con->prepare('SELECT * FROM paradas inner join escolas on par_esc_codigo=esc_codigo');                        
            $this->listares->execute();
            if($this->listares->rowCount()>0){
               return $this->listares->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    //--------------funcao para usuarios--------------------------
    function listar_usuario($usu_codigo){               
         try{
            $this->listarparadas = $this->con->prepare('SELECT * FROM usuarios where usu_codigo='.$usu_codigo);                        
            $this->listarparadas->execute();
            if($this->listarparadas->rowCount()>0){
               return $this->listarparadas->fetchAll(PDO::FETCH_ASSOC); 
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         }  
    }
    function listar_todas_usuario(){              
        try{
            $this->listar = $this->con->query('SELECT * FROM usuarios');                        
            $this->listar->execute();
            if($this->listar->rowCount()>0){
               return $this->listar->fetchAll(PDO::FETCH_ASSOC); 
            }	

        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }  
    }
    function cadastrar_usuario($usu_nome,$usu_coord_x,$usu_coord_y,$usu_responsavel,$usu_fone,$usu_cpf,$usu_senha,$usu_numero,$usu_endereco,$usu_cidade,$usu_estado,$usu_cep,$usu_pais,$usu_esc_codigo,$usu_par_codigo){
        $sql  = "INSERT into usuarios (usu_nome,usu_coord_x,usu_coord_y,usu_responsavel,usu_fone,usu_cpf,usu_senha,usu_nivel,usu_numero,usu_endereco,usu_cidade,usu_estado,usu_cep,usu_pais,usu_esc_codigo,usu_par_codigo)";
        $sql.= "VALUES ('$usu_nome','$usu_coord_x','$usu_coord_y','$usu_responsavel','$usu_fone','$usu_cpf','$usu_senha','usuario','$usu_numero','$usu_endereco','$usu_cidade','$usu_estado','$usu_cep','$usu_pais','$usu_esc_codigo','$usu_par_codigo')";
        try{
            $query = $this->con->prepare($sql);
            $query->bindValue(':usu_esc_codigo',$usu_esc_codigo,PDO::PARAM_INT);
            $query->bindValue(':usu_par_codigo',$usu_par_codigo,PDO::PARAM_INT);
            $query->bindValue(':usu_nome',$usu_nome,PDO::PARAM_STR);
            $query->bindValue(':usu_coord_x',$usu_coord_x,PDO::PARAM_STR);
            $query->bindValue(':usu_coord_y',$usu_coord_y,PDO::PARAM_STR);
            $query->bindValue(':usu_responsavel',$usu_responsavel,PDO::PARAM_STR);
            $query->bindValue(':usu_cpf',$usu_cpf,PDO::PARAM_STR);
            $query->bindValue(':usu_senha',$usu_senha,PDO::PARAM_STR);
            $query->bindValue(':usu_fone',$usu_fone,PDO::PARAM_STR);
            //$query->bindValue(':usu_nivel',$usu_nivel,PDO::PARAM_STR);
            $query->bindValue(':usu_numero',$usu_numero,PDO::PARAM_STR);
            $query->bindValue(':usu_endereco',$usu_endereco,PDO::PARAM_STR);
            $query->bindValue(':usu_cidade',$usu_cidade,PDO::PARAM_STR);
            $query->bindValue(':usu_estado',$usu_estado,PDO::PARAM_STR);
            $query->bindValue(':usu_cep',$usu_cep,PDO::PARAM_STR);
            $query->bindValue(':usu_pais',$usu_pais,PDO::PARAM_STR);
            $query->execute();
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }
    function deletar_usuario($usu_codigo){
        try{
            $this->deletar = $this->con->query('delete from usuarios where usu_codigo ='.$usu_codigo);                        
            $this->deletar->execute();
        }catch (PDOexcpetion $erro){
            echo 'Erro : '.$erro->getMessage();	
        }      
    }
    function atualizar_usuario($usu_nome,$usu_coord_x,$usu_coord_y,$usu_responsavel,$usu_fone,$usu_cpf,$usu_senha,$usu_numero,$usu_endereco,$usu_cidade,$usu_estado,$usu_cep,$usu_pais,$usu_esc_codigo,$usu_par_codigo,$usu_codigo){
        $sql= "update usuarios set usu_nome='$usu_nome',usu_coord_x='$usu_coord_x',usu_coord_y='$usu_coord_y',usu_responsavel='$usu_responsavel',usu_fone='$usu_fone',usu_cpf='$usu_cpf',usu_senha='$usu_senha',usu_numero='$usu_numero',usu_endereco='$usu_endereco',usu_cidade='$usu_cidade',usu_estado='$usu_estado',usu_cep='$usu_cep',usu_pais='$usu_pais',usu_esc_codigo='$usu_esc_codigo',usu_par_codigo='$usu_par_codigo' where usu_codigo=".$usu_codigo;
        try{
            $query = $this->con->prepare($sql);
            $query->bindValue(':usu_esc_codigo',$usu_esc_codigo,PDO::PARAM_INT);
            $query->bindValue(':usu_par_codigo',$usu_par_codigo,PDO::PARAM_INT);
            $query->bindValue(':usu_nome',$usu_nome,PDO::PARAM_STR);
            $query->bindValue(':usu_coord_x',$usu_coord_x,PDO::PARAM_STR);
            $query->bindValue(':usu_coord_y',$usu_coord_y,PDO::PARAM_STR);
            $query->bindValue(':usu_responsavel',$usu_responsavel,PDO::PARAM_STR);
            $query->bindValue(':usu_fone',$usu_fone,PDO::PARAM_STR);
            $query->bindValue(':usu_cpf',$usu_cpf,PDO::PARAM_STR);
            $query->bindValue(':usu_senha',$usu_senha,PDO::PARAM_STR);
            $query->bindValue(':usu_numero',$usu_numero,PDO::PARAM_STR);
            $query->bindValue(':usu_endereco',$usu_endereco,PDO::PARAM_STR);
            $query->bindValue(':usu_cidade',$usu_cidade,PDO::PARAM_STR);
            $query->bindValue(':usu_estado',$usu_estado,PDO::PARAM_STR);
            $query->bindValue(':usu_cep',$usu_cep,PDO::PARAM_STR);
            $query->bindValue(':usu_pais',$usu_pais,PDO::PARAM_STR);
            $query->execute();
            $query->execute();
        }catch(PDOexception $erro){
            echo 'Erro : '.$erro->getMessage();
        }
    }

    
    
}
?>