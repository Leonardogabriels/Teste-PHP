<?php
// namespace \models
class Usuario{

    private int $id;
    private string $nome;
    private string $email;

    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = trim($id);
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome(string $nome){
        $this->nome = ucwords(trim($nome));
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail(string $email){
        $this->email = strtolower(trim($email));
    }
}


