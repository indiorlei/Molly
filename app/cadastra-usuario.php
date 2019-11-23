<?php
require('../config.php');

// resgata variáveis do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$repetirSenha = isset($_POST['repetirSenha']) ? $_POST['repetirSenha'] : '';

if ($senha != $repetirSenha) {
    $_SESSION['nome'] = $nome;
    $_SESSION['sobrenome'] = $sobrenome;
    $_SESSION['endereco'] = $endereco;
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
if (count($testaEmail) >= 1) {
    $_SESSION['nome'] = $nome;
    $_SESSION['sobrenome'] = $sobrenome;
    $_SESSION['endereco'] = $endereco;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['email'] = $email;
    $_SESSION['error_email'] = true;
    header('Location: /app/novo-usuario.php');
    exit();
}

$testaCPF = $pdo->prepare("select cpf from clientes where cpf = :cpf;");
$testaCPF->execute(array(':cpf' => $cpf));
$testaCPF = $testaCPF->fetchAll(PDO::FETCH_ASSOC);
if (count($testaCPF) >= 1) {
    $_SESSION['nome'] = $nome;
    $_SESSION['sobrenome'] = $sobrenome;
    $_SESSION['endereco'] = $endereco;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['email'] = $email;
    $_SESSION['error_cpf'] = true;
    header('Location: /app/novo-usuario.php');
    exit();
}

// INSERT
try {
    $statement = $pdo->prepare('insert into clientes (nome, sobrenome, endereco, senha, email, cpf) values (:nome, :sobrenome, :endereco, md5(:senha), :email, :cpf)');
    $statement->execute(array(
        ':nome' => $nome,
        ':sobrenome' => $sobrenome,
        ':endereco' => $endereco,
        ':senha' => $senha,
        ':email' => $email,
        ':cpf' => $cpf,
    ));

    $_SESSION['sucesso'] = true;
    $_SESSION['clienteIsLoggedIn'] = true;
    $_SESSION['clienteNome'] = $nome;
    $_SESSION['clienteID'] = $pdo->lastInsertId();
    header('Location: /app/novo-pedido');
    exit();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
