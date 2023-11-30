<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';
require 'models/Usuario.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();

?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="100%">

    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach ($lista as $usuarios) : ?>
        <tr>
            <td><?= $usuarios->getId(); ?></td>
            <td><?= $usuarios->getNome(); ?></td>
            <td><?= $usuarios->getEmail(); ?></td>
            <td>
                <a href="editar.php?id=<?= $usuarios->getId(); ?>">[ Editar ]</a>
                <a href="excluir.php?id=<?= $usuarios->getId(); ?>" onclick="return confirm('tem certeza que deseja excluir ?')">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>


</table>