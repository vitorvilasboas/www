<?php
function redefSenhaEmail($email, $cpf, $inscricao, $nome){
//function enviarEmail(){
  //error_reporting ( E_ALL );
  require ("config/conectaBanco.php");
        
        $newSenha = geraPass();

        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->SMTPSecure = "ssl";
        $mail->IsSMTP();
        //$mail->Sendmail = '/usr/sbin/sendmail';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPDebug = 0;   // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
        $mail->SMTPAuth = true;
        $mail->Username = "seletivoaraguatins@ifto.edu.br";
        $mail->Password = "s3l3t!vo";
        $mail->IsHTML(true);

        $mail->SetFrom('seletivoaraguatins@ifto.edu.br');
        $mail->From = 'seletivoaraguatins@ifto.edu.br';
        //$mail->Sender = 'seletivoaraguatins@ifto.edu.br';
        $mail->FromName = 'Sistema Processo Seletivo 2016 - IFTO Araguatins';
        $mail->AddAddress($email);
        $mail->Subject = 'Redefinir senha';
        //$mail->AltBody = 'Mensagem em texto';,
        $mail->Body = "Olá ".$nome.", <br /><br />Uma senha temporária foi gerada para a inscrição ".$inscricao.".<br /><br />";
        $mail->Body .= "Efetue login no sistema usando a credencial <b>".$newSenha."</b> e altere-a assim que possível.<br /><br /><br />";
        $mail->Body .= "Atenciosamente,<br />Comissão do Processo Seletivo 2016/1 do IFTO Campus Araguatins.<br /><br />";
        //$mail->Body .= "<a href='redefinePass.php?rcpf=".$cpf."&rinsc=".$inscricao."'>Redefinir Senha</a>";
        
        if($mail->Send()){
          $newSenha_encrypt = base64_encode($newSenha);
          $sql = "update candidatos set can_senha='$newSenha_encrypt' WHERE can_cpf='$cpf' AND can_inscricao=$inscricao AND can_email='$email'";
          if (mysql_query($sql)){
            return true;
          } else {
            return false;
            //echo $mail->ErrorInfo;
          }   
        } else {
          return false;
          //echo $mail->ErrorInfo;
        }
  }

    
  function geraPass($tipo="L L N N L N N L L N N") {// criando e abrindo a função
    // o explode retira os espaços presentes entre as letras (L) e números (N)        
    $tipo = explode(" ", $tipo);

    // Criação de um padrão de letras e números (no meu caso, usei letras maiúsculas
    // mas você pode intercalar maiusculas e minusculas, ou adaptar ao seu modo.)
    $padrao_letras = "A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|X|W|Y|Z|a|b|c|d|e|f|g|h|i|j|k|l|m|n|o|p|q|r|s|t|u|v|x|w|y|z";
    $padrao_numeros = "0|1|2|3|4|5|6|7|8|9";

    // criando os arrays, que armazenarão letras e números
    // o explode retire os separadores | para utilizar as letras e números
    $array_letras = explode("|", $padrao_letras);
    $array_numeros = explode("|", $padrao_numeros);

    // cria a senha baseado nas informações da função (L para letras e N para números)
    $senha = "";
    for ($i=0; $i<sizeOf($tipo); $i++) {
        if ($tipo[$i] == "L") {
            $senha.= $array_letras[array_rand($array_letras,1)];
        } else {
            if ($tipo[$i] == "N") {
                $senha.= $array_numeros[array_rand($array_numeros,1)];
            }
        }
    }
    return $senha;//echo "A senha gerada é: " . $senha;
  }// fecha a função

  function retornaConfiguracao($var)
  {
   $arquivo = "http://localhost/PHPControl/conf.inc";
   $conteudo = fopen($arquivo,"r");
   $valores = Array();

   while(!feof($conteudo))
   {
    $linha = fgets($conteudo);
    $conjunto = explode("=",$linha);

    $parametro = $conjunto[0];
    $parametro = str_replace("[","",$parametro);
    $parametro = str_replace("]","",$parametro);

    $valor = explode("\"",$conjunto[1]);

    $configuracao[$parametro] = $valor[1];
   }
   fclose($conteudo);
   return $configuracao[$var];
  }
  
  
  function formataData($data,$char_in,$char_out)
  {
   $vet_data = explode($char_in,$data);
   $data_format = $vet_data[2].$char_out.$vet_data[1].$char_out.$vet_data[0];
       
   return $data_format;
  }


  function checaPermissaoInclude($ipe,$ope,$pag)
  {
   $sql = "SELECT * FROM permissoes WHERE cod_ope='$ope' AND cod_ipe='$ipe'";
   $query = mysql_query($sql);
   $cont = mysql_num_rows($query);

   if ($cont == 1)
      include ($pag);
   else
      include("erroPermissao.php");
  }
  
  
  function checaPermissaoPagina($ipe,$ope)
  {
   $sql = "SELECT * FROM permissoes WHERE cod_ope='$ope' AND cod_ipe='$ipe'";
   $query = mysql_query($sql);
   $cont = mysql_num_rows($query);

   if ($cont == 1)
      return true;
   else
      return false;
  }
  
  
  function checaPermissaoLink($ipe,$ope,$true,$false)
  {
   $sql = "SELECT * FROM permissoes WHERE cod_ope='$ope' AND cod_ipe='$ipe'";
   $query = mysql_query($sql);
   $cont = mysql_num_rows($query);

   if ($cont == 1)
      echo $true;
   else
      echo $false;
  }
  
  
  function formataNumero($num,$tam)
  {
   $tam_num = strlen($num);
   if ($tam_num < $tam)
   {
    $tam_res = $tam - $tam_num;
    for ($i=1; $i<=$tam_res; $i++)
        $num_com .= "0";
    $num = $num_com.$num;
   }
   return $num;
  }
  
  function CortarTexto($texto, $n_carac)
  {
   $texto = str_replace("  ", " ", $texto);
   $string = explode(" ", $texto);
   $n_pal = count($string);
   for ( $i = 0; $i <= $n_pal; $i++ )
   {
    if (strlen($truncado)+strlen($string[$i])<=$n_carac)
       $truncado.=$string[$i];
       
    if (strlen($truncado)+strlen($string[$i+1])+1<=$n_carac)
       $truncado .= " ";
    else
    {
     $truncado .= "...";
     break;
    }
   }
   $truncado = trim($truncado);
   return $truncado;
  }
  
  function removerDiretorio($patch)
  {
   if ($diretorio = opendir("$patch"))
   {
    while (false !== ($item = readdir($diretorio)))
    {
     if ($item != "." && $item != "..")
        if (is_dir("$patch/$item"))
           removerDiretorio("$patch/$item");
        else
           unlink("$patch/$item");
     }
    }
    closedir($diretorio);
   }
   
   function salvarImagem($imagem,$imagem_tmp,$alt_imagem,$lar_imagem,$salvar_como,$tratar,$add_logo)
   {
    $imagem_original = ImageCreateFromJPEG($imagem_tmp);
    $largura_original = ImagesX($imagem_original);
    $altura_original = ImagesY($imagem_original);
    
    if (($largura_original > $lar_imagem or $altura_original > $lar_imagem) or $tratar == "sim")
    {
     if ((eregi(".jpg$", $imagem)) || (eregi(".jpeg$", $imagem)))
     {
      if ($altura_original >= $alt_imagem and $altura_original > $largura_original)
      {
       $redimensionar = $altura_original/$largura_original;
       $altura_final = $alt_imagem;
       $largura_final = round($alt_imagem/$redimensionar);
      }
      else if ($altura_original < $alt_imagem and $altura_original > $largura_original)
      {
       $redimensionar = $altura_original/$largura_original;
       $altura_final = $altura_original;
       $largura_final = $largura_original;
      }
      else if ($largura_original >= $lar_imagem and $largura_original > $altura_original)
      {
       $redimensionar = $largura_original/$altura_original;
       $largura_final = $lar_imagem;
       $altura_final = round($lar_imagem/$redimensionar);
       if ($altura_final > $alt_imagem)
       {
        $altura_final = $alt_imagem;
        $largura_final = round($alt_imagem*$redimensionar);
       }
      }
      else if ($largura_original < $lar_imagem and $largura_original > $altura_original)
      {
       $redimensionar = $largura_original/$altura_original;
       $largura_final = $largura_original;
       $altura_final = round($largura_original/$redimensionar);
       if ($altura_final > $alt_imagem)
       {
        $altura_final = $alt_imagem;
        $largura_final = round($alt_imagem*$redimensionar);
       }
      }
      else if ($largura_original == $altura_original and $largura_original >= $alt_imagem)
      {
       $largura_final = $alt_imagem;
       $altura_final = $alt_imagem;
      }
      else if ($largura_original == $altura_original and $largura_original < $alt_imagem)
      {
       $largura_final = $largura_original;
       $altura_final = $altura_original;
      }

      $imagem_final = ImageCreateTrueColor($largura_final,$altura_final);

      ImageCopyResampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura_final, $altura_final, $largura_original, $altura_original);
      if ($add_logo=="sim")
         adicionaLogomarca($imagem_final, $largura_final, $altura_final, $lar_imagem, retornaConfiguracao("POS_LOGO"));
      ImageJPEG($imagem_final, $salvar_como,80);
      ImageDestroy($imagem_original);
      ImageDestroy($imagem_final);
     }
    }
    else
       if ((eregi(".jpg$", $imagem)) || (eregi(".jpeg$", $imagem)))
          copy($imagem_tmp,$salvar_como);
    
    return true;
   }
   
   function adicionaLogomarca($imagem, $lar_img, $alt_img, $conf_lar_img, $pos)
   {
    $logo = ImageCreateFromPNG(retornaConfiguracao("LOGO"));
    $lar_logo = imagesx($logo);
    $alt_logo = imagesy($logo);
    
    $por_red_img = $lar_img/$conf_lar_img;
    
    $lar_final_logo = floor($lar_logo*$por_red_img);
    $alt_final_logo = floor($alt_logo*$por_red_img);
    
    if($pos == "CENTRO_ESQUERDA")
    {
     $dest_x = 0;
     $dest_y = ($lar_img/2)-($lar_final_logo/2);
    }
    else if ($pos == "CENTRO")
    {
     $dest_x = ($lar_img/2)-($lar_final_logo/2);
     $dest_y = ($alt_img/2)-($alt_final_logo/2);
    }
    else if($pos == "CENTRO_DIREITA")
    {
     $dest_x = $lar_img-$lar_final_logo;
     $dest_y = ($alt_img/2)-($alt_final_logo/2);
    }
    else if($pos == "TOPO_ESQUERDA")
    {
     $dest_x = 0;
     $dest_y = 0;
    }
    if($pos == "TOPO_CENTRO")
    {
     $dest_x = (($lar_img - $lar_final_logo)/2);
     $dest_y = 0;
    }
    else if($pos == "TOPO_DIREITA")
    {
     $dest_x = $lar_img-$lar_final_logo;
     $dest_y = 0;
    }
    else if($pos == "BASE_ESQUERDA")
    {
     $dest_x = 0;
     $dest_y = $alt_img-$alt_logo;
    }
    else if($pos == "BASE_CENTRO")
    {
     $dest_x = (($lar_img-$lar_final_logo)/2);
     $dest_y = $alt_img-$alt_final_logo;
    }
    else if($pos == "BASE_DIREITA")
    {
     $dest_x = $lar_img-$lar_final_logo;
     $dest_y = $alt_img-$alt_final_logo;
    }

    ImageCopyResampled($imagem, $logo, $dest_x, $dest_y , 0, 0, $lar_final_logo, $alt_final_logo, $lar_logo, $alt_logo);
   }
   
   function calculaData($data_inicial,$data_final,$retornar)
   {
    list ($idia, $imes, $iano) = explode('/', $data_inicial);
    list ($fdia, $fmes, $fano) = explode('/', $data_final);
    $time_stamp = (mktime(0, 0, 0, $fmes, $fdia, $fano) + 86400) - mktime(0, 0, 0, $imes, $idia, $iano);
    $dias = $time_stamp / 86400;
    $anos = floor($dias);
    $anos = $anos / 365;
    return $$retornar;
   }
   
   function arredondarDecimal($valor)
   {
    $valor_arredondado = round($valor*100)/100;
    return $valor_arredondado;
   }
?>
