<?php 
require_once('../Connections/ehall.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$timezone = new DateTimeZone("Asia/Kolkata" );
  $date = new DateTime();
  $date->setTimezone($timezone );
  $mm=$date->format('m');
  $yy=$date->format('Y');	






mysql_select_db($database_ehall, $ehall);
$query_staff ="SELECT * FROM  setting_department where status='0' ORDER BY sno ASC";
$staff = mysql_query($query_staff, $ehall) or die(mysql_error());
$staff1 = mysql_query($query_staff, $ehall) or die(mysql_error());
$row_staff = mysql_fetch_assoc($staff);
$row_staff1 = mysql_fetch_assoc($staff1);
$totalRows_staff = mysql_num_rows($staff);


mysql_select_db($database_ehall, $ehall);
$query_hall ="SELECT * FROM  hall_details where status='0' ORDER BY sno ASC";
$hall = mysql_query($query_hall, $ehall) or die(mysql_error());
$row_hall = mysql_fetch_assoc($hall);
$totalRows_hall = mysql_num_rows($hall);

mysql_select_db($database_ehall, $ehall);
$query_staffhall ="SELECT * FROM  setting_staff where status='0' ORDER BY sno ASC";
$staffhall = mysql_query($query_staffhall, $ehall) or die(mysql_error());
$row_staffhall= mysql_fetch_assoc($staffhall);
$totalRows_staffhall = mysql_num_rows($staffhall);



?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->                
    <title>Allocation</title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
       
<script type='text/javascript' src='js/plugins/jquery/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='js/plugins/other/excanvas.js'></script>
    <script type='text/javascript' src='js/plugins/other/jquery.mousewheel.min.js'></script>
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>            
    <script type='text/javascript' src='js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>    
<script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>    
<script type='text/javascript' src='js/plugins/cleditor/jquery.cleditor.js'></script>        
<script type='text/javascript' src='js/plugins/ckeditor/ckeditor.js'></script> 
<script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>
<script type='text/javascript' src="js/plugins/select/select2.min.js"></script>
<script type='text/javascript' src='js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
<script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
<script type='text/javascript' src='js/plugins/multiselect/jquery.multi-select.min.js'></script>
<script type='text/javascript' src='js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
<script type='text/javascript' src='js/plugins/validationEngine/jquery.validationEngine.js'></script>    
<script type='text/javascript' src='js/plugins/shbrush/XRegExp.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shCore.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shBrushXml.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shBrushJScript.js'></script>
<script type='text/javascript' src='js/plugins/shbrush/shBrushCss.js'></script>    
<script type='text/javascript' src='js/plugins.js'></script>
<script type='text/javascript' src='js/charts.js'></script>
<script type='text/javascript' src='js/actions.js'></script>
   

<style>


table {
 border: 2px solid black;   
}

td {
    padding: 10px;
 border: 1px solid lightgrey; 
}

</style>
 
   
</head>
<body onLoad="myfunction();">    
<div id="loader"><img src="img/loader.gif"/></div>
    <div class="wrapper">
        
        <?php include('sidebar.php');?>
        
        <div class="body">
            <div class="content">
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-ok"></span>
                    </div>
                    <h1>Allocation Process<small> allocation</small></h1>
                </div>
                   <form name="compose" id="validate" method="POST" action="<?php echo $editFormAction; ?>" enctype="multipart/form-data">
                            <div class="data-fluid">
                            <div class="row-form">
                                    <div class="span2">Date of Exam :</div>
                                    <div class="span3">
                             <input type="text" class="datepicker" name="edate" id="edate">
                                    </div>
                                     
                                      
                                </div>
                                <div class="row-form">
                                    <div class="span2">Session :</div>
                                    <div class="span3">
                             <select name="session" id="e_sess" class="validate[required]" style="width: 100%;"  >
                             <option value="">Choose the session</option>
                            
                               <option value="FN">FN</option>
                                <option value="AN">AN</option>
                               
                               </select>
                                    </div>
                                     
                                      
                                </div>
                                
                                <input type="hidden" id="rows">
                                   <input type="hidden" id="dep_stu">
                                <div class="row-form">
                                    <div class="span2">Hall No :</div>
                                    <div class="span3">
                             <select name="hallno" id="hall_name" class="validate[required]" style="width: 100%;" onChange="return showpro1(this.value)"  ><option value="">Choose the Hall No</option>
                             <?php do{?>
                             
                               <option value="<?php echo $row_hall['rno']; ?>"><?php echo $row_hall['rno']; ?></option>
                               <?php }while($row_hall = mysql_fetch_assoc($hall));?>
                               </select>
                                    </div>
                                     
                                      
                                </div>
                                <div class="row-form" id="avi_seats" style="display:none">
                                    <div class="span3">
                            <div id="txtHint1"></div>
                                    </div>
                                     
                                      
                                </div>
                                <div class="row-form">
                                    <div class="span2">Invigilator Name :</div>
                                    <div class="span3">
                             <select name="staff_name" id="staff_name" class="validate[required]" style="width: 100%;" >
                             <option value="">Choose the Invigilator</option>
                             <?php do{?>
                             
                               <option value="<?php echo $row_staffhall['staff_name']; ?>"><?php echo $row_staffhall['staff_name']; ?></option>
                               <?php }while($row_staffhall= mysql_fetch_assoc($staffhall));?>
                               </select>
                                    </div>
                                     
                                      
                                </div>
                                <div class="row-form">
                                    <div class="span2">Department :</div>
                                    <div class="span3">
                             <select name="deprt" id="dep1" class="validate[required]" style="width: 100%;" onChange="return depa1(this.value)" ><option value="">Choose the Department</option>
                             <?php do{?>
                             
                               <option value="<?php echo $row_staff['dname']; ?>"><?php echo $row_staff['dname']; ?></option>
                               <?php }while($row_staff = mysql_fetch_assoc($staff));?>
                               </select>
                                    </div>
                                     
                                      
                                </div>
                                <div id="depart1"></div>
                                
                                <div class="row-form">
                                    <div class="span2">Department :</div>
                                    <div class="span3">
                             <select name="deprt" id="dep2" class="validate[required]" style="width: 100%;"  onChange="return depa2(this.value)" ><option value="">Choose Second Department</option>
                             <?php do{?>
                               <option value="<?php echo $row_staff1['dname']; ?>"><?php echo $row_staff1['dname']; ?></option>
                               <?php }while($row_staff1 = mysql_fetch_assoc($staff1));?>
                               </select>
                                    </div>
                                     
                                      
                                </div>
                          
                           <div id="depart2"></div>
                                
                                
                                
                                
                                
                                
                             
                                
                               <div class=" toolbar">
                                   
                                        
                                        <a class="btn payroll">Generate</a>
                                   
                                </div>
                                

                            </div>
                           
 
  <div class="data-fluid" align="center">   
    <div class="row-form">                          
<div id="box">

</div>
</div>
</div>
</form>  
                               <div id="txtHint2"></div>          
            </div>
        </div>
    </div>
    <div class="dialog" id="source" style="display: none;" title="Source"></div>
    
    <script>
$(document).ready(function(e) {
$('.payroll').click(function()
{
 hall_structure();
});

function hall_structure()
{
//var checkname=$(this).val();

$('#box').html('');
var e_date=$('#edate').val();
var e_session=$('#e_sess').val();
var row1 = $('#rowcount').val();
var colm1 = $('#columncount').val();
var dep1 = $("#dep1").val();
var dep2 = $("#dep2").val();
var hall1 = $("#hall_name").val();
var dataString = 'row='+ row1 + '&colm='+ colm1 +'&dep='+dep1+'&dep1='+dep2+'&hall='+hall1+'&e_date1='+e_date+'&e_session1='+e_session;
$.ajax({
type: "POST",
url: "seat_stu.php",
data: dataString,
cache: false,
success: function(result){
	
	$('#box').html(result);
}
});
};


});	
</script>
    <script>
   
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	/*function showpro(oid) {		
	   
	//alert(oid);
		var strURL="exam_dep.php?id="+oid;
		//	alert(strURL);

		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {		
					 document.getElementById('avi_stu').style.display="block";			
						document.getElementById('txtHint').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}

				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}*/
	
	function showpro1(oid1) {		
	   
	//alert(oid);
		var strURL="exam_seat.php?id="+oid1;
		//	alert(strURL);

		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
							
					    document.getElementById('avi_seats').style.display="block";		
						document.getElementById('txtHint1').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}

				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
	
	
	function allcote(oid1) {		
	   var dep=oid1.split('~');
	   var e_date=$('#edate').val();
		var strURL="seat_all.php?id="+dep[0]+"&ea_date="+e_date;
		//	alert(strURL);

		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {	
						document.getElementById('displa'+dep[1]).innerHTML=req.responseText;
						document.getElementById('rows').value=dep[1];
						document.getElementById('dep_stu').value=dep[0];						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}

				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
	function depa1(val) {		
	   
	  
	   var strURL="exam_dep.php?id="+val+"&type=1";
		//	alert(strURL);

		var req = getXMLHTTP();
		
		if (req) {
			 
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {	
					    	
						document.getElementById('depart1').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}

				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
	
				
	}
	function depa2(val) {		
	   
	  
	   var strURL="exam_dep.php?id="+val+"&type=2";
		//	alert(strURL);

		var req = getXMLHTTP();
		
		if (req) {
			 
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {	
					    	
						document.getElementById('depart2').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}

				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
	
				
	}
</script>
</body>

</html>

