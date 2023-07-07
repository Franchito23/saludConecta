<?php

    //CONFIGURACIÓN DE DATOS DE ACCESO  A LA BASE DE DATOS

    class Conexion {
      private $dsn = 'mysql:host=localhost;dbname=BD_saludConecta';
      private $usuario = 'root';
      private $password = '12345';
    
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

