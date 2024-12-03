<?php
ob_start();
require('./sheep_core/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Emanuel</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- TOPO DO SITE -->
    <div class="cabecalho">
        <p class="logo">Loja Emanuel</p>
        <div class="cart"><i class="fa fa-shopping-cart"></i>
            <p>0</p>
        </div>
    </div>
    <!-- FIM DO TOPO SITE -->

    <!-- CONTEUDO DO SITE -->
    <div class="container">

        <!-- LINHA PRODUTO SITE -->
        <div class="linha-produtos">

            <!-- INICIO PRODUTO -->
            <form action="filtros/criar.php" method="POST">
                <div class="corpoProduto">
                    <div class="imgProduto">
                        <img src="assets/img/produto-1.jpg" alt="" class="produtoMiniatura">
                    </div>
                    <div class="titulo">
                        <p>Curso PHP</p>
                        <h2>R$ 497</h2>
                        <input type="hidden" name="id_produto" value="">
                        <input type="hidden" name="valor" value="">
                        <button type="submit" class="button" name="addCarrinho">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </form>
            <!-- FIM PRODUTO -->

            <!-- INICIO PRODUTO -->
            <form action="filtros/criar.php" method="POST">
                <div class="corpoProduto">
                    <div class="imgProduto">
                        <img src="assets/img/produto-2.jpg" alt="" class="produtoMiniatura">
                    </div>
                    <div class="titulo">
                        <p>Curso PHP</p>
                        <h2>R$ 497</h2>
                        <input type="hidden" name="id_produto" value="">
                        <input type="hidden" name="valor" value="">
                        <button type="submit" class="button" name="addCarrinho">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </form>
            <!-- FIM PRODUTO -->

            <!-- INICIO PRODUTO -->
            <form action="filtros/criar.php" method="POST">
                <div class="corpoProduto">
                    <div class="imgProduto">
                        <img src="assets/img/produto-3.jpg" alt="" class="produtoMiniatura">
                    </div>
                    <div class="titulo">
                        <p>Curso PHP</p>
                        <h2>R$ 497</h2>
                        <input type="hidden" name="id_produto" value="">
                        <input type="hidden" name="valor" value="">
                        <button type="submit" class="button" name="addCarrinho">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </form>
            <!-- FIM PRODUTO -->

            <!-- INICIO PRODUTO -->
            <form action="filtros/criar.php" method="POST">
                <div class="corpoProduto">
                    <div class="imgProduto">
                        <img src="assets/img/produto-4.jpg" alt="" class="produtoMiniatura">
                    </div>
                    <div class="titulo">
                        <p>Curso PHP</p>
                        <h2>R$ 497</h2>
                        <input type="hidden" name="id_produto" value="">
                        <input type="hidden" name="valor" value="">
                        <button type="submit" class="button" name="addCarrinho">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </form>
            <!-- FIM PRODUTO -->

        </div>
        <!-- FIM LINHA PRODUTO SITE -->

        <!-- BARRA LATERAL DO SITE -->
        <div class="barraLateral">
            <div class="topoCarrinho">
                <p>Meu Carrinho</p>
            </div>

            <!-- INICIO PRODUTO CARRINHO -->
            <div class="item-carrinho">
                <div class="linha-da-imagem">
                    <img src="assets/img/produto-1.jpg" alt="" class="img-carrinho">
                    
                </div>
                <p>Curso php</p>
                <h2>R$ 497</h2>
                <form action="filtros/excluir.php" method="POST">
                    <input type="hidden" name="id_produto" value="">
                    <button type="submit" style="border: none; background:none;"><i class="fa fa-trash-o"></i></button>
                </form>
            </div>
            <!-- FIM PRODUTO CARRINHO -->

            <div class="item-carrinho-vazio">Seu carrinho está vazio!</div>

            <!-- INICIO RODAPE CARRINHO -->
            <div class="rodape">
                <h3>Total</h3>
                <h2>R$ 497</h2>
            </div>
            <!-- FIM RODAPE CARRINHO -->

        </div>
        <!-- FIM BARRA LATERAL DO SITE -->

    </div>
    <!-- FIM DO CONTEUDO DO SITE -->
</body>

</html>