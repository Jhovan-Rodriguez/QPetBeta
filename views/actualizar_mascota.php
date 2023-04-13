<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION['user'] == null || $_SESSION['user'] == '') {
    header("Location:./404.php");
}
include("../controller/db_pets.php");
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
        <?php
            #Se busca la informacion de la mascota en la funcion del controlador
            $mascota_info=search_pet($_POST['id_mascota']);
            //var_dump($mascota_info);
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
                    #Se recorre el objeto para colocar la informacion de la mascota
                    foreach($mascota_info as $data=>$datos_mascota){
                    ?>
                <div class="col-sm-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h3 class="mb-4">Modificar datos</h3>
                        <form action="" id="form_mascota" class="needs-validation" novalidate>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="nombre">Nombre</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-heart-fill"></i></span>
                                            <input required type="text" class="form-control" name="nombre" value="<?php echo $datos_mascota['nombre'];?>"
                                                placeholder="Nombre de tu mascota">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="fecha_nac">Fecha de nacimiento</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-calendar-heart-fill"></i></span>
                                            <input required type="date" class="form-control" value="<?php echo $datos_mascota['fecha_nacimiento'];?>" name="fecha_nac">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="especie">Especie</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-heart-pulse-fill"></i></span>
                                            <select required name="especie" class="form-select" aria-label="Default select example">
                                              <option value="">Selecciona una opcion</option>
                                              <option value="Perro"  <?php if($datos_mascota['especie'] == 'Perro'){ echo 'selected';}?> >Perro</option>
                                              <option value="Gato" <?php if($datos_mascota['especie'] == 'Gato'){ echo 'selected';}?> >Gato</option>
                                            </select>                                        
                                        </div>
                                    </div>
                                    <div class="col">
                                    <label for="raza">Raza</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fa fa-dog"></i></span>
                                            <input required type="text" class="form-control" value="<?php echo $datos_mascota['raza'];?>" name="raza" placeholder="Raza de tu mascota">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="altura">Altura (cm)</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-heart-fill"></i></span>
                                            <input required type="number" class="form-control" value="<?php echo $datos_mascota['altura'];?>" name="altura"
                                                placeholder="Altura (cm) de tu mascota">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="peso">Peso (Kg)</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-calendar-heart-fill"></i></span>
                                            <input required type="number" class="form-control" name="peso" value="<?php echo $datos_mascota['peso'];?>" placeholder="Peso (Kg) de tu mascota">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                    <label for="sexo">Sexo</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="bi bi-heart-pulse-fill"></i></span>
                                            <select required name="sexo" class="form-select" aria-label="Default select example">
                                              <option value="">Selecciona una opcion</option>
                                              <option value="1" <?php if($datos_mascota['sexo'] == '1'){ echo 'selected';}?> >Macho</option>
                                              <option value="2" <?php if($datos_mascota['sexo'] == '2'){ echo 'selected';}?> >Hembra</option>
                                            </select>                                        
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Descripción</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-postcard-fill"></i></span>
                                            <textarea required class="form-control" name="descripcion"  placeholder="Escribe una descripción de tu mascota!"><?php echo $datos_mascota['descripcion'];?></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                            <br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <input type="hidden" value="<?php echo $_POST['id_mascota']?>" name="id_mascota">
                                <button class="btn btn-outline-primary me-md-2" type="submit"><i class="fa fa-dog me-2"></i>Guardar</button>
                            
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
    <script src="../js/update_mascota.js"></script>
</body>

</html>