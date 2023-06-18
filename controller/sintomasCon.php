<?php

if (isset($_POST["enviarSintomas"])) {

    $id_citas = $_GET['id_citas'];
    $sintomas = $_POST['sintomas'];
    $tiempo_sintomas = $_POST['tiempo_sintomas'];
    $intensidad = $_POST['intensidad'];
    $frecuencia = $_POST['frecuencia'];
    $enfermedad_heredada = $_POST['enfermedad_heredada'];
    $medicamento = $_POST['medicamento'];

    if (!empty($sintomas) && !empty($tiempo_sintomas) && !empty($intensidad) && !empty($frecuencia) && !empty($enfermedad_heredada) && !empty($medicamento)) {
        $query = "INSERT INTO TBL_sintomas (sintomas, tiempo_sintomas, intensidad, antecedentes, enfermedad_heredada, medicamento) VALUES (:sintomas, :tiempo_sintomas, :intensidad, :frecuencia, :enfermedad_heredada, :medicamento)";

        $stmt = $mysqli->prepare($query);
        $stmt->bindParam(":sintomas", $sintomas, PDO::PARAM_STR);
        $stmt->bindParam(":tiempo_sintomas", $tiempo_sintomas, PDO::PARAM_STR);
        $stmt->bindParam(":intensidad", $intensidad, PDO::PARAM_STR);
        $stmt->bindParam(":frecuencia", $frecuencia, PDO::PARAM_STR);
        $stmt->bindParam(":enfermedad_heredada", $enfermedad_heredada, PDO::PARAM_STR);
        $stmt->bindParam(":medicamento", $medicamento, PDO::PARAM_STR);

        $resultado = $stmt->execute();

        if ($resultado) {
            $lastInsertIdSintomas = $mysqli->lastInsertId();

            $queryUpdate = "UPDATE TBL_citas SET id_sintomas = :id_sintomas WHERE id_citas = :id_citas";
            $stmtUpdate = $mysqli->prepare($queryUpdate);
            $stmtUpdate->bindParam(":id_sintomas", $lastInsertIdSintomas, PDO::PARAM_INT);
            $stmtUpdate->bindParam(":id_citas", $id_citas, PDO::PARAM_INT);
            $stmtUpdate->execute();

            $mensaje = "Eso es todo, tu cita está lista";

            header("Location: home.php");

        } else {
            $error = "Lo sentimos, no se pudieron mandar tus síntomas";
        }

    } else {
        $error = "Algún campo está vacío";
    }
}