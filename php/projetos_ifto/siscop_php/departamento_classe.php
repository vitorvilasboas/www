<?php
include 'conecta.php';

class departamento_classe 
{
      var $resultado;
      var $resultado2;
      var $registros;
      var $opcao;
       
      function departamento_classe()
      {
          $this->con = new conexao();
      }
         
      function excluir()
      {
        $sql=("delete from departamento where DEP_CODIGO=".$_GET['dep_codigo']);
            if($this->resultado= $this->con->banco->Execute($sql))
            {
                ?>
                <script>
                    alert('Departamento excluido com Sucesso!');
                </script>
                <?php
                return true;
            }
            else
            {
                ?>
                    <script>
                    alert('Exclusão não efetuada!\nO departamento não pode ser excluido por que possui usuários a ele vinculados!');
                </script>
                    
                <?php
                return false;
            }
      }
      
      function buscar_alterar()
      {
          $sql=("select * from departamento where DEP_CODIGO='".$_GET['dep_codigo']."'");
          $this->resultado= $this->con->banco->Execute($sql);
          $this->registros= $this->resultado->FetchNextObject();
      }
      
      function bd_alterar()
      {
          $sql=("select * from departamento where dep_nome='".$_REQUEST['cmp_nome']."' and dep_codigo<>".$_GET['dep_codigo']);
          $this->resultado= $this->con->banco->Execute($sql);
          if($this->registros=$this->resultado->FetchNextObject()){
              
            ?>
                <script>
                    alert('Já existe um departamento com este Nome!');
                </script>
            <?php
            return false;
          } else {
            $sql=("update departamento set DEP_NOME='".$_REQUEST['cmp_nome']."', DEP_DESCRICAO='".$_REQUEST['cmp_descricao']."', DEP_VINCULO='".$_REQUEST['cmp_vinculo']."' where DEP_CODIGO=".$_GET['dep_codigo']);
            if($this->resultado2= $this->con->banco->Execute($sql)){
                ?>
                <script>
                    alert('Departamento Alterado com Sucesso!');
                </script>
                <?php
                return true;
            } else {
                return false;
            }   
          }
      }
      
      function buscar()
      {
          if($_REQUEST['cmp_cod_dep']!="" && $_REQUEST['cmp_cod_dep']!=" "){
              $sql=("select * from departamento where dep_codigo=".$_REQUEST['cmp_cod_dep']);
          } else if($_REQUEST['cmp_nome_dep']!="" && $_REQUEST['cmp_nome_dep']!=" "){
              $sql=("select * from departamento where dep_nome=".$_REQUEST['cmp_nome_dep']);
          }
          $this->resultado= $this->con->banco->Execute($sql);
          $this->resultado2= $this->con->banco->Execute($sql);    
      }
      
      function cadastrar()
      {
          //verificando se cpf já existe... bloqueando F5 (reenvio de formulário)
          $sql=("select * from departamento where dep_nome='".$_REQUEST['cmp_nome']."'");
          $this->resultado= $this->con->banco->Execute($sql);
          if($this->registros=$this->resultado->FetchNextObject()){        
              ?>
                <script>
                    alert('Já existe um departamento com este Nome!');
                </script>
              <?php
              return false;
            } else {                       
                $sql=("insert into departamento (dep_nome,dep_descricao,dep_vinculo,dep_instituicao) values ('".$_REQUEST['cmp_nome']."','".$_REQUEST['cmp_descricao']."','".$_REQUEST['cmp_vinculo']."','".$_REQUEST['cmp_instituicao']."')");
                if($this->resultado2= $this->con->banco->Execute($sql)){
                    ?>
                <script>
                    alert('Departamento Cadastrado com Sucesso!');
                </script>
                    <?php
                    return true;
                } else {
                    return false;
                }
            }          
      }
      
      function relatorio_departamentos(){
            $sql=("select * from departamento ORDER BY dep_codigo ASC");
            $this->resultado= $this->con->banco->Execute($sql);
            $this->resultado2= $this->con->banco->Execute($sql);
            $this->resultado3= $this->con->banco->Execute($sql);
      }
}

?>
