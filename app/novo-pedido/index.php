<?php
session_start();

require('../../config.php');
require('../isLoggedIn.php');

include('../template/header.php');

$pdo = dbConnect();
?>

<div id="wrapper">
  <?php include_once('../menu/sidebar.php') ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include_once('../menu/topbar.php') ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">

            <form class="" method="POST" action="actions.php" onsubmit="return validaFormNovoPedido(this);">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Retirada</h6>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Endereço</label>
                    <input type="text" class="form-control" id="enderecoRetirada" name="enderecoRetirada" placeholder="Ex: Av Paulista, 900" autofocus>
                  </div>
                  <div class="form-group">
                    <label for="">O que o Motofretista deve fazer?</label>
                    <div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="radioRetirarDocumento" name="radioRetirar" value="0" class="custom-control-input radioRetirar" checked>
                        <label class="custom-control-label" for="radioRetirarDocumento">Retirar Documento</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="radioRetirarPacote" name="radioRetirar" value="1" class="custom-control-input radioRetirar">
                        <label class="custom-control-label" for="radioRetirarPacote">Retirar Pacote</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group form-group-pacote" style="display:none">
                    <?php $bauletos = $pdo->query('select * from bauletos;'); ?>
                    <label for="bauleto">Selecione o tamanho máximo do seu pacote</label>
                    <?php if ($bauletos->rowCount() <= 0) : ?>
                      <h6 class="m-0">Nenhum pacote cadastrado</h6>
                    <?php else : ?>
                      <select class="form-control" id="tamanho" name="tamanho">
                        <option value="0">Selecione</option>
                        <?php while ($elem = $bauletos->fetch(PDO::FETCH_OBJ)) : ?>
                          <option value="<?php echo $elem->id; ?>">
                            <?php echo $elem->profundidade . ' x ' . $elem->largura . ' x ' . $elem->altura . ' cm'; ?>
                            <!-- profundidade / largura / altura -->
                          </option>
                        <?php endwhile; ?>
                      </select>
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <label for="obs">Observações</label>
                    <textarea class="form-control" id="obs" name="obs" rows="5" placeholder="Ex: Com quem retirar o pacote"></textarea>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Destino</h6>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Endereço</label>
                    <input type="text" class="form-control" id="enderecoDestino" name="enderecoDestino" placeholder="Ex: Av Paulista, 900">
                  </div>
                  <div class="form-buttons d-flex justify-content-end align-items-center">
                    <button type="reset" class="btn btn-cancel text-danger" value="Reset">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-save ">Solicitar</button>
                  </div>
                </div>
              </div>


            </form>

          </div>

          <div class="col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Localização</h6>
              </div>
              <div class="card-body">
                <!-- <iframe class="img-fluid" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?origin=place_id:ChIJcVUeAqh6GZURhvUYdQ9G3tA&destination=place_id:ChIJlZNBUI1bGZURo3GsmS3XVAw&key=AIzaSyCURk2ZRRk8W_ntJXb784iVrR_GB1-mk4E" allowfullscreen></iframe> -->

                <img src="<?php echo URL; ?>assets/images/mapa-exemplo.png" class="img-fluid">
                <!-- https://www.google.com.br/maps/dir/Canoas,+RS/Port%C3%A3o,+RS/ -->
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