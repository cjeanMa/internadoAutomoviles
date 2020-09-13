<div class="container">
    <h2 class="text-center">Datos para el acta de control</h2>

    <form action="<?= base_url('internamiento/verificado/' . $internado['cod_boleta']) ?>" method="POST" class="group-form">

        <h5>DATOS DEL INFRACTOR</h5>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-4 form-group">
                <label for="infractor">Nombre del Infractor:</label>
                <input type="text" name="infractor" id="infractor" value="<?= $internado['chofer'] ?>" disabled class="form-control">
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="dni">Doc. Identidad (Infractor):</label>
                <input type="text" name="dni" id="dni" class="form-control">
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="domicilioInfractor"> Domicilio Infractor:</label>
                <input type="text" name="domicilioInfractor" id="domicilioInfractor" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="distrito"> Distrito:</label>
                <input type="text" name="distrito" id="distrito" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="provincia">Provincia:</label>
                <input type="text" name="provincia" id="provincia" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="departamento">departamento:</label>
                <input type="text" name="departamento" id="departamento" class="form-control" required>
            </div>
        </div>

        <br>

        <h5>DATOS DEL VEHICULO</h5>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-4 form-group">
                <label for="placa">Numero de Placa:</label>
                <input type="text" name="placa" id="placa" value="<?= $internado['placa'] ?>" disabled class="form-control">
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="oficinaRegistral">Oficina Registral:</label>
                <input type="text" name="oficinaRegistral" id="oficinaRegistral" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="tarjetaPropiedad"> Tarjeta de Propiedad:</label>
                <input type="text" name="tarjetaPropiedad" id="tarjetaPropiedad" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-6 form-group">
                <label for="razonSocial"> Razon Social:</label>
                <input type="text" name="razonSocial" id="razonSocial" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-6 form-group">
                <label for="tipoServicio">Tipo Servicio:</label>
                <input type="text" name="tipoServicio" id="tipoServicio" class="form-control" required>
            </div>
        </div>

        <br>

        <h5>DATOS DE LA INFRACCION</h5>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-6 form-group">
                <label for="infraccion">Codigo de Infraccion:</label>
                <input type="text" name="infraccion" id="infraccion" value="<?= $internado['infraccion'] ?>" disabled class="form-control">
            </div>

            <div class="col-sm-12 col-md-6 form-group">
                <label for="fechaInfraccion"> Fecha de Internamiento:</label>
                <input type="text" name="fechaInfraccion" id="fechaInfraccion" value="<?= $internado['fch_ing'] ?>" disabled class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="lugarInfraccion">Lugar Infraccion:</label>
                <input type="text" name="lugarInfraccion" id="lugarInfraccion" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="distritoInfraccion"> Distrito Infraccion:</label>
                <input type="text" name="distritoInfraccion" id="distritoInfraccion" class="form-control" required>
            </div>


            <div class="col-sm-12 col-md-4 form-group">
                <label for="medidaPreventiva">Medida Preventiva:</label>
                <select name="medidaPreventiva" id="medidaPreventiva" class="form-control" required>
                    <option value=""> --Seleccione--</option>
                    <option value="Retencion de casquete"> Retencion de Casquete</option>
                    <option value="Internamiento de Vehiculo"> Internamiento de Vehiculo</option>
                    <option value="Grua"> Grua</option>
                </select>
            </div>

            <div class="col-sm-12 col-md-6 form-group">
                <label for="observacionIMT">Observacion IMT:</label>
                <textarea name="observacionIMT" id="observacionIMT" cols="30" rows="5" class="form-control"></textarea>
            </div>

            <div class="col-sm-12 col-md-6 form-group">
                <label for="observacion">Observacion de Ingreso:</label>
                <textarea name="observacion" id="observacion" cols="30" rows="5" placeholder="<?= $internado['obs'] ?>" disabled class="form-control"></textarea>
            </div>

        </div>

        <br>

        <h5>DATOS DE AUTORIDAD QUE LEVANTA ACTA</h5>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-4 form-group">
                <label for="nombreAutoridad">Nombre Autoridad:</label>
                <input type="text" name="nombreAutoridad" id="nombreAutoridad" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="apAutoridad">Apellido Paterno Autoridad:</label>
                <input type="text" name="apAutoridad" id="apAutoridad" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="amAutoridad"> Apellido Materno Autoridad:</label>
                <input type="text" name="amAutoridad" id="amAutoridad" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="nombreTestigo">Nombre Testigo:</label>
                <input type="text" name="nombreTestigo" id="nombreTestigo" class="form-control">
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="apTestigo">Apellido Paterno Testigo:</label>
                <input type="text" name="apTestigo" id="apTestigo" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-4 form-group">
                <label for="amTestigo"> Apelido Materno Testigo:</label>
                <input type="text" name="amTestigo" id="amTestigo" class="form-control" required>
            </div>

            <div class="col-sm-12 col-md-12 form-group">
                <label for="pruebaTestigo"> Prueba de Testigo:</label>
                <select name="pruebaTestigo" id="pruebaTestigo" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    <option value="Filmico">Filmico</option>
                    <option value="Fotografico">Fotografico</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
        </div>

        <hr>
        <button type="submit" class="btn btn-success btn-block">Guardar Datos de Acta</button>
    </form>
</div>