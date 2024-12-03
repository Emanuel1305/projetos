<?
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Filmes</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>
    <!-- CABECALHO -->
    <?php
    $base_url = "./"; 
    include("includes/header.php");
    ?>
    <!-- FIM CABECALHO -->

    <!-- CONTAINER FILMES -->
    <div class="container">
        <?php

        include('includes/conexao.php');

        $sql = "SELECT * FROM tbl_filme ORDER BY titulo";

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['pesquisar'])) {
            $pesquisar = mysqli_real_escape_string($conexao, $_POST['pesquisar']);
            $sql = "SELECT * FROM tbl_filme WHERE titulo LIKE '%$pesquisar%' OR genero LIKE '%$pesquisar%' ORDER BY titulo";
        }

        $query = mysqli_query($conexao, $sql);
        $registro = mysqli_num_rows($query);

        if ($registro > 0) {

            while ($dados = mysqli_fetch_assoc($query)) {
                echo '<div class="box">';

                $titulo = $dados['titulo'];
                $genero = $dados['genero'];
                $poster = $dados['poster'];
                $id = $dados['id'];

                echo '<img src="' . $poster . '" alt="poster do filme" class="poster">';
                echo '<h3 class="titulo">' . $titulo . '</h3>';
                echo '<p class="genero">' . $genero . '</p>';
                echo "<a href='pages/info.php?id=$dados[id]' class='saibaMais'>Saiba Mais</a>";
                echo '</div>';
            }
        } else {
            echo '<p>Nenhum registro encontrado.</p>';
        }
        ?>
    </div>
    <!-- FIM CONTAINER FILMES -->

    <!-- RODAPÉ -->
    <?php
    $base_url = "./";
    include("includes/footer.php");
    ?>
    <!-- FIM RODAPÉ -->
</body>

</html>