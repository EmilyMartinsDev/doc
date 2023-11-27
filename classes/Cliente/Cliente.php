<?php

class Cliente {
    private $id;
    private $nome;
    private $cnpj;
    private $cidade;
    private $uf;

    public function __construct($nome, $cnpj, $cidade, $uf) {
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->cidade = $cidade;
        $this->uf = $uf;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUf() {
        return $this->uf;
    }

    public function setId($id) {
        $this->id = $id;
    }
}
?>
