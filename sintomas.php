<?php
include "includes/sidebar.php";
include "controller/sintomasCon.php";

?>


<head>
    <title>Sintomas</title>
    <link rel="stylesheet" href="css/sintomas.css">
</head>
 


<div class="contenedor-sintomas">
        <h1>Formulario de sintomas</h1>
        <p>Se lo más sincero posible, la información solo será para tu doctor</p>
        <form action="" method="post">


                <div class="columna">
                    <label for="">Descripcion de sintomas</label>
                    <textarea rows="3" type="text" name="sintomas" placeholder="Sintomas"></textarea>
                </div>
                
                <div class="fila">
                <div class="columna">
                    <label for="">Tiempo de padecimiento</label>
                    <input type="text" name="tiempo_sintomas" placeholder="Hace cuento estás sintiendo dolor/molestia">
                </div>

            </div>

                <div class="fila">
                <div class="columna">
                    <label for="">Nivel de intensidad</label>
                    <input type="text" name="intensidad" placeholder="Describe qué tan intenso es tu dolor">
                </div>

                <div class="columna">
                    <label for="">¿Es frecuente?</label>
                    <input type="text" name="frecuencia" placeholder="Describe qué tan frecuente es tu dolor">
                </div>
            </div>
            
            <div class="fila">
                <div class="columna">
                    <label for="">¿Tienes enfermedades heredadas?</label>
                    <input type="text" name="enfermedad_heredada" placeholder="Escribe si tienes enfermedades">
                </div>

                <div class="columna">
                    <label for="">¿Tomas algún médicamento?</label>
                    <input type="text" name="medicamento" placeholder="Escribe el nombre del medicamento si lo consumes">
                </div>
            </div> 
            <div class="boton">
            <button type="submit" name="enviarSintomas">Enviar</button>
        </div>
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