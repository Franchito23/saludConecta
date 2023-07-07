<?php 
include "includes/sidebar.php";
include "controller/historialCon.php";


?>




<head>
<link rel="stylesheet" href="css/historial.css">
  <title>Historial</title>
</head>



<div class="bienvenida">
        <h1>Historial</h1>
        <p>Aquí puedes ver todas las citas que has hecho!</p>
    </div>
    <?php foreach($registros as $fila): ?>
    <form method="post">
        <div class="card-container">
          <div class="card">
            <img src="img/Doctor-Icon.svg" alt="Imagen 1">
            <h2>Cita</h2>
            <p>
              <?php echo "<strong>Nombre doctor:</strong> $fila->nombre_doc <br>"; ?>

              <?php echo "<strong>Fecha creación:</strong> $fila->fecha_creacion <br>"; ?>

                <?php echo "<strong>Fecha cita:</strong> $fila->fecha_cita <br>"; ?>

                <?php echo "<strong>Motivo:</strong> $fila->motivo_cita <br>"; ?>

                <?php echo "<strong>Paciente:</strong> $fila->nombreCompleto"; ?>

            </p>
            <br>
            <div class="card-buttons">
              <button name="eliminar" type="submit" class="delete-button">
                <i class="fa-solid fa-trash"></i> Eliminar
              </button>
              <button name="actualizar" type="submit" class="update-button">
                <a href="editCita.php?id=<?php echo $fila->id_citas; ?>">
                <i class="fa-solid fa-pencil"></i> Actualizar
                </a>
              </button>
            </div>
          </div>

          
        </div>
      </form>

      <?php  
      if (isset($_POST['eliminar'])) {
          echo "<script>
              Swal.fire({
                  title: '¿Estás seguro?',
                  text: 'Esta acción eliminará la cita',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Sí, eliminar',
                  cancelButtonText: 'Cancelar'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location = 'eliminarCita.php?id=$fila->id_citas;'; 
                  } else {
                      window.location = 'historial.php'; 
                  }
              });
          </script>";
      }
      ?>
          
      <?php endforeach; ?>
