<?php

  if (isset($_POST['nuevaCita'])) {
    //Obtener valores

    $fechaCita = $_POST["fechaCita"];
    $motivo = $_POST["motivo"];

    if (empty ($fechaCita) || empty ($motivo)) {
      $error = "Algunos campos están vacios";
      
    }else {
      // Insertamos el query
      $query = "INSERT INTO TBL_citas (fecha_cita, motivo_cita, id_usuario, id_doctor) VALUES (:fecha_cita, :motivo_cita, :id_usuario, obtener_doctor()) ";


      $stmt = $mysqli->prepare($query);
      $stmt->bindParam(":fecha_cita", $fechaCita, PDO::PARAM_STR);
      $stmt->bindParam(":motivo_cita", $motivo, PDO::PARAM_STR);
      $stmt->bindParam(":id_usuario", $idusu, PDO::PARAM_INT);
    
      $resultado = $stmt->execute();

      if ($resultado) {
        $mensaje = "Cita creada exitosamente";

        $lastInsertId = $mysqli->lastInsertId();

        // Redirigir a la página sintomas.php con el ID de la cita
        header("Location: sintomas.php?id_citas=$lastInsertId");

      }else{
        $mensaje = "No se pudo crear la cita";
      }
    }

  }

