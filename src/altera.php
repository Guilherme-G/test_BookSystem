<?php

session_start();

if(!isset($_SESSION["logado"])){

header("Location: index.php");

exit();

}

include("conexao.php");

if(isset($_GET["id"])){

$id = $_GET["id"];

} else {

echo "ID não informado";

exit();

}

$sql = "SELECT * FROM livros WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();

$dados = $stmt->fetch();

if($_POST){

$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$categoria = $_POST["categoria"];
$data_publicacao = $_POST["data_publicacao"];
$quantidade = $_POST["quantidade"];

$sql = "UPDATE livros
SET titulo = :titulo,
autor = :autor,
categoria = :categoria,
data_publicacao = :data_publicacao,
quantidade = :quantidade
WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(":titulo", $titulo);
$stmt->bindParam(":autor", $autor);
$stmt->bindParam(":categoria", $categoria);
$stmt->bindParam(":data_publicacao", $data_publicacao);
$stmt->bindParam(":quantidade", $quantidade);
$stmt->bindParam(":id", $id);

$stmt->execute();

$mensagem = "Livro alterado com sucesso";

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

<br>

<?php

if(isset($mensagem)){

echo "<p style='text-align:center; color:green;'>
$mensagem
</p>";

}

?>

</div>

<?php include("footer.php");