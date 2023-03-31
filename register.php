<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="css/register.css">

    <title>Registro</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form id="register" action="" novalidate>
                    <h2>Registro</h2>
                    <div class="inputbox">
                        <input id="user" name="user" type="user" required>
                        <label for="">Usuario</label>
                    </div>
                    <div class="inputbox">
                        <input id="pass" name="pass" type="password" required>
                        <label for="">Contraseña</label>
                    </div>
                    <div class="inputbox">
                        <input id="repass" name="repass" type="password" required>
                        <label for="">Confirme Contraseña</label>
                    </div>
                    <button type="submit" id="log-button">Registrar</button>
                    <div class="register">
                        <p>
                            Ir a <a href="./index.php">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="js/register.js"></script>
</body>
</html>
