<?php
error_reporting(E_ALL ^ E_DEPRECATED);



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




button[type=submit] {
    width: 155px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
font-color:darkblue;
color:white;
background-color:   #00BFFF;
}






</style>

</head>

<body style="background-image:url(images/background.jpg";>

 <img src="images/vehicle.png" alt="Smiley face" align="middle"> 



  <table>
    <form  method="post">
             

  <tr>
                   <td>
                        Toll Area:
                   </td> 
                   <td>
                       <input type="text" name="area"/>
                   </td>
                </tr>






                        
                    <tr>
                    <td>
                        <button type="submit" name="register" >Vehicle Track</button>
                    </td>
                </tr>




 </table>  </form> 













<?php
 error_reporting(E_ALL ^ E_DEPRECATED);

if(isset($_POST['register']))
{


  
 $vehicle = $_POST['area'];


$result = mysql_query("SELECT * from tollpass  WHERE tollarea= '$vehicle'");

 

echo "<table border='1'>

<tr>

<th>Name</th>

<th>Vehicle</th>

<th>Vehicle_Number</th>

<th>Tollarea</th>

<th>Date</th>
<th>Time</th>


<th>Amount</th>
</tr>";
 

while($row = mysql_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['username'] . "</td>";

  echo "<td>" . $row['vehicle'] . "</td>";

  echo "<td>" . $row['vehicle_number'] . "</td>";
 echo "<td>" . $row['tollarea'] . "</td>";
  echo "<td>" . $row['date1'] . "</td>";
 
  echo "<td>" . $row['time1'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
 
 
  

  echo "</tr>";

  }
}
echo "</table>";

 

mysql_close($con);




?>





</body>

</html>
