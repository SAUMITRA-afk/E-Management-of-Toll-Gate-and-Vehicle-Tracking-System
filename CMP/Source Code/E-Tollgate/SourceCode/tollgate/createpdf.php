<?php
 $hostname = 'localhost';
        $dbname   = 'tollgate';
        $username = 'root'; 
        
        mysql_connect('localhost', 'root', '') or DIE('Connection Not FOUND..!');
        mysql_select_db('tollgate') or DIE('Database name is not available!');
$sql = "SELECT * FROM tollfare";

require('fpdf13/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
while ($field_info = mysqli_fetch_field($resultset)) {
    $pdf->Cell(47,12,$field_info->name,1);
}
while($rows = mysqli_fetch_assoc($resultset)) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($rows as $column) {
		$pdf->Cell(47,12,$column,1);
	}
}
$pdf->Output();
?>