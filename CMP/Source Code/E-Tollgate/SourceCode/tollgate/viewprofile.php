<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$uname = $_SESSION['username'];
if($_SESSION['username'] == true)  
{
	echo 'Welcome ' . $_SESSION['username'];
   
} 
else
 {
     echo 'Welcome Guest.';
}




$con = mysql_connect("localhost","root","");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 

mysql_select_db("tollgate", $con);
?>


<html>
<?php 
include 'header2.php';

?>
<head>



<style>

table

{

border-style:solid;

border-width:2px;

border-color:darkblue;
width: 1000px;
font-size: 23px;
}

th
{
  font-size: 20px;
  color:darkblue;
}


</style>

</head>

<body style="background-image:url(images/background.jpg";>

 <img src="images/myprofile.png" alt="Smiley face" align="middle"> 


<?php
 

$result = mysql_query("SELECT * from register WHERE name ='$uname' ");

 

echo "<table border='1'>

<tr>

<th>Name</th>

<th>Password</th>

<th>Gender</th>

<th>State</th>

<th>Address</th>
<th>Email_Id</th>
<th>Mobile Number</th>

<th>Zipcode</th>
</tr>";
 

while($row = mysql_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['name'] . "</td>";

  echo "<td>" . $row['password'] . "</td>";

  echo "<td>" . $row['gender'] . "</td>";
 echo "<td>" . $row['state'] . "</td>";
  echo "<td>" . $row['address'] . "</td>";
 
  echo "<td>" . $row['email_id'] . "</td>";
  echo "<td>" . $row['mobile'] . "</td>";
 echo "<td>" . $row['zipcode'] . "</td>";
 
  

  echo "</tr>";

  }

echo "</table>";

 

mysql_close($con);

?>

</body>

</html>
