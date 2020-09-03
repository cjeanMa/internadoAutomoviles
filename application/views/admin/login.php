
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Administrador</title>
    <!-- <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script> -->
    <?php $this->load->view('template/css')?>
</head>
<body>
<div class="login-form">
    <form action="<?=base_url()?>admin/confirmacion" method="post">
        <img src="<?=base_url('assets/own/img/logo-muni.png')?>" alt="Logo" width="100%" class="mb-4 rounded">
        <h4 class="text-center">Sistema de Internado de Vehiculos</h4>
        <hr>
        <div class="form-group">
            <input type="text" class="form-control" name="user" placeholder="Usuario" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
        </div>
        <?php if(isset($mensaje)){?>
        <div class="alert alert-danger">
            <?=$mensaje?>
        </div>
        <?php }?>

        <!--<div class="col-12 g-recaptcha p-3" data-sitekey="6Lc3c8YZAAAAAC3ZZPjqMQQ2461AH9qW2f1p5wd6" data-callback="captchaConfirm"></div>-->

        <div class="form-group">
            <button type="submit" id="submit" class="btn btn-primary btn-block" disabled=false >Ingresar</button>
        </div>

        <div  class="text-center">
            <span style="font-size: 0.6rem"> Municipalidad Provincial de Puno ©2020.</span>
            <br>
            <span style="font-size: 0.6rem"> Todos los derechos reservados</span>
        </div>     
    </form>
</div>
    <?php $this->load->view('template/jsAdmin');
    ?>
</body>
</html>