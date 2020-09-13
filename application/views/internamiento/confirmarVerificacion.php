
<div class='container bg-light my-5 p-5 card shadow'>
    <div class='alert alert-success'>Datos Subidos Exitosamente</div>
    <a href='<?=base_url('internamiento/verificacionSalida')?>' class='btn btn-warning'>Pendientes de Verificacion</a>
    <br>
    <a href='<?=base_url('internamiento/viewActa/'.$internado['cod_boleta'])?>' class='btn btn-danger' target='_blank'><span class="fa fa-file-pdf"></span> Visualizar PDF</a>
</div>
