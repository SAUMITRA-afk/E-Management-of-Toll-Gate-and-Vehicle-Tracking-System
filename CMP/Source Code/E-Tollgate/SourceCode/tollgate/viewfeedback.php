<?php



error_reporting(E_ALL ^ E_DEPRECATED);

$con = mysql_connect("localhost","root","");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 

mysql_select_db("tollgate", $con);
?>

<body style="background-image:url(images/background.jpg";>
<?php 
include 'Header4.php';

?>
<head>



<style>

table

{

border-style:solid;

border-width:2px;

border-color:black;
width: 955px;
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

  <img src="images/feedback1.png" alt="Smiley face" height="250" width="350"align="middle">  

  <img src="images/feedback4.png" alt="Smiley face" height="250" width="350"align="middle">  

<?php
 

$result = mysql_query("SELECT * from feedback ");



 

echo "<table border='1'>

<tr>

<th>Name</th>

<th>Email</th>

<th>Comments</th>




</tr>";

 

while($row = mysql_fetch_array($result))

 {

  echo "<tr>";

  echo "<td>" . $row['name'] . "</td>";

  echo "<td>" . $row['email_id'] . "</td>";

  echo "<td>" . $row['comments'] . "</td>";
 
 

  echo "</tr>";

  }

echo "</table>";


 

mysql_close($con);

?>

</body>

</html>
