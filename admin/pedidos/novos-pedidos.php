<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();
// pegar todos os pedidos com status inicial `Solicitando Motofretista` e sem motofretista selecionado
$pedidos = $pdo->prepare('select * from pedidos where status = 1 and id_motofretista is null order by datamodificacao desc ;');
$pedidos->execute();
?>

<div id="wrapper">
  <?php include_once('../menu/sidebar.php') ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include_once('../menu/topbar.php') ?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Novos Pedidos</h6>
              </div>

              <div class="card-body">
                <?php if ($pedidos->rowCount() <= 0) : ?>
                  <h6 class="m-0 text-primary">Nenhum Pedido Novo</h6>
                <?php else : ?>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="30px"></th>
                          <th>Cliente</th>
                          <th>Cod. Rastreio</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($elem = $pedidos->fetch(PDO::FETCH_OBJ)) { ?>
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