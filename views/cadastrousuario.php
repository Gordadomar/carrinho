<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/cabecalho.php";
?>

<div class="container">
    <form action="/carrinho/controllers/cadastra_pessoa.php" autocomplete ="on" method="POST"> 
    <fieldset id="cadastrestyle">
            <h1 id="titulo">Cadastre-se Aqui</h1>
            <p id="subtitulo" style="margin-bottom: 20px">Complete suas informações</p>
        </div>
    <div class="campo"style="margin-bottom: 10px">
    <label for="nome"><strong> <span class="material-symbols-outlined">person
    </span>Nome:</strong></label>
    <input type="text" name="nome" id="nome" placeholder="Seu Nome" required autofocus>
    </div>

    <div class="campo" style="margin-bottom: 10px">
    <label for="email"><strong><span class="material-symbols-outlined"> mail
    </span>E-mail:</strong></label>
    <input type="email" name="email" id="email" placeholder="Seu E-mail" required autofocus>
    </div>

    <div style="margin-bottom: 10px">
    <label for="senha"><strong> <span class="material-symbols-outlined"> lock_open 
    </span>Senha:</strong></label>
    <input type="password" name="senha" id="senha" placeholder="Sua Senha" maxlength="3">
    </div>

    <button class="botao" style="margin-top: 10px" type="submit" onsubmit="">
    Concluído
    </button>   
    </fieldset>
    </form>
    </div>


   






















<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/carrinho/templates/rodape.php";
?>