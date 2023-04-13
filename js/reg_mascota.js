//Establecimineto de modo estricto de JS
'use strict'

//Declaración de variables para las validaciones y colocación de elementos
const forms = document.querySelectorAll('.needs-validation');
const formulario = document.querySelector('#form_mascota');

//Inicialización de alertas 
var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

// Validación del formulario Clientes
Array.from(forms).forEach(form => {
  form.addEventListener('submit', event => {
    if (!form.checkValidity()) {
      event.preventDefault()
      event.stopPropagation()
      Toast.fire({
        icon: 'error',
        title: 'Datos incompletos'
      });

    }else{
        //Se colocan los valores en el modal
        event.preventDefault();
        var datos = $(forms).serialize();
        $.ajax({ 
            type: "POST",
            url: "../controller/reg_mascota.php",
            data: datos,
            success: function (r) {
                console.log(r);
                var jsonData = JSON.parse(r);
                if (jsonData.status == 1) {
                  Swal.fire(
                    'Registro exitoso!',
                    'La mascota se registró correctamente!',
                    'success'
                  ).then(function() {
                    // Redirigir al usuario a la página deseada
                    window.location.href = '../views/mismascotas.php';
                  });
                } else if (jsonData.status == 0) {
                    console.log(jsonData);
                    Swal.fire(
                      'Registro fallido!',
                      'La mascota no se registró correctamente!',
                      'error'
                    );
                }
            }
        });
        

    }
    form.classList.add('was-validated')
  }, false)
})
