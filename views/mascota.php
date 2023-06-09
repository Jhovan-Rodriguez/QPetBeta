<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("Location:./404.php");
}
include("../controller/db_pets.php");
$id_mascota = $_REQUEST['id_mascota'];
?>
<head>
    <meta charset="utf-8">
    <title>Mascota</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                <?php
                #Se busca la informacion de la mascota en la funcion del controlador
                $mascota_info=search_pet($id_mascota);
                ?>
                <div class="col-md-5">
                    <form method="POST" action="actualizar_mascota.php">
                        <input type="hidden" name="id_mascota"
                            value="<?php echo $_POST['id_mascota'];?>">
                        <button type="submit" id="datos_mascota"
                            class="btn btn-outline-primary m-2" data-bs-target="#staticBackdrop" ><i
                                class="fa-solid fa-pen-to-square m-2"></i>Modificar
                        </button>
                    </form>
                </div> 
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-6">
                        <img src="https://cdn-icons-png.flaticon.com/512/3047/3047886.png">
                    </div>
                    <?php
                    #Se recorre el objeto para colocar la informacion de la mascota
                    foreach($mascota_info as $data=>$datos_mascota){
                    ?>
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-tag fa-fade fa-3x" style="color: #009cff;"></i>
                            <div class="ms-3">
                                <h6 class="mb-0">Nombre</h6>
                                <p class="mb-2"><?php echo $datos_mascota['nombre']; ?></p>
                            </div>
                        </div>
                        <p></p>
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-paw fa-fade fa-3x" style="color: #009cff;"></i>
                            <div class="ms-3">
                                <h6 class="mb-0">Especie</h6>
                                <p class="mb-2"><?php echo $datos_mascota['especie']; ?></p>
                            </div>
                        </div>
                        <p></p>
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-fade fa-3x text-primary"></i>
                            <div class="ms-3">
                                <h6 class="mb-0">Raza</h6>
                                <p class="mb-2"><?php echo $datos_mascota['raza']; ?></p>
                            </div>
                        </div>
                        <p></p>
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-calendar fa-fade fa-3x" style="color: #009cff;"></i>
                            <div class="ms-3">
                                <h6 class="mb-0">Fecha nacimiento</h6>
                                <p class="mb-2"><?php echo $datos_mascota['fecha_nacimiento']; ?></p>
                            </div>
                        </div>
                        <p></p>
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-weight-hanging fa-fade fa-3x" style="color: #009cff;"></i>
                            <div class="ms-3">
                                <h6 class="mb-0">Peso</h6>
                                <p class="mb-2"><?php echo $datos_mascota['peso']; ?></p>
                            </div>
                        </div>
                        <p></p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-12">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-up-down fa-fade fa-3x" style="color: #009cff;"></i>
                        <div class="ms-3">
                            <h6 class="mb-0">Altura</h6>
                            <p class="mb-2"><?php echo $datos_mascota['altura']; ?> cm</p>
                        </div>
                    </div>
                    <p></p>
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-venus-mars fa-fade fa-3x" style="color: #009cff;"></i>
                        <div class="ms-3">
                            <h6 class="mb-0">Sexo</h6>
                            <?php if($datos_mascota['sexo'] == 1){  ?>
                                <p class="mb-2">Macho</p>
                            <?php } else{ ?>
                                <p class="mb-2">Hembra</p>
                            <?php } ?>
                        </div>
                    </div>
                    <p></p>
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-pen fa-fade fa-3x" style="color: #009cff;"></i>
                        <div class="ms-3">
                            <h6 class="mb-0">Descripción</h6>
                            <p class="mb-2"><?php echo $datos_mascota['descripcion']; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Footer Start -->
            <?php
            include("../layouts/footer.php");
            ?>
            <!-- Footer End -->
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