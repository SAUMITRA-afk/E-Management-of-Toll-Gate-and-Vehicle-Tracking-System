

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="meeting"; // Database name
$tbl_name="admin"; // Table name

// Connect to server and select databse.
 $connect = mysql_connect('localhost','root','');
mysql_select_db("$db_name")or die("cannot select DB");
if(isset($_POST['Submit'])){
// username and password sent from form
$myusername=$_POST['myusername'];


$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";

$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"

header("location:adminprocess.php");
echo "Login successfully";
}
else {
echo '<script type="text/javascript">alert("Invalid Username Or Password");</script>';
}}
?>
<?php 
include 'Header.php';

?>
<html>
<body style="background-color:#a1dcf0";">
<style>
input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
   
    
    
}

input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
   
    
}


input[type=submit] {
    width: 60%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #3CBC8D;
    color: white;
}

td
{
	color:darkblue;
	font-size: 20px;
}
a
{
	font-size: 20px;
}

</style>
  <img src="images/admin7.png" alt="Smiley face" height="244" width="340">
<center> <img src="images/admin2.png" alt="Smiley face" height="244" width="340"> </center>





<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" >
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Admin Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="text" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>

</tr>
</table>
</td>
</form>
</tr>

</table>
<center><a href="register.php">Register Here</a> </center>
<img src="images/admin3.png" alt="Smiley face" height="200" width="250"align="right"> 
</body>
</html>
<?php 
include 'footer.php';

?>