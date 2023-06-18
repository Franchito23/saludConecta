<?php

    if (isset($_GET["id"])) {
        $idusu = $_GET['id'];
    }

    $query = "SELECT * FROM TBL_usuario WHERE id_usuario=:id";
    $stmt = $mysqli->prepare($query);

    $stmt->bindParam(":id", $idusu, PDO::PARAM_INT);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_OBJ);

    if (isset($_POST["editarUsuario"])) {

        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $documento = $_POST["documento"];
        $clave = $_POST["clave"];

        if (empty($nombre) || empty($correo) || empty($telefono) || empty($documento) || empty($clave)) {
          $error = "Algunos campos esán vacios";
        }else{

        $query = "UPDATE TBL_usuario SET nombreCompleto=:nombre, correo=:correo, telefono=:telefono, documento=:documento, clave=:clave WHERE id_usuario=:id_usuario";
        
        $stmt = $mysqli->prepare($query);

        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);
        $stmt->bindParam(":clave", $clave, PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $idusu, PDO::PARAM_INT);

        $resultado = $stmt->execute();
        
        }

        if ($resultado) {
            $mensaje = "Se actualizaron los datos correctamente";
        }else {
            $error = "Error, no se pudo actualizar la cita correctamente";
        }
    }