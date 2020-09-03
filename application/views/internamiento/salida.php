<h2 class="text-center">Formulario de Levante de AutoMovil</h2>
        <form action="<?=base_url('internamiento/internadoSalida')?>" method="post" class="form-group row" enctype="multipart/form-data">
            <div class="col-md-6 col-sm-12">
                <label for="placa">Numero de Placa:</label>
                <input type="text" id="placa" name="placa" class="form-control" placeholder="Ejm. P05-TR1" required>
                
                <div id="mPlaca" class="my-3"></div>

                <label for="pdf">Documentos:</label>
                <input type="file" id="pdf" name="pdf" class="form-control-file" accept="application/pdf" required>
                <i style="font-size: 12px">Tipo de Archivo: .pdf - Tamaño Maximo: 3.5 MB</i>
 
                <div id="mFile" class="my-3"></div>

                <!-- <div class="col-12 g-recaptcha" data-sitekey="6LdbeLMZAAAAAEAZrMGzUTZPY9uMSconft3-IsI6" data-callback="captchaConfirm"></div> -->
            </div>
            <div class="col-md-6 col-sm-12">
                <iframe id="preview" class="my-3" width="100%" height="500px" hidden></iframe>
            </div>
            <hr>

            

            <div class="col-12">
                <hr>
                <button type="submit" id="enviar" name="enviar" class="btn btn-success btn-block" disabled="true">ACEPTAR</button>
            </div>
        </form>