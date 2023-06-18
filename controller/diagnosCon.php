<?php 

if (isset($_POST['diagno'])) {

    $id_citas = $_GET['id'];
    $diagnostico = $_POST['diagnostico'];
    $medicamento = $_POST['medicamento'];

    if (empty($diagnostico) && empty($medicamento)) {
        $error = "Los campos no pueden estar vacios!";
    }else {
        
        $query = "INSERT INTO TBL_diagnostico (diagnostico, medicamento, id_citas) VALUES (:diagnostico, :medicamento, :id_citas)";

        $stmt = $mysqli->prepare($query);
        $stmt->bindParam(":diagnostico", $diagnostico, PDO::PARAM_STR);
        $stmt->bindParam(":medicamento", $medicamento, PDO::PARAM_STR);
        $stmt->bindParam(":id_citas", $id_citas, PDO::PARAM_INT);
  
        $resultado = $stmt->execute();

        if ($resultado) {
            $mensaje = "Los datos se guardaron correctamente";
        }else{
            $error = "No se pudo enviar los datos";
        }

    }
}