<?php

include("conexao.php");

$sql = "SELECT * FROM livros";

$resultado = mysqli_query($conexao, $sql);

include("header.php");

?>

<section class="hero">

<div class="hero_container">

<h1>Livros Disponíveis</h1>

</div>

<div class="menu_livros">

<?php

while($dados = mysqli_fetch_assoc($resultado)){

?>

<div class="menu_livro">

<h2><?php echo $dados["titulo"]; ?></h2>

<p><strong>Autor:</strong> <?php echo $dados["autor"]; ?></p>

<p><strong>Categoria:</strong> <?php echo $dados["categoria"]; ?></p>

<p><strong>Publicação:</strong> <?php echo $dados["data_publicacao"]; ?></p>

<p><strong>Quantidade:</strong> <?php echo $dados["quantidade"]; ?></p>

<br>

<a href="altera.php?id=<?php echo $dados['id']; ?>">

<button class="add_cart">

Alterar

</button>

</a>

<a href="exclui.php?id=<?php echo $dados['id']; ?>">

<button class="add_cart">

Excluir

</button>

</a>

</div>

<?php

}

?>

</div>

</section>

<?php include("footer.php"); ?>