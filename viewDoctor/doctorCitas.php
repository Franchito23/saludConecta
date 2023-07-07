<?php 
include "../includes/sidebarDoc.php";
include "../controller/citaDocCon.php";
include "../controller/deleteCitaCon.php";
?>


<head>
<link rel="stylesheet" href="../css/historial.css">
  <title>Citas Pendientes</title>
</head>
          <div class="bienvenida"> 
            <h2 class="animate__animated animate__fadeInUp">Citas pendientes</h2>
            <p>Mira las citas que tienes pendientes, da click en el check cuando termines la cita</p>
         </div> 
                    <?php foreach($registros as $fila): ?>
            <div class="container-doc">
              <div class="headerc">
                <form method="post">
                <a href="eliminarDoc.php?id=<?php echo $fila->id_citas; ?>">
                <button type="submit" name="eliminar" class="check-icon"><i class="fa-solid fa-check"></i></button>
              </a>
              </form>
              <div class="img-wrapper">
                <img src="../img/User-Icon.svg" alt="Imagen del remitente" width="100px" class="img">
                </div>
              </div>
              <div class="content">
              <div class="card-title"><strong>Usuario: </strong><?php echo $fila->nombreCompleto; ?></div>
              <div class="subtitle"><strong>Motivo de la cita:</strong> <?php echo $fila->motivo_cita; ?></div>
              
                <ul>
                  <li><strong>Fecha de creación:</strong> <?php echo $fila->fecha_creacion; ?></li>
                  <li><strong>Fecha de cita:</strong> <?php echo $fila->fecha_cita; ?></li>
                </ul>
                <div class="footer">
                <a href="detallesDoctor.php?id=<?php echo $fila->id_citas; ?>">
                  <button name="verMas" type="button" class="boton">Ver más</button>
                </a>
                </div>
            </div>
            </div>

            <?php  
                    if (isset($_POST['eliminar'])) {
                        echo "<script>
                            Swal.fire({
                                title: '¿Estás seguro?',
                                text: 'Esta acción desactivará la cita',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Sí, eliminar',
                                cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'eliminarDoc.php?id=$fila->id_citas;'; 
                                } else {
                                    window.location = 'doctorCitas.php'; 
                                }
                            });
                        </script>";
                    }
                    ?>

          <?php endforeach; ?>







