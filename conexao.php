<?php

// Configurações de acesso ao banco de dados
$host = "localhost";      // O servidor onde o banco está rodando (geralmente localhost na máquina local)
$usuario = "root";       // O nome de usuário padrão do MySQL (em ambientes de desenvolvimento como XAMPP/WAMP)
$senha = "";             // A senha do usuário (por padrão, o root vem sem senha no ambiente local)
$banco = "booksystem";   // O nome exato do banco de dados que você criou no MySQL/PhpMyAdmin

// Cria uma nova conexão com o banco de dados usando a extensão MySQLi orientada a objetos
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se houve algum erro na tentativa de conexão
if ($conexao->connect_error) {
    
    // Se houver erro, interrompe a execução do script (die) e mostra a mensagem do erro
    die("Erro de conexão: " . $conexao->connect_error);
}

?>