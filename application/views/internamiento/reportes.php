<input type="text" value="<?=base_url('internamiento')?>" id="base_url" hidden>
<div class="container">
    <h2 class="text-center">Reportes</h2>
    <div class="row">
        <div class="col-12">
            <h4>Reporte por fecha de Ingreso</h4>
        </div>
        <div class="col-md-6 col-sm-12 col-12 group-form">
            <label for="fechaIngresoInit">Fecha Minima:</label>
            <input type="date" name="fechaIngresoInit" id="fechaIngresoInit" class="form-control">
        </div>
        <div class="col-md-6 col-sm-12 col-12 group-form">
            <label for="fechaIngresoEnd">Fecha Maxima:</label>
            <input type="date" name="fechaIngresoEnd" id="fechaIngresoEnd" class="form-control" disabled ="true">
        </div>
        <div class="col-12 my-3">
            <button class="btn btn-success btn-block" id="verReporteIngreso" disabled="true">Ver Reporte Ingresos</button>
        </div>
        <div class="col-12">
            <iframe src="" type="text/html" id="frameIngreso" width="100%" height="400px" hidden></iframe>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h4>Reporte por fecha de Salida</h4>
        </div>
        <div class="col-md-6 col-sm-12 col-12 group-form">
            <label for="fechaSalidaInit">Fecha Minima:</label>
            <input type="date" name="fechaSalidaInit" id="fechaSalidaInit" class="form-control">
        </div>
        <div class="col-md-6 col-sm-12 col-12 group-form">
            <label for="fechaSalidaEnd">Fecha Maxima:</label>
            <input type="date" name="fechaSalidaEnd" id="fechaSalidaEnd" class="form-control" disabled="true">
        </div>
        <div class="col-12 my-3">
            <button class="btn btn-success btn-block" id="verReporteSalida" disabled="true">Ver Reporte Salidas</button>
        </div>
        <div class="col-12">
            <iframe src="" type="text/html" id="frameSalida" width="100%" height="400px" hidden></iframe>
        </div>
    </div>
</div>