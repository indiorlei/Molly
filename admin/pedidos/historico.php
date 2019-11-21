<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();
$concluidos = $pdo->prepare('select * from pedidos where status = 6 order by datamodificacao desc;');
$concluidos->execute();

$cancelados = $pdo->prepare('select * from pedidos where status = 2 order by datamodificacao desc;');
$cancelados->execute();
?>

<div id="wrapper">
  <?php include_once('../menu/sidebar.php') ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include_once('../menu/topbar.php') ?>

      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Entrega concluída</h6>
                <!-- Entrega concluída status 6 -->
              </div>
              <div class="card-body">
                <?php if ($concluidos->rowCount() <= 0) : ?>
                  <h6 class="m-0 text-primary">Nenhum Pedido Concluído</h6>
                <?php else : ?>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Cliente</th>
                          <th>Cod. Rastreio</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($elem = $concluidos->fetch(PDO::FETCH_OBJ)) { ?>
                          <tr>
                            <td>
                              <a href="index.php?pedido=<?php echo $elem->id; ?>">
                                <i class="far fa-file-alt"></i>
                              </a>
                            </td>
                            <?php
                              $cliente = $pdo->prepare("select nome, sobrenome from clientes where id = :id;");
                              $cliente->execute(array(':id' => $elem->id_cliente));
                              $cliente = $cliente->fetchAll(PDO::FETCH_OBJ);
                              $cliente = $cliente[0];
                              ?>
                            <td><?php echo $cliente->nome . ' ' . $cliente->sobrenome ?></td>
                            <td><?php echo $elem->codRastreio ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cancelado</h6>
                <!-- Cancelado status 2 -->
              </div>
              <div class="card-body">
                <?php if ($cancelados->rowCount() <= 0) : ?>
                  <h6 class="m-0 text-primary">Nenhum Pedido Aberto</h6>
                <?php else : ?>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Cliente</th>
                          <th>Cod. Rastreio</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($elem = $cancelados->fetch(PDO::FETCH_OBJ)) { ?>
                          <tr>
                            <td>
                              <a href="index.php?pedido=<?php echo $elem->id; ?>">
                                <i class="far fa-file-alt"></i>
                              </a>
                            </td>
                            <?php
                              $cliente = $pdo->prepare("select nome, sobrenome from clientes where id = :id;");
                              $cliente->execute(array(':id' => $elem->id_cliente));
                              $cliente = $cliente->fetchAll(PDO::FETCH_OBJ);
                              $cliente = $cliente[0];
                              ?>
                            <td><?php echo $cliente->nome . ' ' . $cliente->sobrenome ?></td>
                            <td><?php echo $elem->codRastreio ?></td>
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
      </div>
    </div>
    <?php include('../../copyright.php') ?>
  </div>
</div>
<?php include_once('../menu/logoutModal.php') ?>
<?php include('../template/footer.php') ?>