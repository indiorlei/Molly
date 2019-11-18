<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();
$stmt = $pdo->prepare('select * from pedidos where id = :id');
$stmt->execute(array(':id' => $_GET['pedido']));
$pedido = $stmt->fetch(PDO::FETCH_OBJ);


// nome do cliente
$cliente = $pdo->prepare("select nome, sobrenome from clientes where id = :id;");
$cliente->execute(array(':id' => $pedido->id_cliente));
$cliente = $cliente->fetchAll(PDO::FETCH_OBJ);
$cliente = $cliente[0];

?>

<div id="wrapper">
  <?php include_once('../menu/sidebar.php') ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include_once('../menu/topbar.php') ?>
      <div class="container-fluid">

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informações completas</h6>
          </div>

          <div class="card-body">


            <p>Cliente: <?php echo $cliente->nome . ' ' . $cliente->sobrenome ?></p>
          
          
          </div>
        
        </div>

      </div>
    </div>
    <?php include('../../copyright.php') ?>
  </div>
</div>
<?php include_once('../menu/logoutModal.php') ?>
<?php include('../template/footer.php') ?>