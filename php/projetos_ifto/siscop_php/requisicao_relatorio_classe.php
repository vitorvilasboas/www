<?php
include 'conecta.php';

class requisicao_relatorio_classe 
{
      var $resultado;
      var $resultado2;
      var $resultado3;
      var $resultado4;
      var $registros;
      var $opcao;
       
      function requisicao_relatorio_classe()
      {
          $this->con = new conexao();
      }
          
/*      ----------------------------------------    RELATÓRIOS  USUÁRIO REPROGRAFIA   ---------------------------------------------      */
      
      //Função de Filtros de Relatório para o usuário com permissão REPROGRAFIA e que selecionou o Status AUTORIZADAS
      function reprografia_autorizadas(){
          if($_REQUEST['campo_filtro']=='Por Data'){//Relatório USUÁRIO REPROGRAFIA >> AUTORIZADAS >> POR DATA
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){//Relatório USUÁRIO REPROGRAFIA >> AUTORIZADAS >> POR DATA DA RETIRADA
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_dtentrega ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){//Relatório USUÁRIO REPROGRAFIA >> AUTORIZADAS >> POR REQUERENTE
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Autorizado' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){//Relatório USUÁRIO REPROGRAFIA >> AUTORIZADAS >> POR DEPARTAMENTO
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){//Relatório USUÁRIO REPROGRAFIA >> AUTORIZADAS >> POR AVALIADOR
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else {//Relatório USUÁRIO REPROGRAFIA >> AUTORIZADAS >> TODAS
              $sql=("select * from requisicao where req_status='Autorizado' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      
      //Função de Filtros de Relatório para o usuário com permissão REPROGRAFIA e que selecionou o Status IMPRESSAS
      function reprografia_impressas(){
           if($_REQUEST['campo_filtro']=='Por Data'){//Relatório USUÁRIO REPROGRAFIA >> IMPRESSAS >> POR DATA
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Impresso' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){//Relatório USUÁRIO REPROGRAFIA >> IMPRESSAS >> POR DATA DA RETIRADA
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Impresso' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_dtentrega ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){//Relatório USUÁRIO REPROGRAFIA >> IMPRESSAS >> POR REQUERENTE
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Impresso' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){//Relatório USUÁRIO REPROGRAFIA >> IMPRESSAS >> POR DEPARTAMENTO
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Impresso' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){//Relatório USUÁRIO REPROGRAFIA >> IMPRESSAS >> POR AVALIADOR
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Impresso' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else {//Relatório USUÁRIO REPROGRAFIA >> IMPRESSAS >> TODAS
              $sql=("select * from requisicao where req_status='Impresso' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
              $this->resultado4= $this->con->banco->Execute($sql);
          }
      }
      
      //Função de Filtros de Relatório para o usuário com permissão REPROGRAFIA e que selecionou TODOS os Status
      function reprografia_todas(){
          if($_REQUEST['campo_filtro']=='Por Data'){//Relatório USUÁRIO REPROGRAFIA >> TODAS >> POR DATA
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where (req_status='Autorizado' or req_status='Impresso') and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){//Relatório USUÁRIO REPROGRAFIA >> TODAS >> POR DATA DA RETIRADA
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where (req_status='Autorizado' or req_status='Impresso') and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_dtentrega ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){//Relatório USUÁRIO REPROGRAFIA >> TODAS >> POR REQUERENTE
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where (req_status='Autorizado' or req_status='Impresso') and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){//Relatório USUÁRIO REPROGRAFIA >> TODAS >> POR DEPARTAMENTO
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where (req_status='Autorizado' or req_status='Impresso') and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){//Relatório USUÁRIO REPROGRAFIA >> TODAS >> POR AVALIADOR
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where (req_status='Autorizado' or req_status='Impresso') and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else {//Relatório USUÁRIO REPROGRAFIA >> TODAS >> TODAS
              $sql=("select * from requisicao where req_status='Autorizado' or req_status='Impresso' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } 
      }
      
      
      
      
      
      
      
      
      /*      ----------------------------------------    RELATÓRIOS  USUÁRIO REQUERENTE   ---------------------------------------------      */
      
      function requerente_autorizadas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_data between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_dtentrega between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_aut=".$this->registros->USU_CODIGO.") and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else {
              $sql=("select * from requisicao where req_status='Autorizado' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function requerente_aguardando(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_data between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_dtentrega between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_aut=".$this->registros->USU_CODIGO.") and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else {
              $sql=("select * from requisicao where req_status='Aguardando' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function requerente_impressas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Impresso' and (req_data between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Impresso' and (req_dtentrega between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }                
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Impresso' and (req_aut=".$this->registros->USU_CODIGO.") and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else {
              $sql=("select * from requisicao where req_status='Impresso' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
              $this->resultado4= $this->con->banco->Execute($sql);
          }
      }
      function requerente_canceladas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Cancelado' and (req_data between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Cancelado' and (req_dtentrega between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }   
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Cancelado' and (req_aut=".$this->registros->USU_CODIGO.") and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else {
              $sql=("select * from requisicao where req_status='Cancelado' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function requerente_rejeitadas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_data between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_dtentrega between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_aut=".$this->registros->USU_CODIGO.") and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else {
              $sql=("select * from requisicao where req_status='Rejeitado' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function requerente_todas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where (req_data between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where (req_dtentrega between '".$data1."' and '".$data2."') and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }                
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_aut=".$this->registros->USU_CODIGO." and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else {
              $sql=("select * from requisicao where usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      
      
      
      
      
      
      
      
      /*      ----------------------------------------    RELATÓRIOS  USUÁRIO AVALIADOR   ---------------------------------------------      */
      
      function avaliador_autorizadas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Autorizado' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao where req_status='Autorizado' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where req_status='Autorizado' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function avaliador_aguardando(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Aguardando' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao where req_status='Aguardando' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where req_status='Aguardando' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function avaliador_impressas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Impresso' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Impresso' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Impresso' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Impresso' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status=Impresso' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao where req_status='Impresso' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
              $this->resultado4= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where req_status='Impresso' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
              $this->resultado4= $this->con->banco->Execute($sql);
          }
      }
      function avaliador_canceladas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Cancelado' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Cancelado' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Cancelado' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Cancelado' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Cancelado' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao where req_status='Cancelado' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where req_status='Cancelado' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function avaliador_rejeitadas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Rejeitado' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao where req_status='Rejeitado' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where req_status='Rejeitado' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function avaliador_todas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_data between '".$data1."' and '".$data2."' ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_dtretirada between '".$data1."' and '".$data2."' ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where usu_codigo=".$this->registros->USU_CODIGO." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_dep=".$this->registros->DEP_CODIGO." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }    
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_aut=".$this->registros->USU_CODIGO." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      
      
      
      
      
      
      
      
      /*      ----------------------------------------    RELATÓRIOS  USUÁRIO ROOT   ---------------------------------------------      */
      
      function root_autorizadas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Autorizado' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
         } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Autorizado' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao where req_status='Autorizado' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where req_status='Autorizado' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function root_aguardando(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Aguardando' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Aguardando' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao where req_status='Aguardando' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where req_status='Aguardando' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function root_impressas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Impresso' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Impresso' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Impresso' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Impresso' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Impresso' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao where req_status='Impresso' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
                  $this->resultado4= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where req_status='Impresso' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
              $this->resultado4= $this->con->banco->Execute($sql);
          }
      }
      function root_canceladas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status=Cancelado' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Cancelado' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Cancelado' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Cancelado' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Cancelado' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao where req_status='Cancelado' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where req_status='Cancelado' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function root_rejeitadas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_data between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_dtentrega between '".$data1."' and '".$data2."') ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Rejeitado' and (usu_codigo=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_dep=".$this->registros->DEP_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_status='Rejeitado' and (req_aut=".$this->registros->USU_CODIGO.") ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }

          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao where req_status='Rejeitado' ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where req_status='Rejeitado' and usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
      function root_todas(){
          if($_REQUEST['campo_filtro']=='Por Data'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_data between '".$data1."' and '".$data2."' ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Data da Retirada'){
              if(($_REQUEST['data1']!="")&&($_REQUEST['data2']!="")){
                  $data1=$_REQUEST['data1'];
                  $data1= explode("/", $data1);
                  list($dia, $mes, $ano) = $data1;
                  $data1= "$ano/$mes/$dia";
                  $data2=$_REQUEST['data2'];
                  $data2= explode("/", $data2);
                  list($dia, $mes, $ano) = $data2;
                  $data2 = "$ano/$mes/$dia";
                  $sql=("select * from requisicao where req_dtentrega between '".$data1."' and '".$data2."' ORDER BY req_data DESC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Requerente'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where usu_codigo=".$this->registros->USU_CODIGO." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Por Departamento'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from departamento where dep_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from departamento where dep_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_dep=".$this->registros->DEP_CODIGO." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
                  
          } else if($_REQUEST['campo_filtro']=='Por Avaliador'){
              if($_REQUEST['campo_info1']!="" && $_REQUEST['campo_info1']!=" "){
                $sql1=("select * from usuario where usu_codigo=".$_REQUEST['campo_info1']);
                $this->resultado3= $this->con->banco->Execute($sql1);
              } else if($_REQUEST['campo_info2']!="" && $_REQUEST['campo_info2']!=" "){
                $sql1=("select * from usuario where usu_nome like '%".$_REQUEST['campo_info2']."%'");
                $this->resultado3= $this->con->banco->Execute($sql1);
              }            
              if($this->registros=$this->resultado3->FetchNextObject()){
                  $sql=("select * from requisicao where req_aut=".$this->registros->USU_CODIGO." ORDER BY req_status ASC");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              } else {
                  $sql=("select * from requisicao where req_status='0000000'");
                  $this->resultado= $this->con->banco->Execute($sql);
                  $this->resultado2= $this->con->banco->Execute($sql);
                  $this->resultado3= $this->con->banco->Execute($sql);
              }
          } else if($_REQUEST['campo_filtro']=='Todas com este Status'){
              $sql=("select * from requisicao ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          } else {
              $sql=("select * from requisicao where usu_codigo=".$_SESSION['on_codigo']." ORDER BY req_codigo DESC");
              $this->resultado= $this->con->banco->Execute($sql);
              $this->resultado2= $this->con->banco->Execute($sql);
              $this->resultado3= $this->con->banco->Execute($sql);
          }
      }
}
?>
