<?php
require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();
$nome = '';
$cpf = '';
$placa = '';
$bauleto = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $ID = (isset($_GET['id']) && $_GET['id'] != null) ? $_GET['id'] : "";
  $statement = $pdo->prepare("select * from motofretistas where id = :id;");
  $statement->execute(array(':id' => $ID));
  $motofretistas = $statement->fetchAll(PDO::FETCH_OBJ);

  if (count($motofretistas) > 0) {
    $motofretistas = $motofretistas[0];
    $nome = $motofretistas->nome;
    $cpf = $motofretistas->cpf;
    $placa = $motofretistas->placa;
    $bauleto = $motofretistas->bauleto;
  }
}

if (isset($_GET['action']) && $_GET['action'] != null && $_GET['action'] == 'update') {
  $titlePage = 'Editando Motofretista "' . $nome . '"';
} else {
  $titlePage = 'Adicionar Motofretistas';
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
                <label for="nome">Nome Completo</label>
                <input type="text" class="form-control form-control-nome" id="nome" name="nome" placeholder="Nome" value="<?php echo (isset($nome) && $nome != null || $nome != "") ? $nome : ''; ?>" autofocus="">
              </div>
              <div class="form-group">
                <label for="id">CPF</label>
                <input type="text" class="form-control form-control-cpf" id="cpf" name="cpf" placeholder="000.000.000-00" value="<?php echo (isset($cpf) && $cpf != null || $cpf != "") ? $cpf : ''; ?>">
              </div>
              <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" class="form-control form-control-placa" id="placa" name="placa" placeholder="XXX0000" value="<?php echo (isset($placa) && $placa != null || $placa != "") ? $placa : ''; ?>">
              </div>
              <div class="form-group">
                <?php $bauletos = $pdo->query('select id, modelo from bauletos;'); ?>
                <label for="bauleto">Bauleto</label>
                <?php if ($bauletos->rowCount() <= 0) : ?>
                  <h6 class="m-0">Nenhum Bauleto cadastrado</h6>
                <?php else : ?>
                  <select class="form-control" id="bauleto" name="bauleto">
                    <option>Selecione</option>
                    <?php while ($elem = $bauletos->fetch(PDO::FETCH_OBJ)) : ?>
                      <option value="<?php echo $elem->id; ?>" <?php echo ($bauleto == $elem->id) ? 'selected' : ''; ?>>
                        <?php echo $elem->modelo; ?>
                      </option>
                    <?php endwhile; ?>
                  </select>
                <?php endif; ?>
              </div>
              <div class="form-buttons d-flex justify-content-end align-items-center">
                <a class="btn btn-cancel text-danger" href="<?php echo URL; ?>admin/motofretistas/listar.php">Cancelar</a>
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