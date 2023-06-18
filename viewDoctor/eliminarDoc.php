<?php 
include_once("../includes/sidebarDoc.php");

if (isset($_GET['id'])) {
  include "../controller/deleteCitaCon.php";
}

?>

            <?php if(isset($mensaje)) : ?>
                  <script>
                    Swal.fire(
                    'Good job!',
                    '<?php echo $mensaje; ?>',
                    'success'
                    )
                  </script> 

                  
          <?php header("Location: doctorCitas.php"); endif; ?>      

            <?php if(isset($error)) : ?>
                <script>
                    Swal.fire(
                    'Good job!',
                    '<?php echo $error; ?>',
                    'warning'
                    )
                  </script> 
          <?php endif; ?>      



