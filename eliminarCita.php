<?php 
include_once("includes/sidebar.php");

if (isset($_GET['id'])) {
  include "controller/deleteCitaCon.php";
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

                  
          <?php  endif; ?>      

            <?php if(isset($error)) : ?>
                <script>
                    Swal.fire(
                    'Good job!',
                    '<?php echo $error; ?>',
                    'warning'
                    )
                  </script> 
          <?php endif; ?>      



