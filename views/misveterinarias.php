<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("Location:./404.php");
}
include_once("../controller/db_veterinary.php");
?>

<head>
    <meta charset="utf-8">
    <title>Mis veterinarias</title>
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
    <link rel="stylesheet" href="../css/mis_mascotas.css">

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
        $veterinarias = get_veterinaries($_SESSION['id']);
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
                <div class="row g-4">
                    <div class="bg-light rounded h-100 p-4">
                        <h4 class="mb-4">Veterinarias</h4>
                        <div class="container mt-5 mb-3">
                            <div class="row">
                                <?php
                                foreach ($veterinarias as $datos => $data) {
                                    ?>
                                    <div class="col-md-4" style="margin-top:10px;">
                                        <div class="card p-4 mb-2 h-100">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="ms-2 c-details">
                                                        <h6 class="mb-0"> <?php echo $data['nombre'] ?> </h6> 
                                                        <span> <?php echo $data['calle'] ?> </span>
                                                        <span> <?php echo $data['telefono'] ?> </span>
                                                    </div>
                                                </div>
                                                <div class="badge"> 
                                                    <?php if($data['disponible'] == 1){ ?>
                                                        <span> Disponible </span> 
                                                    <?php }else{ ?>
                                                        <span> No disponible </span> 
                                                    <?php } ?>   
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <form method="POST" action="veterinaria.php">
                                                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                                    <input type="hidden" name="id_veterinaria" value="<?php echo $data['id']; ?>">
                                                    <button type="submit" id="datos_veterinaria" class="btn btn-outline-primary w-100">
                                                        <i class="bi bi-house-heart me-2"></i>Ver más de <?php echo $data['nombre'] ?>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                
                                <div class="col-md-4" style="margin-top:10px;">
                                    <div class="card text-center h-100" >
                                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h5 class="card-title">Consultar veterinaria</h5>
                                            <a href="consultar_vet.php">
                                                <button type="button" class="btn btn-lg btn-lg-square btn-outline-primary m-2">
                                                <i class="bi bi-house-heart"></i>
                                                </button>
                                            </a>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
</body>

</html>