<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();
$pedidos = $pdo->prepare(
  "select
  p.id,
  p.status,
  p.codRastreio,
  p.enderecoRetirada,
  p.enderecoDestino,
  p.id_motofretista,
  p.tipoEntrega
  from pedidos p
  inner join status s on s.id = p.status
  where p.id_cliente = :id_cliente and s.tipo = 1
  order by datamodificacao desc;"
);
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
              <h6 class="m-0 text-primary">Nenhum Pedido Aberto</h6>
            <?php else : ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="30px"></th>
                      <th>Status</th>
                      <th>Cod. Rastreio</th>
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
                          <?php if (!$elem->id_motofretista && $elem->status == 1) : ?>
                            <a <a href="#" data-toggle="modal" data-target="#cancelModal_<?php echo $elem->id; ?>" title="Cancelar Pedido">
                              <i class="fas fa-window-close"></i>
                            </a>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php
                              $status = $pdo->prepare("select nome from status where id = :id;");
                              $status->execute(array(':id' => $elem->status));
                              $status = $status->fetchAll(PDO::FETCH_OBJ);
                              $status = $status[0];
                              echo $status->nome;
                              ?>
                        </td>
                        <td><?php echo $elem->codRastreio ?></td>
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

                      <?php // MODAL PARA CANCELAR 
                          ?>
                      <div class="modal fade" id="cancelModal_<?php echo $elem->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Deseja realmente Cancelar?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Você realmente gostaria de cancelar o Pedido "<?php echo $elem->codRastreio ?>"?</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Não</button>
                              <a class="btn btn-danger" href="actions.php?action=cancel&id=<?php echo $elem->id; ?>">Sim</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php // MODAL PARA CANCELAR 
                          ?>

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