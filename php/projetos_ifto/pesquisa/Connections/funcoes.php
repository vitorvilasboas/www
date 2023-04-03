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
            if(end(explode('.', $name))=='jpeg'){
                $img = imagecreatefromjpeg($tmp);
            }else if(end(explode('.', $name))=='png'){
                $img = imagecreatefrompng($tmp);
            }else if(end(explode('.', $name))=='gif'){
                $img = imagecreatefromgif($tmp);
            }else if(end(explode('.', $name))=='jpg'){
                $img = imagecreatefromjpeg($tmp);
            }
            //$name = $_FILES['img']['name'];
            if (file_exists("$pasta.'/'.$name")){
                $i = 1;	                  
		while(file_exists("$pasta.'/'.[$i]$name")){
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
           function moeda($get_valor) {
           $source = array('.', ',');
           $replace = array('', '.');
           $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
             return $valor; //retorna o valor formatado para gravar no banco
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
            function distancia($x1, $y1, $x2, $y2) {

                $x1 = deg2rad($x1);
                $x2 = deg2rad($x2);
                $y1 = deg2rad($y1);
                $y2 = deg2rad($y2);

                $dist = (6371 * acos( cos( $x1 ) * cos( $x2 ) * cos( $y2 - $y1 ) + sin( $x1 ) * sin($x2) ) );
                $dist = number_format($dist, 2, '.', '');
                return $dist;
            }
            function random($nNumeros, $nQuant) { 
                $aRand = array(); 
                for ($i=1; $i<=$nQuant; $i++) { 
                        $aRand[$i] = $rand = rand(1, 5); 

                        while (count($aRand) < $nNumeros) 
                                if (!in_array($rand, $aRand)) 
                                        $aRand[] = $rand; 
                                else 
                                        $rand = rand(1, 5); 
                } 

                return $aRand; 
            }
            /*function custo($gex,$gey,$px,$py,$pex,$pey){
              $cij = distancia($gex,$gey,$px,$py,"k");
              $cjk = distancia($px,$py,$pex,$pey,"k");
              $cik = distancia($pex,$pey,$gex,$gey,"k");
              $custo_rota = $cij+$cjk+$cik;
              $custo_rota = number_format($custo_rota, 2, '.', '');
             return $custo_rota;
             
            }*/
            function custo($gex,$gey,$px,$py){
              $cij = distancia($gex,$gey,$px,$py,"k");
              $cjk = distancia($px,$py,$gex,$gey,"k");
              $custo_rota = $cij+$cjk;
              $custo_rota = number_format($custo_rota, 2, '.', '');
             return $custo_rota;
             
            }
            function min_by_key($arr, $key){ 
                $min = array(); 
                foreach ($arr as $val) { 
                    if (!isset($val[$key]) and is_array($val)) { 
                        $min2 = min_by_key($val, $key); 
                        $min[$min2] = 1; 
                    } elseif (!isset($val[$key]) and !is_array($val)) { 
                        return false; 
                    } elseif (isset($val[$key])) { 
                        $min[$val[$key]] = 1; 
                    } 
                } 
                return min( array_keys($min) ); 
            
            }
            function hora_chegada($hca,$tt){
                $times = array("$hca","$tt");
                $seconds = 0;
                foreach ( $times as $time ){
                   list( $g, $i, $s ) = explode( ':', $time );
                   $seconds += $g * 3600;
                   $seconds += $i * 60;
                   $seconds += $s;
                }

                $hours = floor( $seconds / 3600 );
                $seconds -= $hours * 3600;
                $minutes = floor( $seconds / 60 );
                $seconds -= $minutes * 60;

                $chegada = "{$hours}:{$minutes}:{$seconds}";
                return $chegada;
            }
            
            function convert_seg_min($valor){
                $segundos = $valor;
                //Converter os segundos em no formato H:mm:ss
                $converter = date('H:i:s',mktime(0,0,$segundos));
                return $converter;
            }
            
            /*
function lrc($escola,$gex, $gey,$P){
    foreach ($P as $value) {
         $px = $value['PAR_COORD_X']; 
         $py = $value['PAR_COORD_Y'];
         $p_id = $value['PAR_CODIGO'];
         $ex = $value['ESC_COORD_X']; 
         $ey = $value['ESC_COORD_Y'];
         $e_id = $value['ESC_CODIGO'];
         
         $custo_ge = distancia($gex, $gey, $px, $py,"k"); 
         $custo_pe = distancia($px, $py, $ex, $ey,"k");
         $custo_percurso = $custo_ge+$custo_pe;
         $s_custo[] = $custo_percurso;
         $s_p_id[] = $p_id;
         $s_e_id[] = $e_id;
         
    }
    if(empty($s_custo)){
        return FALSE;
    }else{
    //asort($custo_rota);
    $max = max($custo_rota);
    //$kmax = array_keys($custo_rota,$max);
    //$kmax[0];
    $min = min($custo_rota);
    //$Kmin = array_keys($custo_rota,$min);
    //$Kmin[0];
    //echo '<br />';
    $grasp = $min+0.6*($max-$min);
    //print_r($custo_rota);
    //echo '<br />';
    }
    foreach ($custo_rota as $key => $value) {
        if($value<=$grasp){    
        $R1[] = $key;
        $R2[] = $value;
        }
    }
    if(empty($R2)){
        return FALSE;
    }else{
        //print_r($R2);
        //echo '<br />';
         $lrc = $R1;
        //$selecionado =  $R1[$sorte];
        //echo '<br />';
        return $lrc;
    }*/
    function matrizdistancias($gex, $gey,$PE){
    foreach ($PE as $value) {
         $px = $value['PAR_COORD_X']; 
         $py = $value['PAR_COORD_Y'];
         $p_id = $value['PAR_CODIGO'];
         $ex = $value['ESC_COORD_X']; 
         $ey = $value['ESC_COORD_Y'];
         $e_id = $value['ESC_CODIGO'];
         
         $custo_ge = distancia($gex, $gey, $px, $py,"km"); 
         $custo_pe = distancia($px, $py, $ex, $ey,"km");
         $custo_percurso = $custo_ge+$custo_pe;
         //$s_custo[] = $custo_percurso;
         //$s_p_id[] = $p_id;
         //$s_e_id[] = $e_id;
         $s_custo[] = array('P_ID'=>$p_id,'P_CUSTO'=>$custo_percurso,'E_ID'=>$e_id);
    }
    if(empty($s_custo)){
        return FALSE;
    }else{
        $matrizdistancias= $s_custo;
        //$matrizdistancias= array_combine($s_p_id, $s_custo);
        return $matrizdistancias; 
    }
       
    }
    function carregar_coordenadas($numero,$endereco,$cidade,$estado,$cep,$pais){    
        $endereco_convertido = str_replace(' ', '+', $endereco);
        //Endereço : $endereco, $numero, $cidade, $estado, $pais, $cep - "; 
        $address = $endereco_convertido.",".$numero.",".$cidade."-".$estado.",".$pais;

        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?&address='.$address.'&sensor=false');

        $output = json_decode($geocode);
        //print_r($output);

        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;
        $coordenadas = array('coord_x'=>$lat,'coord_y'=>$long);
        return $coordenadas;
        }
        
        function doisopt($Rn){
            $tam = count($Rn);
            for($i=1; $i<$tam-2;$i++){
                for($j=$i+1;$j<$tam-1;$j++){
                    $di1 = $i-1;
                    $di2 = $i;
                    $dj1 = $j;
                    $dj2 = $j+1;
                    $disti= distancia($Rn[$di1]['par_coord_x'],$Rn[$di1]['par_coord_y'],$Rn[$di2]['par_coord_x'],$Rn[$di2]['par_coord_y']);
                    $distj= distancia($Rn[$dj1]['par_coord_x'],$Rn[$dj1]['par_coord_y'],$Rn[$dj2]['par_coord_x'],$Rn[$dj2]['par_coord_y']);

                    $distk= distancia($Rn[$di1]['par_coord_x'],$Rn[$di1]['par_coord_y'],$Rn[$dj1]['par_coord_x'],$Rn[$dj1]['par_coord_y']);
                    $distl= distancia($Rn[$di2]['par_coord_x'],$Rn[$di2]['par_coord_y'],$Rn[$dj2]['par_coord_x'],$Rn[$dj2]['par_coord_y']);
                    if(($disti+$distj)>($distk+$distl)){
                        $aux = $Rn[$di2]; 
                        $Rn[$di2] = $Rn[$dj1];
                        $Rn[$dj1] = $aux;
                    }
                }
            }
            return $Rn;
        }
        function matrixdistance($x1,$y1,$x2,$y2){
            $routes=json_decode(file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?key=AIzaSyBC9NXwUD9nqCZBZjTBJSlMfDmD7QqdCzo&origins='.$x1.','.$y1.'&destinations='.$x2.','.$y2.'&mode=bus&language=br-BR'));
            $distance = $routes->rows[0]->elements[0]->distance->value;
            return $distance;
            //print_r($routes);
        }
        function distanciareal($i,$j,$matriz){
            foreach($matriz as $value){
                if($value['mdis_i']==$i and $value['mdis_j']==$j){
                    $distanciaixj = ($value['mdis_distancia'])/1000;
                    break;
                }else if($value['mdis_i']==$j and $value['mdis_i']==$j){
                    $distanciaixj = ($value['mdis_distancia'])/1000;
                    break;
                }else{
                    $distanciaixj = 0;
                }
            }
            return $distanciaixj;
        }
        function msgfalha($msg1,$msg2){
            $acao = "this.parentElement.style.display='none'";
            echo '<div class="w3-container w3-section w3-red">
                    <span onclick="'.$acao.'" class="w3-closebtn">×</span>
                    <h3>'.$msg1.'</h3>
                    <p>'.$msg2.'</p>
                </div>';
        }
        function msgsucess($msg1,$msg2){
            $acao = "this.parentElement.style.display='none'";
            echo '<div class="w3-container w3-section w3-green">
                    <span onclick="'.$acao.'" class="w3-closebtn">×</span>
                    <h3>'.$msg1.'</h3>
                    <p>'.$msg2.'</p>
                </div>';
        }
        function msgerro($msg1,$msg2){
            $acao = "this.parentElement.style.display='none'";
            echo '<div class="w3-container w3-section w3-red">
                    <span onclick="'.$acao.'" class="w3-closebtn">×</span>
                    <h3>'.$msg1.'</h3>
                    <p>'.$msg2.'</p>
                </div>';
        }
        function listazebrada($i){
            if($i % 2){  $cor; 
             echo $cor = 2;             
         } else { 
             echo $cor = 1;
         }
        }
        function tam_janela($url){
            $var = '<script language=javascript>
                function cadastro(URL){
                    window.open(URL,"janela1","width=300,height=300,scrollbars=NO")
                }

                cadastro("'.$url.'");
            </script> ';
            $link = "javascript:cadastro('$var')";
            return $link;
        }
        function tipo_projeto($tipo){
            if($tipo==1){
                echo 'Ensino';
            }else if($tipo==2){
                echo 'Pesquisa/Inovação';
            }else if($tipo==3){
                echo 'Extensão';
            }
        }
        function situacao_projeto($situacao){
            if($situacao==1){
                echo 'Em Andamento';
            }else if($situacao==2){
                echo 'Concluído';
            }else if($situacao==3){
                echo 'Cancelado';
            }else if($situacao==4){
                echo 'Suspenso';
            }else if($situacao==5){
                echo 'Submetido';
            }else if($situacao==6){
                echo 'Em Avaliação';
            }
        }
        function contar_cadastros($cont){
            if($cont==0){
                echo "Não possui dados cadastrados";
            }else if($cont==1){
                echo "Tem 1 cadastro";
            }else if($cont > 1){
                echo "Temos {$cont} cadastros";
            }
        }
        function estado(){
          echo '<option value="TO">TO</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AM">AM</option>
                <option value="AP">AP</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MG">MG</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="PR">PR</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="RS">RS</option>
                <option value="SC">SC</option>
                <option value="SE">SE</option>
                <option value="SP">SP</option>';
        }
?>

