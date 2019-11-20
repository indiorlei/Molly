<?php
session_start();

require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$nome = '';
$sobrenome = '';
$email = '';
$cpf = '';
$endereco = '';
$senha = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $ID = $_SESSION['clienteID'];

  $pdo = dbConnect();
  $statement = $pdo->prepare("select *from clientes where id = :id;");
  $statement->execute(array(':id' => $ID));
  $cliente = $statement->fetchAll(PDO::FETCH_OBJ);

  if (count($cliente) > 0) {
    $cliente = $cliente[0];
    $nome = $cliente->nome;
    $sobrenome = $cliente->sobrenome;
    $email = $cliente->email;
    $cpf = $cliente->cpf;
    $endereco = $cliente->endereco;
    $senha = $cliente->senha;
  }
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
            <h6 class="m-0 font-weight-bold text-primary">Informações pessoais</h6>
          </div>
          <div class="card-body">
            <form class="" method="POST" action="actions.php?update=infoPessoais">
              <input type="hidden" name="id" value="<?php echo (isset($ID) && $ID != null || $ID != "") ? $ID : ''; ?>" />
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: José Augusto" value="<?php echo (isset($nome) && $nome != null || $nome != "") ? $nome : ''; ?>">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Ex: da Silva" value="<?php echo (isset($sobrenome) && $sobrenome != null || $sobrenome != "") ? $sobrenome : ''; ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">CPF</label>
                <input readonly type="text" class="form-control" id="cpf" name="cpf" value="<?php echo (isset($cpf) && $cpf != null || $cpf != "") ? $cpf : ''; ?>">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Este será seu login" value="<?php echo (isset($email) && $email != null || $email != "") ? $email : ''; ?>">
              </div>
              <div class="form-buttons d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-primary btn-save ">Salvar</button>
              </div>
            </form>
          </div>
        </div>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Endereço</h6>
          </div>
          <div class="card-body">
            <form class="" method="POST" action="actions.php?update=endereco">
              <input type="hidden" name="id" value="<?php echo (isset($ID) && $ID != null || $ID != "") ? $ID : ''; ?>" />
              <div class="form-group">
                <label for="">Endereço</label>
                <input type="endereco" class="form-control" id="endereco" name="endereco" placeholder="Ex: Av. Paulista, 900" value="<?php echo (isset($endereco) && $endereco != null || $endereco != "") ? $endereco : ''; ?>">
              </div>
              <div class="form-buttons d-flex justify-content-end align-items-center">
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