<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/header/header.css" rel="stylesheet">
    <link href="../css/sidebar/sidebar.css" rel="stylesheet">
    <link href="../css/mis_mascotas.css" rel="stylesheet">
    <link href="../css/cards/card.css" rel="stylesheet">
    

    <script src="https://kit.fontawesome.com/e56805774d.js" crossorigin="anonymous"></script>

    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    -->

    </head>
<body>    
    <header class="heder">
        <h2 class="header__title">
            Mis Mascotas
        </h2>
    </header>
    <section class="main_content">

    <nav class="sidebar">
        <div class="sidebar__background" >
            <ul>
                <li>
                    <a href="#">
                    <div class="sidebar__card">
                        <i class="fa-regular fa-circle-user sidebar__card-icon" style="color: #ffffff;"></i>
                        <h3 class="sidebar__card-title" >Perfil</h3>
                    </div>
                </a>
                </li>

                <li>
                    <a href="#">
                    <div class="sidebar__card">
                        <i class="fa-solid fa-dog sidebar__card-icon" style="color: #ffffff;"></i>
                        <h3 class="sidebar__card-title" >Mis Mascotas</h3>
                    </div>
                    </a>
                </li>

                <li>
                    <a href="#">
                    <div class="sidebar__card">
                        <i class="fa-solid fa-shield-dog sidebar__card-icon " style="color: #ffffff;"></i>
                        <h3 class="sidebar__card-title" >Cabecin</h3>
                    </div>
                    </a>
                </li>

                <li>
                    <a href="#">
                    <div class="sidebar__card">
                        <i class="fa-regular fa-hospital sidebar__card-icon" style="color: #ffffff;"></i>
                        <h3 class="sidebar__card-title" >Veterinaria</h3>
                    </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="cards">
        <div class="card">
            <div class="card__header">
                <i class="fa-solid fa-dog card__header-icon"></i>
                <h3 class="card__header-title" >Cabecin</h3>
            </div>
            <div class="card__des">
                <ul>
                    <li class="card__des-item">
                        <p class="card__des-edad-text">Edad</p>
                        <p class="card__des-edad-text">8 años</p>
                    </li>
                    <li class="card__des-item">
                        <p class="card__des-edad-text">Peso</p>
                        <p class="card__des-edad-text">50 Kg</p>
                    </li>
                    <li class="card__des-item">
                        <p class="card__des-edad-text">Sexo</p>
                        <p class="card__des-edad-text">Macho</p>
                    </li>
                    <li class="card__des-item">
                        <p class="card__des-edad-text">Color</p>
                        <p class="card__des-edad-text">Café</p>
                    </li>
                </ul>
            </div>
            <button class="card__ver" >Detalles</button>
        </div>

        <div class="card">
            <div class="card__header">
                <i class="card__header-icon"></i>
                <h3 class="card__header-title" ></h3>
            </div>
            <div class="card__des">
                <ul>
                    <li class="card__des-item">
                        <p class="card__des-edad-text">Edad</p>
                        <p class="card__des-edad-text">8 años</p>
                    </li>
                    <li class="card__des-item">
                        <p class="card__des-edad-text">Peso</p>
                        <p class="card__des-edad-text">50 Kg</p>
                    </li>
                    <li class="card__des-item">
                        <p class="card__des-edad-text">Sexo</p>
                        <p class="card__des-edad-text">Macho</p>
                    </li>
                    <li class="card__des-item">
                        <p class="card__des-edad-text">Color</p>
                        <p class="card__des-edad-text">Café</p>
                    </li>
                </ul>
            </div>
            
        </div>
    </main>

</section>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>