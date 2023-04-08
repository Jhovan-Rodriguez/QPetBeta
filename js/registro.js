//Establecimineto de modo estricto de JS
'use strict'

//Declaración de variables para las validaciones y colocación de elementos
const forms = document.querySelectorAll('.needs-validation');
const formulario = document.querySelector('#formulario');

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
      })

    }else{
        //Se colocan los valores en el modal
        event.preventDefault();
        var datos = $(this).serialize();
        $.ajax({ 
            type: "POST",
            url: "./controller/registrar.php",
            data: datos,
            success: function (r) {
                console.log(r);
                var jsonData = JSON.parse(r);
                if (jsonData.status == 1) {
                  Swal.fire(
                    'Registro exitoso!',
                    'El usuario se registró correctamente!',
                    'success'
                  );
                } else if (jsonData.status == 0) {
                    console.log(jsonData);
                    Toast.fire({
                        icon: 'error',
                        title: 'Datos Incorrectos'
                    });
                }
            }
        });
        

    }
    form.classList.add('was-validated')
  }, false)
})
