<?php
if (isset($_POST["crearDoctor"])) {

    $nombre_usu = $_POST["nombre_doctor"];
    $correo = $_POST["correo"];
    $documento = $_POST["documento"];
    $telefono = $_POST["telefono"];
    $clave = $_POST["clave"];


    if (empty ($nombre_usu) && empty ($correo) && empty ($documento) && empty ($documento) && empty ($telefono) && empty ($clave)) {
        $error = "Algunos campos están vacios";
      }else {
     
        $query = "INSERT INTO TBL_doctor (nombre_doc, correo, documento, telefono, clave) VALUES (:nombre_doctor, :correo, :documento, :telefono, :clave)";

        $stmt = $mysqli->prepare($query);
        $stmt->bindParam(":nombre_doctor", $nombre_usu, PDO::PARAM_STR);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $stmt->bindParam(":clave", $clave, PDO::PARAM_STR);

        $resultado = $stmt->execute();
  
        if ($resultado) {
          $mensaje = "Doctor creado exitosamente";
        }else{
          $mensaje = "No se pudo crear la cuenta de doctor";
        }
      }
}

?>
