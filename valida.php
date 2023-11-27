<?php
include './classes/Conexao/ConexaoBD.php';
include './classes/Login/ValidadorLogin.php';

// Crie uma instância da classe ConexaoBD
$conexao = new ConexaoBD("localhost", "root", "", "sistema_sgc");

// Recupere os dados da solicitação AJAX
$username = $_POST['username'];
$password = $_POST['password'];

// Crie uma instância da classe ValidadorLogin, passando a conexão como parâmetro
$validador = new ValidadorLogin($conexao);

// Realize a validação do login
$response = $validador->validarLogin($username, $password);

// Converta a resposta em uma string JSON e imprima
echo json_encode(["success" => $response]);

// Feche a conexão
$conexao->closeConnection();
?>
