<?php
include('tollgate.php');
 require_once('Connections/tollgate.php');

 mysql_select_db($database_tollgate, $tollgate);
 // echo "SELECT * FROM tollfare WHERE year='".$_POST['year']."'  ";
$query_userdetail = sprintf("SELECT * FROM tollfare WHERE vehicle = '".$_POST['vehicle']."'  ");
$userdetail = mysql_query($query_userdetail, $tollgate) or die(mysql_error());
$row_userdetail = mysql_fetch_assoc($userdetail);
$totalRows_userdetail = mysql_num_rows($userdetail);
echo '<input type = "text" name = "amount" id="amount" value="'. $row_userdetail['amount'].'" />'."*".$row_userdetail['amount'];

 ?>