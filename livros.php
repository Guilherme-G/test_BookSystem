<?php

// Inicia ou retoma a sessão ativa no servidor
session_start();

// PROTEÇÃO: Verifica se o usuário NÃO está logado
if(!isset($_SESSION["logado"])){

    // Se não houver sessão ativa, bloqueia o acesso e manda para o index.php
    header("Location: index.php");
    exit();

}

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Cria a consulta SQL para buscar todos os livros organizados em ordem alfabética (A-Z)
$sql = "SELECT * FROM livros ORDER BY titulo ASC";

// Executa a busca no banco de dados e guarda o resultado
$resultado = mysqli_query($conexao, $sql);

// Inclui o topo da página e a barra de navegação
include("header.php");

?>

<div class="container">

    <h2>Lista de Livros</h2>

    <br>

    <table class="tabela_livros">

        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoria</th>
            <th>Data</th>
            <th>Quantidade</th>
            <th>Ações</th> </tr>

        <?php 
        // LAÇO DE REPETIÇÃO: Enquanto houver registros no banco, o 'while' extrai a linha atual 
        // transformando-a no array associativo $dados, e repete a estrutura HTML <tr> abaixo.
        while($dados = mysqli_fetch_assoc($resultado)){ 
        ?>

        <tr>

            <td><?php echo $dados["id"]; ?></td>

            <td><?php echo $dados["titulo"]; ?></td>

            <td><?php echo $dados["autor"]; ?></td>

            <td><?php echo $dados["categoria"]; ?></td>

            <td><?php echo $dados["data_publicacao"]; ?></td>

            <td><?php echo $dados["quantidade"]; ?></td>

            <td>

                <a class="acao_link" href="altera.php?id=<?php echo $dados["id"]; ?>">
                    Editar
                </a>

                <br><br>

                <a class="acao_link" 
                   href="exclui.php?id=<?php echo $dados["id"]; ?>"
                   onclick="return confirm('Tem certeza que deseja excluir este livro?')">
                    Excluir
                </a>

            </td>

        </tr>

        <?php 
        } // Fim do laço while. O PHP volta para o início para checar se há um próximo livro.
        ?>

    </table>

</div>

<?php 
// Inclui o rodapé da página para fechar as tags abertas
include("footer.php"); 
?>