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

class Conexion {
    private $dsn = 'mysql:host=saludconecta.mysql.database.azure.com;port=3306;dbname=bd_saludconecta';
    private $usuario = 'Frank';
    private $password = 'saludConecta.';
  
    public function conectar() {
        try {
            $con = mysqli_init();
            mysqli_ssl_set($con, NULL, NULL, "../certificado/DigiCertGlobalRootCA.crt", NULL, NULL);
            mysqli_real_connect($con, "saludconecta.mysql.database.azure.com", $this->usuario, $this->password, "BD_saludConecta", 3306, MYSQLI_CLIENT_SSL);
  
            $conn = new PDO($this->dsn, $this->usuario, $this->password);
            return $conn;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            exit;
        }
    }
}

// Ruta al certificado CA (sustituye con la ubicación correcta)
$ruta_certificado_ca = "../certificado/DigiCertGlobalRootCA.crt";

// Crear una instancia de la clase de conexión
$conexion = new Conexion();

// Establecer la ruta al certificado CA en la función mysqli_ssl_set()
mysqli_ssl_set(null, null, null, $ruta_certificado_ca, null, null);

// Conectar a la base de datos
$conn = $conexion->conectar();

// Resto del código...


  
  
   

    



