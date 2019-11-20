<?php
require('../../config.php');
require('../isLoggedIn.php');

$pdo = dbConnect();

$ID = isset($_GET['pedido']) ? $_GET['pedido'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
try {
  $statement = $pdo->prepare('update pedidos set status = :status where id = :id');
  $statement->execute(array(
    ':id' => $ID,
    ':status' => $status,
  ));
  header('Location: /admin/pedidos/index.php?pedido=' . $ID);
  exit();
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
