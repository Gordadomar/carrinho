<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/cabecalho.php";
?>

<div class="container">
    <form action = "criar.php" method='POST'>
        <fieldset id="formstyle">
        <label for="nome_comum">Nome:</label>
        <input type="text" name = "nome" required><br><br>
        <label for="especie_ssp">E-mail:</label>
        <input type="mail" name = "email" required><br><br>
        <label for="grupo">Senha:</label>
        <input type="password" name = "senha" required><br><br>
        <label for="habitat">Imagem:</label>
        <input type="text" name = "imagem" required><br><br>
        <button type="submit" class="btn"> ENVIAR </button> 
        </fieldset>
    </form>
    </div>

<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/rodape.php";
?>