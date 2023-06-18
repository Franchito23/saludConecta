<?php 
include_once("includes/sidebar.php");
include "controller/editCitaCon.php";
?>

<head>
  <title>Editar cita</title>
  <link rel="stylesheet" href="css/citas.css">
</head>

<div class="sectionOne">
        <h1>Edita tu cita</h1>
        <p>Para que le llegue la mejor información posible a tu doctor
      
    </p>
    
        <div class="cardForm">
            <form method="POST" class="medical-form" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label>Motivo de la cita</label>
                    <input type="text" name="motivo">
                  </div>
                  <div class="form-group">
                    <label>Fecha y hora de la cita: </label>
                    <input type="datetime-local" name="fechaCita" required="">
                  </div><br>
                  
                  <a href="historial.php">
                  <button name="editarCita" type="submit">Actualizar cita</button>
                </a>
                <a href="historial.php"><i class="fa-solid fa-arrow-left"></i></a>   
            </form>
               
            <br> <br>

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
                    'Good job!',
                    '<?php echo $error; ?>',
                    'warning'
                    )
                  </script> 
          <?php endif; ?>      


        </div>

</div>
