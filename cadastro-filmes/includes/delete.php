<?php
include('conexao.php');
include('function.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    delete($conexao, $id);
    header("Location: ../index.php");
    exit(); 
} else {
    echo "<p>ID inválido</p>";
}
?>
