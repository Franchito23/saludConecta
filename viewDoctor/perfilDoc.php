<?php 
include_once("../includes/sidebarDoc.php");
include "../controller/perfilConDoc.php";

?>





<head>
<link rel="stylesheet" href="../css/perfil.css">
    <title>Perfil</title>
</head>
<div class="userPhoto">
  <img src="../img/User-Icon.svg" alt="" width="250px">
</div>
<div class="saludo">
  <h1>Hola <?php echo $nombre; ?>, este es tu perfil</h1>
  <p>Aquí podras actualizar tu información solo si es necesario!</p>
</div>
<section class="listaDatos">
  <ul>
    <li><i class="fa-solid fa-user"></i> <?php echo $nombre; ?></li>
    <li><i class="fa-solid fa-envelope"></i> <?php echo $correo; ?></li>
    <li><i class="fa-solid fa-phone"></i> <?php echo $telefono; ?></li>
    <li><i class="fa-solid fa-passport"></i> <?php echo $documento; ?></li>
  </ul>
</section>

        <!-- Modal trigger button -->
        <div class="button">
        <button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
        <i class="fa-sharp fa-solid fa-user-pen"></i> Actualizar datos
        </button>
      </div>
        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-dark" id="modalTitleId">Actualiza tus datos</h5>
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


                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-dark">
              <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

            <div class="mb-5 ">
            <label for="exampleFormControlInput1" class="col-form-label">Nombre</label>
            <input class="form-control" name="nombre" type="text" placeholder="Nombre Completo" aria-label="default input example">
            
              <label for="exampleFormControlInput1" class="col-form-label">Correo</label>
              <input type="email" name="correo" class="form-control" placeholder="name@example.com">
            
              <label for="exampleFormControlInput1" class="col-form-label">telefono</label>
              <input class="form-control" name="telefono" type="text" placeholder="Numero de telefono" aria-label="default input example">

              <label for="exampleFormControlInput1" class="col-form-label">Documento</label>
              <input class="form-control" name="documento" type="text" placeholder="Numero de documento" aria-label="default input example">

            
              <label for="inputPassword" class=" col-form-label">Contraseña</label>
              <input type="password" name="clave" class="form-control" id="inputPassword">
              
            </div>
          
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="editarDoctor" class="btn btn-primary">Guardar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
        
  
</div>
</div>
