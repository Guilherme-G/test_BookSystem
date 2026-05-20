<?php

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Verifica se o formulário foi enviado via método POST
if($_POST){

    // Recebe os dados digitados pelo usuário no formulário
    $nome = $_POST["nome"];
    $RA = $_POST["RA"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    // Cria uma hash segura da senha antes de salvar no banco (Garante que a senha não fique em texto limpo)
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Monta a instrução SQL para inserir o novo usuário na tabela 'usuarios'
    $sql = "INSERT INTO usuarios
    (nome, RA, senha, email, telefone)
    VALUES
    ('$nome', '$RA', '$senha_criptografada', '$email', '$telefone')";

    // Executa o comando de inserção no banco de dados
    mysqli_query($conexao, $sql);

    // Cria uma variável com a mensagem de sucesso que será exibida mais abaixo
    $mensagem = "Usuário cadastrado com sucesso";

}

// Inclui o arquivo de cabeçalho (HTML inicial, estilização, menu)
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
    // Verifica se a variável $mensagem existe (ou seja, se o formulário foi enviado e processado)
    if(isset($mensagem)){

        // Exibe a mensagem de sucesso centralizada e na cor verde
        echo "<p style='text-align:center; color:green;'>
        $mensagem
        </p>";

    }
    ?>

</div>

<?php 
// Inclui o rodapé da página (fechamento de tags HTML e scripts)
include("footer.php"); 
?>