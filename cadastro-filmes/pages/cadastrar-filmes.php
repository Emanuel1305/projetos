<?php
include('../includes/conexao.php');
include('../includes/function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    add($conexao, $_POST, $_FILES['poster']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Filmes - Cadastrar Filmes</title>
    <link rel="stylesheet" href="../assets/css/cadastrar.css">
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
            <div class="campos">
                <label for="">Titulo</label>
                <input type="text" name="titulo" id="" required maxlength="100"> 
                <label for="">Genero</label>
                <input type="text" list="generos" id="genero" name="genero" maxlength="100"> 
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
                <input type="date" name="dt_lanc" id="" >
                <label for="">Poster</label>
                <input type="file" name="poster" id="" class="posterInp">
                <label for="">Descrição</label>
                <textarea type="text" name="descricao" id="" rows="6" maxlength="500"></textarea>
                <input type="submit" value="CADASTRAR" class="btnCad">
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