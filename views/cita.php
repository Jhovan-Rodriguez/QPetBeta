<!DOCTYPE html>
<html lang="en">
<?php
include("../controller/db_cita.php");
session_start();
if ($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("Location:./404.php");
}
$id_cita = $_REQUEST['id_cita'];
?>

<head>
    <meta charset="utf-8">
    <title>Perfil</title>
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
    <link rel="stylesheet" href="../css/perfil.css">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body class="profile-page">
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
            $info_cita = search_cita($id_cita);
            ?>
            <!-- Navbar End -->
            <div class="container-fluid pt-4 px-4">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <div class="card p-3 py-4" id="card_principal">
                                <div class="text-center mt-3">
                                    <div class="row">
                                        <div class="col">
                                            <h6>Fecha</h6>
                                            <p>
                                                <?php echo $info_cita['fecha'] ?>
                                            </p>
                                        </div>
                                        <div class="col">
                                            <h6>Hora</h6>
                                            <p>
                                                <?php echo $info_cita['hora']; ?>
                                            </p>
                                        </div>
                                        <h6>Comentario</h6>
                                        <p>
                                            <?php echo $info_cita['comentario']; ?>
                                        </p>
                                    </div>
                                    <br>
                                    <h5>Mascota</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4 text-center" style="margin-top:10px;">
                                            <div class="card p-4 mb-2 h-100">
                                                <div class="d-flex justify-content-between">
                                                    <div class=" flex-row align-items-center">
                                                        <?php if ($info_cita['especie'] == 'Perro') { ?>
                                                            <div class="icon mb-3"><img src="../img/happy.png"
                                                                    style="width: 25%; height: 25%;"
                                                                    alt="<?php echo $info_cita['nombre'] ?>"></div>
                                                        <?php } else { ?>
                                                            <div class="icon"><img src="../img/kitty.png"
                                                                    style="width: 25%; height: 25%;"
                                                                    alt="<?php echo $info_cita['nombre'] ?>"></div>
                                                        <?php } ?>
                                                        <div class="c-details">
                                                            <h6 class="mb-0">
                                                                <?php echo $info_cita['nombre'] ?>
                                                            </h6> <span>
                                                                <?php echo $info_cita['fecha_nacimiento'] ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="badge"> <span>
                                                            <?php echo $data['especie']; ?>
                                                        </span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6>Especie</h6>
                                            <p>
                                                <?php echo $info_cita['especie'] ?>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <h6>Raza</h6>
                                            <p>
                                                <?php echo $info_cita['raza'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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