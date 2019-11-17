<?php
require('../../config.php');
require('../isLoggedIn.php');

$pdo = dbConnect();

$id_cliente = $_SESSION['clienteID'];
$enderecoRetirada = isset($_POST['enderecoRetirada']) ? $_POST['enderecoRetirada'] : '';
$radioRetirar = isset($_POST['radioRetirar']) ? $_POST['radioRetirar'] : '';
$enderecoDestino = isset($_POST['enderecoDestino']) ? $_POST['enderecoDestino'] : '';
$obs = isset($_POST['obs']) ? $_POST['obs'] : '';

if ($radioRetirar == 0) {
  $tamanho = 0;
} else if ($radioRetirar == 1) {
  $tamanho = isset($_POST['tamanho']) ? $_POST['tamanho'] : '';
}

// criar código de rastreio
$codRastreio = 'ML-' . date('Y') . '-' . bin2hex(random_bytes(4)) . '-' . date('n') . date('d');

try {
  $statement = $pdo->prepare(
    'insert into pedidos ( 
      id_cliente,
      enderecoRetirada,
      enderecoDestino,
      obs,
      status,
      tipoEntrega,
      tamanhoBauleto,
      dataCriacao,
      dataModificacao,
      codRastreio
    ) values (
      :id_cliente,
      :enderecoRetirada,
      :enderecoDestino,
      :obs,
      :status,
      :tipoEntrega,
      :tamanhoBauleto,
      CURRENT_TIMESTAMP(),
      CURRENT_TIMESTAMP(),
      :codRastreio
    )'
  );

  $statement->execute(array(
    ':id_cliente' => $id_cliente,
    ':enderecoRetirada' => $enderecoRetirada,
    ':enderecoDestino' => $enderecoDestino,
    ':obs' => $obs,
    ':status' => 1,
    ':tipoEntrega' => $radioRetirar,
    ':tamanhoBauleto' => $tamanho,
    ':codRastreio' => $codRastreio
  ));

  header('Location: /app/acompanhar');
  exit();
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
