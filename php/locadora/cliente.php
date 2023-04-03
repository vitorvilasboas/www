<?php
	class cliente {  
       var $nome;
       var $cidade;
       var $salario;

       function darNome($texto){
            $this->nome = $texto;
       }
    }

    $cliente1 = new cliente;

    $cliente1->nome = "Vitor";

    //$dog->darNome("Vitor");

    echo $cliente1->nome;

 ?>