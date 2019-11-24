<?php
require('../../config.php');
require('../isLoggedIn.php');

$pdo = dbConnect();

$ID = isset($_GET['pedido']) ? $_GET['pedido'] : '';

if ($_GET['update'] == 'status') {
  $status = isset($_POST['status']) ? $_POST['status'] : '';
  try {
    $statement = $pdo->prepare('update pedidos set status = :status, dataModificacao = CURRENT_TIMESTAMP() where id = :id');
    $statement->execute(array(
      ':id' => $ID,
      ':status' => $status,
    ));
    
    $_SESSION['success'] = true;
    $_SESSION['message_success'] = 'Status alterado com sucesso!';
    header('Location: /admin/pedidos/index.php?pedido=' . $ID);
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
} else if ($_GET['update'] == 'motofretista') {
  $motofretista = isset($_POST['motofretista']) ? $_POST['motofretista'] : '';
  try {
    $statement = $pdo->prepare('update pedidos set id_motofretista = :motofretista, dataModificacao = CURRENT_TIMESTAMP() where id = :id');
    $statement->execute(array(
      ':id' => $ID,
      ':motofretista' => $motofretista,
    ));
    
    $_SESSION['success'] = true;
    $_SESSION['message_success'] = 'Motofretista alterado com sucesso!';
    header('Location: /admin/pedidos/index.php?pedido=' . $ID);
    exit();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
