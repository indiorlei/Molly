<?php
require('../../config.php');
require('../isLoggedIn.php');

$pdo = dbConnect();

if (isset($_GET['action']) && $_GET['action'] != null && $_GET['action'] == 'delete') {
  // DELETE
  $ID = isset($_GET['id']) ? $_GET['id'] : '';

  try {
    $statement = $pdo->prepare('delete from motofretistas where id = :id');
    $statement->execute(array(':id' => $ID));
    header('Location: /admin/motofretistas/listar.php');
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
} else {
  $ID = isset($_POST['id']) ? $_POST['id'] : '';
  $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
  $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
  $placa = isset($_POST['placa']) ? $_POST['placa'] : '';
  $bauleto = isset($_POST['bauleto']) ? $_POST['bauleto'] : '';
}

if ($ID) {
  // UPDATE
  try {
    $statement = $pdo->prepare('update motofretistas set nome = :nome, cpf = :cpf, placa = UPPER(:placa), bauleto = :bauleto where id = :id');
    $statement->execute(array(
      ':id' => $ID,
      ':nome' => $nome,
      ':cpf' => $cpf,
      ':placa' => $placa,
      ':bauleto' => $bauleto
    ));
    header('Location: /admin/motofretistas/listar.php');
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
} else {
  // INSERT
  try {
    $statement = $pdo->prepare('insert into motofretistas (nome, cpf, placa, bauleto) values (:nome, :cpf, UPPER(:placa), :bauleto)');
    $statement->execute(array(
      ':nome' => $nome,
      ':cpf' => $cpf,
      ':placa' => $placa,
      ':bauleto' => $bauleto
    ));
    header('Location: /admin/motofretistas/listar.php');
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
