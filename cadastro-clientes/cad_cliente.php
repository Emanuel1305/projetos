<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Enviado</title>
    <link rel="stylesheet" href="css/cad_cliente.css">
</head>
<body>
    <div class="mensagem">
        <?php
            $conexao = mysqli_connect('localhost', 'root', '', 'cadastros');
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];

            $sql = "INSERT INTO tbl_cliente(nome,email,cidade,estado)
            values('$nome', '$email', '$cidade', '$estado')";
            
            try {
                mysqli_query($conexao, $sql);
                echo "<p class='sucesso'>Cliente Cadastrado com Sucesso!</p>";
            } catch (mysqli_sql_exception $msn) {
                if($msn->getCode() === 1062){
                    echo "<p class='erro'>O E-mail informado já está cadastrado.</p>";
                }
            } 
        ?>
    </div>
    <a href="index.html" class="retorno">TELA INICIAL</a>
</body>
</html>