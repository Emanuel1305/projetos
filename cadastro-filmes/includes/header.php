<?php
$base_url = isset($base_url) ? $base_url : '../';
?>

<!-- CABECALHO -->
<header class="cabecalho">

    <!-- MENU MOBILE -->
    <div class="menu-mobile">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <!-- FIM MENU MOBILE -->

    <!-- COMEÇO MENU -->
    <nav class="menu">
        <ul>
            <li><a href="<?= $base_url ?>index.php">Home</a></li>
            <li><a href="<?= $base_url ?>pages/alterar-filmes.php">Alterar Filmes</a></li>
            <li><a href="<?= $base_url ?>pages/cadastrar-filmes.php">Cadastrar</a></li>
        </ul>
    </nav>
    <!-- FIM MENU -->

    <!-- PESQUISA -->
    <main class="pesquisar">
        <form action="" method="POST">
            <p>Pesquisar: </p>
            <div class="pesquisa">
                <input list="pesquisar" id="pesquisa" name="pesquisar" class="inp">
                <datalist id="pesquisar">
                    <option value="Ação"></option>
                    <option value="Aventura"></option>
                    <option value="Comédia"></option>
                    <option value="Drama"></option>
                    <option value="Fantasia"></option>
                    <option value="Ficção Científica"></option>
                    <option value="Romance"></option>
                    <option value="Suspense"></option>
                    <option value="Terror"></option>
                    <option value="Animação"></option>
                </datalist>
                <input class="ok" type="submit" value="Buscar">
            </div>
        </form>
    </main>
    <!-- FIM PESQUISA -->

</header>
<!-- FIM CABECALHO -->