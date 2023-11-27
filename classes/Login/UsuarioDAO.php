<?php

include_once '../../classes/Conexao/ConexaoBD.php';

class UsuarioDAO {
    private $conexao;

    public function __construct() {
        // Crie uma instância da classe ConexaoBD
        $this->conexao = new ConexaoBD("localhost", "root", "", "sistema_sgc");
    }

    public function inserirUsuario(Usuario $usuario) {
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        $conn = $this->conexao->getConnection();

        // Execute a lógica de inserção no banco de dados
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha');";
        $response = array(); // Array para armazenar a resposta

        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Dados inseridos com sucesso!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Erro ao inserir dados: ' . $conn->error;
        }

        // Feche a conexão
        $this->conexao->closeConnection();

        return $response;
    }
}
?>
