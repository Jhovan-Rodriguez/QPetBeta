$(document).ready(function() {
    // Busca todos los botones con la clase "btn-outline-primary"
    $('#agendarCita').click(function() {
        $('#modalAgendarCita').show();
    });

    $('.cerrar').click(function() {
        $('#modalAgendarCita').hide();
    });

    $('#agendarButton').click(function() {
        // Obtiene el valor del atributo "data-id" del botón clickeado
        var data = $('#agendar').serialize()
    
        // Envia el valor del atributo "data-id" al archivo PHP mediante AJAX
        $.ajax({
            url: '../controller/reg_cita.php',
            type: 'POST',
            data: data,
            success: function(response) {
                response = JSON.parse(response);
                if (response.status == 1){
                    Swal.fire(
                        'Registro exitoso!',
                        'La cita se agendó correctamente!',
                        'success'
                    )
                }else{
                    Swal.fire(
                        'Registro fallido!',
                        'La cita no se agendó correctamente!',
                        'error'
                    );
                }
            }
        });
    });
});
  