<?php

// Inclui o arquivo que faz a conexão com o banco de dados
include("conexao.php");

// Verifica se o ID do livro foi passado na URL (ex: altera.php?id=5)
if(isset($_GET["id"])){

    // Armazena o ID vindo da URL na variável $id
    $id = $_GET["id"];

} else {

    // Se não houver ID na URL, exibe uma mensagem e para a execução do script
    echo "ID não informado";
    exit();

}

// Cria a instrução SQL para buscar os dados do livro específico baseado no ID
$sql = "SELECT * FROM livros WHERE id=$id";

// Executa a consulta SQL no banco de dados usando a conexão ativa
$resultado = mysqli_query($conexao, $sql);

// Transforma o resultado do banco em um array associativo com os dados do livro
$dados = mysqli_fetch_assoc($resultado);

// Verifica se o formulário foi enviado via método POST (quando o usuário clica em "Alterar")
if($_POST){

    // Recebe os novos dados digitados no formulário
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $categoria = $_POST["categoria"];
    $data_publicacao = $_POST["data_publicacao"];
    $quantidade = $_POST["quantidade"];

    // Monta a instrução SQL para atualizar os dados do livro no banco
    $sql = "UPDATE livros
    SET titulo='$titulo',
    autor='$autor',
    categoria='$categoria',
    data_publicacao='$data_publicacao',
    quantidade='$quantidade'
    WHERE id=$id";

    // Executa a atualização no banco de dados
    mysqli_query($conexao, $sql);

    // Exibe uma mensagem de sucesso centralizada e em verde
    echo "<p style='text-align:center; color:green;'>
    Livro alterado com sucesso
    </p>";

}

// Inclui o arquivo de cabeçalho da página (HTML inicial, menu, etc.)
include("header.php");

?>

<div class="container">

    <h2>Alterar Livro</h2>

    <form method="POST">

        Título:
        <input type="text" name="titulo" value="<?php echo $dados['titulo']; ?>">

        <br>

        Autor:
        <input type="text" name="autor" value="<?php echo $dados['autor']; ?>">

        <br>

        Categoria:
        <input type="text" name="categoria" value="<?php echo $dados['categoria']; ?>">

        <br>

        Data de Publicação:
        <input type="date" name="data_publicacao" value="<?php echo $dados['data_publicacao']; ?>">

        <br>

        Quantidade:
        <input type="number" name="quantidade" value="<?php echo $dados['quantidade']; ?>">

        <br>

        <input type="submit" value="Alterar" class="add_cart">

    </form>

</div>

<?php 
// Inclui o arquivo de rodapé da página (fechamento de tags, scripts, etc.)
include("footer.php"); 
?>