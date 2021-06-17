<?php 
require_once("dompdf-master/dompdf_config.inc.php");
//require_once('../Connections/ehall.php');


$sub_array=array();
$rem_dup=array();

$html=
'
<style>

table {
 border: 2px solid #000;   
}

td {
    padding: 10px;
 border: 1px solid #cc; 
}

</style>
<body>
<h1 align="center">pdfdemo</h1>
<table>
<tr>
<td>name</td><td>kumar</td></tr>
<tr>
<td>age</td></tr>
</table>';

$html.='<body>';

 $dompdf = new DOMPDF();
  $dompdf->load_html($html);
  //$paper_size = array(0,0,612.00,792.00);
$dompdf->set_paper('A4','portrait');
   
 
  $dompdf->render();

  $dompdf->stream("dis.pdf", array("Attachment" => false));

?>