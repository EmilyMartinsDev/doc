<?php

include_once '../../classes/Conexao/ConexaoBD.php';

class ClienteDAO {
    private $conexao;

    public function __construct() {
        // Crie uma instância da classe ConexaoBD
        $this->conexao = new ConexaoBD("localhost", "root", "", "sistema_sgc");
    }

    public function inserirCliente(Cliente $cliente) {
        $nome = $cliente->getNome();
        $cnpj = $cliente->getCnpj();
        $cidade = $cliente->getCidade();
        $uf = $cliente->getUf();

        $conn = $this->conexao->getConnection();

        // Execute a lógica de inserção no banco de dados
        $sql = "INSERT INTO Cliente (nome, cnpj, cidade, uf) VALUES ('$nome', '$cnpj', '$cidade', '$uf');";
        $response = array(); // Array para armazenar a resposta

        if ($conn->query($sql) === TRUE) {
            $cliente->setId($conn->insert_id);
            $response['status'] = 'success';
            $response['message'] = 'Cliente inserido com sucesso!';
            $response['cliente'] = $cliente;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Erro ao inserir cliente: ' . $conn->error;
        }

        // Feche a conexão
        $this->conexao->closeConnection();

        return $response;
    }
}
?>
