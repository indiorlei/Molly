<?php include('template/header.php') ?>
<div class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1>
                    <p class="mb-4">Basta digitar seu endereço de e-mail abaixo e entraremos em contato!</p>
                  </div>
                  <form class="user" method="POST" action="envia-senha.php">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Seu endereço de email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Resetar senha</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo URL ?>app/login.php">já tem uma conta? Faça Login aqui!</a>
                  </div>
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