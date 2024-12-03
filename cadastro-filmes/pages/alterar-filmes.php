<?php

include('../includes/conexao.php');
include('../includes/function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['pesquisar'])) {
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
    <link rel="stylesheet" href="../assets/css/alterar-filme.css">
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
        <div class="dados">
            <table>
                <thead>
                    <th>Título</th>
                    <th>Gênero</th>
                    <th>Data de Lançameto</th>
                    <th class='btn'>Edit</th>
                    <th class='btn'>Drop</th>
                </thead>
                <tbody>
                    <?php
                    // Inclui a conexão com o banco
                    include("../includes/conexao.php");
                    // Realiza a consulta MySQL
                    $sql = "SELECT * FROM tbl_filme ORDER BY titulo";

                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['pesquisar'])) {
                        $pesquisar = mysqli_real_escape_string($conexao, $_POST['pesquisar']);
                        $sql = "SELECT * FROM tbl_filme WHERE titulo LIKE '%$pesquisar%' OR genero LIKE '%$pesquisar%' ORDER BY titulo";
                    }
                    $query = mysqli_query($conexao, $sql);

                    if (!$query) {
                        echo "<p>Erro na consulta: " . mysqli_error($conexao) . "</p>";
                    } else {
                        $num_linhas = mysqli_num_rows($query);
                        if ($num_linhas == 0) {
                            echo "<p>Nenhum Filme Encontrado!</p>";
                        } else {
                            while ($linha = mysqli_fetch_array($query)) {
                                $dataFormatada = date("d/m/Y", strtotime($linha["dt_lanc"]));
                                echo "<tr>";
                                echo "<td>" . $linha["titulo"] . "</td>";
                                echo "<td>" . $linha["genero"] . "</td>";
                                echo "<td>" . $dataFormatada . "</td>";
                                echo "<td class='btn'><a href='alterar-filme-selecionado.php?id=$linha[id]'><img src='https://cdn.icon-icons.com/icons2/1862/PNG/512/sheetandpencil_118361.png' alt='edit'></a></td>";
                                echo "<td class='btn'><a href='../includes/delete.php?id=$linha[id]'><img src='https://cdn.icon-icons.com/icons2/868/PNG/512/trash_bin_icon-icons.com_67981.png' alt='delete'></a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
            
                    }
                    // Fecha a conexão
                    mysqli_close($conexao);
                    ?>
                </tbody>
            </table>
        </div>
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