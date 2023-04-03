<?php 

	function tratar_erros($erro_numero)
	{
		$mensagem_erro = "";
		switch($erro_numero)
		{
			case 1045: $mensagem_erro = "O usuario ou a senha sao invalidos, tente novamente";break;
			case 1146: $mensagem_erro = "Essa tabela não existe";break;
			default: $mensagem_erro = "Erro não identificado";break;
		}
		return $mensagem_erro;
	}
	function alerta($mensagem)
	{
		echo '<script>alert("'.$mensagem.'");</script>';
	}
        function voltar()
        {
            
                echo "<script>history.back();</script>";
        }
        function direcionar($url)
        {
                echo '<script>window.location="'.$url.'"</script>';
        }
        function upload($tmp, $name, $largura, $pasta){
            if(end(explode('.', $name))=='jpg'){
                $img = imagecreatefromjpeg($tmp);
            }elseif(end(explode('.', $name))=='png'){
                $img = imagecreatefrompng($tmp);
            }elseif(end(explode('.', $name))=='gif'){
                $img = imagecreatefromgif($tmp);
            }
            $name = $_FILES['img']['name'];
            if (file_exists("uploads/fotos/$name")){
                $i = 1;	                  
		while(file_exists("uploads/fotos/[$i]$name")){
                    $i++;
                }
                $name = "[".$i."]".$name;
            }
            
           $x = imagesx($img);
           $y = imagesy($img);
           
           $largura = ($x>$largura) ? $largura: $x;
           $altura = ($largura*$y) / $x;
           
           if($altura>$largura){
               $altura = $largura;
               $largura ($altura*$x)/$y;
           }
           
           $nova = imagecreatetruecolor($largura, $altura);
           imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura,$altura, $x, $y);
           imagejpeg($nova,$pasta.'/'.$name);
           imagedestroy($img);
           imagedestroy($nova);
           return $name;
           
           }
           function fullUpper($string){
              return strtr(strtoupper($string), array(
                  "à" => "À","è" => "È","ì" => "Ì","ò" => "Ò","ù" => "Ù",
                  "á" => "Á","é" => "É","í" => "Í","ó" => "Ó","ú" => "Ú",
                  "â" => "Â","ê" => "Ê","î" => "Î","ô" => "Ô","û" => "Û",
                  "ç" => "Ç","ã" => "Ã","õ" => "õ",));
            }
            function gerar_chave_certificado(){
                $novo_valor= "";
                $valor = "ABCDEFGHIJLKMNOPQRSTUVXYZW0123456789";
                srand((double)microtime()*1000000);
                for ($i=0; $i<16; $i++){
                    $novo_valor.= $valor[rand()%strlen($valor)];
                }
                return $novo_valor;
            }

           
        
        
?>
