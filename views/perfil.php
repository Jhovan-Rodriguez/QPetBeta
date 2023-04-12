<!DOCTYPE html>
<html lang="en">
<?php
include("../controller/db_users.php");
include("../controller/db_pets.php");
session_start();
if ($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("Location:./404.php");
}
$user = $_SESSION['user'];
$id_usuario = $_SESSION['id'];
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
            $info_perfil = search($user);
            $user_mascotas = get_pets($id_usuario);
            ?>
            <!-- Navbar End -->
            <div class="container-fluid pt-4 px-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <h3>Perfil</h3>
                        </div>
                        <?php if($_SESSION['tipo_usuario']==1){ ?>
                        <div class="col-md-5">
                            <button type="button" class="btn btn-outline-primary m-2" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"><i class="fa fa-hospital m-2"></i>Añadir mi
                                veterinaria</button>
                        </div>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Suscripción QPet</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Para registrar tu veterinaria es necesario que pagues la suscripción QPet! <br>
                                        Al pagar la suscipción mensual de <strong>$120 MXN</strong> tú veterinaria les aparecerá a todos nuestros usuarios!
                                        <form>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Número de tarjeta</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Ingrese su número de tarjeta">
                                          </div>
                                          <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">CVV</label>
                                            <input type="number" class="form-control" placeholder="Ingrese el CVV de su tarjeta">
                                          </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <a href="registro_veterinaria.php"><button type="button" class="btn btn-success"><i class="bi bi-cash-coin m-2"></i>Pagar</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <?php foreach ($info_perfil as $datos => $data) { ?>
                                <div class="card p-3 py-4" id="card_principal">
                                    <div class="text-center">
                                        <?php if ($data['genero'] == 1) { ?>
                                            <img src="../img/dueno.png" width="100" class="rounded">
                                        <?php } else { ?>
                                            <img src="../img/duena.png" width="100" class="rounded">
                                        <?php } ?>
                                    </div>
                                    <div class="text-center mt-3">
                                        <span class="bg-secondary p-1 px-4 rounded text-white">Username</span>
                                        <h5 class="mt-2 mb-0">
                                            <?php echo $data['username'] ?>
                                        </h5>
                                        <br>
                                        <br>
                                        <h5>Información</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Nombre</h6>
                                                <p>
                                                    <?php echo $data['nombre'] . " " . $data['apellido_p'] . " " . $data['apellido_m'] ?>
                                                </p>
                                                <br>
                                                <h6>E-mail</h6>
                                                <p>
                                                    <?php echo $data['email']; ?>
                                                </p>
                                                <br>
                                                <h6>Genero</h6>
                                                <?php if ($data['genero'] == 1) { ?>
                                                    <p>Masculino</p>
                                                <?php } else { ?>
                                                    <p>Femenino</p>
                                                <?php } ?>
                                            </div>
                                            <div class="col">
                                                <h6>Username</h6>
                                                <p>
                                                    <?php echo $data['username'] ?>
                                                </p>
                                                <br>
                                                <h6>Teléfono</h6>
                                                <p>
                                                    <?php echo $data['telefono'] ?>
                                                </p>
                                                <br>
                                                <h6>Fecha de nacimiento</h6>
                                                <p>
                                                    <?php echo $data['fecha_nacimiento'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <br>
                                    <h5>Mascotas</h5>
                                    <hr>
                                    <div class="row">
                                        <?php
                                        if ($user_mascotas != NULL) {
                                            foreach ($user_mascotas as $datos => $data) {
                                                ?>
                                                <div class="col-md-4" style="margin-top:10px;">
                                                    <div class="card p-4 mb-2 h-100">
                                                        <div class="d-flex justify-content-between">
                                                            <div class=" flex-row align-items-center">
                                                                <?php if ($data['especie'] == 'Perro') { ?>
                                                                    <div class="icon mb-3"><img src="../img/happy.png"
                                                                            style="width: 25%; height: 25%;"
                                                                            alt="<?php echo $data['nombre'] ?>"></div>
                                                                <?php } else { ?>
                                                                    <div class="icon"><img src="../img/kitty.png"
                                                                            style="width: 25%; height: 25%;"
                                                                            alt="<?php echo $data['nombre'] ?>"></div>
                                                                <?php } ?>
                                                                <div class="c-details">
                                                                    <h6 class="mb-0">
                                                                        <?php echo $data['nombre'] ?>
                                                                    </h6> <span>
                                                                        <?php echo $data['fecha_nacimiento'] ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="badge"> <span>
                                                                    <?php echo $data['especie']; ?>
                                                                </span> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else { ?>
                                            <h3>No cuenta con mascotas</h3>
                                        <?php } ?>
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