<?php

include("conexao.php");

if(isset($_GET["id"])){

$id = $_GET["id"];

} else {

echo "ID não informado";

exit();

}

$sql = "SELECT * FROM livros WHERE id=$id";

$resultado = mysqli_query($conexao, $sql);

$dados = mysqli_fetch_assoc($resultado);

if($_POST){

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

echo "<p style='text-align:center; color:green;'>
Livro alterado com sucesso
</p>";

}

include("header.php");

?>

<div class="container">

<h2>Alterar Livro</h2>

<form method="POST">

Título:
<input type="text" name="titulo"
value="<?php echo $dados['titulo']; ?>">

<br>

Autor:
<input type="text" name="autor"
value="<?php echo $dados['autor']; ?>">

<br>

Categoria:
<input type="text" name="categoria"
value="<?php echo $dados['categoria']; ?>">

<br>

Data de Publicação:
<input type="date" name="data_publicacao"
value="<?php echo $dados['data_publicacao']; ?>">

<br>

Quantidade:
<input type="number" name="quantidade"
value="<?php echo $dados['quantidade']; ?>">

<br>

<input type="submit" value="Alterar" class="add_cart">

</form>

</div>

<?php include("footer.php"); ?>