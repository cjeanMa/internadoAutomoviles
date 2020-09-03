<h2 class="text-center">Actualizar Usuario</h2>
<hr>
<form class="container group-form" action="<?= base_url('usuario/edit/'.$usuario['idUsuario']) ?>" method="POST">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" class="form-control" value="<?=$usuario['user']?>" readonly>
        </div>
        <div class="col-md-5 col-sm-12">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="************" disabled>
        </div>
        <div class="col-md-1 col-sm-12">
        <br>
        <button class="btn btn-warning btn-block" id="cambioPassword"><span class="fa fa-edit"></span> </button>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <label for="tipoUsuario">Tipo de Usuario:</label>
            <select name="tipoUsuario" id="tipoUsuario" class="form-control">
                <?php foreach ($tipoUsuarios as $tu){?>
                    <option value="<?=$tu['idTipoUsuario']?>" <?=$usuario['idTipoUsuario']==$tu['idTipoUsuario']?"selected":""?>><?=$tu['des_usuario']?></option>
                <?php }?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <label for="habilitacion">Habilitacion:</label>
            <select name="habilitacion" id="habilitacion" class="form-control">
                <?php foreach ($habilitacion as $h){?>
                    <option value="<?=$h['idHabilitacion']?>" <?=$usuario['habilitacion']==$h['idHabilitacion']?"selected":""?>><?=$h['descripcion']?></option>
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