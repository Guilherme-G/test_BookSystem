<?php
// Inicia ou retoma a sessão existente (necessário para acessar variáveis de sessão)
session_start();

// Verifica se a variável de sessão "logado" NÃO está definida
if(!isset($_SESSION["logado"])){

    // Se o usuário não estiver logado, redireciona ele de volta para a página inicial (index.php)
    header("Location: index.php");

    // Interrompe a execução do script imediatamente para garantir que o resto do código não rode
    exit();

}

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Recebe o ID do livro que foi enviado através da URL (ex: exclui.php?id=4)
$id = $_GET["id"];

// Monta a instrução SQL para deletar o livro correspondente ao ID informado
$sql = "DELETE FROM livros WHERE id=$id";

// Executa o comando de exclusão no banco de dados
mysqli_query($conexao, $sql);

// Exibe uma mensagem simples confirmando a exclusão
echo "Livro excluído";

?>