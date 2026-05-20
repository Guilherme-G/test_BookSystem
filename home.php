<?php
// Inicia ou retoma a sessão ativa no servidor
session_start();

// PROTEÇÃO: Verifica se o usuário NÃO está logado
if(!isset($_SESSION["logado"])){

    // Se não estiver logado, manda de volta para a tela de login (index.php)
    header("Location: index.php");

    // Interrompe o script para garantir que o código abaixo não seja executado
    exit();

}

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Cria a query para selecionar todos os livros ordenados de forma Crescente (A-Z) pelo título
$sql = "SELECT * FROM livros ORDER BY titulo ASC";

// Executa a consulta no banco de dados
$resultado = mysqli_query($conexao, $sql);

// Inclui o cabeçalho e o menu de navegação da página
include("header.php");

?>

<section class="hero">

    <div class="hero_container">

        <h1>Bem-vindo ao BookSystem</h1>

        <p>Encontre os melhores livros para sua leitura</p>

    </div>

    <div class="menu_livros">

    <?php
    // LAÇO DE REPETIÇÃO: Enquanto houver registros no resultado do banco, o "while" continua rodando.
    // A cada volta, $dados recebe os dados do livro atual em forma de array associativo.
    while($dados = mysqli_fetch_assoc($resultado)){

        // Inicializa a variável da imagem vazia
        $imagem = "";

        // ESTRUTURA CONDICIONAL: Define qual imagem exibir baseada no título exato do livro.
        // É uma solução temporária para quando não se salva o nome da imagem diretamente no banco.
        if($dados["titulo"] == "Banco de Dados Teoria e Desenvolvimento"){
            $imagem = "Livro_BANCO_DADOS.jpg";
        }
        elseif($dados["titulo"] == "PHP Programando com Orientação a Objetos"){
            $imagem = "Livro_PHP.jpg";
        }
        elseif($dados["titulo"] == "Introdução à Programação com Python"){
            $imagem = "Livro_PYTHON.jpg";
        }
        elseif($dados["titulo"] == "Java Script: O Guia Definitivo"){
            $imagem = "Livro_JAVA.jpg";
        }
        elseif($dados["titulo"] == "Programação Utilizando IA"){
            $imagem = "Livro_UTILIZANDO_IA.jpg";
        }
        else{
            // Imagem padrão caso o título não coincida com nenhum dos anteriores
            $imagem = "Livro_Algoritmos.jpg";
        }

    ?>

        <div class="menu_livro">

            <img src="img/<?php echo $imagem; ?>">

            <h2><?php echo $dados["titulo"]; ?></h2>

            <p><strong>Autor:</strong> <?php echo $dados["autor"]; ?></p>

            <p><strong>Categoria:</strong> <?php echo $dados["categoria"]; ?></p>

            <p><strong>Data:</strong> <?php echo $dados["data_publicacao"]; ?></p>

            <div class="price">

                Quantidade: <?php echo $dados["quantidade"]; ?>

            </div>

            <button class="add_cart">

                Ver Livro

            </button>

        </div>

    <?php
    } // Fim do laço while. O PHP volta lá para o começo do "while" checar se tem mais livros.
    ?>

    </div>

</section>

<?php 
// Inclui o rodapé padrão do sistema
include("footer.php"); 
?>