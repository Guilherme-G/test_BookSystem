<?php
session_start();

if(!isset($_SESSION["logado"])){

header("Location: index.php");

exit();

}
include("conexao.php");

$id = $_GET["id"];

$sql = "DELETE FROM livros WHERE id=$id";

mysqli_query($conexao, $sql);

echo "Livro excluído";

?>