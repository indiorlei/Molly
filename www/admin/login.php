<?php include('template/header.php') ?>

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
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="adminLoginEmail" name="adminLoginEmail" aria-describedby="emailHelp" placeholder="Usuário">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="adminLoginPassword" name="adminLoginPassword" placeholder="Senha">
                    </div>
                    <a href="index.php" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>
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