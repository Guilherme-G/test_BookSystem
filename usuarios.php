<?php

// Inicia ou retoma a sessão ativa no servidor
session_start();

// PROTEÇÃO: Verifica se o usuário NÃO está logado
if(!isset($_SESSION["logado"])){

    // Se não estiver logado, bloqueia o acesso e redireciona para a tela de login (index.php)
    header("Location: index.php");

    // Interrompe a execução do script imediatamente
    exit();

}

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Cria a consulta SQL para buscar todos os usuários organizados em ordem alfabética (A-Z) pelo nome
$sql = "SELECT * FROM usuarios ORDER BY nome ASC";

// Executa a busca na tabela 'usuarios' do banco de dados
$resultado = mysqli_query($conexao, $sql);

// Inclui o topo da página e o menu de navegação (navbar)
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
        // LAÇO DE REPETIÇÃO: Enquanto houver registros de usuários no banco, o 'while' continua rodando.
        // A cada volta, a variável $dados recebe as informações do usuário atual.
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
        } // Fim do laço while. O PHP volta para o início para checar se há mais usuários.
        ?>

    </table>

</div>

<?php 
// Inclui o rodapé padrão para fechar as tags HTML da página
include("footer.php"); 
?>