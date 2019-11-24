<?php
require('../../config.php');
require('../isLoggedIn.php');

$pdo = dbConnect();

$ID = isset($_POST['id']) ? $_POST['id'] : '';
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';

try {
  if ($_GET['update'] == 'infoPessoais') {
    $statement = $pdo->prepare('update clientes set nome = :nome, sobrenome = :sobrenome, email = :email, cpf = :cpf where id = :id');
    $statement->execute(array(
      ':id' => $ID,
      ':nome' => $nome,
      ':sobrenome' => $sobrenome,
      ':email' => $email,
      ':cpf' => $cpf
    ));
  } else if ($_GET['update'] == 'endereco') {
    $statement = $pdo->prepare('update clientes set endereco = :endereco where id = :id');
    $statement->execute(array(
      ':id' => $ID,
      ':endereco' => $endereco
    ));
  } else if ($_GET['update'] == 'senha') {
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $statement = $pdo->prepare('update clientes set senha = md5(:senha) where id = :id');
    $statement->execute(array(
      ':id' => $ID,
      ':senha' => $senha
    ));
  }

  $_SESSION['success'] = true;
  $_SESSION['message_success'] = 'Perfil alterado com sucesso!';
  header('Location: /app/perfil');
  exit();
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
