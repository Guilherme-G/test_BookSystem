<?php
session_start();

if(!isset($_SESSION["logado"])){

    header("Location: index.php");

    exit();

}

// Inclui o arquivo que agora cria a variável $pdo
include("conexao.php");

try {
    $sql = "SELECT * FROM livros ORDER BY titulo ASC";

    // Executa a query usando o PDO e busca todos os registros de uma vez
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
// Alterado de 'while' com 'mysqli_fetch_assoc' para 'foreach' com o array do PDO
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

    elseif($dados["titulo"] == "Programação Utilizando IA