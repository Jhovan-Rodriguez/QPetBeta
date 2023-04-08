$(document).ready(function () {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
    });

    $('#login').submit(function () {
        if (($('#user').val() != "") && ($('#pass').val() != "")) {
            var datos = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "./controller/login.php",
                data: datos,
                success: function (r) {
                    console.log(r);
                    var jsonData = JSON.parse(r);
                    if (jsonData.status == 1) {
                        window.location.href = "./views/mismascotas.php";
                    } else if (jsonData.status == 0) {
                        console.log(jsonData);
                        Toast.fire({
                            icon: 'error',
                            title: 'Datos Incorrectos'
                        });
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