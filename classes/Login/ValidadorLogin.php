<?php

class ValidadorLogin
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function validarLogin($username, $password)
    {
        $username = (string)$username;
        $password = (string)$password;

        $dbUsername = "";
        $dbPassword = "";

        $conn = $this->conexao->getConnection();

        // Evite SQL injection usando declarações preparadas
        $stmt = $conn->prepare("SELECT nome, senha FROM usuarios WHERE nome = ?");
        $stmt->bind_param("s", $username);

        if ($stmt) {
            mysqli_stmt_execute($stmt);
            $stmt->bind_result($dbUsername, $dbPassword);

            // Fetch the result
            $stmt->fetch();

            // Check if the user with the provided username exists
            if (empty($dbUsername)) {
                // User not found
                $response = array(
                    'status' => 'error',
                    'message' => 'Nome não cadastrado'
                );
                return $response;
            } else {
                // Check if the password matches
                if ($dbPassword === $password) {
                    // Authentication successful
                    $response = array(
                        'status' => 'success',
                        'message' => 'Autenticação bem-sucedida'
                    );
                    return $response;
                } else {
                    // Password incorrect
                    $response = array(
                        'status' => 'error',
                        'message' => 'Senha inválida'
                    );
                    return $response;
                }
            }
        } else {
            // Error in the prepared statement
            $response = array(
                'status' => 'error',
                'message' => 'Erro na declaração preparada: ' . $conn->error
            );
            return $response;
        }
    }
}
