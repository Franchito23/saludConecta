<?php 
include("includes/sidebar.php"); 
include("controller/homeAdminCon.php");

if ($_SESSION['id_rol'] != 2) {
  $error = "Usted no tiene permisos para entrar";

  header("Location: home.php");
}

?>

<head>
  <title>HomeAdmin</title>
  <link rel="stylesheet" href="css/citas.css">
</head>

<h1 class="animate__animated animate__fadeInDown text">Bienvenido Admin <?php echo $nombre; ?>!</h1>

<div class="cardForm">

    <form method="post" class="medical-form">
    <h3 class="text-center animate__animated animate__fadeInDown">Inserta los doctores</h3>
    <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre_doctor">
          </div>
    <div class="form-group">
    <label>Correo</label>
            <input type="email" name="correo" required="" >
            
          </div>
    <div class="form-group">
    <label>Telefono</label>
            <input type="text" name="telefono" required="">

          </div>
    <div class="form-group">
    <label>Documento</label>
            <input type="text" name="documento" required="">
          </div>
          <div class="form-group">
          <label>Contraseña</label>
            <input type="password" name="clave" required="">
          </div>
            <button type="submit" name="crearDoctor" class="boton">Insertar Doctor</button> 
          
    </form>
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


</body>

