<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITE CARRINHO DE COMPRAS </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;1,100&family=Righteous&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="/carrinho/arq_css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/carrinho/index.php">HOME</a></li>
                <li><a href="/carrinho/views/carrinho.php">CARRINHO</a></li>
                <?php

                        if (isset($_SESSION['user_id'])  && $_SESSION['nivel_acesso'] == 2) :
                            // O usuário logado for nível 2, exibir botão de adicionar produto
                        ?>
                            <li><a href="/carrinho/views/cadastroproduto.php">ADICIONAR PRODUTO</a></li>
                            <li><a href="/carrinho/views/editaproduto.php">EDITAR PRODUTO</a></li>

                        <?php
                        endif;
                        ?>

                        <li>

                        <?php

                        if (isset($_SESSION['user_id'])) :
                            // O usuário está logado, exibir botão de logout
                        ?>
                            <a href="/carrinho/controllers/logout_controller.php"><span class="material-symbols-outlined">
                                    logout
                                </span>LOGOUT</a>
                        <?php
                        else :
                            // O usuário não está logado, exibir botão de login
                        ?>
                            <a href="/carrinho/views/login.php"><span class="material-symbols-outlined">
                                    person
                                </span>LOGIN</a>

                        <?php
                        endif;
                        ?>

                    </li>
                </ul>
             </nav>
     </header>
    <main>