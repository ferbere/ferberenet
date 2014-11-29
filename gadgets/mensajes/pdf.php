<?php
require("fpdf/mysql_table.php");

class PDF extends PDF_MySQL_Table
{
function Header()
{
    //Title
    $this->SetFont('Arial','',14);
    $this->Cell(0,4,'Olga Diaque',0,1,'C');

    $this->SetFont('Arial','I',9);
    $this->Cell(0,4,'Documentos Personales',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,6,'Página '.$this->PageNo(),0,1,'C');
    $this->SetFont('Arial','',8);
    $this->SetY(-15);
    $this->SetX(20);
    $this->Cell(40,6,'www.olgadiaque.com',0,1,'L');

}

}

//Connect to database
mysql_connect('localhost:8888','root','root');
mysql_select_db('olgadiaque');

$pdf=new PDF('L');
/*$pdf->AddPage();
//First table: put all columns automatically
$pdf->Table('SELECT mails_massive_directorio.nombre,mails_massive_directorio.email,mails_massive_grupo.nombre FROM mails_massive_directorio INNER JOIN mails_massive_grupo ON mails_massive_directorio.grupo = mails_massive_grupo.id ORDER BY mails_massive_directorio.id');*/

$pdf->AddPage();
//Second table: specify 3 columns
$pdf->AddCol('0',70,'nombre','L');
$pdf->AddCol('1',60,'email','L');
$pdf->AddCol('2',25,'celular','R');
$pdf->AddCol('3',25,'particular','R');
$pdf->AddCol('4',25,'trabajo','R');
$pdf->AddCol('5',50,'confirmacion','L');
$pdf->AddCol('6',30,'invitación','L');
$prop=array('HeaderColor'=>array(200,200,250),
            'color1'=>array(210,210,210),
            'color2'=>array(255,255,255),
            'padding'=>2);
	$pdf->Table('SELECT mails_massive_directorio.nombre,mails_massive_directorio.email,mails_massive_directorio.telefono_celular,mails_massive_directorio.telefono_particular,mails_massive_directorio.telefono_trabajo,mails_massive_confirmacion.nombre,mails_massive_directorio_invi.nombre FROM mails_massive_directorio INNER JOIN mails_massive_confirmacion ON mails_massive_directorio.confirmacion = mails_massive_confirmacion.id INNER JOIN mails_massive_directorio_invi ON mails_massive_directorio.invitacion = mails_massive_directorio_invi.id WHERE mails_massive_directorio.grupo > 0 ORDER BY mails_massive_directorio.nombre',$prop);
$pdf->SetAuthor('Olga Diaque');
$pdf->SetTitle('Documento de su oficina de Relaciones Públicas');

$pdf->Output();

?>