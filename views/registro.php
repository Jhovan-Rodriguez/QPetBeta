<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
    <meta charset="utf-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="../css/registro.css">
</head>

<body>
    <div class="wrapper">
        <div class="image-holder">
            <img src="../img/login2.jpg" alt="">
        </div>
        <div class="form-inner">
            <form action="" id="formulario" class="needs-validation" novalidate>
                <div class="form-header">
                    <h3>Registrate</h3>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="nombre">Nombre:</label>
                            <input required type="text" placeholder="Nombre" class="form-control" name="nombre">
                        </div>
                        <div class="col">
                            <label for="nombre">Username:</label>
                            <input required type="text" placeholder="Username" class="form-control" name="username">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="apellido_p">Apellido paterno:</label>
                            <input required type="text" placeholder="Apellido paterno" class="form-control"
                                name="apellido_p">
                        </div>
                        <div class="col">
                            <label for="apellido_m">Apellido materno:</label>
                            <input required type="text" placeholder="Apellido materno" class="form-control"
                                name="apellido_m">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="email">E-mail:</label>
                            <input required type="email" placeholder="E-mail" class="form-control" name="email">
                        </div>
                        <div class="col">
                            <label for="telefono">Teléfono:</label>
                            <input required type="number" placeholder="Teléfono" class="form-control" name="telefono">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="genero">Genero:</label>
                            <select required id="genero" name="genero" class="form-select">
                                <option value="">Seleccionar</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">No especificar</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="fecha_nac">Fecha de nacimiento:</label>
                            <input required type="date" class="form-control" name="fecha_nac">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="pass">Contraseña:</label>
                            <input required type="password" placeholder="Contraseña" class="form-control" name="pass">
                        </div>
                        <div class="col">
                            <label for="pass2">Confirma contraseña:</label>
                            <input required type="password" placeholder="Confirme contraseña" class="form-control"
                                name="pass2">
                        </div>

                    </div>

                </div>
                <button type="submit">Crear cuenta</button>
            </form>
        </div>

    </div>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <script src="../js/registro.js"></script>
</body>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
