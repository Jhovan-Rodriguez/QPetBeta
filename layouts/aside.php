<?php
session_start();

?>
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="./mismascotas.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-dog me-2"></i>QPet</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="../img/dueno.png" alt="" style="width: 40px; height: 40px;">

                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">
                    <?php echo $_SESSION['user'] ?>
                </h6>
                <span>
                    <?php
                    if ($_SESSION['tipo_usuario'] == 1) {
                        echo "Dueño";
                    } else {
                        echo "Veterinario";
                    }

                    ?>
                </span>
                <!-- Que pedo -->
            </div>
        </div>
        <div class="navbar-nav w-100">

            <a href="./perfil.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Perfil</a>
            <a href="./mismascotas.php" class="nav-item nav-link"><i class="fa fa-cat me-2"></i>Mis mascotas</a>
            <a href="./miscitas.php" class="nav-item nav-link"><i class="fa fa-calendar me-2"></i>Mis citas</a>
            <a href="./misveterinarias.php" class="nav-item nav-link"><i class="fa fa-heartbeat me-2"></i>Veterinarias</a>

            <?php
            if ($_SESSION['tipo_usuario'] != 1) {
                echo "<a href='./mi_vet.php' class='nav-item nav-link'><i class='fa fa-medkit me-2'></i>Mi Veterinaria</a>";
            }
            ?>

        </div>
    </nav>
</div>
<!-- Sidebar End -->