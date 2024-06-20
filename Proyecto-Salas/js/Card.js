$(document).ready(function () {
    $('#formBusqueda').submit(function (event) {
        event.preventDefault(); 

        var busquedaNombre = $('#busquedaNombre').val().toLowerCase();

        $('.producto').each(function () {
            var nombreProducto = $(this).find('.card-title').text().toLowerCase();

            if (nombreProducto.includes(busquedaNombre)) {
                $(this).show(); 
            } else {
                $(this).hide(); 
            }
        });
    });
});