<?php 
include "includes/sidebar.php";
include "controller/historialCon.php";


?>




<head>
<link rel="stylesheet" href="css/historial.css">
  <title>Historial</title>
</head>



<div class="contenedor">


    <main class="table">
        <section class="table-header">
         <h2 class="animate__animated animate__fadeInUp">Historial de citas</h2>
        </section>
        <section class="table-body">
            <table>
                <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>Fecha creación</th>
                        <th>Fecha cita</th>
                        <th>Motivo de la cita</th>
                        <th>Paciente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($registros as $fila): ?>
                    <tr>
                        <td>
                        <?php echo $fila->nombre_doc; ?>
                        </td>
                        <td>
                        <?php echo $fila->fecha_creacion; ?>
                          </td>
                          <td>
                          <?php echo $fila->fecha_cita; ?>
                          </td>
                          <td>
                          <?php echo $fila->motivo_cita; ?>
                          </td>
                          </td>
                          <td>
                          <?php echo $fila->nombreCompleto; ?>
                          </td>
                          <td>
                            

                            <form method="post">
                            <a href="eliminarCita.php?id=<?php echo $fila->id_citas; ?>">
                           <button name="eliminar" type="submit" class="boton"><i class="fa-solid fa-trash"></i></button>
                            </a>
                            <a href="editCita.php?id=<?php echo $fila->id_citas; ?>" class="boton">
                           <i class="fa-solid fa-pencil"></i>
                            </a>
                            </form>
                          </td>
                    </tr>


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
                </tbody>
            </table>
        </section>
    </main>

    </div>






