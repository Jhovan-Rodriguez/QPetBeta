<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("Location:./404.php");
}
include("../controller/db_veterinary.php");
$id_veterinaria = $_REQUEST['id_veterinaria'];
?>
<head>
    <meta charset="utf-8">
    <title>Veterinaria</title>
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
        $veterinarias = get_veterinaries($_SESSION['id']);
        $veterinary_info = search_veterinary($id_veterinaria);
        $mascotas = get_pets($_SESSION['id']);
        ?>

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
            include("../layouts/nav.php");
            ?>
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container" style="padding: 2%;">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="https://imgs.search.brave.com/uGqfXgmO2U0iC0M-CPtvQbPuQXXDLI1SS4D_gZjtWw0/rs:fit:800:675:1/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzNiL2E4/L2MyLzNiYThjMjQ1/MGZkNTc2MTIwYWI4/YWMyZTU3YWZiNGVh/LnBuZw"
                                            alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                        <div class="mt-3">
                                            <h4><?php echo $veterinary_info['nombre_v'] ?></h4>
                                            <p class="text-secondary mb-1"><?php echo $veterinary_info['colonia'] ?></p>
                                            <p class="text-muted font-size-sm"><?php echo $veterinary_info['calle'] ?></p>
                                            <p class="text-muted font-size-sm"><?php echo $veterinary_info['codigo_postal'] ?></p>
                                            <button class="btn btn-primary" id="agendarCita">Agendar Cita</button>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-twitter me-2 icon-inline text-info">
                                                    <path
                                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                    </path>
                                                </svg>Twitter</h6>
                                            <span class="text-secondary">@<?php echo $veterinary_info['nombre_v'] ?></span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-instagram me-2 icon-inline text-danger">
                                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                </svg>Instagram</h6>
                                            <span class="text-secondary"><?php echo $veterinary_info['nombre_v'] ?></span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-facebook me-2 icon-inline text-primary">
                                                    <path
                                                        d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                    </path>
                                                </svg>Facebook</h6>
                                            <span class="text-secondary"><?php echo $veterinary_info['nombre_v'] ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <h4 class="">Información</h4>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nombre</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="<?php echo $veterinary_info['nombre'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Correo</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="<?php echo $veterinary_info['correo'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Telefono</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="+52 <?php echo $veterinary_info['telefono'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Disponible</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php if($veterinary_info['disponible'] == 1){ ?>
                                                <input type="text" class="form-control" value="Si" disabled>
                                            <?php }else{ ?>
                                                <input type="text" class="form-control" value="No" disabled>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            $horario = json_decode($veterinary_info['horario']);
                            ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <h4 class="">Disponibilidad</h4>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Lunes - Viernes</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <textarea style="resize:none;" class="form-control" disabled><?php echo $horario->lunes_viernes->hora_inicio ?> - <?php echo $horario->lunes_viernes->hora_fin ?>
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Sabado</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <textarea style="resize:none;" class="form-control" disabled><?php echo $horario->sábado->hora_inicio ?> - <?php echo $horario->sábado->hora_fin ?>
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Domingo</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <textarea style="resize:none;" class="form-control" disabled><?php echo $horario->domingo->hora_inicio ?> - <?php echo $horario->domingo->hora_fin ?>
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

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

    <div class="modal" id="modalAgendarCita" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agendar cita en <?php echo $veterinary_info['nombre_v'] ?></h5>
                <button type="button" class="btn-close cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="agendar">
                    <input type="hidden" name="id_veterinaria" value="<?php echo $id_veterinaria ?>">
                    <div class="col">
                        <label for="fecha">Fecha</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            <input required type="date" class="form-control" name="fecha" placeholder="Fecha de la cita">
                        </div>
                    </div>
                    <div class="col">
                        <label for="hora">Hora</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            <input required type="time" class="form-control" name="hora" placeholder="Hora de la cita">
                        </div>
                    </div>
                    <div class="col">
                        <label for="mascota">Mascota</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-dog"></i></span>
                            <select class="form-select" aria-label="Default select example" name="mascota">
                                <?php foreach ($mascotas as $datos => $data) {?>
                                    <option value="<?php echo $data['id'] ?>"> <?php echo $data['nombre'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <label for="comentario">Comentario</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-comment"></i></span>
                            <input required type="text" class="form-control" name="comentario" placeholder="Describa el padecimiento de su mascota">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cerrar" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agendarButton">Agendar cita</button>
            </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script> 
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <script src="../js/veterinaria.js"></script>
</body>

</html>