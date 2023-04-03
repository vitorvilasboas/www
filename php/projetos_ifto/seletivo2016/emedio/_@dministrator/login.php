<?php

require "../config/conectaBanco.php";// Conexão com o banco de dados
session_start();// Inicia sessões

// Recupera o login
$login = isset($_POST["login"]) ? trim($_POST["login"]) : FALSE;
// Recupera a senha, a criptografando em MD5
$senha_login = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

// Usuário não forneceu a senha ou o login
if(!$login || !$senha_login)
{
    echo "Você deve digitar sua senha e login!";
    exit;
}

/**
* Executa a consulta no banco de dados.
* Caso o número de linhas retornadas seja 1 o login é válido,
* caso 0, inválido.
*/

$SQL = "SELECT * FROM usuarios WHERE login = '". $login . "';";
$result = mysql_query($SQL, $conectar);
$total = mysql_num_rows($result);

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total)
{
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
    $dados = mysql_fetch_array($result);

    // Agora verifica a senha
    if(!strcmp($senha_login, $dados["senha"]))
    {
        // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
        $_SESSION["idusuarios"]   = $dados["idusuarios"];
        $_SESSION["nome_usuario"] = $dados["login"];
        header("Location: buscaInscricao.php");
        exit;
    }
    // Senha inválida
    else
    {
		header("Location: form_login.php?erro=1");
		exit;
    }
}
// Login inválido
else
{
	header("Location: form_login.php?erro=1");
    exit;
}
?>