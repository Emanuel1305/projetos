<?php

function add($conexao, $dados, $poster)
{
    $pasta = "C:/xampp/htdocs/projetos/cadastro-filmes/assets/images/";
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($poster['name'], PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png") {
        return "Tipo de arquivo não aceito";
    }

    $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;

    if (!move_uploaded_file($poster["tmp_name"], $caminho)) {
        return "Falha ao enviar arquivo";
    }

    $caminhoAcesso = "assets/images/" . $novoNomeDoArquivo . "." . $extensao;

    $sql = "INSERT INTO tbl_filme (titulo, genero, dt_lanc, poster, descricao) 
            VALUES ('{$dados['titulo']}', '{$dados['genero']}', '{$dados['dt_lanc']}', '$caminhoAcesso', '{$dados['descricao']}')";

    if (mysqli_query($conexao, $sql)) {
        return "Filme adicionado com sucesso";
    } else {
        return "Erro ao adicionar filme: " . mysqli_error($conexao);
    }
}

function edit($conexao, $id, $dados, $poster = null)
{
    $pasta = "C:/xampp/htdocs/projetos/cadastro-filmes/assets/images/";
    $sql = "UPDATE tbl_filme SET 
                titulo = '{$dados['titulo']}', 
                genero = '{$dados['genero']}', 
                dt_lanc = '{$dados['dt_lanc']}', 
                descricao = '{$dados['descricao']}'";

    if ($poster && $poster['error'] == UPLOAD_ERR_OK) {
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($poster['name'], PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png") {
            return "Tipo de arquivo não aceito";
        }

        $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;

        if (!move_uploaded_file($poster["tmp_name"], $caminho)) {
            return "Falha ao enviar arquivo";
        }
        $caminhoAcesso = "assets/images/" . $novoNomeDoArquivo . "." . $extensao;

        $sql .= ", poster = '$caminhoAcesso'";
    }

    $sql .= " WHERE id = $id";

    if (mysqli_query($conexao, $sql)) {
        return "Filme atualizado com sucesso";
    } else {
        return "Erro ao atualizar filme: " . mysqli_error($conexao);
    }
}

function delete($conexao, $id)
{
    $sqlSelect = "SELECT poster FROM tbl_filme WHERE id = $id LIMIT 1";
    $query = mysqli_query($conexao, $sqlSelect);
    $dados = mysqli_fetch_assoc($query);

    if (!empty($sqlSelect)) {
        $arquivo = 'C:/xampp/htdocs/projetos/cadastro-filmes/' . $dados['poster'];

        if (file_exists($arquivo)) {
            unlink($arquivo);
        }
    }

    $sql = "DELETE FROM tbl_filme WHERE id = $id";

    if (mysqli_query($conexao, $sql)) {
        return "Filme deletado com sucesso";
    } else {
        return "Erro ao deletar filme: " . mysqli_error($conexao);
    }
}
