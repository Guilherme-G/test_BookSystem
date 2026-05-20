<?php

include("conexao.php");

if($_POST){

$nome = $_POST["nome"];
$RA = $_POST["RA"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

$senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios
(nome, RA, senha, email, telefone)
VALUES
(:nome, :RA, :senha, :email, :telefone)";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":RA", $RA);
$stmt->bindParam(":senha", $senha_criptografada);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":telefone", $telefone);

$stmt->execute();

$mensagem = "Usuário cadastrado com sucesso";

}

include("header.php");

?>

<div class="container">

<h2>Cadastro de Usuário</h2>

<form method="POST">

Nome:
<input type="text" name="nome">

<br>

RA:
<input type="text" name="RA">

<br>

Senha:
<input type="password" name="senha">

<br>

E-mail:
<input type="email" name="email">

<br>

Telefone:
<input type="text" name="telefone">

<br>

<input type="submit" value="Cadastrar" class="add_cart">

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

<?php include("footer.php"); ?>