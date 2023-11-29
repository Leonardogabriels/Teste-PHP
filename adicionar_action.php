<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'name');
$email =filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($nome && $email ){

    $statment = $pdo->prepare("INSERT INTO usuarios (nome,email) VALUES (:nome, :email)");
    $statment->bindValue(':nome', $nome);
    $statment->bindValue(':email', $email);
    $statment->execute();

    header("Location: index.php");
    exit;
   
} else {
    header("Location: adicionar.php");
    exit;
}