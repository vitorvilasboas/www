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
            function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){
                $lmin = 'abcdefghijklmnopqrstuvwxyz';
                $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $num = '1234567890';
                $simb = '!@#$%*-';

                $retorno = '';

                $caracteres = '';
                $caracteres .= $lmin;
                if ($maiusculas) $caracteres .= $lmai;
                if ($numeros) $caracteres .= $num;
                if ($simbolos) $caracteres .= $simb;

                    $len = strlen($caracteres);

                    for ($n = 1; $n <= $tamanho; $n++) {
                        $rand = mt_rand(1, $len);
                        $retorno .= $caracteres[$rand-1];
                    }
                return $retorno;
            }
			function mask($val){
                if(empty($val)){
                    $val = '';
                    return $val;
                }else{
                $mask = '###.###.###-##';
                $maskared = '';
                $k = 0;
                for($i = 0; $i<=strlen($mask)-1; $i++){
                    if($mask[$i] == '#'){
                        if(isset($val[$k]))
                            $maskared .= $val[$k++];
                    }else{
                        if(isset($mask[$i]))
                        $maskared .= $mask[$i];
                    }
                }
                return $maskared;
            }
            }
           
        
        
?>
