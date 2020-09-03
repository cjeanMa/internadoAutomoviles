<div class="container">
    <h2>Denegar Solicitud de Salida</h2>

    <form action="<?=base_url('internamiento/denegarSolicitud/'.$internado['cod_boleta'])?>" method="POST" class="group-form">
        <input type="text" name="codigo" id="codigo" class="form-control" hidden value="<?= $internado['cod_boleta'] ?>">
        <label for="mensajeDenegar">Observacion de Denegacion:</label>
        <input type="text" name="mensajeDenegar" id="mensajeDenegar" class="form-control">
        <hr>
        <button type="submit" class="btn btn-success">Mandar Denegacion</button>
    </form>
</div>