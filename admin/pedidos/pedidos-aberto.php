<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();

// <!-- (1,'Solicitando Motofretista', 1), -->
$solicitando = $pdo->prepare('select * from pedidos where status = 1 order by datamodificacao desc;');
$solicitando->execute();

// <!-- (4,'Motofretista em trânsito', 1), -->
$emTransito = $pdo->prepare('select * from pedidos where status = 4 order by datamodificacao desc;');
$emTransito->execute();

// <!-- (5,'Coleta realizada', 1), -->
$coleta = $pdo->prepare('select * from pedidos where status = 5 order by datamodificacao desc;');
$coleta->execute();

// <!-- (3,'Não há Motofretista disponível', 1), -->
$indisponivel = $pdo->prepare('select * from pedidos where status = 3 order by datamodificacao desc;');
$indisponivel->execute();

// <!-- (7,'Endereço não encontrado', 1) -->
$naoEncontrado = $pdo->prepare('select * from pedidos where status = 7 order by datamodificacao desc;');
$naoEncontrado->execute();
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
                <h6 class="m-0 font-weight-bold text-primary">Novos Pedidos</h6>
                <?php // <!-- (1,'Solicitando Motofretista', 1), --> 
                ?>
              </div>
              <div class="card-body">
                <?php if ($solicitando->rowCount() <= 0) : ?>
                  <h6 class="m-0 text-primary">Nenhum Pedido</h6>
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
                        <?php while ($elem = $solicitando->fetch(PDO::FETCH_OBJ)) { ?>
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

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Motofretista em trânsito</h6>
                <?php // <!-- (4,'Motofretista em trânsito', 1), --> 
                ?>
              </div>
              <div class="card-body">
                <?php if ($emTransito->rowCount() <= 0) : ?>
                  <h6 class="m-0 text-primary">Nenhum Pedido</h6>
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
                        <?php while ($elem = $emTransito->fetch(PDO::FETCH_OBJ)) { ?>
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

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Coleta realizada</h6>
                <?php // <!-- (5,'Coleta realizada', 1), --> 
                ?>
              </div>
              <div class="card-body">
                <?php if ($coleta->rowCount() <= 0) : ?>
                  <h6 class="m-0 text-primary">Nenhum Pedido</h6>
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
                        <?php while ($elem = $coleta->fetch(PDO::FETCH_OBJ)) { ?>
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
                <h6 class="m-0 font-weight-bold text-primary">Endereço Não encontrado</h6>
                <?php // <!-- (7,'Endereço não encontrado', 1) --> 
                ?>
              </div>
              <div class="card-body">
                <?php if ($naoEncontrado->rowCount() <= 0) : ?>
                  <h6 class="m-0 text-primary">Nenhum Pedido</h6>
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
                        <?php while ($elem = $naoEncontrado->fetch(PDO::FETCH_OBJ)) { ?>
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

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Não há Motofretista disponível</h6>
                <?php // <!-- (3,'Não há Motofretista disponível', 1), --> 
                ?>
              </div>
              <div class="card-body">
                <?php if ($indisponivel->rowCount() <= 0) : ?>
                  <h6 class="m-0 text-primary">Nenhum Pedido</h6>
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
                        <?php while ($elem = $indisponivel->fetch(PDO::FETCH_OBJ)) { ?>
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