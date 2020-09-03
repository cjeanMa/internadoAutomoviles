<div class="container">
    <div class="row">
        <h2 class="col-12 text-center">Lista de Internamientos</h2>
        <a href="<?= base_url('internamiento/add')?>" class="btn btn-success mr-1">Nuevo Internamiento</a>
        <a href="<?= base_url('internamiento/observados')?>" class="btn btn-danger mr-1">Vehiculos Observados</a>
    </div>
    <br>
        <table class="table table-striped table-responsive" id="tableInternamiento">
            <thead>
                <tr class="text-center table-primary">
                    <th width="10%">Nº Boleta</th>
                    <th width="20%">Chofer</th>
                    <th width="10%">Placa</th>
                    <th width="10%">Infraccion</th>
                    <th width="20%">Oficial</th>
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
                        <td><?=$i['oficial']?></td>
                        <td><?=$i['fch_ing']?></td>
                        <td class="text-center">
                            <a href="<?=base_url('internamiento/edit/'.$i['cod_boleta'])?>" style="color:orange"><i class="fa fa-edit"></i> </a>
                            <a href="<?=base_url('internamiento/internadoPDF/'.$i['cod_boleta'])?>" style="color:red" target="_blank"><i class="fa fa-file-pdf"></i> </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</div>