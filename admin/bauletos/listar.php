<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();
$bauletos = $pdo->query('select * from bauletos;');
?>
<div id="wrapper">
  <?php include_once('../menu/sidebar.php') ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include_once('../menu/topbar.php') ?>
      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bauletos</h6>
          </div>
          <div class="card-body">
            <?php if ($bauletos->rowCount() <= 0) : ?>
              <h6 class="m-0 text-primary">Nenhum Bauleto cadastrado</h6>
            <?php else : ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="30px"></th>
                      <th width="30px"></th>
                      <th>Modelo</th>
                      <th>Volume</th>
                      <th>Altura</th>
                      <th>Largura</th>
                      <th>Profundidade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($elem = $bauletos->fetch(PDO::FETCH_OBJ)) { ?>
                      <tr>
                        <td>
                          <a href="index.php?action=update&id=<?php echo $elem->id; ?>">
                            <i class="fas fa-edit"></i>
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#deleteModal_<?php echo $elem->id; ?>">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                        <td><?php echo $elem->modelo ?></td>
                        <td><?php echo $elem->volume ?> Litros</td>
                        <td><?php echo $elem->altura ?> cm</td>
                        <td><?php echo $elem->largura ?> cm</td>
                        <td><?php echo $elem->profundidade ?> cm</td>
                      </tr>

                      <?php // MODAL PARA EXCLUIR  ?>
                      <div class="modal fade" id="deleteModal_<?php echo $elem->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Deseja realmente Excluir?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Você realmente gostaria de excluir o bauleto "<?php echo $elem->modelo ?>"?</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Não</button>
                              <a class="btn btn-danger" href="actions.php?action=delete&id=<?php echo $elem->id; ?>">Sim</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php // MODAL PARA EXCLUIR ?>

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