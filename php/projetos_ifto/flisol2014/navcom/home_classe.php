<?php
include 'Connections/conecta.php';

class tp_inscricao_classe
  {
          var $resultado;
	  var $registros;
	  var $opcao;
	  	  	  
	  function tp_inscricao_classe()
	  {
	  		$this->con = new conexao();
	  }
	  
	  function listar()
	  { 
                $ano = date('Y');   
                $usuario = $_SESSION['codigo'];
                $sql = ("select tp_inscricao from tp_inscricao where  tp_ano = '$ano' and TP_USUARIO = ".$usuario );
                $this->resultado = $this->con->banco->Execute($sql);
			
	  }	 
	  	  
	  
	  function gravar_incluir()
	  {  

                $inscricao = $_REQUEST['tipopart'];
                $usuario = $_SESSION['codigo'];
                $situacao = 'pendente';
                $ano = date('Y');
                        				
                
                $sql = ("select tp_usuario from tp_inscricao where tp_ano = '$ano' and TP_USUARIO = ".$usuario);
	        $this->resultado = $this->con->banco->Execute($sql);
                $this->registros = $this->resultado->FetchNextobject();
                if($this->registros->TP_USUARIO ==''){
                        $sql = ("insert into tp_inscricao(tp_usuario,tp_inscricao,tp_situacao) values ('$usuario','$inscricao','$situacao','$ano')");	                
                        if ($resultado = $this->con->banco->Execute($sql)){
                                alerta("Cadastro Realizado com sucesso");				
                        }
                        else {
                                alerta("Não foi cadastrado");				
                        }
                }else {
                         echo('
                             <div id="pagina">
                                <h1 class="titulo1">Situação da participação</h1>
                                <br />
                                <p>Você já escolheu um tipo de participação, para alterar clique no link abaixo para trocar o tipo de participação.</p><br /><br />
                                <a href="usucom.php?pc=home_acao&acao=alterar">Alterar o tipo da participação no evento</a>
                            </div>
                            ');
                       }
                                      
          }

	  function alterar()
	  {
                $ano = date('Y');
                $usuario = $_SESSION['codigo'];
                $sql = "select * from tp_inscricao where tp_ano = '$ano' and TP_USUARIO = ".$usuario;
                $this->resultado = $this->con->banco->Execute($sql);
                $this->registros = $this->resultado->FetchNextobject();
			
	  }
	  function gravar_alterar()
	  {
                $sql = "update tp_inscricao set TP_INSCRICAO = '".$_REQUEST['tipopart']."' WHERE TP_USUARIO = ".$_SESSION['codigo'];
			   if ($this->resultado = $this->con->banco->Execute($sql))
			   {
                                alerta("Alterado com sucesso");
				return true;
			   }
			   else
			   {
				alerta("Não foi alterado");
				return false;
                           }
          }
	  
  }
	  

           
     
?>