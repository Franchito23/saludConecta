<?php 

//Validacion de id
if (isset($_GET["id"])) {
    $idCita = $_GET['id'];
}

//Obtener los datos de la cita por id
$query = "SELECT * FROM TBL_citas WHERE id_citas = :id";
$stmt = $mysqli->prepare($query);


//Pasamos a bindParam para las variables

$stmt->bindParam(":id", $idCita, PDO::PARAM_INT);
$stmt->execute();

$cita = $stmt->fetch(PDO::FETCH_OBJ);

    

    $query = "UPDATE TBL_citas SET estado='INACTIVO' WHERE id_citas=:id_citas";     

    $stmt = $mysqli->prepare($query);
    $stmt->bindParam(":id_citas", $idCita, PDO::PARAM_INT);

    $resultado = $stmt->execute();

    if ($resultado) {
        $mensaje = "Se ha borrado la cita correctamente";

    }else {
        $error = "Error, no se pudo borrar la cita correctamente";
    }




