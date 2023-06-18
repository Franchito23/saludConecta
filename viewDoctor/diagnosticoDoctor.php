<?php 
include "../includes/sidebarDoc.php";
include "../controller/diagnosCon.php";
include "../controller/detallesDoc.php";
?>

<head>
    <title>Diagnóstico</title>
    <link rel="stylesheet" href="../css/citas.css">
</head>

<div class="cardForm">
        <form method="POST" class="medical-form">
            <h2>Diagnóstico final</h2>
            <p>
                Lo que pongas acá será lo que se pondrá en tu reporte! <br>
                <strong>Primero realiza el formulario antes de descargar</strong>
            </p>
            <br>
            <div class="form-group">
              <label for="name">Diagnóstico:</label>
              <input type="text" id="name" name="diagnostico" placeholder="Descripción de lo que le pasa al paciente">
            </div>
            <div class="form-group">
              <label for="date">Medicamento:</label>
              <input type="text" id="date" name="medicamento" placeholder="Nombre del medicamento / N/A">
            </div>
            
            <button type="submit" name="diagno">Enviar</button>
            <a href="../fpdf/PruebaV.php?id=<?php echo $id_citas; ?>" target="_blank">Descargar diagnóstico</a>
          </form>
    </div>
