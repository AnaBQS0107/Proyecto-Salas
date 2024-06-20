$(document).ready(function () {
    $('#formBusqueda').submit(function (event) {
        event.preventDefault(); // Evitar que el formulario se envíe

        var busquedaNombre = $('#busquedaNombre').val().toLowerCase();

        $('.producto').each(function () {
            var nombreProducto = $(this).find('.card-title').text().toLowerCase();

            if (nombreProducto.includes(busquedaNombre)) {
                $(this).show(); // Mostrar la tarjeta si el nombre coincide con la búsqueda
            } else {
                $(this).hide(); // Ocultar la tarjeta si el nombre no coincide
            }
        });

        // Limpiar el label de búsqueda
        $('#labelBusqueda').text('Buscar por nombre:');

        // Limpiar el input de búsqueda
        $('#busquedaNombre').val('');
    });
});
