<?php

include("conexao.php");

$sql = "SELECT * FROM livros";

$resultado = mysqli_query($conexao, $sql);

include("header.php");

?>

<section class="hero">

<div class="hero_container">

<h1>Bem-vindo ao BookSystem</h1>

<p>Encontre os melhores livros para sua leitura</p>

</div>

<div class="menu_livros">

<?php

while($dados = mysqli_fetch_assoc($resultado)){

$imagem = "";

if($dados["titulo"] == "Banco de Dados Teoria e Desenvolvimento"){
    $imagem = "Livro_Banco_Dados.jpg";
}

elseif($dados["titulo"] == "PHP Programando com Orientação a Objetos"){
    $imagem = "Livro_PHP.jpg";
}

else{
    $imagem = "Livro_Algoritmos.jpg";
}

?>

<div class="menu_livro">

<img src="img/<?php echo $imagem; ?>">

<h2><?php echo $dados["titulo"]; ?></h2>

<p><strong>Autor:</strong> <?php echo $dados["autor"]; ?></p>

<p><strong>Categoria:</strong> <?php echo $dados["categoria"]; ?></p>

<p><strong>Data:</strong> <?php echo $dados["data_publicacao"]; ?></p>

<div class="price">

Quantidade: <?php echo $dados["quantidade"]; ?>

</div>

<button class="add_cart">

Ver Livro

</button>

</div>

<?php

}

?>

</div>

</section>

<?php include("footer.php"); ?>