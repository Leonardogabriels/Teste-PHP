<?php
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');

if ($id) {

    $statement = $pdo->prepare("SELECT * FROM usuarios WHERE id=:id");
    $statement->bindValue(':id', $id);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $info = $statement->fetch(pdo::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
} 
?>

<h1>Editar Usuário</h1><br />
<form method="POST" action="editar_action.php">
    <label>
        nome:<br />
        <input type="text" name="name" value="<?= $info['nome'] ?>" />
    </label><br /><br />

    <label>
        E-mail:<br />
        <input type="email" name="email" value="<?= $info['email'] ?>" />
    </label><br /><br />

    <input type="submit" value="Salvar" />

</form>