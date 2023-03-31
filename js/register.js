$(document).ready(function () {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
    });

    $('#register').submit(function () {
        if (($('#user').val() != "") && ($('#pass').val() != "") && ($('#repass').val() != "")) {
            if($('#pass').val() != $('#repass').val()){
                Toast.fire({
                    icon: 'error',
                    title: 'Las contraseñas no son iguales'
                });
                return false;   
            }
            var datos = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "./controlador/registrar.php",
                data: datos,
                success: function (r) {
                    console.log(r);
                    var jsonData = JSON.parse(r);
                    if (jsonData.status == 1) {
                        Swal.fire(
                            'Registro exitoso!',
                            'El usuario se registró correctamente!',
                            'success'
                          )
                    } else if (jsonData.status == 0) {
                        console.log(jsonData);
                        Swal.fire(
                            'Error!',
                            'No se pudo registrar el usuario!',
                            'error'
                          )
                          
                    }
                }
            });
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Campos vacíos'
            });        
        }
        return false;
    });



});

/*

*/