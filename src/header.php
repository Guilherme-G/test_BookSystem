<?php

if(session_status() == PHP_SESSION_NONE){

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

            <?php if(isset($_SESSION["logado"])){ ?>

                <li><a href="home.php">Início</a></li>

                <li><a href="livros.php">Livros</a></li>

                <li><a href="usuarios.php">Usuários</a></li>

                <li><a href="inserir.php">Cadastrar Livro</a></li>

                <li><a href="logout.php" class="default-btn">Logout</a></li>

            <?php } else { ?>

                <li><a href="index.php" class="default-btn">Login</a></li>

            <?php } ?>

        </ul>

    </nav>

</div>