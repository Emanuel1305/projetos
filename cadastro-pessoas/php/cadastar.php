<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas - Cadastrar Nova Pessoa</title>
    <link rel="stylesheet" href="../css/cadastrar.css">
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
            <div class="box">
                <form action="" method="POST">
                    <h1>Cadastrar Pessoa</h1>
                    <table>
                        <tr>
                            <td colspan="3"><label for="txtNome">Nome:</label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" name="nome" id="txtNome" required></td>
                        </tr>
                        <tr>
                            <td><label for="txtDtNasc">Data de Nascimento: </label></td>
                            <td><input type="date" name="dt_nasc" id="txtDtNasc"></td>
                        </tr>
                        <tr>
                            <td><label for="txtCPF">CPF:</label></td>
                            <td><label for="txtRG">RG:</label></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cpf" id="txtCPF" pattern="\d{3}.\d{3}.\d{3}-\d{2}" placeholder="000.000.000-00"></td>
                            <td><input type="text" name="rg" id="txtRG" pattern="\d{8}-\d{1}" placeholder="00000000-0"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label for="txtNacionalidade">Nacionalidade:</label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" name="nacionalidade" id="txtNacionalidade"></td>
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Cadastrar" class="cad btn"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="reset" value="Limpar" class="res btn"></td>
                        </tr>
                    </table>
                </form>
                <?php
                    include("conecta.php");
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $nome = $_POST['nome'] ?? '';
                        $dtNasc = $_POST['dt_nasc'] ?? '';
                        $cpf = $_POST['cpf'] ?? '';
                        $rg = $_POST['rg'] ?? '';
                        $nacionalidade = $_POST['nacionalidade'] ?? '';
                        $sql = "INSERT INTO tbl_pessoa(nome,dt_nasc,cpf,rg,nacionalidade)
                        values('$nome', '$dtNasc', '$cpf', '$rg', '$nacionalidade')";
                
                        try {
                            $cpf = !empty($_POST['cpf']) ? $_POST['cpf'] : null;
                            $rg = !empty($_POST['rg']) ? $_POST['rg'] : null;
                        
                            $sql = "INSERT INTO tbl_pessoa (nome, dt_nasc, cpf, rg, nacionalidade) 
                                    VALUES ('$nome', '$dtNasc', " . 
                                    ($cpf !== null ? "'$cpf'" : "NULL") . ", " . 
                                    ($rg !== null ? "'$rg'" : "NULL") . ", '$nacionalidade')";

                            mysqli_query($conexao, $sql);
                            echo "<script>alert('Pessoa cadastrada com sucesso!');</script>";
                        } catch (mysqli_sql_exception $msn) {
                            if ($msn->getCode() === 1062) {
                                echo "<script>alert('O CPF ou RG informado já está cadastrado.');</script>";
                            } else {
                                echo "<script>alert('Erro ao cadastrar: " . $msn->getMessage() . "');</script>";
                            }
                        }
                        
                
                    }
                ?>
            </div>
        </main>
        <footer class="rodape"></footer>
    </div>
</body>
</html>