 
      <?php 



error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$uname = $_SESSION['username'];


   
      if(isset($_POST['register']))
      {
    $post_name = $_POST['name'];
    echo    $post_name;
    $post_year = $_POST['year'];
    $post_vehicle= $_POST['veh'];
    $post_vehicleno= $_POST['vehnum'];
    $post_location = $_POST['location'];
  $post_time1 = $_POST['time1'];
  $post_amount = $_POST['amt'];
   $post_accno= $_POST['accno'];
   echo $post_accno;
  $post_pinno= $_POST['pinno'];

 $post_date= $_POST['date1'];
$post_bank= $_POST['bank'];
        //***** DB Connection *****//
        $hostname = 'localhost';
        $dbname   = 'tollgate';
        $username = 'root'; 
        
        mysql_connect('localhost', 'root', '') or DIE('Connection Not FOUND..!');
        mysql_select_db('tollgate') or DIE('Database name is not available!');
		echo "amount=".$post_amount;
  
 $query1 = "INSERT INTO tollpass(username, year,vehicle, vehicle_name,tollarea,date1,time1,amount) VALUES('". $post_name."','". $post_year."','". $post_vehicle."','". $post_vehicleno."','".$post_location."','".$post_date."','".$post_time1."','".$post_amount."')";

$query =  "UPDATE bank1 SET bankblc = (bankblc -  $post_amount) WHERE acc_no= '$post_accno'  And  pin='$post_pinno'  And bankname='$post_bank'  ";

echo $query;
//echo $query1;

        $result = mysql_query($query);
         if($result==false){
            die(mysql_error());
			
			
			
			
        }
		$result1 = mysql_query($query1);
         if($result1==false){
            die(mysql_error());
		 }
      


//$sql = "UPDATE tollpass SET bankblc = bankblc - $post_amount  WHERE username = '$uname'";


 


        
        
        //exit();
        
        
    }


    

    ?>



    <!DOCTYPE html>
    <html>

  
     <head>

    <title>Toll Gate</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link href='http://fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Passion+One:400,700' rel='stylesheet' type='text/css'>

<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="css/themes.css" rel="stylesheet" type="text/css">
<link href="css/typography.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/shCore.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/jquery.jqplot.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css">
<link href="css/data-table.css" rel="stylesheet" type="text/css">
<link href="css/form.css" rel="stylesheet" type="text/css">
<link href="css/ui-elements.css" rel="stylesheet" type="text/css">
<link href="css/wizard.css" rel="stylesheet" type="text/css">
<link href="css/sprite.css" rel="stylesheet" type="text/css">
<link href="css/gradient.css" rel="stylesheet" type="text/css">


<!-- Jquery -->
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.ui.touch-punch.js"></script>
<script src="js/chosen.jquery.js"></script>
<script src="js/uniform.jquery.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-colorpicker.js"></script>
<script src="js/sticky.full.js"></script>
<script src="js/jquery.noty.js"></script>
<script src="js/selectToUISlider.jQuery.js"></script>
<script src="js/fg.menu.js"></script>
<script src="js/jquery.tagsinput.js"></script>
<script src="js/jquery.cleditor.js"></script>
<script src="js/jquery.tipsy.js"></script>
<script src="js/jquery.peity.js"></script>
<script src="js/jquery.simplemodal.js"></script>
<script src="js/jquery.jBreadCrumb.1.1.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/jquery.idTabs.min.js"></script>
<script src="js/jquery.multiFieldExtender.min.js"></script>
<script src="js/jquery.confirm.js"></script>
<script src="js/elfinder.min.js"></script>
<script src="js/accordion.jquery.js"></script>
<script src="js/autogrow.jquery.js"></script>
<script src="js/check-all.jquery.js"></script>
<script src="js/data-table.jquery.js"></script>
<script src="js/ZeroClipboard.js"></script>
<script src="js/TableTools.min.js"></script>
<script src="js/jeditable.jquery.js"></script>
<script src="js/duallist.jquery.js"></script>
<script src="js/easing.jquery.js"></script>
<script src="js/full-calendar.jquery.js"></script>
<script src="js/input-limiter.jquery.js"></script>
<script src="js/inputmask.jquery.js"></script>
<script src="js/iphone-style-checkbox.jquery.js"></script>
<script src="js/meta-data.jquery.js"></script>
<script src="js/quicksand.jquery.js"></script>
<script src="js/raty.jquery.js"></script>
<script src="js/smart-wizard.jquery.js"></script>
<script src="js/stepy.jquery.js"></script>
<script src="js/treeview.jquery.js"></script>
<script src="js/ui-accordion.jquery.js"></script>
<script src="js/vaidation.jquery.js"></script>
<script src="js/mosaic.1.0.1.min.js"></script>
<script src="js/jquery.collapse.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jquery.autocomplete.min.js"></script>
<script src="js/localdata.js"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.jqplot.min.js"></script>
<script src="js/chart-plugins/jqplot.dateAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.cursor.min.js"></script>
<script src="js/chart-plugins/jqplot.logAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.canvasTextRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.highlighter.min.js"></script>
<script src="js/chart-plugins/jqplot.pieRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.barRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.pointLabels.min.js"></script>
<script src="js/chart-plugins/jqplot.meterGaugeRenderer.min.js"></script>
<script src="js/custom-scripts.js"></script>

<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
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
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","result.php?q="+str,true);
  xmlhttp.send();
}





function get_ass(va){
	var drop_1=$("#year option:selected").val();
	var Datastring="drop_1="+drop_1+"&vehicle="+va;
	//alert(Datastring);
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
	var res=result.split("*");
		$("#veh").val(va);$("#amt").val(res[1]);
		$("#view_ass").html(res[0]);
     
    },
    error : function(error,sts,xhr)
    {
      alert(error.responseText);
    },
    }); 
}
</script>




    
  <link href="css/drop_menu.css" rel="stylesheet" type="text/css" /> 
   <link href="css/user.css" rel="stylesheet" type="text/css" />
   <style>
   select
   {
    width:170px;
height: 39px;
   }
   </style>
</head>
 
   <body>
<div class="bg">
<div class="bg-2"> 
  <!--==============================header=================================-->
    <?php include("header.php");  ?> 

    
<!--   <table>   <img src="images/register3.png" alt="Smiley face" align="right"> -->
    
   <center>
<?php //echo $post_name;?>
    <table>
        
          
            <form  method="post"> 
     <input type="hidden" name="veh" id="veh"><input type="hidden" name="amt" id="amt">
            <tr>
            
                    <td>
                      UserName:  
                    </td>

                    <td>
                       <input type="text" name="name"/> 
                    </td>
                    </tr>
                    <tr>
                        <td>
                       Year: 
                    </td>
                    <td>
                          <select  name="year" id ="year" onchange="showUser(this.value)" selected="selected">
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
</select>

                    </td>
                    </tr>
                  

  <tr>
                    <td>
                       Vehicle:  
                    </td>
                    <td>
					<div id="txtHint">
					</div>
                        
                    </td>
                </tr>


 <tr>
                    <td>
                       Vehicle Number:  
                    </td>
                    <td>
					
                       <input type="text" name="vehnum"/>  
                    </td>
                </tr>





                
                <tr>
                    <td>
                       Location:  
                    </td>
                    <td>
                       <input type="text" name="location"/>  
                    </td>
                </tr>



 <tr>
                    <td>
                       Date:  
                    </td>
                    <td>
                       <input type="text" name="date1"/>  
                    </td>
                </tr>







   <tr>
                    <td>
                       Time:  
                    </td>
                    <td>
                       <input type="text" name="time1"/>  
                    </td>
                </tr>





                <tr>
                   <td>
                     Amount: 
                   </td> 
                   <td>
                     <div id="view_ass"></div>
  
                   </td>
                </tr>


                    <tr>
                   <td>
                        Bank Accountno:
                   </td> 
                   <td>
                       <input type="text" name="accno"/>
                   </td>
                </tr>
               

  <tr>
                   <td>
                        Pin No:
                   </td> 
                   <td>
                       <input type="text" name="pinno"/>
                   </td>
                </tr>

                
 <tr>
                   <td>
                        Bank Name:
                   </td> 
                   <td>
                       <input type="text" name="bank"/>
                   </td>
                </tr>


                        
                    <tr>
                    <td>
                        <input type="submit" name="register" value="Gatepass Booking"/>
                    </td>
                </tr>
              
     </table> 

<!--  <a href ="tollpass.php?name='santhosh'">Generate Gatepass</a> -->


 <a href ="tollpass.php?name=<?php echo $post_name;?>">Generate Gatepass</a>


	 </form>  </center>


     
  <footer>


      Copyright © 2017 Toll Gate All Rights Reserved.
  </footer>       
   
</body>
  
</html>
