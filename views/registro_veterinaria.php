<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("Location:./404.php");
}
include_once("../controller/db_users.php");

?>

<head>
    <meta charset="utf-8">
    <title>Registrar veterinaria</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <?php
        include("../layouts/aside.php");
        ?>

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
            include("../layouts/nav.php");
            ?>
            <!-- Navbar End -->
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h3 class="mb-4">Registro veterinaria</h3>
                        <?php
                        $datos_usuario = search($_SESSION['user']);
                        ?>
                        <form action="" id="form_veterinaria" class="needs-validation" novalidate>
                        <h6>Datos de veterinaria</h6>
                            <div class="form-group">
                                <label for="nombre">Nombre de veterinaria</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-hospital-fill"></i></span>
                                    <input required type="text" class="form-control" name="nombre"
                                        placeholder="Nombre veterinaria">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                    <input required type="number" class="form-control" name="telefono" placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope-paper-fill"></i></span>
                                    <textarea required class="form-control" name="descripcion"></textarea>
                                </div>
                            </div>
                            <br>
                            <h6>Dirección</h6>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="colonia">Colonia</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                                            <input required type="text" class="form-control" name="colonia"placeholder="Colonia">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="calle">Calle</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-house"></i></span>
                                            <input required type="text" class="form-control" name="calle"placeholder="Calle">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nombre">Código postal</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-compass-fill"></i></span>
                                            <input required type="number" class="form-control" name="cp" placeholder="Código postal">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="form-group">
                                <h6>Horarios</h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="">Lunes - Viernes</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-door-open-fill"></i></span>
                                            <input required type="time" class="form-control" name="semana_open">
                                        </div>
                                        <br>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-door-closed-fill"></i></span>
                                            <input required type="time" class="form-control" name="semana_close">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Sábado</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-door-open-fill"></i></span>
                                            <input required type="time" class="form-control" name="sabado_open">
                                        </div>
                                        <br>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-door-closed-fill"></i></span>
                                            <input required type="time" class="form-control" name="sabado_close">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Domingo</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-door-open-fill"></i></span>
                                            <input required type="time" class="form-control" name="domingo_open">
                                        </div>
                                        <br>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-door-closed-fill"></i></span>
                                            <input required type="time" class="form-control" name="domingo_close">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-outline-success me-md-2" type="submit">Registrar
                                    veterinaria</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
            <?php
            include("../layouts/footer.php");
            ?>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <script src="../js/reg_veterinaria.js"></script>
</body>

</html>