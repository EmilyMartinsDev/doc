<?php
// Configurações de conexão com o banco de dados
$host = "localhost";     // Host do banco de dados
$usuario = "root";       // Usuário do banco de dados
$senha = "";             // Senha do banco de dados
$banco = "sistema_sgc";  // Nome do banco de dados

// Tenta estabelecer a conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Fechar a conexão (opcional, pois o PHP fecha automaticamente no final do script)
$conn->close();
?>
