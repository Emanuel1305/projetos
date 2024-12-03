<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas - Visualizar Pessoas Cadastradas</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/vizualizar.css">
</head>
<body>
    <div class="pagina">
        <header class="cabecalho">
            <nav class="menu">
                <ul>
                    <a href="../index.html">
                        <li>Home</li>
                    </a>
                    <a href="cadastar.php">
                        <li>Cadastrar Pessoa</li>
                    </a>
                    <a href="vizualizar.php">
                        <li>Visualizar Pessoas Cadastradas</li>
                    </a>
                    <a href="atualizar.php">
                        <li>Atualizar Informações</li>
                    </a>
                    <a href="deletar.php">
                        <li>Excluir Registros</li>
                    </a>
                </ul>
            </nav>
        </header>
        <main class="principal">
            <div class="dados">
                <?php
                    // Inclui a conexão com o banco
                    include("conecta.php");
                    // Realiza a consulta MySQL
                    $sql = "SELECT * FROM tbl_pessoa";
                    $query = mysqli_query($conexao, $sql);
                    if (!$query) {
                        echo "<p>Erro na consulta: " . mysqli_error($conexao) . "</p>";
                    } else {
                        $num_linhas = mysqli_num_rows($query);
                        if ($num_linhas == 0) {
                            echo "<p>Não há nenhum dado!</p>";
                        } else {
                            echo "<table>";
                            echo "<thead>";
                            echo "<tr><th>Nome</th><th>Data de Nascimento</th><th>CPF</th><th>RG</th><th>Nacionalidade</th></tr>";
                            echo "</thead>";
                            while ($linha = mysqli_fetch_array($query)) {
                                $dataFormatada = date("d/m/Y", strtotime($linha["dt_nasc"]));

                                echo "<tr>";
                                echo "<td>" . $linha["nome"] . "</td>";
                                echo "<td>" . $dataFormatada . "</td>";
                                echo "<td>" . $linha["cpf"] . "</td>";
                                echo "<td>" . $linha["rg"] . "</td>";
                                echo "<td>" . $linha["nacionalidade"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                    }
                    // Fecha a conexão
                    mysqli_close($conexao);
                ?>
            </div>
        </main>
        <footer class="rodape"></footer>
    </div>
</body>
</html>
