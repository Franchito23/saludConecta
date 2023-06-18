
<head>
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<?php include("includes/sidebar.php"); ?>

<div class="title animate__animated animate__fadeIn">
    <h1>Bienvenido <?php echo $nombre; ?>!</h1>
    <p><i class="fa-solid fa-user-nurse"></i> Agenda tu cita con los mejores</p>
</div>

<div class="banner">
    <img src="img/Doc-banner.PNG" alt="Imagen médica">
    <div class="recommendations">
      
      <ul>
        <h2>Recomendaciones Médicas</h2>
        <li><i class="fas fa-utensils"></i> Mantén una dieta equilibrada y saludable.</li>
        <li><i class="fas fa-dumbbell"></i> Realiza actividad física regularmente.</li>
        <li><i class="fas fa-tint"></i> Bebe suficiente agua todos los días.</li>
        <li><i class="fas fa-moon"></i> Duerme al menos 7-8 horas cada noche.</li>
      </ul>
    </div>
  </div>

<div class="container animate__animated animate__fadeIn">

    <div class="card">
        <img src="img/Icon-Historial.svg" class="img" >
        <div class="intro">
            <h3>Historial</h3>
            <p class="p">Ve todas las citas que has agendado!</p>
            <a href="historial.php">
            <button class="button-28" role="button">Ir</button>
            </a>
        </div>
    </div>


    <div class="card">
        <img src="img/User-Icon.svg" class="img" >
        <div class="intro">
            <h3>Perfil</h3>
            <p class="p">Puedes ver tus datos personales y actualizarlos si es necesario!</p> 
            <a href="perfil.php">
            <button class="button-28" role="button">Ir</button>
            </a>        
        </div>
    </div>


    <div class="card">
        <img src="img/Doctor-Icon.svg" class="img" >
        <div class="intro">
            <h3>Agendar cita</h3>
            <p class="p">Pide una cita con uno de nuestros profecionales!</p>
            <a href="cita.php">
            <button class="button-28" role="button">Ir</button>
            </a>
        </div>
    </div>



</div>


