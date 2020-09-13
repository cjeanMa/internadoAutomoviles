<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentacion Documentos</title>
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/theme/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/own/css/styles.css" rel="stylesheet">
</head>

<body>

    <?php if (isset($confirmacion) && $confirmacion) { ?>

        <div class='container bg-light my-5 p-5'>
            <div class='alert alert-success'>Archivo Subido Correctamente</div>
            <a href='<?= base_url('internamiento/internadoSalida') ?>' class='btn btn-warning'>Regresar</a>
        </div>
    <?php } else { ?>
        <div class='container bg-light my-5 p-5'>
            <div class='alert alert-danger'>No se pudo realizar la tranferencia de datos, Intente ponerse en contacto con el administrador.</div>
            <a href='<?= base_url('internamiento/internadoSalida') ?>' class='btn btn-warning'>Regresar</a>
        </div>
    <?php } ?>

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