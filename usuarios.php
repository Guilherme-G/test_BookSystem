<?php

session_start();

if(!isset($_SESSION["logado"])){

header("Location: index.php");

exit();

}

include("conexao.php");

$sql = "SELECT * FROM usuarios ORDER BY nome ASC";

$resultado = mysqli_query($conexao, $sql);

include("header.php");

?>

<div class="container">

<h2>Usuários do Sistema</h2>

<br>

<table class="tabela_livros">

<tr>

<th>ID Usuário</th>
<th>Nome</th>
<th>RA</th>
<th>Email</th>
<th>Telefone</th>

</tr>

<?php

while($dados = mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?php echo $dados["id_usuario"]; ?></td>

<td><?php echo $dados["nome"]; ?></td>

<td><?php echo $dados["RA"]; ?></td>

<td><?php echo $dados["email"]; ?></td>

<td><?php echo $dados["telefone"]; ?></td>

</tr>

<?php

}

?>

</table>

</div>

<?php include("footer.php"); ?>