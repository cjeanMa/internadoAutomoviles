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
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('internamiento'); ?>">
          <i class="fas fa-car"></i>
          <span>Internamiento</span></a>
      </li>

      <?php if($this->session->userdata('tipoUsuario')==1 || $this->session->userdata('tipoUsuario')==2){?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Salida de Vehiculos
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#salidaVehiculos" aria-expanded="true" aria-controls="salidaVehiculos">
          <i class="fas fa-crosshairs"></i>
          <span>Salida Internamiento</span>
        </a>
        <div id="salidaVehiculos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones: </h6>
            <a class="collapse-item" href="<?php echo base_url('internamiento/internadoSalida');?>">Salida de Vehiculo</a>
            <a class="collapse-item" href="<?php echo base_url('internamiento/verificacionSalida');?>">Verificacion de Salida</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('internamiento/allInternamiento');?>">
          <i class="fas fa-car"></i>
          <span>Todo Internamiento</span></a>
      </li>

      <!-- Divider -->
      <?php if($this->session->userdata('tipoUsuario')==1){?>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('usuario');?>">
          <i class="fas fa-user"></i>
          <span>Usuarios</span></a>
      </li>

      <?php }}?>


      <!-- Nav Item - Utilities Collapse Menu -->
    <!--   <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#optTipo" aria-expanded="true" aria-controls="optTipo">
          <i class="fas fa-user"></i>
          <span>Tipo</span>
        </a>
        <div id="optTipo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones: </h6>
            <a class="collapse-item" href="<?php //echo base_url();?>tipo">Lista</a>
            <a class="collapse-item" href="<?php //echo base_url();?>tipo/add">Nuevo Producto</a>
          </div>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#optCategoria" aria-expanded="true" aria-controls="optCategoria">
          <i class="fas fa-user"></i>
          <span>Categoria</span>
        </a>
        <div id="optCategoria" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones: </h6>
            <a class="collapse-item" href="<?php //echo base_url();?>categoria">Lista</a>
            <a class="collapse-item" href="<?php //echo base_url();?>categoria/add">Nuevo Producto</a>
          </div>
        </div>
      </li> -->

      <!-- Divider -->
     <!--  <hr class="sidebar-divider">
 -->
      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Usuario
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
    <!--   <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#optMatriculas" aria-expanded="true" aria-controls="optMatriculas">
          <i class="fas fa-fw fa-atlas"></i>
          <span>Usuarios</span>
        </a>
        <div id="optMatriculas" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="<?php /* echo base_url(); */?>matricula/regular">Matricula Regular</a>
            <a class="collapse-item" href="<?php /* echo base_url(); */?>matricula/recuperacion">Matricula Recuperacion</a>
        </div>
      </li>
 -->



      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
