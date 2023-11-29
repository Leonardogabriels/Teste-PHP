<?php
require 'config.php';

$id = filter_input(INPUT_GET, 'id');

if ($id) {

    $statement = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $statement->bindValue(':id', $id);
    $statement->execute();

        header("Location: index.php");
}  
header("Location: index.php");
exit;
    
?>
