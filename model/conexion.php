<?php

    //CONFIGURACIÓN DE DATOS DE ACCESO  A LA BASE DE DATOS

    class Conexion {
      private $dsn = 'mysql:host=saludconecta.mysql.database.azure.com;port=3306;dbname=BD_saludConecta';
      private $usuario = 'Frank';
      private $password = 'saludConecta.';
    
      public function conectar() {
          try {
              $opciones = array(
                  PDO::MYSQL_ATTR_SSL_CA => '{ruta_al_certificado_CA}',
                  PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
              );
              $conn = new PDO($this->dsn, $this->usuario, $this->password, $opciones);
              return $conn;
          } catch (PDOException $e) {
              echo "Error de conexión: " . $e->getMessage();
              exit;
          }
      }
  }
  
  
   

    



