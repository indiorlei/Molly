<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$nome = '';
$tipo = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $ID = (isset($_GET['id']) && $_GET['id'] != null) ? $_GET['id'] : "";

  $pdo = dbConnect();
  $statement = $pdo->prepare("select * from status where id = :id;");
  $statement->execute(array(':id' => $ID));
  $status = $statement->fetchAll(PDO::FETCH_OBJ);

  if (count($status) > 0) {
    $status = $status[0];
    $nome = $status->nome;
    $tipo = $status->tipo;
  }
}

if (isset($_GET['action']) && $_GET['action'] != null && $_GET['action'] == 'update') {
  $titlePage = 'Editando Status "' . $nome . '"';
} else {
  $titlePage = 'Adicionar Status';
}
?>

<div id="wrapper">
  <?php include_once('../menu/sidebar.php') ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include_once('../menu/topbar.php') ?>
      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $titlePage; ?></h6>
          </div>
          <div class="card-body">
            <form class="" method="POST" action="actions.php" onsubmit="return validaFormStatus(this);">
              <input type="hidden" name="id" value="<?php echo (isset($ID) && $ID != null || $ID != "") ? $ID : ''; ?>" />
              <div class="form-group">
                <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="<?php echo (isset($nome) && $nome != null || $nome != "") ? $nome : ''; ?>" autofocus="">
              </div>
              <div class="form-group">
                <select class="form-control" id="tipo" name="tipo">
                  <option <?php echo (isset($tipo) && $tipo == 0) ? 'selected' : ''; ?> value="0">Fechado</option>
                  <option <?php echo (isset($tipo) && $tipo == 1) ? 'selected' : ''; ?> value="1">Aberto</option>
                </select>
              </div>
              <div class="form-buttons d-flex justify-content-end align-items-center">
                <a class="btn btn-cancel text-danger" href="<?php echo URL; ?>admin/status/listar.php">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-save ">Salvar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include('../../copyright.php') ?>
  </div>
</div>
<?php include_once('../menu/logoutModal.php') ?>
<?php include('../template/footer.php') ?>