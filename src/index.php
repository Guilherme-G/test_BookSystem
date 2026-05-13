<?php

include("conexao.php");

if($_POST){

$RA = $_POST["RA"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios
WHERE RA='$RA' AND senha='$senha'";

$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){

header("Location: home.php");

exit();

} else {

echo "RA ou senha incorretos";

}

}

include("header.php");

?>

<form method="POST">

<div id="login_box">

<img class="logo_login" src="img/LOGO.png">

<br><br><br>

RA <br>

<input type="text" id="login" name="RA">

<br>

Senha <br>

<input type="password" id="senha" name="senha">

<br><br>

<input id="submit" type="submit" value="Entrar">

<br><br>

<a href="cadastro.php">
Não tem uma conta? Cadastre-se
</a>

</div>

</form>

<?php include("footer.php"); ?>