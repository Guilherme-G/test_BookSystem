<?php

// Verifica se a sessão ainda não foi iniciada no servidor
if(session_status() == PHP_SESSION_NONE){

    // Se não houver sessão ativa, inicia a sessão (evita erros de "session already started")
    session_start();

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>BookSystem</title>

    <link rel="stylesheet" href="style.css">

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

</head>

<body>

<div class="navbar_container">

    <nav>

        <a href="home.php">
            <img src="img/LOGO.png" class="logo">
        </a>

        <ul class="navbar_itens">

            <?php 
            // CONDICIONAL PHP: Se a variável de sessão "logado" existir, mostra o menu do usuário autenticado
            if(isset($_SESSION["logado"])){ 
            ?>

                <li><a href="home.php">Início</a></li>

                <li><a href="livros.php">Livros</a></li>

                <li><a href="usuarios.php">Usuários</a></li>

                <li><a href="inserir.php">Cadastrar Livro</a></li>

                <li><a href="logout.php" class="default-btn">Logout</a></li>

            <?php 
            // Caso a variável "logado" NÃO exista, executa o bloco abaixo
            } else { 
            ?>

                <li><a href="index.php" class="default-btn">Login</a></li>

            <?php } // Fim da condicional PHP ?>

        </ul>

    </nav>

</div>