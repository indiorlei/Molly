<?php
session_start();
include('template/header.php')
?>

<div class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="POST" action="testa-login.php">

                    <?php if (isset($_SESSION['error_login'])) : ?>
                      <div class="form-group">
                        <div class="px-1 py-2 bg-gradient-danger text-white">
                          <span class="icon text-white-50">
                            <i class="fas fa-exclamation-circle"></i>
                          </span>
                          <span class="text">Usuário e/ou senha inválidos</span>
                        </div>
                      </div>
                    <?php endif;
                    unset($_SESSION['error_login']); ?>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="adminLoginUsuario" name="adminLoginUsuario" aria-describedby="emailHelp" placeholder="Usuário" autofocus="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="adminLoginSenha" name="adminLoginSenha" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
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