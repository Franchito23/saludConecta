<?php

    //CONFIGURACIÓN DE DATOS DE ACCESO  A LA BASE DE DATOS

  //   class Conexion {
  //     private $dsn = 'mysql:host=saludconecta.mysql.database.azure.com;port=3306;dbname=BD_saludConecta';
  //     private $usuario = 'Frank';
  //     private $password = 'saludConecta.';
    
  //     public function conectar() {
  //         try {
  //             $conn = new PDO($this->dsn, $this->usuario, $this->password);
  //             return $conn;
  //         } catch (PDOException $e) {
  //             echo "Error de conexión: " . $e->getMessage();
  //             exit;
  //         }
  //     }
  // }

//CONFIGURACIÓN DE DATOS DE ACCESO A LA BASE DE DATOS

$ruta_certificado_ca = "../certificado/DigiCertGlobalRootCA.crt.pem";

// Crear una instancia de la conexión mysqli
$conn = mysqli_init();

// Establecer la configuración SSL
mysqli_ssl_set($conn, NULL, NULL, $ruta_certificado_ca, NULL, NULL);

// Conectar al servidor de base de datos
mysqli_real_connect($conn, "saludconecta.mysql.database.azure.com", "Frank", "saludConecta.", "BD_saludConecta", 3306, MYSQLI_CLIENT_SSL);

// Verificar si la conexión es exitosa
if (mysqli_connect_errno()) {
    echo "Error de conexión: " . mysqli_connect_error();
    exit;
}

// Resto del código...

// Cerrar la conexión
mysqli_close($conn);


  
  
   

    



