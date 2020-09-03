$(document).ready(()=>{
    $('#tablaTodos').DataTable({
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "0 registros",
            "infoFiltered": "( _MAX_ registros encontrados)",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar en registros:",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        },
        lengthMenu: [10, 25, 50],
        responsive: true,
    });
})