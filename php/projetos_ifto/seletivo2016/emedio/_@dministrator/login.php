<?php

require "../config/conectaBanco.php";// Conex�o com o banco de dados
session_start();// Inicia sess�es

// Recupera o login
$login = isset($_POST["login"]) ? trim($_POST["login"]) : FALSE;
// Recupera a senha, a criptografando em MD5
$senha_login = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

// Usu�rio n�o forneceu a senha ou o login
if(!$login || !$senha_login)
{
    echo "Voc� deve digitar sua senha e login!";
    exit;
}

/**
* Executa a consulta no banco de dados.
* Caso o n�mero de linhas retornadas seja 1 o login � v�lido,
* caso 0, inv�lido.
*/

$SQL = "SELECT * FROM usuarios WHERE login = '". $login . "';";
$result = mysql_query($SQL, $conectar);
$total = mysql_num_rows($result);

// Caso o usu�rio tenha digitado um login v�lido o n�mero de linhas ser� 1..
if($total)
{
    // Obt�m os dados do usu�rio, para poder verificar a senha e passar os demais dados para a sess�o
    $dados = mysql_fetch_array($result);

    // Agora verifica a senha
    if(!strcmp($senha_login, $dados["senha"]))
    {
        // TUDO OK! Agora, passa os dados para a sess�o e redireciona o usu�rio
        $_SESSION["idusuarios"]   = $dados["idusuarios"];
        $_SESSION["nome_usuario"] = $dados["login"];
        header("Location: buscaInscricao.php");
        exit;
    }
    // Senha inv�lida
    else
    {
		header("Location: form_login.php?erro=1");
		exit;
    }
}
// Login inv�lido
else
{
	header("Location: form_login.php?erro=1");
    exit;
}
?>