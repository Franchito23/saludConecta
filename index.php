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

  //VALIDAR SI ESTÁ

  if (isset($_POST["ingresar"])) {

    $email = $_POST["email"];
    $pass = $_POST["password"];
    $check = isset($_POST["check"]) ? 1 : 0;

    
    if (!empty($email) && !empty($pass)) {

      if ($check == 1) {

          $query = "SELECT * FROM TBL_doctor WHERE correo=:email AND clave=:password";
          $stmt = $mysqli->prepare($query);
          $stmt->bindParam(":email", $email, PDO::PARAM_STR);
          $stmt->bindParam(":password", $pass, PDO::PARAM_STR);
    
          $resultado = $stmt->execute();
          $registro = $stmt->fetch(PDO::FETCH_ASSOC);
            
         
           if (!$registro) {
            $error = "Error, Acceso inválido";
           }else {
            
           $_SESSION['activo'] = true;
           $_SESSION['id_doctor'] = $registro['id_doctor'];
           $_SESSION['nombre_doc'] = $registro['nombre_doc'];
           $_SESSION['correo'] = $registro['correo'];
           $_SESSION['telefono'] = $registro['telefono'];
           $_SESSION['documento'] = $registro['documento'];
           $_SESSION['estado'] = $registro['estado'];

           header("Location:viewDoctor/homeDoctor.php");
           }
        
        
           
      }else {
        
      $query = "SELECT * FROM TBL_usuario WHERE correo=:email";

      $stmt = $mysqli->prepare($query);
      $stmt->bindParam(":email", $email, PDO::PARAM_STR);

      $resultado = $stmt->execute();
      $registro = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$registro) {
        $error = "Error, Acceso inválido";
      }else {

        if (password_verify($pass, $registro['clave'])) {
          $_SESSION['activo'] = true;
          $_SESSION['id_usuario'] = $registro['id_usuario'];
          $_SESSION['nombreCompleto'] = $registro['nombreCompleto'];
          $_SESSION['correo'] = $registro['correo'];
          $_SESSION['documento'] = $registro['documento'];
          $_SESSION['estado'] = $registro['estado'];
          $_SESSION['id_rol'] = $registro['id_rol'];
          $_SESSION['telefono'] = $registro['telefono'];
  
          if ($registro['id_rol'] == 2) {
            header("Location:homeAdmin.php");
          }else {
            header("Location:home.php");
          }
        } 
        
      }
    }

  }else {
    $error ="No se pudo acceder a tu cuenta";
  }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
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
                <header>Inicia sesión</header>
                </strong>
            </div>
            <form method="post">
            <div class="input-field">
                <input type="text" name="email" class="input" placeholder="Correo">
                <i class="fa-regular fa-envelope"></i>
            </div>
            
            <div class="input-field">
                <input type="password" name="password" class="input" placeholder="Contraseña">
                <i class="fa-solid fa-lock"></i>
            </div>
            
            <div class="input-field">
                <button type="submit" name="ingresar" class="submit"> <strong>Iniciar sesión</strong></button>
            </div>
            <div class="bottom">
                <div class="left">
                    <div class="checkbox-wrapper-13">
                        <input id="c1-13" type="checkbox" class="check" name="check">
                        <label for="c1-13">¿Eres doctor?</label>
                      </div>
                </div>
                <div class="right">
                    <label> <a href="registro.php">Crear cuenta</a> </label>
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
                    'Cuidado!',
                    '<?php echo $error; ?>',
                    'warning'
                    )
                  </script> 
          <?php endif; ?>   
    

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
    <script src="https://kit.fontawesome.com/e05c1d4d14.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
</body>

</html>