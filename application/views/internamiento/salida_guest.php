<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALIDA DE VEHICULOS</title>
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/theme/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/own/css/styles.css" rel="stylesheet">

</head>

<body>
    <header class="container">
        <div class="row justify-content-center">
                <img style="width:200px; heigth:10px mt-5" src="<?= base_url("./assets/own/img/logo-muni.png") ?>" alt="logo">
                <h2 class="text-center mt-5">MUNICIPALIDAD PROVINCIAL DE PUNO</h2>
             
        </div>
    </header>

    <div class="container card shadow mt-5 p-5">
        <h2 class="text-center">Formulario de Levante de AutoMovil</h2>
        <hr>
        <form action="<?= base_url('internamiento/internadoSalida') ?>" method="post" class="form-group row" enctype="multipart/form-data">
            <div class="col-md-6 col-sm-12">
                <label for="placa">Numero de Placa:</label>
                <input type="text" id="placa" name="placa" class="form-control" maxlength="6" placeholder="Ejm. P05TR1" required>

                <div id="mPlaca" class="my-3"></div>

                <label for="pdf">Documentos:</label>
                <input type="file" id="pdf" name="pdf" class="form-control-file" accept="application/pdf" required>
                <i style="font-size: 13px; display:block; color: crimson" class="mt-2">Tipo de Archivo: .pdf - Tamaño Maximo: 3.5 MB</i>
                <i style="font-size: 13px; display:block; color: crimson">Los documentos a presentar son los siguientes:
                    <ul>
                        <ol>Boleta de Pago de la infraccion</ol>
                        <ol>Recibo de ...</ol>
                        <ol>SOAT</ol>
                    </ul>
                </i>
                <div id="mFile" class="my-3"></div>

                <div class="col-12 g-recaptcha" data-sitekey="6LdbeLMZAAAAAEAZrMGzUTZPY9uMSconft3-IsI6" data-callback="captchaConfirm"></div>
            </div>
            <div class="col-md-6 col-sm-12">
                <iframe id="preview" class="my-3" width="100%" height="500px" hidden></iframe>
            </div>
            <hr>

            <div class="col-12">
                <hr>
                <button type="submit" id="enviar" name="enviar" class="btn btn-success btn-block" disabled="true">ACEPTAR</button>
            </div>
        </form>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="<?= base_url() ?>assets/theme/vendor/jquery/jquery-3.5.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/theme/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>


    <!-- Modificar el o los archivos js que se utilizara-->
    <?php if (!empty($javascript)) {
        foreach ($javascript as $js) {
    ?>
            <script src="<?= base_url() . 'assets/modulos/' . $js ?>"></script>
    <?php }
    } ?>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Municipalidad Provincial de Puno</span>
                <br>
                <span>Todos los derechos reservados &copy; 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</body>

</html>