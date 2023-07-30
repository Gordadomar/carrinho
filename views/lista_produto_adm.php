<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/cabecalho.php";
require_once $_SERVER["DOCUMENT_ROOT"] . '/carrinho/db/conexao.php';


// Função para obter todos os produtos do banco de dados
function obterProdutos() {
    global $conn;

    try {
        $sql = "SELECT * FROM produto";
        $conn = Conexao::conectar(); 
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $produtos;
    } catch (PDOException $e) {
        // Tratar erros de consulta
        echo "Erro ao obter produtos: " . $e->getMessage();
        return array();
    }
}

// Obter os produtos do banco de dados
$produtos = obterProdutos();

?>
  
  <div style="margin-bottom:10px">
    <h1>Tabela de Produtos Disponíveis </h1>
    <table class="styletable">
    <thead>
        <tr>
            <th class="bordastyle">Produto</th>
            <th class="bordastyle">Nome</th>
            <th class="bordastyle">Preço</th>
            <th class="bordastyle">Ações</th>
        </tr>
    </thead>
        <tbody>
            <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td class="bordastyle"><img class="tamimg" src="data:image;charset=utf8;base64,<?php echo base64_encode($produto['imagem_produto']); ?>" alt="Imagem do Produto"></td>
                    <td class="bordastyle"><?php echo $produto['nome_produto']; ?></td>
                    <td class="bordastyle"> R$ <?php echo $produto['preco']; ?></td>
                    <td class="bordastyle">
                        <form action="/carrinho/controllers/produtocontroller.php" method="POST">
                            <input type="hidden" name="id_produto" value="<?php echo $produto['id_produto']; ?>">
                            <!-- Adicione o ID do produto na URL do botão "Editar" -->
                            <a href="/carrinho/views/editaproduto.php?id_produto=<?php echo $produto['id_produto']; ?>" class="link-sem-barra">
                                <button type="button" id="butacesse1">Editar</button>
                            </a>
                            
                            <button type="submit" id="butacesse1" name="acao" value="excluir">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>




<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/rodape.php";
?>