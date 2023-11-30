<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';
require 'models/Usuario.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id) {

    $usuarioDao->delete($id);

    header("Location: index.php");

}
  
header("Location: index.php");
exit;
    
?>
