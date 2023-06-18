<?php
include "../includes/sidebarDoc.php";
include "../controller/detallesDoc.php";
?>

<head>
    <title>Detalles</title>
    <link rel="stylesheet" href="../css/detalles.css">
</head>


<div class="titulo">
    <h1>Detalles de la cita</h1>
    <p>Esta es la información del paciente, por favor ten cuidado con la informacion</p><br>
</div>

    <ul class="accordion"> 
        <li>
            <input type="checkbox" name="accordion" id="first" checked>
            <label for="first">Sobre el paciente</label>
            <div class="content">
                <p>
                <?php 
                   echo "<strong>Nombre paciente: </strong>$nombreUsu <br>";
                   echo "<strong>Correo: </strong>$correoUsu <br>";
                   echo "<strong>N documento: </strong>$documentoUsu";
                ?>
                </p>
            </div>
        </li>
        <li>
            <input type="checkbox" name="accordion" id="second">
            <label for="second">Sintomas</label>
            <div class="content">
                <p>
                <?php
               echo "<strong>Resumen de sintomas: </strong>$sintomas <br>";
               echo "<strong>Tiempo sintomas: </strong>$tiempo_sintomas <br>";
               echo "<strong>Instensidad: </strong>$intensidad <br>";
               echo "<strong>Frecuencia: </strong>$antecedentes <br>";
               echo "<strong>Enfermedad heredada: </strong>$enfermedad_heredada <br>";
               echo "<strong>Medicamento: </strong>$medicamento";
                ?>
                </p>
            </div>
        </li>
        <li>
            <input type="checkbox" name="accordion" id="third">
            <label for="third">Sobre la cita</label>
            <div class="content">
                <p>
                <?php
                echo "<strong>Fecha: </strong>$fecha_cita<br>";
                echo "<strong>Motivo: </strong>$motivo_cita <br>";
                echo "<strong>Estado: </strong>$estado";
                ?>
                </p>
            </div>
        </li>
    </ul>

    <div class="Botones">

        <a href="doctorCitas.php" class="button">
            Volver
        </a>

        <a href="diagnosticoDoctor.php?id=<?php echo $id_citas; ?>" class="button">
        Realizar diagnóstico
        </a>
    </div>
