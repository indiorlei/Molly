<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();
$pedidos = $pdo->prepare('select * from pedidos where id_cliente = :id_cliente order by dataModificacao DESC;');
$pedidos->execute(array(':id_cliente' => $_SESSION['clienteID']));
?>

<div id="wrapper">
  <?php include_once('../menu/sidebar.php') ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include_once('../menu/topbar.php') ?>

      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Acompanhar</h6>
          </div>
          <div class="card-body">
            <?php if ($pedidos->rowCount() <= 0) : ?>
              <h6 class="m-0 text-primary">Nenhum Pedido</h6>
            <?php else : ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>Endereço Retirada</th>
                      <th>Endereço Destino</th>
                      <th>Nome Motofretista</th>
                      <th>Placa moto</th>
                      <th>Tipo de Entrega</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($elem = $pedidos->fetch(PDO::FETCH_OBJ)) { ?>
                      <tr>
                        <td>
                          <?php
                              $status = $pdo->prepare("select nome from status where id = :id;");
                              $status->execute(array(':id' => $elem->status));
                              $status = $status->fetchAll(PDO::FETCH_OBJ);
                              $status = $status[0];
                              echo $status->nome;
                              ?>
                        </td>
                        <td><?php echo $elem->enderecoRetirada ?></td>
                        <td><?php echo $elem->enderecoDestino ?></td>
                        <?php
                            $motofretista = (object) [];
                            if ($elem->id_motofretista) {
                              $motofretista = $pdo->prepare("select nome, placa from motofretistas where id = :id;");
                              $motofretista->execute(array(':id' => $elem->id_motofretista));
                              $motofretista = $motofretista->fetchAll(PDO::FETCH_OBJ);
                              $motofretista = $motofretista[0];
                            } else {
                              $motofretista->nome = $status->nome;
                              $motofretista->placa = $status->nome;
                            }
                            ?>
                        <td><?php echo $motofretista->nome ?></td>
                        <td><?php echo $motofretista->placa ?></td>
                        <td>
                          <?php
                              $tipoEntrega = '';
                              switch ($elem->tipoEntrega) {
                                case '0':
                                  $tipoEntrega = 'Retirar Documento';
                                  break;
                                case '1':
                                  $tipoEntrega = 'Retirar Pacote';
                                  break;
                                default:
                                  $tipoEntrega = '';
                                  break;
                              }
                              echo $tipoEntrega;
                              ?>
                        </td>
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