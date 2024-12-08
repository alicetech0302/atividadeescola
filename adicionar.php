<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $turma = $_POST['turma'];

    $stmt = $conn->prepare("INSERT INTO alunos (nome, idade, turma) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $idade, $turma]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Adicionar Aluno</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" class="form-control" id="idade" name="idade" required>
        </div>
        <div class="mb-3">
            <label for="turma" class="form-label">Turma</label>
            <input type="text" class="form-control" id="turma" name="turma" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>