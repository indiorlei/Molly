<?php
require('../config.php');

// posso fazer a validação no front tbm ;) para nao deixar validar vazio

// resgata variáveis do formulário
$usuario = isset($_POST['adminLoginUsuario']) ? $_POST['adminLoginUsuario'] : '';
$senha = isset($_POST['adminLoginSenha']) ? $_POST['adminLoginSenha'] : '';

if (empty($usuario) || empty($senha)) {
    header('Location: login.php');
    exit();
}

$pdo = dbConnect();
$statement = $pdo->prepare("select id, usuario from admin_usuario where usuario = :usuario and senha = md5(:senha)");
$statement->execute(
    array(
        'usuario' => $usuario,
        'senha' => $senha
    )
);

$usuario = $statement->fetchAll(PDO::FETCH_ASSOC);

if (count($usuario) <= 0) {
    // usado para apresentar msg de erro no login
    $_SESSION['error_login'] = true;
    header('Location: login.php');
    exit();
} else {
    $usuario = $usuario[0];
    $_SESSION['usuario'] = $usuario['usuario'];
    $_SESSION['adminIsLoggedIn'] = true;
    header('Location: index.php');
    exit();
}