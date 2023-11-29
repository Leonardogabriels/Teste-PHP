<?php
require 'config.php';
$id = filter_input(INPUT_POST,'id');
$nome = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $nome && $email) {
    $statement = $pdo->prepare("UPDATE usuarios SET nome = :name, email = :email WHERE id = :id");
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $nome);
    $statement->bindValue(':email', $email);
    $statement->execute();

    header("Location: index.php");


} else {
    header("Location: editar.php");
    exit;
}
