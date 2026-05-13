<?php

include("conexao.php");

$sql = "SELECT * FROM usuarios";

$resultado = mysqli_query($conexao, $sql);

include("header.php");

?>

<section class="hero">

<div class="hero_container">

<h1>Usuários do Sistema</h1>

</div>

<div class="menu_livros">

<?php

while($dados = mysqli_fetch_assoc($resultado)){

?>

<div class="menu_livro">

<h2><?php echo $dados["nome"]; ?></h2>

<p><strong>RA:</strong> <?php echo $dados["RA"]; ?></p>

<p><strong>E-mail:</strong> <?php echo $dados["email"]; ?></p>

<p><strong>Telefone:</strong> <?php echo $dados["telefone"]; ?></p>

</div>

<?php

}

?>

</div>

</section>

<?php include("footer.php"); ?>