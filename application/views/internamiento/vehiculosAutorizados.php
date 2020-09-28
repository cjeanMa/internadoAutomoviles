<div class="container">
    <h2 class="text-center">Lista de Vehiculos Verificados</h2>
    <a href="<?= base_url('internamiento/listaActas')?>" class="btn btn-primary">Lista de Vehiculos con actas de control</a>
    <hr>
    <div class="col-12">
        <table class="table table-responsive table-striped" id="tablaVerificados">
            <thead>
                <tr class="text-center table-primary">
                    <th width="10%">Nº Boleta</th>
                    <th width="10%">Placa</th>
                    <th width="20%">Infraccion</th>
                    <th width="10%">F. Ingreso</th>
                    <th width="10%">F. Salida</th>
                    <th width="20%">Autorizó</th>
                    <th width="10%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($internados as $i) { ?>
                    <tr>
                        <td><?= $i['nro_boleta'] ?></td>
                        <td><?= $i['placa'] ?></td>
                        <td><?= $i['infraccion'] ?></td>
                        <td><?= $i['fch_ing'] ?></td>
                        <td><?= $i['fch_sal'] ?></td>
                        <td><?= $i['user_salida'] ?></td>
                        <td class="text-center">
                                    <a href="<?= base_url('internamiento/controlSalida/' . $i['cod_boleta']) ?>" class="text-success p-1" target="_blank"><i class="fas fa-pen"></i> </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>