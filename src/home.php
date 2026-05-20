<?php
session_start();

if(!isset($_SESSION["logado"])){

    header("Location: index.php");

    exit();

}

include("conexao.php");

try {
    $sql = "SELECT * FROM livros ORDER BY titulo ASC";

    $stmt = $pdo->query($sql);
    $resultados = $stmt->fetchAll();

} catch (PDOException $e) {
    die("Erro ao carregar os livros: " . $e->getMessage());
}

include("header.php");

?>

<section class="hero">

<div class="hero_container">

<h1>Bem-vindo ao BookSystem</h1>

<p>Encontre os melhores livros para sua leitura</p>

</div>

<div class="menu_livros">

<?php

foreach($resultados as $dados){

    $imagem = "";

    if($dados["titulo"] == "Banco de Dados Teoria e Desenvolvimento"){
        $imagem = "Livro_BANCO_DADOS.jpg";
    }

    elseif($dados["titulo"] == "PHP Programando com Orientação a Objetos"){
        $imagem = "Livro_PHP.jpg";
    }

    elseif($dados["titulo"] == "Introdução à Programação com Python"){
        $imagem = "Livro_PYTHON.jpg";
    }

    elseif($dados["titulo"] == "Java Script: O Guia Definitivo"){
        $imagem = "Livro_JAVA.jpg";
    }

    elseif($dados["titulo"] == "Programação Utilizando IA"){
        $imagem = "Livro_UTILIZANDO_IA.jpg";
    }

    else{
        $imagem = "Livro_ALGORITMOS.jpg";
    }

?>

<div class="menu_livro">

<img src="img/<?php echo $imagem; ?>">

<h2><?php echo $dados["titulo"]; ?></h2>

<p><strong>Autor:</strong> <?php echo $dados["autor"]; ?></p>

<p><strong>Categoria:</strong> <?php echo $dados["categoria"]; ?></p>

<p><strong>Data:</strong> <?php echo $dados["data_publicacao"]; ?></p>

<div class="price">

Quantidade: <?php echo $dados["quantidade"]; ?>

</div>

<button class="add_cart">

Ver Livro

</button>

</div>

<?php

}

?>

</div>

</section>

<?php include("footer.php"); ?>