<?php

class Usuario {
    private $nome;
    private $email;
    private $senha;
    private $loggedIn = false;

    public function __construct($nome, $email, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function login($nome, $senha) {
        // Lógica de login aqui
        if ($nome === $this->nome && $senha === $this->senha) {
            $this->loggedIn = true;
        }
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function isLoggedIn() {
        return $this->loggedIn;
    }
}
?>
