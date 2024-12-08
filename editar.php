<?php
include 'conexao.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM alunos WHERE id = ?");
$stmt->execute([$id]);
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $turma = $_POST['turma'];

    $stmt = $conn->prepare("UPDATE alunos SET nome = ?, idade = ?, turma = ? WHERE id = ?");
    $stmt->execute([$nome, $idade, $turma, $id]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Editar Aluno</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $aluno['nome'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" class="form-control" id="idade" name="idade" value="<?= $aluno['idade'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="turma" class="form-label">Turma</label>
            <input type="text" class="form-control" id="turma" name="turma" value="<?= $aluno['turma'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>