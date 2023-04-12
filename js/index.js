$(document).ready(
    function() {
        // Credenciales por defecto
        const admin_user = 'admin';
        const admin_password = 'admin';
        // Parametros del Modal
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
        });
        // Ejecuta funcion de validacion cuando se oprima el boton
        $('#log-button').click(
            function(event){
                event.preventDefault();
                // Guarda los valores de los campos
                let user = $('#user').val();
                let password = $('#password').val();
                // Validaciones, dependiedo del input, sera el modal expuesto
                // Si se llena los datos correctamente manda al dashboard
                if (user == admin_user && password == admin_password)
                    location.href = './pages/mis_mascotas.html'
                else if (user == '' || password == '') {
                    Toast.fire({
                        icon: 'info',
                        title: 'Datos Incompletos'
                    })
                } else if (user != admin_user || password != admin_password) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Datos Incorrectos'
                    })
                }
            }
        )
    }
)
