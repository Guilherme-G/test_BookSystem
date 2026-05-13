<form method="POST">

ID do Livro:
<input type="number" name="id">

<br><br>

Novo Título:
<input type="text" name="titulo">

<br><br>

Novo Autor:
<input type="text" name="autor">

<br><br>

Nova Categoria:
<input type="text" name="categoria">

<br><br>

Nova Data de Publicação:
<input type="date" name="data_publicacao">

<br><br>

Nova Quantidade:
<input type="number" name="quantidade">

<br><br>

<input type="submit" value="Alterar">

</form>

<?php

include("conexao.php");

if($_POST){

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$categoria = $_POST["categoria"];
$data_publicacao = $_POST["data_publicacao"];
$quantidade = $_POST["quantidade"];

$sql = "UPDATE livros 
SET titulo='$titulo',
autor='$autor',
categoria='$categoria',
data_publicacao='$data_publicacao',
quantidade='$quantidade'
WHERE id=$id";

mysqli_query($conexao, $sql);

echo "Livro alterado";

}

?>