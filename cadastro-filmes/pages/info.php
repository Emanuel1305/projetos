<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Filmes - Alterar Filmes Cadastrados</title>
    <link rel="stylesheet" href="../assets/css/info.css">
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
        <?php
        if (!empty($_GET['id'])) {
            include('../includes/conexao.php');

            $id = $_GET['id'];

            $sqlSelect = "SELECT * FROM tbl_filme WHERE id=$id";

            $query = mysqli_query($conexao, $sqlSelect);

            while ($dados = mysqli_fetch_assoc($query)) {

                $id = $dados['id'];
                $titulo = $dados['titulo'];
                $genero = $dados['genero'];
                $dt_lanc = date('d/m/Y', strtotime($dados['dt_lanc']));
                $poster = $dados['poster'];
                $descricao = $dados['descricao'];
                echo "<div class='box'>";
                echo "    <div class='left'><img class='poster' src='../$poster' alt=''></div> ";
                echo "    <div class='rigth'> ";
                echo "        <h2>$titulo</h2> ";
                echo "        <a href='../includes/delete.php?id=$dados[id]' class='btnDelete'><img src='https://cdn.icon-icons.com/icons2/350/PNG/512/user-trash-full-symbolic_36007.png' alt='delete'></a>";
                echo "        <p class='genero'>$genero</p> ";
                echo "        <p class='desc'>$descricao</p> ";
                echo "        <p class='dt'>$dt_lanc</p> ";
                echo "        <a href='alterar-filme-selecionado.php?id=$dados[id]' class='btnEdit'>Editar Informações</a>";
                echo "   </div>";
                echo "</div>";
            }
        }
        ?>
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