<?php 
include("../includes/sidebarDoc.php"); 
?>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
</head>

<div class="title animate__animated animate__fadeIn">
    <h1>Bienvenido Doctor <?php echo $nombre; ?>!</h1>
    <p><i class="fa-solid fa-user-nurse"></i> Agenda tu cita con los mejores</p>
</div>

<div class="banner">
    <img src="../img/Doc-banner.PNG" alt="Imagen médica">
    <div class="recommendations">
      
      <ul>
        <h2>Recomendaciones para tratar con pacientes</h2>
        <li><i class="fas fa-hand-holding-heart"></i> Empatía: Muestra comprensión y empatía hacia tus pacientes.</li>
    <li><i class="fas fa-comments"></i> Comunicación efectiva: Establece una comunicación clara y efectiva con tus pacientes.</li>
    <li><i class="fas fa-user-friends"></i> Trabajo en equipo: Fomenta una colaboración efectiva con otros profesionales de la salud.</li>
    <li><i class="fas fa-user-md"></i> Actualización constante: Mantente actualizado con los avances y novedades en tu campo médico.</li>      </ul>
    </div>
  </div>

<div class="container animate__animated animate__fadeIn">

    <div class="card">
        <img src="../img/Icon-Historial.svg" class="img" >
        <div class="intro">
            <h3>Citas pendientes</h3>
            <p class="p">Ve todas las citas que tienes pendientes</p>
            <a href="doctorCitas.php">
            <button class="button-28" role="button">Ir</button>
            </a>
        </div>
    </div>


    <div class="card">
        <img src="../img/User-Icon.svg" class="img" >
        <div class="intro">
            <h3>Perfil</h3>
            <p class="p">Puedes ver tus datos personales y actualizarlos si es necesario!</p> 
            <a href="perfilDoc.php">
            <button class="button-28" role="button">Ir</button>
            </a>        
        </div>
    </div>


    <!-- <div class="card">
        <img src="../img/Doctor-Icon.svg" class="img" >
        <div class="intro">
            <h3>Reporte</h3>
            <p class="p">Has el reporte para tu paciente y envialo a su correo</p>
            <a href="cita.php">
            <button class="button-28" role="button">Ir</button>
            </a>
        </div>
    </div> -->



</div>


