<?php
require('../../config.php');
require('../isLoggedIn.php');

$pdo = dbConnect();

if (isset($_GET['action']) && $_GET['action'] != null && $_GET['action'] == 'delete') {
  // DELETE
  $ID = isset($_GET['id']) ? $_GET['id'] : '';

  try {
    $statement = $pdo->prepare('delete from status where id = :id');
    $statement->execute(array(':id' => $ID));
    header('Location: /admin/status/listar.php');
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
} else {
  $ID = isset($_POST['id']) ? $_POST['id'] : '';
  $nome = isset($_POST['status']) ? $_POST['status'] : '';
  $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
}

if ($ID) {
  // UPDATE
  try {
    $statement = $pdo->prepare('update status set nome = :nome, tipo = :tipo where id = :id');
    $statement->execute(array(
      ':id' => $ID,
      ':nome' => $nome,
      ':tipo' => $tipo,
    ));
    header('Location: /admin/status/listar.php');
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
} else {
  // INSERT
  try {
    $statement = $pdo->prepare('insert into status (nome, tipo) values (:nome, :tipo)');
    $statement->execute(array(
      ':nome' => $nome,
      ':tipo' => $tipo,
    ));
    header('Location: /admin/status/listar.php');
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
