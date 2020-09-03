<h2 class="text-center">Nuevo Usuario</h2>
<hr>
<form class="container group-form" action="<?= base_url('usuario/add') ?>" method="POST">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" class="form-control">
        </div>
        <div class="col-md-6 col-sm-12">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <label for="tipoUsuario">Tipo de Usuario:</label>
            <select name="tipoUsuario" id="tipoUsuario" class="form-control">
                <option value="">--Seleccione--</option>
                <?php foreach ($tipoUsuarios as $tu){?>
                    <option value="<?=$tu['idTipoUsuario']?>"><?=$tu['des_usuario']?></option>
                <?php }?>
            </select>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <button type="submit" class="btn btn-success btn-block"> Aceptar</button>
        </div>
    </div>

</form>