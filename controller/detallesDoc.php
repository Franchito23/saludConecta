<?php
$query = "SELECT TBL_usuario.nombreCompleto, TBL_usuario.correo, TBL_usuario.documento, TBL_sintomas.sintomas, TBL_sintomas.tiempo_sintomas, TBL_sintomas.intensidad, TBL_sintomas.antecedentes, TBL_sintomas.enfermedad_heredada, TBL_sintomas.medicamento, TBL_citas.id_citas,TBL_citas.fecha_cita, TBL_citas.motivo_cita, TBL_citas.estado
FROM TBL_citas
INNER JOIN TBL_usuario ON TBL_citas.id_usuario = TBL_usuario.id_usuario
INNER JOIN TBL_doctor ON TBL_citas.id_doctor = TBL_doctor.id_doctor
INNER JOIN TBL_sintomas ON TBL_citas.id_sintomas = TBL_sintomas.id_sintomas
WHERE TBL_citas.id_doctor = '$idDoc' AND TBL_citas.estado = 'ACTIVO'";

$stmt = $mysqli->query($query);
$registro = $stmt->fetch(PDO::FETCH_OBJ);

if ($registro) {
    $nombreUsu = $registro->nombreCompleto;
    $correoUsu = $registro->correo;
    $documentoUsu = $registro->documento;

    $sintomas = $registro->sintomas;
    $tiempo_sintomas = $registro->tiempo_sintomas;
    $intensidad = $registro->intensidad;
    $antecedentes = $registro->antecedentes;
    $enfermedad_heredada = $registro->enfermedad_heredada;
    $medicamento = $registro->medicamento;

    $id_citas = $registro->id_citas;
    $fecha_cita = $registro->fecha_cita;
    $motivo_cita = $registro->motivo_cita;
    $estado = $registro->estado;



} else {
    echo "No se encontró ningún registro";
}
?>
