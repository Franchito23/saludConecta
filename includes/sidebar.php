<?php
session_start();

if (!$_SESSION['activo']) {
  header("Location: home.php");
}


$idusu =  $_SESSION['id_usuario'];
$nombre = $_SESSION['nombreCompleto'];
$email = $_SESSION['correo'];
$rol = $_SESSION['id_rol'];
$telefono = $_SESSION['telefono'];
$documento = $_SESSION['documento'];

include_once("model/conexion.php");
$conexion = new Conexion();
$mysqli = $conexion->conectar();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:ital@1&display=swap" rel="stylesheet">    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="css/sidebar.css">

</head>

<body>

<nav class="navbarc">
    <div class="menu-btn">
        <i class="fa-solid fa-bars"></i>
    </div>
    <div class="side-bar">
        <div class="close-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="menu">
            <div class="item"><a href="home.php"><i class="fa-solid fa-house"></i>Inicio</a></div>
            <div class="item"><a href="cita.php"><i class="fa-solid fa-plus"></i>Agendar cita</a></div>
            <div class="item"><a href="historial.php"><i class="fa-solid fa-table-list"></i>Historial</a></div>
            <div class="item"><a href="perfil.php"><i class="fa-solid fa-user"></i>Perfil</a></div>
            <div class="item"><a href="salir.php"><i class="fa-solid fa-right-from-bracket"></i>Salir</a></div>
        </div>
    </div>

    <div class="logo">
        <a href="home.php">
        <img src="img/SaludConecta-removebg-.png" width="60px">
        </a>
    </div>
</nav>



<script type="text/javascript">
        $(document).ready(function(){


            $('.menu-btn').click(function(){
                $('.side-bar').addClass('active');
                $('.menu-btn').css("visibility","hidden");
            });

            $('.close-btn').click(function(){
                $('.side-bar').removeClass('active');
                $('.menu-btn').css("visibility","visible");
            });

        });
    </script>
    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://kit.fontawesome.com/e05c1d4d14.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>