<?php
require_once('../db.php');
$alunos = $conn->query("SELECT * FROM alunos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Alunos</h1>
    <div class="text-right mb-3">
        <a href="adicionar.php" class="btn btn-success">Adicionar Aluno</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Matricula</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?= $aluno['id']; ?></td>
                    <td><?= $aluno['nome']; ?></td>
                    <td><?= $aluno['matricula']; ?></td>
                    <td><?= $aluno['email']; ?></td>
                    <td>
                        <a href="editar.php?id=<?= $aluno['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir.php?id=<?= $aluno['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>