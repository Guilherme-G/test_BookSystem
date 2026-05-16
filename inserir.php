<?php
session_start();

if(!isset($_SESSION["logado"])){

header("Location: index.php");

exit();

}
include("conexao.php");

if($_POST){

$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$categoria = $_POST["categoria"];
$data_publicacao = $_POST["data_publicacao"];
$quantidade = $_POST["quantidade"];

$sql = "INSERT INTO livros
(titulo, autor, categoria, data_publicacao, quantidade)

VALUES

('$titulo', '$autor', '$categoria',
'$data_publicacao', '$quantidade')";

mysqli_query($conexao, $sql);

echo "<p style='text-align:center; color:green;'>
Livro cadastrado com sucesso
</p>";

}

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

<?php include("footer.php"); ?>