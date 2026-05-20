<?php
// Inicia ou retoma a sessão ativa no servidor
session_start();

// PROTEÇÃO: Verifica se a variável de sessão "logado" NÃO está definida
if(!isset($_SESSION["logado"])){

    // Se o usuário não estiver logado, redireciona ele para a tela de login (index.php)
    header("Location: index.php");

    // Para a execução do script imediatamente para que o resto do código não seja lido
    exit();

}

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Verifica se o formulário foi enviado via método POST (quando o botão "Cadastrar" é clicado)
if($_POST){

    // Recebe e armazena os dados digitados nos campos do formulário
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $categoria = $_POST["categoria"];
    $data_publicacao = $_POST["data_publicacao"];
    $quantidade = $_POST["quantidade"];

    // Monta a instrução SQL para inserir o novo livro na tabela 'livros'
    $sql = "INSERT INTO livros
    (titulo, autor, categoria, data_publicacao, quantidade)
    VALUES
    ('$titulo', '$autor', '$categoria', '$data_publicacao', '$quantidade')";

    // Executa a query de inserção no banco de dados
    mysqli_query($conexao, $sql);

    // Exibe uma mensagem de sucesso centralizada e na cor verde na tela
    echo "<p style='text-align:center; color:green;'>
    Livro cadastrado com sucesso
    </p>";

}

// Inclui o arquivo de cabeçalho (HTML inicial e menu de navegação)
include("header.php");

?>

<div class="container">

    <h2>Cadastrar Livro</h2>

    <form method="POST">

        Título:
        <input type="text" name="titulo">

        <br>

        Autor:
        <input type="text" name="autor">

        <br>

        Categoria:
        <input type="text" name="categoria">

        <br>

        Data de Publicação:
        <input type="date" name="data_publicacao">

        <br>

        Quantidade:
        <input type="number" name="quantidade">

        <br>

        <input type="submit" value="Cadastrar" class="add_cart">

    </form>

</div>

<?php 
// Inclui o arquivo de rodapé para fechar as tags HTML da página
include("footer.php"); 
?>