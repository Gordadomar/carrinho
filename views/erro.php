<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/cabecalho.php";
?>

<h1>Ocorreu um erro</h1>
<p><?php echo $_COOKIE['erro']; ?></p>
<a href="/carrinho/index.php">Voltar para os produtos</a>

<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/rodape.php";
?>