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
(:titulo, :autor, :categoria, :data_publicacao, :quantidade)";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(":titulo", $titulo);
$stmt->bindParam(":autor", $autor);
$stmt->bindParam(":categoria", $categoria);
$stmt->bindParam(":data_publicacao", $data_publicacao);
$stmt->bindParam(":quantidade", $quantidade);

$stmt->execute();

$mensagem = "Livro cadastrado com sucesso";

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

<br>

<?php

if(isset($mensagem)){

echo "<p style='color:green; text-align:center;'>
$mensagem
</p>";

}

?>

</div>

<?php include("footer.php"); ?>