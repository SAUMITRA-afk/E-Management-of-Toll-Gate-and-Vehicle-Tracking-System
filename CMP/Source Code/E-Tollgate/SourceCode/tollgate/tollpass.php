<?php 
require_once("dompdf-master/dompdf_config.inc.php");
require_once('Connection/db.php');
$name=$_GET['name'];

mysql_select_db($database, $ehall);
$query_hallstu = "SELECT * FROM tollpass where username='$name'";
$hallstu = mysql_query($query_hallstu, $ehall) or die(mysql_error());
$row_hallstu= mysql_fetch_assoc($hallstu);
$totalRows_hallstu= mysql_num_rows($hallstu);
 

$sub_array=array();
$rem_dup=array();

$html=
'
<style>

table {
 border: 2px solid #000;   
 color:darkblue;
}

td {
    padding: 10px;
 border: 1px solid #cc; 
}

</style>
<body>
<h1 align="center">Tollpass</h1>';
$html.='
<div id="header">
<img src="images/toll.jpg" alt="Mountain View" style="width:460px;height:128px;"><br><br>
        
       <table>
               
                  <tr>  <td>Name</td><td>'.$row_hallstu['username'].'</td></tr>
				  
				  
                  <tr>  <td>Year</td>    <td>'.$row_hallstu['year'].'</td></tr>
                <tr>    <td>Vehicle</td>  <td>'.$row_hallstu['vehicle'].'</td></tr>
                     <tr>  <td>Vehicle Number</td> <td>'.$row_hallstu['vehicle_name'].'</td></tr>
					   <tr>   <td>Tollarea</td> <td>'.$row_hallstu['tollarea'].'</td></tr>
					    <tr>     <td>Date</td>  <td>'.$row_hallstu['date1'].'</td></tr>
						   <tr>   <td>Time</td> <td>'.$row_hallstu['time1'].'</td></tr>
						       <tr>  <td>TollFare</td>  <td>'.$row_hallstu['amount'].'</td></tr>
						   
                
                
          </table> 
           
			
     </div>
     <div id="footer"></div>';
$html.='<body>';

 $dompdf = new DOMPDF();
  $dompdf->load_html($html);
  //$paper_size = array(0,0,612.00,792.00);
$dompdf->set_paper('A5','portrait');
   
 
  $dompdf->render();

  $dompdf->stream("dis.pdf", array("Attachment" => false));
 
?>
