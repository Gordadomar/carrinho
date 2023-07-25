<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/cabecalho.php";
?>
<div>
        <?php if (isset($_COOKIE['erro'])) : ?>
                    <p><?= $_COOKIE['erro'] ?></p>
                    <?php setcookie('erro', '', time() - 3600, '/') ?>
                <?php endif; ?>
                <?php if (isset($_COOKIE['sucesso'])) : ?>
                    <p><?= $_COOKIE['sucesso'] ?></p>
                    <?php setcookie('sucesso', '', time() - 3600, '/') ?>
                <?php endif; ?>
        <form action="/carrinho/controllers/login_controller.php" autocomplete="on" method="POST">
            <fieldset id="loginmod">
                <h1 id="loginmaior">L O G I N</h1>
                <p class= "fontedologin" style="margin-bottom: 20px;">Digite seus dados de acesso nos campos abaixo.</p> 
                <div style="margin-bottom: 10px;">
                    <input type="mail" class="bordainput meu-input" name="email" id="email" placeholder="E-mail" required autofocus>
                </div>
                <div style="margin-bottom: 10px;">
                    <input type="password" class="bordainput meu-input" name="senha" id="senha" placeholder="Senha" required>
                </div>
                <button type="submit" id="butacesse">ACESSE</button>
                <p  style="margin-top: 10px;"><a href="/carrinho/views/cadastrousuario.php"  id="linkcadastrese">Cadastre-se Aqui</a></p> 
            </fieldset>
         </form>
</div>
<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/rodape.php";
?>