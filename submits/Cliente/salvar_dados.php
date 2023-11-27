<?php
include '../../classes/Cliente/Cliente.php';
include '../../classes/Cliente/ClienteDAO.php';

$newClientName = $_POST['new-client-name'];
$newClientCnpj = $_POST['new-client-cnpj'];
$newClientCity = $_POST['new-client-city'];
$newClientUf = $_POST['new-client-uf'];

// Crie uma instância da classe Cliente
$cliente = new Cliente($newClientName, $newClientCnpj, $newClientCity, $newClientUf);

// Crie uma instância da classe ClienteDAO
$clienteDAO = new ClienteDAO();

// Inserir cliente no banco de dados
$response = $clienteDAO->inserirCliente($cliente);

// Converta o array em uma string JSON e a imprima
echo json_encode($response);
?>
