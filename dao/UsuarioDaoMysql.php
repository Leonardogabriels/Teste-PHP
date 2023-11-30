<?php
require_once 'repository/UsuarioDaoRepository.php';
require 'models/Usuario.php';
require  '../config.php';

class UsuarioDaoMysql implements UsuarioDaoRepository {

    private $pdo;
    private $usuario;

    public function __construct(PDO $driver){

        $this->pdo = $driver;
        
    }

    public function create(Usuario $user){

    }
    public function findAll(): array{
        $Array=[];

        $statement = $this->pdo->query("SELECT * FROM usuarios");
        if($statement->rowCount() >0){
            $data = $statement->fetchAll();

            foreach($data as $item){
                $user = new Usuario();
                $user->setId($item['id']);
                $user->setNome($item['nome']);
                $user->setEmail($item['email']);

                $array[] = $user;
            }

        }
        return $array;
        

    }
    public function findById($id){

    }
    public function update(Usuario $userNew){

    }
    public function delete($id){

    }
}