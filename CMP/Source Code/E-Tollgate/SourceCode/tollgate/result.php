
<script>
function showamount(vall) {
  if (vall=="") {
    document.getElementById("txtH").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtH").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","vehi.php?aa="+vall,true);
  xmlhttp.send();
}
</script>

<?php
//include('db.php');
 require_once('Connections/tollgate.php');

 mysql_select_db($database_tollgate, $tollgate);
 $year = $_GET['q'];
 
//$query_userdetail = sprintf("SELECT * FROM tollfare WHERE year='$year'   ");
//$userdetail = mysql_query($query_userdetail, $tollgate) or die(mysql_error());
//$row_userdetail = mysql_fetch_assoc($userdetail);
//$totalRows_userdetail = mysql_num_rows($userdetail);
//echo "amount".$row_userdetail['vehicle'];

include_once('tollgate.php');
	$result = mysql_query("SELECT * FROM tollfare   ")

	or die(mysql_error());
	
echo '<select name="vehicle"  onchange="get_ass(this.value)">
	     <option value=" " disabled="disabled" selected="selected">Select The Vehicle</option>';
//echo $vehicle;
		   while($row = mysql_fetch_array($result)) 
			{
				
			  echo '<option value="'.$row['vehicle'].'">'.$row['vehicle'].'</option>';
			}
			
			echo '</select>';
	
 ?>
 