<h2>Actualizar Internamiento</h2>

<div id="accordion">
    <form action="<?= base_url('internamiento/edit/'. $internado['cod_boleta']) ?>" method="POST" class="form-group">
        <!-- DATOS DEL VEHICULO PRIMERA PARTE -->
        <div class="card">
            <div class="card-header" id="delVehiculo">
                <h5 class="mb-0">
                    <a class="btn btn-link" data-toggle="collapse" id="btnVehiculo" data-target="#vehiculo" aria-expanded="true" aria-controls="vehiculo">
                        Datos Del Vehiculo
                    </a>
                </h5>
            </div>

            <div id="vehiculo" class="collapse show" aria-labelledby="delVehiculo" data-parent="#accordion">
                <div class="card-body row px-3">
                    <div class="col-md-4 col-sm-12">
                        <label for="nroBoleta">Nro Boleta:</label>
                        <input type="text" id="nroBoleta" name="nroBoleta" class="form-control"  value="<?= $internado['nro_boleta'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="placa">Numero de Placa:</label>
                        <input type="text" id="placa" name="placa" class="form-control" value="<?= $internado['placa'] ?>" readonly required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="marca">Marca:</label>
                        <input type="text" id="marca" name="marca" class="form-control" value="<?= $internado['marca'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="color">Color:</label>
                        <input type="text" id="color" name="color" class="form-control" value="<?= $internado['color'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="clase">Clase:</label>
                        <input type="text" id="clase" name="clase" class="form-control" value="<?= $internado['clase'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="anio">Año:</label>
                        <input type="text" id="anio" name="anio" class="form-control" value="<?= $internado['anio'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="motor">Motor Nº:</label>
                        <input type="text" id="motor" name="motor" class="form-control" value="<?= $internado['motor_nro'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="propietario">Propietario:</label>
                        <input type="text" id="propietario" name="propietario" class="form-control" value="<?= $internado['propietario'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="chofer">Chofer:</label>
                        <input type="text" id="chofer" name="chofer" class="form-control" value="<?= $internado['chofer'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="licencia">Num. Licencia:</label>
                        <input type="text" id="licencia" name="licencia" class="form-control" value="<?= $internado['nro_licencia'] ?>" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- DATOS DE LA INFRACCION -->
        <div class="card">
            <div class="card-header" id="deInfracciones">
                <h5 class="mb-0">
                    <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#infracciones" aria-expanded="false" aria-controls="infracciones">
                        Infracciones
                    </a>
                </h5>
            </div>
            <div id="infracciones" class="collapse" aria-labelledby="deInfracciones" data-parent="#accordion">
                <div class="card-body row px-3">
                    <div class="col-md-4 col-sm-12">
                        <label for="infraccion">Infraccion:</label>
                        <input type="text" id="infraccion" name="infraccion" class="form-control" value="<?= $internado['infraccion'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="codigoOficial">Codigo Oficial:</label>
                        <input type="text" id="codigoOficial" name="codigoOficial" class="form-control" value="<?= $internado['cod_oficial'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="oficial">Oficial:</label>
                        <input type="text" id="oficial" name="oficial" class="form-control" value="<?= $internado['oficial'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="grado">Grado:</label>
                        <input type="text" id="grado" name="grado" class="form-control" value="<?= $internado['grado'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="subUnidad">Sub Unidad:</label>
                        <input type="text" id="subUnidad" name="subUnidad" class="form-control" value="<?= $internado['sub_unidad'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="deposito">Deposito:</label>
                        <input type="text" id="deposito" name="deposito" class="form-control" value="<?= $internado['deposito'] ?>" required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="fechaIngreso">Fecha de Ingreso:</label>
                        <input type="date" id="fechaIngreso" name="fechaIngreso" class="form-control" value="<?= $internado['fch_ing'] ?>" readonly required>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="fechaSalida">Fecha de Salida:</label>
                        <input type="date" id="fechaSalida" name="fechaSalida" class="form-control" disabled>
                        <span style="color: orange; font-size: 12px">(Opcional)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- DATOS DEL ESTADO DE CARROCERIA -->
        <div class="card">
            <div class="card-header" id="carroceria">
                <h5 class="mb-0">
                    <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#deCarroceria" aria-expanded="false" aria-controls="deCarroceria">
                        Estado Carroceria
                    </a>
                </h5>
            </div>

            <div id="deCarroceria" class="collapse" aria-labelledby="carroceria" data-parent="#accordion">
                <div class="card-body row px-3">
                    <!-- DATOS PARTE EXTERIOR -->
                    <div class="col-sm-12 col-md-4 py-2">
                        <div class="border">
                            <h3 class="text-center my-3">Parte Exterior</h3>
                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="faroGrande">Faro Grande D.: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="faroGrande1" name="faroGrande" class="form-check-input" value="1" <?= $internado['faro_grande'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="faroGrande1">Si</label>
                                    <br>
                                    <input type="radio" id="faroGrande2" name="faroGrande" class="form-check-input" value="0" <?= $internado['faro_grande'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="faroGrande2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="faroChico">Faro Chico D.: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="faroChico1" name="faroChico" class="form-check-input" value="1" <?= $internado['faro_chico'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="faroChico1">Si</label>
                                    <br>
                                    <input type="radio" id="faroChico2" name="faroChico" class="form-check-input" value="0" <?= $internado['faro_chico'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="faroChico2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="farosPosteriores">Faros Posteriores: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="farosPosteriores1" name="farosPosteriores" class="form-check-input" value="1" <?= $internado['faro_posterior'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="farosPosteriores1">Si</label>
                                    <br>
                                    <input type="radio" id="farosPosteriores2" name="farosPosteriores" class="form-check-input" value="0" <?= $internado['faro_posterior'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="farosPosteriores2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="biceles">Biceles: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="biceles1" name="biceles" class="form-check-input" value="1" <?= $internado['biceles'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="biceles1">Si</label>
                                    <br>
                                    <input type="radio" id="biceles2" name="biceles" class="form-check-input" value="0" <?= $internado['biceles'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="biceles2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="limParabrisas">Limp. Parabrisas: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="limParabrisas1" name="limParabrisas" class="form-check-input" value="1" <?= $internado['limpia_parabrisas'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="limParabrisas1">Si</label>
                                    <br>
                                    <input type="radio" id="limParabrisas2" name="limParabrisas" class="form-check-input" value="0" <?= $internado['limpia_parabrisas'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="limParabrisas2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="lunas">Lunas: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="lunas1" name="lunas" class="form-check-input" value="1" <?= $internado['lunas'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="lunas1">Si</label>
                                    <br>
                                    <input type="radio" id="lunas2" name="lunas" class="form-check-input" value="0" <?= $internado['lunas'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="lunas2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-4">
                                    <label for="llantas">Llantas: </label>
                                </div>
                                <input type="number" min="1" max="20" id="llantas" name="llantas" class="ml-5" class="form-control" value="<?= $internado['llantas'] ?>" required>
                            </div>´
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="vasos">Vasos: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="vasos1" name="vasos" class="form-check-input" value="1" <?= $internado['vasos'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="vasos1">Si</label>
                                    <br>
                                    <input type="radio" id="vasos2" name="vasos" class="form-check-input" value="0" <?= $internado['vasos'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="vasos2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="espExterior">Espejo Exterior: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="espExterior1" name="espExterior" class="form-check-input" value="1" <?= $internado['espejo_exterior'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="espExterior1">Si</label>
                                    <br>
                                    <input type="radio" id="espExterior2" name="espExterior" class="form-check-input" value="0" <?= $internado['espejo_exterior'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="espExterior2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="antena">Antena: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="antena1" name="antena" class="form-check-input" value="1" <?= $internado['antena'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="antena1">Si</label>
                                    <br>
                                    <input type="radio" id="antena2" name="antena" class="form-check-input" value="0" <?= $internado['antena'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="antena2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="chapas">Chapas: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="chapas1" name="chapas" class="form-check-input" value="1" <?= $internado['chapas'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="chapas1">Si</label>
                                    <br>
                                    <input type="radio" id="chapas2" name="chapas" class="form-check-input" value="0" <?= $internado['chapas'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="chapas2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="parachoques">Parachoques: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="parachoques1" name="parachoques" class="form-check-input" value="1" <?= $internado['parachoques'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="parachoques1">Si</label>
                                    <br>
                                    <input type="radio" id="parachoques2" name="parachoques" class="form-check-input" value="0" <?= $internado['parachoques'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="parachoques2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="llantaRepuesto">Llanta Repuesto: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="llantaRepuesto1" name="llantaRepuesto" class="form-check-input" value="1" <?= $internado['llanta_repuesto'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="llantaRepuesto1">Si</label>
                                    <br>
                                    <input type="radio" id="llantaRepuesto2" name="llantaRepuesto" class="form-check-input" value="0" <?= $internado['llanta_repuesto'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="llantaRepuesto2">No</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- DATOS PARTE INTERIOR -->
                    <div class="col-sm-12 col-md-4 py-2">
                        <div class="border">
                            <h3 class="text-center my-3">Parte Interior</h3>
                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="tablero">Tablero: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="tablero1" name="tablero" class="form-check-input" value="1" <?= $internado['tablero'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="tablero1">Si</label>
                                    <br>
                                    <input type="radio" id="tablero2" name="tablero" class="form-check-input" value="0" <?= $internado['tablero'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="tablero2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="chapaContacto">Chap Contacto: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="chapaContacto1" name="chapaContacto" class="form-check-input" value="1" <?= $internado['chapa_contacto'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="chapaContacto1">Si</label>
                                    <br>
                                    <input type="radio" id="chapaContacto2" name="chapaContacto" class="form-check-input" value="0" <?= $internado['chapa_contacto'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="chapaContacto2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="radio">Radio: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="radio1" name="radio" class="form-check-input" value="1" <?= $internado['radio'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="radio1">Si</label>
                                    <br>
                                    <input type="radio" id="radio2" name="radio" class="form-check-input" value="0" <?= $internado['radio'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="radio2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="encendedor">Encendedor: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="encendedor1" name="encendedor" class="form-check-input" value="1" <?= $internado['encendedor'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="encendedor1">Si</label>
                                    <br>
                                    <input type="radio" id="encendedor2" name="encendedor" class="form-check-input" value="0" <?= $internado['encendedor'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="encendedor2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="pisos">Pisos: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="pisos1" name="pisos" class="form-check-input" value="1" <?= $internado['pisos'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="pisos1">Si</label>
                                    <br>
                                    <input type="radio" id="pisos2" name="pisos" class="form-check-input" value="0" <?= $internado['pisos'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="pisos2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="manijas">Manijas: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="manijas1" name="manijas" class="form-check-input" value="1" <?= $internado['manijas'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="manijas1">Si</label>
                                    <br>
                                    <input type="radio" id="manijas2" name="manijas" class="form-check-input" value="0" <?= $internado['manijas'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="manijas2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="ceniceros">Ceniceros: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="ceniceros1" name="ceniceros" class="form-check-input" value="1" <?= $internado['ceniceros'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="ceniceros1">Si</label>
                                    <br>
                                    <input type="radio" id="ceniceros2" name="ceniceros" class="form-check-input" value="0" <?= $internado['ceniceros'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="ceniceros2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="parasoles">Parasoles: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="parasoles1" name="parasoles" class="form-check-input" value="1" <?= $internado['parasoles'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="parasoles1">Si</label>
                                    <br>
                                    <input type="radio" id="parasoles2" name="parasoles" class="form-check-input" value="0" <?= $internado['parasoles'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="parasoles2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="espInterior">Espejo Int.: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="espInterior1" name="espInterior" class="form-check-input" value="1" <?= $internado['espejo_interior'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="espInterior1">Si</label>
                                    <br>
                                    <input type="radio" id="espInterior2" name="espInterior" class="form-check-input" value="0" <?= $internado['espejo_interior'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="espInterior2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="coderas">Coderas: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="coderas1" name="coderas" class="form-check-input" value="1" <?= $internado['coderas'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="coderas1">Si</label>
                                    <br>
                                    <input type="radio" id="coderas2" name="coderas" class="form-check-input" value="0" <?= $internado['coderas'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="coderas2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="gata">Gata: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="gata1" name="gata" class="form-check-input" value="1" <?= $internado['gata'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="gata1">Si</label>
                                    <br>
                                    <input type="radio" id="gata2" name="gata" class="form-check-input" value="0" <?= $internado['gata'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="gata2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="llaveRueda">Llave de Rueda: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="llaveRueda1" name="llaveRueda" class="form-check-input" value="1" <?= $internado['llave_rueda'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="llaveRueda1">Si</label>
                                    <br>
                                    <input type="radio" id="llaveRueda2" name="llaveRueda" class="form-check-input" value="0" <?= $internado['llave_rueda'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="llaveRueda2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="repuestos">Repuestos: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="repuestos1" name="repuestos" class="form-check-input" value="1" <?= $internado['repuestos'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="repuestos1">Si</label>
                                    <br>
                                    <input type="radio" id="repuestos2" name="repuestos" class="form-check-input" value="0" <?= $internado['repuestos'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="repuestos2">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- DATOS DEL MOTOR -->
                    <div class="col-sm-12 col-md-4 py-2">
                        <div class="border">
                            <h3 class="text-center my-3">Motor</h3>
                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="bateria"> Bateria: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="bateria1" name="bateria" class="form-check-input" value="1" <?= $internado['bateria'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="bateria1">Si</label>
                                    <br>
                                    <input type="radio" id="bateria2" name="bateria" class="form-check-input" value="0" <?= $internado['bateria'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="bateria2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="radiador">Radiador: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="radiador1" name="radiador" class="form-check-input" value="1" <?= $internado['radiador'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="radiador1">Si</label>
                                    <br>
                                    <input type="radio" id="radiador2" name="radiador" class="form-check-input" value="0" <?= $internado['radiador'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="radiador2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="arrancador">Arrancador: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="arrancador1" name="arrancador" class="form-check-input" value="1" <?= $internado['arrancador'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="arrancador1">Si</label>
                                    <br>
                                    <input type="radio" id="arrancador2" name="arrancador" class="form-check-input" value="0" <?= $internado['arrancador'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="arrancador2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="alternador">Alternador: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="alternador1" name="alternador" class="form-check-input" value="1" <?= $internado['alternador'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="alternador1">Si</label>
                                    <br>
                                    <input type="radio" id="alternador2" name="alternador" class="form-check-input" value="0" <?= $internado['alternador'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="alternador2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="carburador">Carburador: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="carburador1" name="carburador" class="form-check-input" value="1" <?= $internado['carburador'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="carburador1">Si</label>
                                    <br>
                                    <input type="radio" id="carburador2" name="carburador" class="form-check-input" value="0" <?= $internado['carburador'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="carburador2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="purificador">Purificador: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="purificador1" name="purificador" class="form-check-input" value="1" <?= $internado['purificador'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="purificador1">Si</label>
                                    <br>
                                    <input type="radio" id="purificador2" name="purificador" class="form-check-input" value="0" <?= $internado['purificador'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="purificador2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="distribuidor">Distribuidor: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="distribuidor1" name="distribuidor" class="form-check-input" value="1" <?= $internado['distribuidor'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="distribuidor1">Si</label>
                                    <br>
                                    <input type="radio" id="distribuidor2" name="distribuidor" class="form-check-input" value="0" <?= $internado['distribuidor'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="distribuidor2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="bobina">Bobina: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="bobina1" name="bobina" class="form-check-input" value="1" <?= $internado['bobina'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="bobina1">Si</label>
                                    <br>
                                    <input type="radio" id="bobina2" name="bobina" class="form-check-input" value="0" <?= $internado['bobina'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="bobina2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="tapaAceite">Tapa Aceite: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="tapaAceite1" name="tapaAceite" class="form-check-input" value="1" <?= $internado['tapa_aceite'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="tapaAceite1">Si</label>
                                    <br>
                                    <input type="radio" id="tapaAceite2" name="tapaAceite" class="form-check-input" value="0" <?= $internado['tapa_aceite'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="tapaAceite2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="bujias">Bujias: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="bujias1" name="bujias" class="form-check-input" value="1" <?= $internado['bujias'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="bujias1">Si</label>
                                    <br>
                                    <input type="radio" id="bujias2" name="bujias" class="form-check-input" value="0" <?= $internado['bujias'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="bujias2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="fusibles">Fusibles: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="fusibles1" name="fusibles" class="form-check-input" value="1" <?= $internado['fusibles'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="fusibles1">Si</label>
                                    <br>
                                    <input type="radio" id="fusibles2" name="fusibles" class="form-check-input" value="0" <?= $internado['fusibles'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="fusibles2">No</label>
                                </div>
                            </div>
                            <hr>

                            <div class="row col-md-12 col-sm-6">
                                <div class="col-md-6 col-sm-12">
                                    <label for="revisionTecnica">Revision Tecnica: </label>
                                </div>
                                <div class="col-md-6 col-sm-12 form-check pl-5">
                                    <input type="radio" id="revisionTecnica1" name="revisionTecnica" class="form-check-input" value="1" <?= $internado['rev_tecnica'] == '1' ? 'checked' : "" ?>><label class="form-check-label" for="revisionTecnica1">Si</label>
                                    <br>
                                    <input type="radio" id="revisionTecnica2" name="revisionTecnica" class="form-check-input" value="0" <?= $internado['rev_tecnica'] == '0' ? 'checked' : "" ?>><label class="form-check-label" for="revisionTecnica2">No</label>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <label for="observacion">Observaciones:</label>
                <input type="text" id="observacion" name="observacion" class="form-control" value="<?= $internado['obs'] ?>" required>
            </div>
            <div class="col-md-4 col-sm-12">
                <label for="celular">Numero Celular:</label>
                <input type="text" maxlength="9" id="celular" name="celular" class="form-control" value="<?= $internado['celular'] ?>" required>
            </div>
            <div class="col-md-4 col-sm-12">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= $internado['email'] ?>" required>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Actualizar Datos</button>
        </div>
    </form>
</div>