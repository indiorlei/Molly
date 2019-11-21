<?php
require('../../config.php');
require('../isLoggedIn.php');

$pdo = dbConnect();

if (isset($_GET['action']) && $_GET['action'] != null && $_GET['action'] == 'delete') {
  // DELETE
  $ID = isset($_GET['id']) ? $_GET['id'] : '';

  try {
    $statement = $pdo->prepare('delete from bauletos where id = :id');
    $statement->execute(array(':id' => $ID));
    header('Location: /admin/bauletos/listar.php');
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
} else {
  $ID = isset($_POST['id']) ? $_POST['id'] : '';
  $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
  $volume = isset($_POST['volume']) ? $_POST['volume'] : '';
  $altura = isset($_POST['altura']) ? $_POST['altura'] : '';
  $largura = isset($_POST['largura']) ? $_POST['largura'] : '';
  $profundidade = isset($_POST['profundidade']) ? $_POST['profundidade'] : '';
}

if ($ID) {
  // UPDATE
  try {
    $statement = $pdo->prepare('update bauletos set modelo = :modelo, volume = :volume, altura = :altura, largura = :largura, profundidade = :profundidade where id = :id');
    $statement->execute(array(
      ':id' => $ID,
      ':modelo' => $modelo,
      ':volume' => $volume,
      ':altura' => $altura,
      ':largura' => $largura,
      ':profundidade' => $profundidade
    ));
    header('Location: /admin/bauletos/listar.php');
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
} else {
  // INSERT
  try {
    $statement = $pdo->prepare('insert into bauletos (modelo, volume, altura, largura, profundidade) values (:modelo, :volume, :altura, :largura, :profundidade)');
    $statement->execute(array(
      ':modelo' => $modelo,
      ':volume' => $volume,
      ':altura' => $altura,
      ':largura' => $largura,
      ':profundidade' => $profundidade
    ));
    header('Location: /admin/bauletos/listar.php');
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
