$(document).ready(function() {
    // Busca todos los botones con la clase "btn-outline-primary"
    $('#datos_mascota').click(function() {
      // Obtiene el valor del atributo "data-id" del botón clickeado
      var dataId = $(this).data('id');
  
      // Envia el valor del atributo "data-id" al archivo PHP mediante AJAX
      $.ajax({
        url: '../views/mascota.php',
        type: 'POST',
        data: { id: dataId },
        success: function(response) {
            window.location.href = '../views/mascota.php';
            // Aquí puedes manejar la respuesta del servidor
          console.log(response);
        }
      });
    });
  });
  