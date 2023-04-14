<div class="app-menu navbar-menu">
  <!-- LOGO -->
  <div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="<?= base_url(); ?>dashboard" class="logo logo-dark">
      <span class="logo-sm">
        <img src="public/images/logo-sm.png" alt="" height="22">
      </span>
      <span class="logo-lg">
        <img src="<?= base_url(); ?>public/images/logo-dark.png" alt="" height="17">
      </span>
    </a>
    <!-- Light Logo-->
    <a href="<?= base_url(); ?>dashboard" class="logo logo-light">
      <span class="logo-sm">
        <img src="<?= base_url(); ?>public/images/logo-light-.svg" alt="" height="35">
      </span>
      <span class="logo-lg">
        <img src="<?= base_url(); ?>public/images/logo-light-.svg" alt="" height="80">
      </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
      <i class="ri-record-circle-line"></i>
    </button>
  </div>

  <div id="scrollbar">
    <div class="container-fluid">

      <div id="two-column-menu">
      </div>
      <ul class="navbar-nav" id="navbar-nav">
        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
        <li class="nav-item">
          <a class="nav-link menu-link" href="<?= base_url(); ?>dashboard">
            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Inicio</span>
          </a>

        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
            <i class="ri-booklet-line"></i> <span data-key="t-layouts">Catalogo</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarLayouts">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="<?= base_url(); ?>departamentos" class="nav-link" data-key="t-horizontal">Departamento</a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url(); ?>municipios" class="nav-link" data-key="t-detached">Municipios</a>
              </li>
        </li>
      </ul>
    </div>
    </li> <!-- end Dashboard Menu -->
    <li class="nav-item">
      <a href="#sidebarLogout" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLogout" data-key="t-logout">
      <i class="ri-roadster-fill"></i> <span data-key="t-apps">Clientes</span>
      </a>
      <div class="collapse menu-dropdown" id="sidebarLogout">
        <ul class="nav nav-sm flex-column">
          <li class="nav-item">
            <a href="auth-logout-basic.html" class="nav-link" data-key="t-basic"> Agregar clientes
            </a>
          </li>    
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
        <i class="ri-roadster-fill"></i> <span data-key="t-apps">Vehiculo</span>
      </a>
      <div class="collapse menu-dropdown" id="sidebarApps">
        <ul class="nav nav-sm flex-column">
          <li class="nav-item">
            <a href="<?= base_url(); ?>tipo" class="nav-link" data-key="t-calendar"> Tipo </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>marcas" class="nav-link" data-key="t-calendar"> Marca </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>modelos" class="nav-link" data-key="t-calendar"> Modelo </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>vehiculos" class="nav-link" data-key="t-calendar"> Agregar Vehiculo </a>
          </li>
        </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
        <i class="ri-survey-line"></i> <span data-key="t-layouts">Avaluo</span>
      </a>
      <div class="collapse menu-dropdown" id="sidebarLayouts">
        <ul class="nav nav-sm flex-column">
          <li class="nav-item">
            <a href="<?= base_url(); ?>avaluo" class="nav-link" data-key="t-calendar"> Tipo de avaluo </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>avaluos" class="nav-link" data-key="t-calendar"> Agregar avaluo </a>
          </li>

        </ul>
      </div>
    </li> <!-- end Dashboard Menu -->


    <li class="nav-item">
      <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
        <i class="ri-settings-2-line"></i> <span data-key="t-pages">Configuración</span>
      </a>
      <div class="collapse menu-dropdown" id="sidebarPages">
        <ul class="nav nav-sm flex-column">
          <li class="nav-item">
            <a href="<?= base_url(); ?>usuarios" class="nav-link" data-key="t-starter">Usuarios</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>tipos" class="nav-link" data-key="t-team">Tipos de usuarios</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>tipos" class="nav-link" data-key="t-team">Dato de la empresa</a>
          </li>
        </ul>
      </div>
    </li>
    </ul>
  </div>
  <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>
</div>