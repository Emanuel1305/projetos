<?php 
    $conexao = mysqli_connect("localhost", "root", "", "cadastros");

    // Verifica a conexão
    if (!$conexao) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }
?>