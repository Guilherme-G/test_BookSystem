<?php

session_start();

include("conexao.php");

if($_POST){

$RA = $_POST["RA"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios WHERE RA='$RA'";

$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){

$usuario = mysqli_fetch_assoc($resultado);

if(password_verify($senha, $usuario["senha"])){

$_SESSION["logado"] = true;

header("Location: home.php");

exit();

} else {

$erro = "Senha incorreta";

}

} else {

$erro = "Usuário não encontrado";

}

}

include("header.php");

?>

<div id="login_box">

<img class="logo_login" src="img/LOGO.png">

<br><br>

<form method="POST">

RA:
<br>

<input type="text" name="RA" id="login">

<br>

Senha:
<br>

<input type="password" name="senha" id="senha">

<br><br>

<input type="submit" value="Entrar" id="submit">

</form>

<br>

<a href="cadastro.php">
Não tem uma conta? Cadastre-se
</a>

<br><br>

<?php

if(isset($erro)){

echo "<p style='color:red; text-align:center;'>
$erro
</p>";

}

?>

</div>

<?php include("footer.php"); ?>