<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();
$clientes = $pdo->query('select * from clientes;');
?>

<div id="wrapper">
  <?php include_once('../menu/sidebar.php') ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include_once('../menu/topbar.php') ?>
      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
          </div>
          <div class="card-body">
            <?php if ($clientes->rowCount() <= 0) : ?>
              <h6 class="m-0 text-primary">Nenhum Cliente encontrado</h6>
            <?php else : ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Sobrenome</th>
                      <th>CPF</th>
                      <th>Email</th>
                      <th>Endereço</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($elem = $clientes->fetch(PDO::FETCH_OBJ)) { ?>
                      <tr>
                        <td><?php echo $elem->nome ?></td>
                        <td><?php echo $elem->sobrenome ?></td>
                        <td><?php echo $elem->cpf ?></td>
                        <td><?php echo $elem->email ?></td>
                        <td><?php echo $elem->endereco ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php include('../../copyright.php') ?>
  </div>
</div>
<?php include_once('../menu/logoutModal.php') ?>
<?php include('../template/footer.php') ?>