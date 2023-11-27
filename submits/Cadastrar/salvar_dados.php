<?php
include '../../classes/Login/Usuario.php';
include '../../classes/Login/UsuarioDAO.php';

$newUsername = $_POST['new-username'];
$newEmail = $_POST['new-email'];
$newPassword = $_POST['new-password'];

// Crie uma instância da classe Usuario
$usuario = new Usuario($newUsername, $newEmail, $newPassword);

// Crie uma instância da classe UsuarioDAO
$usuarioDAO = new UsuarioDAO();

// Inserir usuário no banco de dados
$response = $usuarioDAO->inserirUsuario($usuario);

// Converta o array em uma string JSON e a imprima
echo json_encode($response);
?>
