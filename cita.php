<?php
include_once("includes/sidebar.php");
include "controller/citaCon.php";
?>


<head>
  <title>Citas</title>
  <link rel="stylesheet" href="css/citas.css">

</head>
<body>


<div class="cardForm">
        <form method="POST" class="medical-form">
            <h2>Solicitar Cita Médica</h2>
            <p>Se le agendará tu cita a un doctor que tenga esa fecha disponible</p>
            <br>
            <div class="form-group">
              <label for="name">Motivo de la cita:</label>
              <input type="text" id="name" name="motivo" placeholder="Ingrese su nombre">
            </div>
            <div class="form-group">
              <label for="date">Fecha de Cita:</label>
              <input type="datetime-local" id="date" name="fechaCita">
            </div>
            <a href="sintomas.php">
            <button type="submit" name="nuevaCita">Solicitar Cita</button>
            </a>
          </form>
    </div>
    
            <?php if(isset($mensaje)) : ?>
                  <script>
                    Swal.fire(
                    'Good job!',
                    '<?php echo $mensaje; ?>',
                    'success'
                    )
                  </script> 
          <?php endif; ?>      

            <?php if(isset($error)) : ?>
                <script>
                    Swal.fire(
                    'Error!',
                    '<?php echo $error; ?>',
                    'warning'
                    )
                  </script> 
          <?php endif; ?>      

  
      

        
        
    


    





 