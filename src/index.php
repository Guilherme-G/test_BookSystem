<?php

session_start();

// Inclui o arquivo que agora cria a variável $pdo
include("conexao.php");

if($_POST){

    $RA = $_POST["RA"];
    $senha = $_POST["senha"];

    try {
        // 1. Preparamos a consulta usando um "placeholder" (:RA) em vez de jogar a variável direto na String
        $sql = "SELECT * FROM usuarios WHERE RA = :RA";
        $stmt = $pdo->prepare($sql);
        
        // 2. Executamos passando o valor real com segurança
        $stmt->execute(['RA' => $RA]);
        
        // 3. Pegamos o resultado (Equivalente ao mysqli_fetch_assoc)
        $usuario = $stmt->fetch();

        // Se o $usuario não for falso, significa que encontrou o RA no banco
        if($usuario){

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

    } catch (PDOException $e) {
        // Caso aconteça algum erro no banco de dados durante o login
        $erro = "Erro no sistema: " . $e->getMessage();
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