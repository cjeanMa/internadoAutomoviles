<div class="container">
    <div class="row">
        <h2 class="col-12 text-center">Lista de Usuarios</h2>
        <a href="<?= base_url('usuario/add') ?>" class="btn btn-success mr-1">Nuevo Usuario</a>
    </div>
    <br>
    <table class="table table-striped table-responsive" id="tableUsuarios">
        <thead>
            <tr class="text-center table-primary">
                <th width="10%">ID</th>
                <th width="30%">Usuario</th>
                <th width="30%">Tipo Usuario</th>
                <th width="20%">Habilitacion</th>
                <th width="10%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u) { ?>
                <tr>
                    <td><?= $u['idUsuario'] ?></td>
                    <td><?= $u['user'] ?></td>
                    <td><?= $u['des_usuario'] ?></td>
                    <?php foreach ($habilitacion as $h) {
                        if ($u['habilitacion'] == $h['idHabilitacion']) {
                            if ($h['idHabilitacion'] == 1) {
                    ?>
                                <td class="text-center"><span class='badge badge-success'><?= $h['descripcion'] ?></span></td>
                            <?php
                            } else {
                            ?>
                                <td class="text-center"><span class='badge badge-danger'><?= $h['descripcion'] ?></span></td>
                        <?php }
                        }  ?>

                    <?php
                    } ?>
                    <td class="text-center">
                        <a href="<?= base_url('usuario/edit/' . $u['idUsuario']) ?>" style="color:orange"><i class="fa fa-edit"></i> </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>