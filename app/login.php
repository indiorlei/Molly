<?php
session_start();
include('template/header.php')
?>

<div class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>

                  <form class="user" method="POST" action="testa-login.php" onsubmit="return validaFormLoginAPP(this);">

                    <div class="mb-4 bloco-erro" <?php echo (isset($_SESSION['errorLogin'])) ? '' : 'style="display:none"'; ?>>
                      <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-danger text-uppercase">
                                <span class="msg-erro">
                                  <?php if (isset($_SESSION['errorLogin'])) {
                                    echo 'Usuário e/ou senha inválidos';
                                  } ?>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php unset($_SESSION['errorLogin']); ?>

                    <div class="form-group">
                      <input autofocus="" type="email" class="form-control form-control-user" id="usuarioEmail" name="usuarioEmail" placeholder="Insira o endereço de e-mail...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="usuarioSenha" name="usuarioSenha" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo URL ?>app/novo-usuario.php">Crie a sua conta aqui! </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('template/footer.php') ?>