<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <div class="sidebar-heading">
    APP Pedidos
  </div>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo URL ?>admin/pedidos">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>APP Pedidos</span>
    </a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="<?php echo URL ?>admin/clientes">
      <i class="fas fa-fw fa-user"></i>
      <span>APP Clientes</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Cadastros
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMotofretista" aria-expanded="true" aria-controls="collapseMotofretista">
      <i class="fas fa-fw fa-motorcycle"></i>
      <span>APP Motofretistas</span>
    </a>
    <div id="collapseMotofretista" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
        <a class="collapse-item" href="<?php echo URL ?>admin/motofretistas/">Adicionar</a>
        <a class="collapse-item" href="<?php echo URL ?>admin/motofretistas/listar.php">Listar</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBauleto" aria-expanded="true" aria-controls="collapseBauleto">
      <i class="fas fa-fw fa-box"></i>
      <span>APP Bauletos</span>
    </a>
    <div id="collapseBauleto" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
        <a class="collapse-item" href="<?php echo URL ?>admin/bauletos/">Adicionar</a>
        <a class="collapse-item" href="<?php echo URL ?>admin/bauletos/listar.php">Listar</a>
      </div>
    </div>
  </li>



  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>