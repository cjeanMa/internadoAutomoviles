$(document).ready(()=>{
    const base_url = $('#base_url').val();
    let inputIngresoInit = $('#fechaIngresoInit');
    let inputIngresoEnd = $('#fechaIngresoEnd');
    let inputSalidaInit = $('#fechaSalidaInit');
    let inputSalidaEnd = $('#fechaSalidaEnd');
    let frameIngreso = $('#frameIngreso');
    let frameSalida = $('#frameSalida');
    let btnIngreso = $('#verReporteIngreso');
    let btnSalida = $('#verReporteSalida');


    inputIngresoInit.change(()=>{
        let val = inputIngresoInit.val();
        inputIngresoEnd.attr({
            'min': val,
            'disabled' : false,
        });
        inputIngresoEnd.val("");
        btnIngreso.attr('disabled', true);
    })

    inputIngresoEnd.change(()=>{
        let val = inputIngresoEnd.val();
        if(val!=""){
            btnIngreso.attr('disabled', false)
        }
    })

    btnIngreso.click(()=>{
        frameIngreso.attr({
            'hidden': false,
            'src': `${base_url}/reporteIngreso/${inputIngresoInit.val()}/${inputIngresoEnd.val()}`
        })
    })

    btnSalida.click(()=>{
        frameSalida.attr({
            'hidden': false,
            'src': `${base_url}/reporteSalida/${inputSalidaInit.val()}/${inputSalidaEnd.val()}`
        })
    })


    inputSalidaInit.change(()=>{
        let val = inputSalidaInit.val();
        inputSalidaEnd.attr({
            'min': val,
            'disabled' : false,
        });
        inputSalidaEnd.val("");
        btnSalida.attr('disabled', true);
    })

    inputSalidaEnd.change(()=>{
        let val = inputSalidaEnd.val();
        if(val!=""){
            btnSalida.attr('disabled', false)
        }
    })

    btnSalida.click(()=>{
        console.log(inputSalidaInit.val(), inputSalidaEnd.val());
        console.log(base_url);
    })

})