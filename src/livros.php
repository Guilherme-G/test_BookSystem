<?php

session_start();

if(!isset($_SESSION["logado"])){

    header("Location: index.php");
    exit();

}

include("conexao.php");

try {

    $sql = "SELECT * FROM livros ORDER BY titulo ASC";

    $stmt = $pdo->query($sql);

    $resultados = $stmt->fetchAll();

} catch (PDOException $e) {

    die("Erro ao carregar os livros: " . $e->getMessage());

}

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
            <th>Ações</th>
        </tr>

        <?php foreach($resultados as $dados){ ?>

        <tr>

            <td><?php echo $dados["id"]; ?></td>

            <td><?php echo $dados["titulo"]; ?></td>

            <td><?php echo $dados["autor"]; ?></td>

            <td><?php echo $dados["categoria"]; ?></td>

            <td><?php echo $dados["data_publicacao"]; ?></td>

            <td><?php echo $dados["quantidade"]; ?></td>

            <td>

                <a class="acao_link"
                href="altera.php?id=<?php echo $dados["id"]; ?>">

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

        <?php } ?>

    </table>

</div>

<?php include("footer.php"); ?>