<div class="container">
    <div class="row">
        <h2 class="col-12 text-center">Lista de Observados</h2>
    </div>
    <br>
        <table class="table table-striped table-responsive" id="tablaObservados">
            <thead>
                <tr class="text-center table-primary">
                    <th width="10%">Nº Boleta</th>
                    <th width="20%">Chofer</th>
                    <th width="10%">Placa</th>
                    <th width="10%">Infraccion</th>
                    <th width="20%">Observacion</th>
                    <th width="10%">F. Ingreso</th>
                    <th width="10%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($internados as $i) { ?>
                    <tr>
                        <td><?=$i['nro_boleta']?></td>
                        <td><?=$i['chofer']?></td>
                        <td><?=$i['placa']?></td>
                        <td><?=$i['infraccion']?></td>
                        <td><?=$i['obs_verificacion']?></td>
                        <td><?=$i['fch_ing']?></td>
                        <td class="text-center">
                            <a href="<?=base_url('internamiento/internadoPDF/'.$i['cod_boleta'])?>" style="color:red" target="_blank"><i class="fa fa-file-pdf"></i> </a>
                            <a href="<?= base_url('internamiento/viewPDF/' . $i['path']) ?>" class="text-warning p-1" target="_blank"><i class="fa fa-eye"></i> </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</div>