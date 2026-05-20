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

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Verifica se o formulário foi enviado (se existe uma requisição POST)
if($_POST){

    // Recebe os dados digitados pelo usuário nos campos 'RA' e 'senha'
    $RA = $_POST["RA"];
    $senha = $_POST["senha"];

    // Monta a consulta SQL buscando um usuário onde o RA E a senha batam exatamente com o que foi digitado
    $sql = "SELECT * FROM usuarios
    WHERE RA='$RA' AND senha='$senha'";

    // Executa a consulta no banco de dados
    $resultado = mysqli_query($conexao, $sql);

    // Verifica se a consulta retornou pelo menos 1 registro válido
    if(mysqli_num_rows($resultado) > 0){

        // Se encontrou o usuário, exibe mensagem de sucesso
        echo "Login realizado com sucesso";

    } else {

        // Se não encontrou nenhuma combinação correspondente, exibe mensagem de erro
        echo "RA ou senha incorretos";

    }

}

?>