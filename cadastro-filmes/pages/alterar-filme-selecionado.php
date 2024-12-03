<?php

include('../includes/conexao.php');
include('../includes/function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        edit($conexao, $id, $_POST, $_FILES['poster']);
        header("Location: info.php?id=$id");
    } else {
        echo "<p>ID inválido</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Filmes - Alterar Filmes</title>
    <link rel="stylesheet" href="../assets/css/alterar.css">
</head>

<body>
    <!-- CABECALHO -->
    <?php
    $base_url = "../";
    include("../includes/header.php");
    ?>
    <!-- FIM CABECALHO -->

    <!-- CONTAINER FILMES -->
    <main class="container">

        <!-- INICIO FORM -->
        <form action="" method="POST" enctype="multipart/form-data">

            <?php
            if (!empty($_GET['id'])) {

                include('../includes/conexao.php');

                $id = $_GET['id'];

                $sqlSelect = "SELECT * FROM tbl_filme WHERE id=$id";

                $query = mysqli_query($conexao, $sqlSelect);

                while ($dados = mysqli_fetch_assoc($query)) {
                    $titulo = $dados['titulo'];
                    $genero = $dados['genero'];
                    $dt_lanc = $dados['dt_lanc'];
                    $poster = $dados['poster'];
                    $descricao = $dados['descricao'];
                }
            }
            ?>
            <div class="campos">
                <label for="">Titulo</label>
                <input type="text" name="titulo" id="" required maxlength="100" value="<?= $titulo ?>">
                <label for="">Genero</label>
                <input type="text" list="generos" id="genero" name="genero" maxlength="100" value="<?= $genero ?>">
                <datalist id="generos">
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
                <label for="">Data de Lançamento</label>
                <input type="date" name="dt_lanc" id="" value="<?= $dt_lanc ?>">
                <label for="">Poster</label>
                <div class="boxPoster">
                    <img src="../<?= $poster ?>" alt="">
                    <input type="file" name="poster" id="" class="posterInp">
                </div>
                <label for="">Descrição</label>
                <textarea type="text" name="descricao" id="" rows="6" maxlength="500"><?= $descricao ?></textarea>
                <input type="submit" value="ALTERAR" class="btnCad">
            </div>
        </form>
        <!-- FIM FORM -->

    </main>
    <!-- FIM CONTAINER FILMES -->

    <!-- RODAPÉ -->
    <?php
    $base_url = "../";
    include("../includes/footer.php");
    ?>
    <!-- FIM RODAPÉ -->
</body>

</html>