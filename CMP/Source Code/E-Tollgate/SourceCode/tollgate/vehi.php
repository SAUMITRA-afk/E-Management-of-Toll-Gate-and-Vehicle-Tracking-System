<?php

require_once('Connections/tollgate.php');

 mysql_select_db($database_tollgate, $tollgate);
 $amount = $_GET['aa'];

$query_userdetail = sprintf("SELECT * FROM tollfare WHERE vehicle='$amount'   ");
$userdetail = mysql_query($query_userdetail, $tollgate) or die(mysql_error());
$row_userdetail = mysql_fetch_assoc($userdetail);
$totalRows_userdetail = mysql_num_rows($userdetail);
echo "amount".$row_userdetail['amount'];


?>