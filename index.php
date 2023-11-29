<?php

require 'config.php';
$lista = [];
$statement = $pdo->prepare("SELECT * FROM usuarios");
$statement->execute();
if ($statement->rowCount() > 0) {
    $lista = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="100%">

    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach ($lista as $usuario) : ?>
        <tr>
            <td><?= $usuario['id']; ?></td>
            <td><?= $usuario['nome']; ?></td>
            <td><?= $usuario['email']; ?></td>
            <td>
                <a href="editar.php?id=<?=$usuario['id']; ?>">[ Editar ]</a>
                <a href="excluir.php?id=<?=$usuario['id']; ?>">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>


</table>