<form method="POST">

RA:
<input type="text" name="RA">

<br><br>

Senha:
<input type="password" name="senha">

<br><br>

<input type="submit" value="Entrar">

</form>

<?php

include("conexao.php");

if($_POST){

$RA = $_POST["RA"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios
WHERE RA='$RA' AND senha='$senha'";

$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){

echo "Login realizado com sucesso";

} else {

echo "RA ou senha incorretos";

}

}

?>