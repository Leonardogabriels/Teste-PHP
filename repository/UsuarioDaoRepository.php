<?php
require "models/Usuario.php";

interface UsuarioDaoRepository {

    public function create(Usuario $user);
    public function findAll();
    public function findById($id);
    public function update(Usuario $userNew);
    public function delete($id);
}