<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/cabecalho.php";
require_once "/carrinho/db/conexao.php";

try {
    // Conexão com o banco de dados
    $conn = Conexao::conectar();

    // Consulta SQL para obter os produtos disponíveis
    $sql = "SELECT id_produto, nome_produto, preco FROM produto";
    $stmt = $conn->query($sql);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}

// Verificar se o carrinho está vazio
$carrinhoVazio = true;
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    $carrinhoVazio = false;
}
?>

<h1>Produtos Disponíveis</h1>

<?php foreach ($produtos as $produto): ?>
    <div>
        <h3><?php echo $produto['nome_produto']; ?></h3>
        <p>Preço: R$ <?php echo $produto['preco']; ?></p>

        <?php if (!$carrinhoVazio): ?>
            <form method="POST" action="/carrinho/controllers/add_ao_carrinho.php">
                <input type="hidden" name="id_produto" value="<?php echo $produto['id_produto']; ?>">
                <input type="hidden" name="nome_produto" value="<?php echo $produto['nome_produto']; ?>">
                <input type="hidden" name="preco" value="<?php echo $produto['preco']; ?>">
                <input type="number" name="quantidade" value="1" min="1">
                <input type="submit" value="Adicionar ao Carrinho">
            </form>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<?php if ($carrinhoVazio): ?>
    <p>O carrinho está vazio.</p>

<?php endif; ?>


<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/rodape.php";
?>