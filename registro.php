<?php
session_start();

//Validamos si la sesión está activa
if (!empty($_SESSION['activo'])) {
    header("Location:home.php");
  }
  
  
    //INCLUIR LA CONEXIÓN
    include_once("model/conexion.php");
    $conexion = new Conexion();
    $mysqli = $conexion->conectar();

if (isset($_POST["crear"])) {

    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $documento = $_POST["documento"];
    $telefono = $_POST["telefono"];
    $clave = $_POST["clave"];

    if (!empty($nombre) && $nombre !="" && !empty($correo) && $correo !="" && !empty($documento) && $documento !="" && !empty($telefono) && $telefono !="" && !empty($clave) && $clave !="") {
        
        $clave_encriptada = password_hash($clave,PASSWORD_DEFAULT);
        $query = "INSERT INTO TBL_usuario (nombreCompleto, correo, documento, telefono, clave) VALUES (:nombreCompleto, :correo, :documento, :telefono, :clave)";

        $stmt = $mysqli->prepare($query);
        $stmt->bindParam(":nombreCompleto", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $stmt->bindParam(":clave", $clave_encriptada, PDO::PARAM_STR);
  

        $resultado = $stmt->execute();

        header("Location:index.php");

        
  }else {
    $error = "Algún campo está vacio";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:ital@1&display=swap" rel="stylesheet">    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title>Login</title>
</head>
<body>
    <div class="logo">
        <img src="img/SaludConecta-removebg-.png">
        </div>
    <div class="box">

        <div class="container animate__animated animate__fadeInDown">
            <div class="top-header">
                <strong> 
                <header>Crea tu cuenta!</header>
                </strong>
                <hr>
            </div>
            <form method="post">
            <div class="input-field">
                <input type="text" name="nombre" class="input" placeholder="Nombre completo" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-field">
                <input type="email" name="correo" class="input" placeholder="Correo" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-field">
                <input type="text" name="documento" class="input" placeholder="Documento" required>
                <i class="fa-solid fa-passport"></i>
            </div>
            <div class="input-field">
                <input type="text" name="telefono" class="input" placeholder="Teléfono" required>
                <i class="fa-solid fa-phone"></i>
            </div>

            <div class="input-field">
                <input type="password" name="clave" class="input" placeholder="Contraseña" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="input-field">
                <button type="submit" name="crear" class="submit"> <strong>Crear cuenta</strong></button>
            </div>
            <div class="bottom">
                <div class="right">
                    <label> <a href="index.php">Ya tengo cuenta</a> </label>
                </div>
            </div>
        </form>
        </div>

    </div>

        <?php if(isset($mensaje)) : ?>
                  <script>
                    Swal.fire(
                    'Good job!',
                    '<?php echo $mensaje; ?>',
                    'success'
                    )
                  </script> 
          <?php endif; ?>      

            <?php if(isset($error)) : ?>
                <script>
                    Swal.fire(
                    'Good job!',
                    '<?php echo $error; ?>',
                    'warning'
                    )
                  </script> 
          <?php endif; ?>      


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://kit.fontawesome.com/e05c1d4d14.js" crossorigin="anonymous"></script>
</body>
</html>