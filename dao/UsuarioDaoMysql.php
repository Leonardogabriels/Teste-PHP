<?php
require_once 'repository/UsuarioDaoRepository.php';
require 'models/Usuario.php';
require  '../config.php';

class UsuarioDaoMysql implements UsuarioDaoRepository {

    private $pdo;
   

    public function __construct(PDO $driver){

        $this->pdo = $driver;
        
    }

    public function create(Usuario $user){

        $statement = $this->pdo->prepare("INSERT INTO usuarios (nome,email) VALUES (:nome, :email) ");
        $statement->bindValue(':nome', $user->getNome());
        $statement->bindValue(':email', $user->getEmail());
        $statement->execute();

        $user ->setId(($this->pdo->lastInsertId()));
        return $user;



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
    public function findByEmail($email) {
        $statment = $this->pdo->prepare("INSERT INTO usuarios (nome,email) VALUES (:nome, :email)");
        $statment->bindValue(':email', $email);
        $statment->execute();

        if($statment->rowCount() >0 ){
            $data = $statment->fetch();

            $user = new Usuario();
            $user->setId($data['id']);
            $user->setNome($data['nome']);
            $user->setEmail($data['email']);

            return $user;
        } else {
            return false;
        }

    }
    public function update(Usuario $userNew){

    }
    public function delete($id){

    }
}