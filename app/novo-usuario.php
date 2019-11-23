<?php
session_start();
include('template/header.php');
?>
<div class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crie a sua conta aqui!</h1>
              </div>


              <form class="user" method="POST" action="cadastra-usuario.php">

                <?php if (isset($_SESSION['error_email'])) : ?>
                  <div class="form-group">
                    <div class="px-1 py-2 bg-gradient-danger text-white">
                      <span class="icon text-white-50">
                        <i class="fas fa-exclamation-circle"></i>
                      </span>
                      <span class="text">Email já cadastrado</span>
                      <div class="text-center">
                        <a class="small" href="<?php echo URL ?>app/forgot-password.php">Esqueceu a senha?</a>
                      </div>
                    </div>
                  </div>
                <?php endif;
                unset($_SESSION['error_email']); ?>

                <?php if (isset($_SESSION['error_cpf'])) : ?>
                  <div class="form-group">
                    <div class="px-1 py-2 bg-gradient-danger text-white">
                      <span class="icon text-white-50">
                        <i class="fas fa-exclamation-circle"></i>
                      </span>
                      <span class="text">CPF já cadastrado</span>
                      <div class="text-center">
                        <a class="small" href="<?php echo URL ?>app/forgot-password.php">Esqueceu a senha?</a>
                      </div>
                    </div>
                  </div>
                <?php endif;
                unset($_SESSION['error_cpf']); ?>

                <?php if (isset($_SESSION['error_senha'])) : ?>
                  <div class="form-group">
                    <div class="px-1 py-2 bg-gradient-danger text-white">
                      <span class="icon text-white-50">
                        <i class="fas fa-exclamation-circle"></i>
                      </span>
                      <span class="text">senhas não conferem</span>
                    </div>
                  </div>
                <?php endif;
                unset($_SESSION['error_senha']); ?>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label for="">Nome</label>
                      <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: José Augusto" value="<?php echo $_SESSION['nome'] ? $_SESSION['nome'] : ''; ?>">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label for="">Sobrenome</label>
                      <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Ex: da Silva" value="<?php echo $_SESSION['sobrenome'] ? $_SESSION['sobrenome'] : ''; ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="">CPF</label>
                  <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Ex: 000.000.000-00" value="<?php echo $_SESSION['cpf'] ? $_SESSION['cpf'] : ''; ?>">
                </div>

                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Este será seu login" value="<?php echo $_SESSION['email'] ? $_SESSION['email'] : ''; ?>">
                </div>

                <div class="form-group">
                  <div class="form-group">
                    <label for="">Senha</label>
                    <div class="row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                      </div>
                      <div class="col-sm-6">
                        <input type="password" class="form-control" id="repetirSenha" name="repetirSenha" placeholder="Repetir senha">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="">Endereço</label>
                  <input type="endereco" class="form-control" id="endereco" name="endereco" placeholder="Ex: Av. Paulista, 900" value="<?php echo $_SESSION['endereco'] ? $_SESSION['endereco'] : ''; ?>">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">Criar Conta</button>
              </form>

              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Esqueceu a senha?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">já tem uma conta? Faça Login aqui!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

<?php include('template/footer.php') ?>