<?php
include 'conexao.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM alunos WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
?>