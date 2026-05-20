<?php

// Inicia uma nova sessão ou retoma a sessão existente no servidor
session_start();

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Verifica se o formulário de login foi enviado via método POST
if($_POST){

    // Recebe os dados digitados pelo usuário (RA e Senha)
    $RA = $_POST["RA"];
    $senha = $_POST["senha"];

    // Monta a consulta SQL para buscar o usuário no banco através do RA informado
    $sql = "SELECT * FROM usuarios WHERE RA='$RA'";

    // Executa a consulta no banco de dados
    $resultado = mysqli_query($conexao, $sql);

    // Verifica se a consulta retornou pelo menos 1 linha (ou seja, se o RA existe no banco)
    if(mysqli_num_rows($resultado) > 0){

        // Transforma a linha encontrada em um array associativo com os dados do usuário
        $usuario = mysqli_fetch_assoc($resultado);

        // Segurança: Verifica se a senha digitada corresponde à hash criptografada do banco
        if(password_verify($senha, $usuario["senha"])){

            // Se a senha estiver correta, define a variável de sessão "logado" como verdadeira
            $_SESSION["logado"] = true;

            // Redireciona o usuário para a página principal (home.php)
            header("Location: home.php");

            // Interrompe a execução do script para garantir o redirecionamento imediato
            exit();

        } else {

            // Se a senha não bater, define a mensagem de erro correspondente
            $erro = "Senha incorreta";

        }

    } else {

        // Se o RA não for encontrado no banco de dados, define a mensagem de erro
        $erro = "Usuário não encontrado";

    }

}

// Inclui o arquivo de cabeçalho da página (HTML inicial, CSS, etc.)
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
    // Verifica se a variável $erro foi definida durante a validação do PHP acima
    if(isset($erro)){

        // Exibe a mensagem de erro (Usuário não encontrado ou Senha incorreta) em vermelho e centralizada
        echo "<p style='color:red; text-align:center;'>
        $erro
        </p>";

    }
    ?>

</div>

<?php 
// Inclui o rodapé padrão do sistema para fechar as tags HTML
include("footer.php"); 
?>