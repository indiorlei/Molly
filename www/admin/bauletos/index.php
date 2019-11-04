<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$modelo = '';
$volume = '';
$altura = '';
$largura = '';
$profundidade = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $ID = (isset($_GET['id']) && $_GET['id'] != null) ? $_GET['id'] : "";

  $pdo = dbConnect();
  $statement = $pdo->prepare("select * from bauletos where id = :id;");
  $statement->execute(array(':id' => $ID));
  $bauleto = $statement->fetchAll(PDO::FETCH_OBJ);

  if (count($bauleto) > 0) {
    $bauleto = $bauleto[0];
    $modelo = $bauleto->modelo;
    $volume = $bauleto->volume;
    $altura = $bauleto->altura;
    $largura = $bauleto->largura;
    $profundidade = $bauleto->profundidade;
  }
}

if (isset($_GET['action']) && $_GET['action'] != null && $_GET['action'] == 'update') {
  $titlePage = 'Editando Bauleto "' . $modelo . '"';
} else {
  $titlePage = 'Adicionar Bauletos';
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
            <form class="" method="POST" action="actions.php">
              <input type="hidden" name="id" value="<?php echo (isset($ID) && $ID != null || $ID != "") ? $ID : ''; ?>" />
              <div class="form-group">
                <input type="text" class="form-control form-control-modelo" id="modelo" name="modelo" placeholder="Modelo" value="<?php echo (isset($modelo) && $modelo != null || $modelo != "") ? $modelo : ''; ?>" autofocus="">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-volume" id="volume" name="volume" placeholder="Volume (L)" value="<?php echo (isset($volume) && $volume != null || $volume != "") ? $volume : ''; ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-altura" id="altura" name="altura" placeholder="Altura (cm)" value="<?php echo (isset($altura) && $altura != null || $altura != "") ? $altura : ''; ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-largura" id="largura" name="largura" placeholder="Largura (cm)" value="<?php echo (isset($largura) && $largura != null || $largura != "") ? $largura : ''; ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-profundidade" id="profundidade" name="profundidade" placeholder="Profundidade (cm)" value="<?php echo (isset($profundidade) && $profundidade != null || $profundidade != "") ? $profundidade : ''; ?>">
              </div>
              <button type="submit" class="btn btn-primary btn-save btn-block">Salvar</button>
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