<?php

require('./fpdf.php');
require "../model/conexion.php";

$conexion = new Conexion();
$conn = $conexion->conectar();



class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      global $conn;

      $id_citas = $_GET['id'];

      $query = $conn->query("SELECT *
      FROM TBL_diagnostico
      INNER JOIN TBL_citas ON TBL_diagnostico.id_citas = TBL_citas.id_citas
      INNER JOIN TBL_usuario ON TBL_citas.id_usuario = TBL_usuario.id_usuario
      INNER JOIN TBL_doctor ON TBL_citas.id_doctor = TBL_doctor.id_doctor 
      WHERE TBL_diagnostico.id_citas = $id_citas");
      $dato_info = $query->fetch(PDO::FETCH_OBJ);

      $this->Image('../img/SaludConecta-removebg-.png', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('SaludConecta'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* Nombre usuario */
      $this->Cell(70);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(70, 5, utf8_decode("Paciente : ". $nombre_usu = $dato_info->nombreCompleto), 0, 0, '', 0);
      $this->Ln(5);

      /* DOCTOR */
      $this->Cell(70);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(70, 5, utf8_decode("Doctor : ". $nombre_Doc = $dato_info->nombre_doc), 0, 0, '', 0);
      $this->Ln(5);



      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(30, 72, 90);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE LA CONSULTA "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(168, 202, 219); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(80, 10, utf8_decode('DIAGNÓSTICO'), 1, 0, 'C', 1);
      $this->Cell(80, 10, utf8_decode('MEDICAMENTO'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

$id_citas = $_GET['id'];

$query = $conn->query(" select * from TBL_diagnostico WHERE id_citas = $id_citas");
$dato_info = $query->fetch(PDO::FETCH_OBJ);

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 10);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;
/* TABLA */
$pdf->Cell(80, 10, utf8_decode($Diagno = $dato_info->diagnostico), 1, 0, 'C', 0);
$pdf->Cell(80, 10, utf8_decode($medicamento = $dato_info->medicamento), 1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($estatus = $dato_info->estado), 1, 1, 'C', 0);


$pdf->Output('Prueba.pdf', 'D');//nombreDescarga, Visor(I->visualizar - D->descargar)
