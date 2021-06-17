<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_tollgate = "localhost";
$database_tollgate = "tollgate";
$username_tollgate = "root";
$password_tollgate = "";
$tollgate = mysql_pconnect($hostname_tollgate, $username_tollgate, $password_tollgate) or trigger_error(mysql_error(),E_USER_ERROR); 
?>