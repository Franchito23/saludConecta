<?php 
//Validacion de id
if (isset($_GET["id"])) {
    $idCitas = $_GET['id'];
}

//Obtener los datos de la cita por id
$query = "SELECT * FROM TBL_citas WHERE id_citas=:id";
$stmt = $mysqli->prepare($query);

//Pasamos a bindParam para las variables

$stmt->bindParam(":id", $idCitas, PDO::PARAM_INT);
$stmt->execute();

$cita = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST["editarCita"])) {
    
    $motivo = $_POST["motivo"];
    $fechaCita = $_POST["fechaCita"];

if (empty($motivo)) {
    $error = "Algunos campos están vacios";
}else
    $query = "UPDATE TBL_citas SET motivo_cita=:motivo, fecha_cita=:fechaCita WHERE id_citas=:id_citas";     

    $stmt = $mysqli->prepare($query);

    $stmt->bindParam(":motivo", $motivo, PDO::PARAM_STR);
    $stmt->bindParam(":fechaCita", $fechaCita, PDO::PARAM_STR);
    $stmt->bindParam(":id_citas", $idCitas, PDO::PARAM_INT);

    $resultado = $stmt->execute();

    if ($resultado) {
        $mensaje = "Se ha actualizado la cita correctamente";
    }else {
        $error = "Error, no se pudo actualizar la cita correctamente";
    }
}

