
  <!-- Bootstrap core JavaScript-->
  <script type="text/javascript" src="<?=base_url()?>assets/theme/vendor/jquery/jquery-3.5.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/theme/vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script type="text/javascript" src="<?=base_url()?>assets/theme/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="<?=base_url()?>assets/theme/js/sb-admin-2.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>  

  
  <!--Plugin DataTables scripts needs-->
  <script type="text/javascript" src="<?=base_url();?>assets/dataTables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/dataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/dataTables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/dataTables/Buttons-1.6.1/js/buttons.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/dataTables/Buttons-1.6.1/js/buttons.html5.min.js"></script>


  <!-- Modificar el o los archivos js que se utilizara-->
 <?php if(!empty($javascript)){
    foreach($javascript as $js){
   ?>
		  <script src="<?=base_url().'assets/modulos/'.$js?>"></script>
	<?php } } ?>




