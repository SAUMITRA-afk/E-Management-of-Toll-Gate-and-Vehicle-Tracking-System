<script>
function get_ass(va){
	var year=$("#year option:selected").val();
	var Datastring="year="+va;
	alert(va);
	alert(Datastring);
	$.ajax({
    
    type:'POST',
    url:"ajax.php",
    data:Datastring,
    cache:false,
    processData:false,
    beforeSend: function(e)
    {
    },
    success: function(result)
    {
		alert(result);
		$("#view_ass").html(result);
     
    },
    error : function(error,sts,xhr)
    {
      alert(error.responseText);
    },
    }); 
}
</script>


<?php
require_once('Connections/tollgate.php');

 mysql_select_db($database_tollgate, $tollgate);
$yr = 2017;
$query_userdetail = sprintf("SELECT * FROM tollfare WHERE year =$yr ");
$userdetail = mysql_query($query_userdetail, $tollgate) or die(mysql_error());
$row_userdetail = mysql_fetch_assoc($userdetail);
$totalRows_userdetail = mysql_num_rows($userdetail);
echo "amount".$row_userdetail['amount'];
echo "SELECT * FROM tollfare WHERE year='2017'  ";
?>

<select  name="year" id ="year" onchange="get_ass(this.value)">
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
</select>


<div id="view_ass">
</div>













///////////////////


<p>Select a new car from the list.</p>

<select id="mySelect" onchange="myFunction()">
  <option value="Audi">Audi
  <option value="BMW">BMW
  <option value="Mercedes">Mercedes
  <option value="Volvo">Volvo
</select>



<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>
