<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ehall = "localhost";
$database_ehall = "tollgate";
$username_ehall = "root";
$password_ehall = "";
$ehall = mysql_pconnect($hostname_ehall, $username_ehall, $password_ehall) or trigger_error(mysql_error(),E_USER_ERROR); 
?>