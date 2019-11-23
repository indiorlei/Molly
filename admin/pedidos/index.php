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

            <div class="row">

              <div class="col-lg-6">

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Solicitante</h6>
                  </div>
                  <div class="card-body">
                    <p>Nome: <?php echo $cliente->nome . ' ' . $cliente->sobrenome ?></p>
                  </div>
                </div>

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pedido</h6>
                  </div>
                  <div class="card-body">
                    <p>Cod. Rastreio: <?php echo $pedido->codRastreio ?></p>
                    <p>Data Pedido: <?php echo $pedido->dataCriacao ?></p>
                    <?php
                    $tipoEntrega = '';
                    switch ($pedido->tipoEntrega) {
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
                    ?>
                      <p>Tipo de entrega: <?php echo $tipoEntrega ?></p>
                      <?php if ($pedido->obs) : ?>
                        <p>Observações: <?php echo $pedido->obs ?></p>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Endereço</h6>
                  </div>
                  <div class="card-body">
                    <p>Endereço retirada: <?php echo $pedido->enderecoRetirada ?></p>
                    <p>Endereço destino: <?php echo $pedido->enderecoDestino ?></p>
                  </div>
                </div>

              </div>

              <div class="col-lg-6">

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Motofretista</h6>
                  </div>
                  <div class="card-body">
                    <?php
                    if ($pedido->tamanhoBauleto) {
                      $motofretista = $pdo->prepare("select * from motofretistas where bauleto = :bauleto;");
                      $motofretista->execute(array(':bauleto' => $pedido->tamanhoBauleto));
                    } else {
                      $motofretista = $pdo->prepare("select * from motofretistas;");
                      $motofretista->execute();
                    }
                    $motofretista = $motofretista->fetchAll(PDO::FETCH_OBJ);
                    $qntd_motofretistas = count($motofretista);
                    ?>
                    <?php if ($qntd_motofretistas <= 0) : ?>
                      <p>Não há Motofretista disponível. <br>Altere o status do campo abaixo para <i>"Não há Motofretista disponível"</i></p>
                    <?php else : ?>
                      <form class="" method="POST" action="actions.php?update=motofretista&pedido=<?php echo $pedido->id; ?>">
                        <div class="form-group">
                          <select class="form-control" id="motofretista" name="motofretista">
                            <option>Selecione</option>
                            <?php foreach ($motofretista as $elem) { ?>
                              <option value="<?php echo $elem->id; ?>" <?php echo ($pedido->id_motofretista == $elem->id) ? 'selected' : ''; ?>>
                                <?php echo $elem->nome; ?>
                              </option>
                            <?php  } ?>
                          </select>
                        </div>
                        <div class="form-buttons d-flex justify-content-end align-items-center">
                          <button type="submit" class="btn btn-primary btn-save ">Salvar</button>
                        </div>
                      </form>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status</h6>
                  </div>
                  <div class="card-body">
                    <form class="" method="POST" action="actions.php?update=status&pedido=<?php echo $pedido->id; ?>">
                      <div class="form-group">
                        <label for="status">Status do Pedido</label>
                        <?php $status = $pdo->query('select * from status;'); ?>
                        <select class="form-control" id="status" name="status">
                          <option>Selecione</option>
                          <?php while ($elem = $status->fetch(PDO::FETCH_OBJ)) : ?>
                            <option value="<?php echo $elem->id; ?>" <?php echo ($pedido->status == $elem->id) ? 'selected' : ''; ?>>
                              <?php echo $elem->nome; ?>
                            </option>
                          <?php endwhile; ?>
                        </select>
                      </div>
                      <div class="form-buttons d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary btn-save ">Mudar Status</button>
                      </div>
                    </form>
                  </div>
                </div>

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