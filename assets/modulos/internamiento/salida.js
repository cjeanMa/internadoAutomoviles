
var btnSubmit = {
    inputPlaca: false,
    captcha: false
}


//Para responder al reCaptcha

function captchaConfirm() {
    btnSubmit.captcha = true;
    verificarSubmit();
}



function verificarSubmit() {
    if (btnSubmit.inputPlaca && btnSubmit.captcha) {
        $('#enviar').attr("disabled", false);
    }
    else {
        $('#enviar').attr("disabled", true);
    }
}

$(document).ready(function () {
    //Para validacion del documento
    $('#pdf').bind('change', function () {
        let mb = parseInt(this.files[0].size);
        let extension = this.files[0].type;
        if (mb <= 3670016) {
            if (extension != "application/pdf") {
                $('#preview').attr('hidden', true);
                $('#pdf').val("");
                $('#mFile').html(`<div class='alert alert-danger'>Necesita ser un archivo .pdf<div>`);
            }
            else {
                file = document.getElementById("pdf").files[0];
                file_url = URL.createObjectURL(file);
                $('#preview').attr('src', file_url);
                $('#preview').attr('hidden', false);
                $('#mFile').html("");
            }
        }
        else {
            $('#preview').attr('hidden', true);
            $('#pdf').val("");
            $('#mFile').html(`<div class='alert alert-danger'>Archivo muy pesado - max 3.5 MB.<div>`);
        }
    });

    //Para verificar la placa
    $('#placa').change(function () {
        data = "placa=" + this.value;
        $.ajax({
            type: 'POST',
            url: '../internamiento/verificacionPlaca',
            data: data,
            success: function (a) {
                /* $('#mPlaca').html("<div class='alert alert-success'>Vehiculo encontrado</div>"); */
                $('#mPlaca').html(a);
                btnSubmit.inputPlaca = true;
                verificarSubmit();

            },
            error: function (a) {
                console.log(a);
            }
        })
    })

})
