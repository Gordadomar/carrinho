<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/cabecalho.php";
require_once $_SERVER["DOCUMENT_ROOT"] . '/carrinho/db/conexao.php';

// Verifica se o ID do produto foi passado pela URL
if (isset($_GET['id_produto'])) {
    $id_produto = $_GET['id_produto'];

    // Função para obter um produto por ID do banco de dados
    function obterProdutoPorId($id_produto)
    {
        // O código para a conexão com o banco de dados deve estar aqui
        // Substitua os valores necessários para realizar a conexão

        try {
            $sql = "SELECT * FROM produto WHERE id_produto = :id_produto";
            $conn = Conexao::conectar();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_produto', $id_produto);
            $stmt->execute();

            // Retorna os dados do produto como um array associativo
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Tratar erros de consulta
            echo "Erro ao obter produto: " . $e->getMessage();
            return false;
        }
    }

    // Obtém os detalhes do produto pelo ID
    $produto = obterProdutoPorId($id_produto);

    // Verifica se o produto foi encontrado
    if (!$produto) {
        echo "Produto não encontrado.";
        exit;
    }
} else {
    echo "ID do produto não fornecido.";
    exit;
}
?>

<div>
    
    <form action="/carrinho/controllers/produtocontroller.php" method="POST" enctype="multipart/form-data">
        <fieldset id="loginmod">
            <h1 id="h1style">Editar Produto</h1>
            <input type="hidden" name="id_produto" value="<?php echo $produto['id_produto']; ?>">

            <div style="margin-bottom: 10px;">
                <img class="tamimg" src="data:image;charset=utf8;base64,<?php echo base64_encode($produto['imagem_produto']); ?>" alt="Imagem do Produto">
            </div>

            <div style="margin-bottom: 10px;">
                <label for="nome_produto">Nome do Produto:</label>
                <input type="text" id="nome_produto" name="nome_produto" value="<?php echo $produto['nome_produto']; ?>" required>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="preco">Preço do Produto:</label>
                <input type="text" id="preco" name="preco" value="<?php echo $produto['preco']; ?>" required>
            </div>

            <div style="margin-bottom: 20px;">
                <input type="file" id="nova_imagem_produto" name="nova_imagem_produto">
            </div>

            <button type="submit" id="buttonb" name="acao" value="atualizar">Salvar Edições</button>

        </fieldset>
    </form>
</div>

<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/rodape.php";
?>