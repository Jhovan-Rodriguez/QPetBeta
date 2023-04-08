//Establecimineto de modo estricto de JS
'use strict'

//Declaración de variables para las validaciones y colocación de elementos
const forms = document.querySelectorAll('.needs-validation');
const formulario = document.querySelector('#form_veterinaria');

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
        

    }
    form.classList.add('was-validated')
  }, false)
})
