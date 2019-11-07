<?php
require('../config.php');

// resgata variáveis do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$repetirSenha = isset($_POST['repetirSenha']) ? $_POST['repetirSenha'] : '';

if($senha != $repetirSenha) {
    $_SESSION['nome'] = $nome;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['email'] = $email;

    $_SESSION['error_senha'] = true;
    header('Location: /app/novo-usuario.php');
    exit();
}


$pdo = dbConnect();

$testaEmail = $pdo->prepare("select email from clientes where email = :email;");
$testaEmail->execute(array(':email' => $email));
$testaEmail = $testaEmail->fetchAll(PDO::FETCH_ASSOC);
if(count($testaEmail) >= 1) {
    $_SESSION['nome'] = $nome;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['email'] = $email;
    $_SESSION['error_email'] = true;
    header('Location: /app/novo-usuario.php');
    exit();
}

$testaCPF = $pdo->prepare("select cpf from clientes where cpf = :cpf;");
$testaCPF->execute(array(':cpf' => $cpf));
$testaCPF = $testaCPF->fetchAll(PDO::FETCH_ASSOC);
if(count($testaCPF) >= 1) {
    $_SESSION['nome'] = $nome;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['email'] = $email;
    $_SESSION['error_cpf'] = true;
    header('Location: /app/novo-usuario.php');
    exit();
}

// INSERT
try {
    $statement = $pdo->prepare('insert into clientes (nome, senha, email, cpf) values (:nome, md5(:senha), :email, :cpf)');
    $statement->execute(array(
        ':nome' => $nome,
        ':senha' => $senha,
        ':email' => $email,
        ':cpf' => $cpf,
    ));

    $_SESSION['sucesso'] = true;
    $_SESSION['clienteIsLoggedIn'] = true;
    $_SESSION['clienteNome'] = $nome;
    header('Location: index.php');
    exit();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}