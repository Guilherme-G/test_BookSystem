<form method="POST">

Título:
<input type="text" name="titulo">

<br><br>

Autor:
<input type="text" name="autor">

<br><br>

Categoria:
<input type="text" name="categoria">

<br><br>

Data de Publicação:
<input type="date" name="data_publicacao">

<br><br>

Quantidade:
<input type="number" name="quantidade">

<br><br>

<input type="submit" value="Cadastrar">

</form>

<?php

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
('$titulo', '$autor', '$categoria', '$data_publicacao', '$quantidade')";

mysqli_query($conexao, $sql);

echo "Livro cadastrado";

}

?>