<?php
require('../config.php');

// posso fazer a validação no front tbm ;) para nao deixar validar vazio

// resgata variáveis do formulário
$usuarioEmail = isset($_POST['usuarioEmail']) ? $_POST['usuarioEmail'] : '';
$usuarioSenha = isset($_POST['usuarioSenha']) ? $_POST['usuarioSenha'] : '';

if (empty($usuarioEmail) || empty($usuarioSenha)) {
    header('Location: login.php');
    exit();
}

$pdo = dbConnect();
$statement = $pdo->prepare("select id, nome from clientes where email = :email and senha = md5(:senha)");
$statement->execute(
    array(
        ':email' => $usuarioEmail,
        ':senha' => $usuarioSenha
    )
);

$cliente = $statement->fetchAll(PDO::FETCH_ASSOC);

if (count($cliente) <= 0) {
    // usado para apresentar msg de erro no login
    $_SESSION['errorLogin'] = true;
    header('Location: login.php');
    exit();
} else {
    $cliente = $cliente[0];
    $_SESSION['clienteNome'] = $cliente['nome'];
    $_SESSION['clienteID'] = $cliente['id'];
    $_SESSION['clienteIsLoggedIn'] = true;
    header('Location: /app/novo-pedido');
    exit();
}