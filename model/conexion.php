<?php

    //CONFIGURACIÓN DE DATOS DE ACCESO  A LA BASE DE DATOS

    class Conexion {
      private $dsn = 'mysql:host=saludconecta.mysql.database.azure.com;port=3306;dbname=BD_saludConecta';
      private $usuario = 'Frank';
      private $password = 'saludConecta.';
    
      public function conectar() {
          try {
              $conn = new PDO($this->dsn, $this->usuario, $this->password);
              return $conn;
          } catch (PDOException $e) {
              echo "Error de conexión: " . $e->getMessage();
              exit;
          }
      }
  }
  
   

    



