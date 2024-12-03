<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link rel="stylesheet" href="css/pesquisar.css">
</head>
<body>
    <div class="pesquisar">
        <form action="" method="POST">
            <p>Pesquisar: <input type="text" name="pesquisar" size="40">
            <input class="ok" type="submit" value="OK!">
            </p>
        </form>
    </div>
    <?php

    $conexao = mysqli_connect('localhost', 'root', '', 'cadastros');
    if (!$conexao) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM tbl_cliente";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['pesquisar'])) {
        $pesquisar = mysqli_real_escape_string($conexao, $_POST['pesquisar']);
        $sql = "SELECT * FROM tbl_cliente WHERE nome LIKE '%$pesquisar%'";
    }

    $query = mysqli_query($conexao, $sql);
    $registro = mysqli_num_rows($query);

    if ($registro > 0) {
        echo '<div class="box">';
        echo '<table>';
        echo '<thead>';
        echo '<tr><th style="border-radius: 10px 0 0 0;">#</th><th>Nome</th><th>Email</th><th>Cidade</th><th style="border-radius: 0 10px 0 0;">Estado</th></tr>';
        echo '</thead>';

        while ($dados = mysqli_fetch_assoc($query)) {
            $id = $dados['id'];
            $nome = $dados['nome']; 
            $email = $dados['email'];
            $cidade = $dados['cidade'];
            $estado = $dados['estado'];

            echo '<tr><td>' .$id. '</td><td>' . $nome . '</td><td>' . $email . '</td><td>' . $cidade . '</td><td>' . $estado . '</td></tr>';
        }

        echo '</table>';
        echo '</div>';
    } else {
        echo '<p>Nenhum registro encontrado.</p>';
    }

    mysqli_close($conexao);
    ?>
    <a href="index.html" class="retorno">TELA INICIAL</a>
</body>
</html>