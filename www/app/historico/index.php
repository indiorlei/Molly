<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();
$motofretistas = $pdo->query('select * from motofretistas;');
?>

<div id="wrapper">
  <?php include_once('../menu/sidebar.php') ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include_once('../menu/topbar.php') ?>
      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Motofretistas</h6>
          </div>
          <div class="card-body">
            <?php if ($motofretistas->rowCount() <= 0) : ?>
              <h6 class="m-0 text-primary">Nenhum Motofretista cadastrado</h6>
            <?php else : ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th>Nome</th>
                      <th>CPF</th>
                      <th>Placa</th>
                      <th>Bauleto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($elem = $motofretistas->fetch(PDO::FETCH_OBJ)) { ?>
                      <tr>
                        <td><?php echo $elem->nome ?></td>
                        <td><?php echo $elem->cpf ?></td>
                        <td><?php echo $elem->placa ?></td>
                        <td>
                          <?php
                              $bauleto = $pdo->prepare("select modelo from bauletos where id = :id;");
                              $bauleto->execute(array(':id' => $elem->bauleto));
                              $bauleto = $bauleto->fetchAll(PDO::FETCH_OBJ);
                              $bauleto = $bauleto[0];
                              ?>
                          <?php echo $bauleto->modelo; ?>
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