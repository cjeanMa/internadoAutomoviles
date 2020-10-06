<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIS-VEH</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard  -->
  <?php if (
    $this->session->userdata('tipoUsuario') == 1 ||
    $this->session->userdata('tipoUsuario') == 4) { ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('internamiento'); ?>">
        <i class="fas fa-car"></i>
        <span>Internamiento</span></a>
    </li>
  <?php } ?>

  <?php if ($this->session->userdata('tipoUsuario') == 6) { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('internamiento/listaVehiculosAutorizados'); ?>">
        <i class="fas fa-car"></i>
        <span>Vehiculos Autorizados</span></a>
    </li>
  <?php } ?>




  <?php if (
    $this->session->userdata('tipoUsuario') == 1
    || $this->session->userdata('tipoUsuario') == 2
    || $this->session->userdata('tipoUsuario') == 3
    || $this->session->userdata('tipoUsuario') == 5
  ) { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Salida de Vehiculos
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#salidaVehiculos" aria-expanded="true" aria-controls="salidaVehiculos">
          <i class="fas fa-crosshairs"></i>
          <span>Salida Internamiento</span>
        </a>
        <div id="salidaVehiculos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones: </h6>
            <a class="collapse-item" href="<?php //echo base_url('internamiento/internadoSalida');
                                            ?>">Salida de Vehiculo</a>
            <a class="collapse-item" href="<?php //echo base_url('internamiento/verificacionSalida');
                                            ?>">Verificacion de Salida</a>
          </div>
        </div>
      </li> -->

    <!-- Divider -->
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('internamiento/internadoSalida'); ?>">
        <i class="fas fa-car"></i>
        <span>Salida Internamiento</span></a>
    </li>

    <!-- Divider -->
    <?php if ($this->session->userdata('tipoUsuario') != 1) { ?>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('internamiento/verificacionSalida'); ?>">
          <i class="fas fa-car"></i>
          <span>Verificacion de Salida</span></a>
      </li>
    <?php } ?>
    <!-- Divider -->


    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('internamiento/allInternamiento'); ?>">
        <i class="fas fa-car"></i>
        <span>Todo Internamiento</span></a>
    </li>

  <?php } ?>

   <!-- Divider -->
   <?php if ($this->session->userdata('tipoUsuario') == 1 ||
   $this->session->userdata('tipoUsuario') == 2 ||
   $this->session->userdata('tipoUsuario') == 3) { ?>
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('internamiento/reportes'); ?>">
        <i class="fas fa-file"></i>
        <span>Reportes</span></a>
    </li>

  <?php } ?>

  <!-- Divider -->
  <?php if ($this->session->userdata('tipoUsuario') == 1) { ?>
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('usuario'); ?>">
        <i class="fas fa-user"></i>
        <span>Usuarios</span></a>
    </li>

  <?php } ?>



  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->