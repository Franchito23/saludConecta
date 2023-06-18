<?php

$query = "SELECT * 
FROM TBL_citas 
INNER JOIN TBL_usuario ON TBL_citas.id_usuario = TBL_usuario.id_usuario 
INNER JOIN TBL_doctor ON TBL_citas.id_doctor = TBL_doctor.id_doctor 
INNER JOIN TBL_sintomas ON TBL_citas.id_sintomas = TBL_sintomas.id_sintomas 
WHERE TBL_citas.id_doctor = '$idDoc' AND TBL_citas.estado = 'ACTIVO' 
ORDER BY TBL_citas.fecha_cita DESC";

$stmt = $mysqli->query($query);
$registros = $stmt->fetchAll(PDO::FETCH_OBJ);


?>