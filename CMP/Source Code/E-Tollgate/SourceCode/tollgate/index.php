<?php require_once('Connections/tollgate.php'); ?>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "signupform")) {

  $insertSQL = sprintf("INSERT INTO userdetails (cid, passwd, mailid) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['username1'], "text"),
                       GetSQLValueString($_POST['password1'], "text"),
                       GetSQLValueString($_POST['email1'], "text"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result1 = mysql_query($insertSQL, $tollgate) or die(mysql_error());
  
  
  $grp="grp03";
	
  $insertSQL1 = sprintf("INSERT INTO logindetails (uname, passwd, id,fullname,grp) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['username1'], "text"),
                       GetSQLValueString($_POST['password1'], "text"),
					   GetSQLValueString($_POST['username1'], "text"),
					   GetSQLValueString($_POST['username1'], "text"),
                       GetSQLValueString($grp, "text"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result11 = mysql_query($insertSQL1, $tollgate) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php
$flg=0;
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['uname'])) {
  $loginUsername=$_POST['uname'];
  $password=$_POST['passwd'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "das";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_tollgate, $tollgate);
  
  $LoginRS__query=sprintf("SELECT * FROM logindetails WHERE uname=%s AND passwd=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $tollgate) or die(mysql_error());
  $row_LoginRS = mysql_fetch_assoc($LoginRS);
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	
	$_SESSION['id']=$row_LoginRS['id'];
	$_SESSION['grp']=$row_LoginRS['grp'];         

    if($_SESSION['grp']=="grp01")
	{
		header("Location: Admin/dashboard.php" );
	}
	 if($_SESSION['grp']=="grp02"){
		header("Location: Staff/dashboard.php");
	}
	if($_SESSION['grp']=="grp03"){
		header("Location: Users/dashboard.php");
	}}
  else {
	   $flg=1;
    //header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="en">
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
	
  
	
 

<link href="css/drop_menu.css" rel="stylesheet" type="text/css" />



 
    
</head>
<body>


<div class="bg">
<div class="bg-2">
  <!--==============================header=================================-->
    <?php include("header.php");  ?> 

     <h2><marquee ><font color="darkblue">Welcome &nbsp to &nbsp E-Tollgate</font></marquee></h2>

  <!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="slogan">
        	<p>We <span class="clr-1">provide</span> you with the <span class="clr-1">highest</span>  level of <span class="clr-1">services</span></p>
            
            <a href="#" class="button-2">Service</a>
        </div>
        <div class="wrap page1-row1">
        	<div class="box-1 border-right">
            	<strong class="number number-1">01.</strong>
                <span class="text-1">24 Hours Multi Ticket</span>
                <p class="text-2">.</p>
            </div>
            <div class="box-1 border-right">
            	<strong class="number number-2">02.</strong>
                <span class="text-1">Monthly Local Area Pass</span>
                <p class="text-2">&nbsp;</p>
            </div>
          <div class="box-1 border-right">
            	<strong class="number number-3">03.</strong>
            <span class="text-1">Monthly <br>
Pass</span>
                <p class="text-2">. </p>
            </div>
            <div class="box-1 last">
            	<strong class="number number-4">04.</strong>
                <span class="text-1">Monthly Short Distance Travel</span>
                <p class="text-2">&nbsp;</p>
            </div>
        </div>
        <div class="wrap page1-row2">
        	<div class="page1-col-1 border-right">
            	<h2>We know what it takes<strong class="clr-1">to be the leader</strong></h2>
                <div class="wrap">
                	<img src="images/page1-img1.jpg" alt="" class="img-indent img-border">
                  

                  

                    
                </div>
                <p><strong>Toll Gate Management is a Web Protal..that keep track of a Toll gate booth details, branch details, staff details, user details and Fare details of each toll booth and collection details of each toll booth.</strong> </p>
                <a href="#" class="link-2">Read more</a>
            </div>
            <div class="page1-col-2 border-right">
            
            	<h2><span class="clr-1">L</span>ogin</h2>
                <?php if($flg==1)
			{ echo "<blink><font style='color:#F00; font-size:12px; font-weight:bold'><img src='images/error.png' width='16' height='14' alt='' />&nbsp; User Name or Password is Wrong !</font></blink>";
			}?>	
<form name="login" method="POST" action="<?php echo $loginFormAction; ?>" class="form_container left_label">
							<ul>
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lusername" for="username">Username<span class="req">*</span></label>
									<div class="form_input">
										<input id="uname" name="uname" type="text" value="" maxlength="50" class="large"/>
									</div>
								</div>
								</li>
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lpassword" for="password">Password<span class="req">*</span></label>
									<div class="form_input">
										<input id="passwd" name="passwd" type="password" maxlength="50" value="" class="large"/>
									</div>
								</div>
								</li>
								
								
								
								<li>
								<div class="form_grid_12">
									<div class="form_input">
										<button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Login</span></button>
									</div>
								</div>
								</li>
							</ul>
						</form>
                
            </div>   
         <!--    <div class="page1-col-3">
            	<h2><span class="clr-1">R</span>egister</h2>
                <form name="signupform" id="signupform" autocomplete="off" method="POST" action="<?php echo $editFormAction; ?>" class="form_container left_label">
							<ul>
								
								
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lusername" for="username1">Username<span class="req">*</span></label>
									<div class="form_input">
										<input id="username1" name="username1" type="text" value="" maxlength="50" class="large"/>
								  </div>
								</div>
								</li>
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lpassword" for="password1">Password<span class="req">*</span></label>
									<div class="form_input">
										<input id="password1" name="password1" type="password" maxlength="50" value="" class="large"/>
								  </div>
								</div>
								</li>
								
								<li>
								<div class="form_grid_12">
									<label class="field_title" id="lemail" for="email1">Email ID<span class="req">*</span></label>
									<div class="form_input">
										<input id="email1" name="email1" type="text" value="" maxlength="150" class="large"/>
								  </div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title" id="lemail" for="email1">Address<span class="req">*</span></label>
									<div class="form_input">
									  <textarea id="address" name="address" type="text" value="" maxlength="150" class="required  large"></textarea>
								  </div>
								</div>
								</li>
								
								<li>
								<div class="form_grid_12">
									<div class="form_input">
										<button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Signup</span></button>
									</div>
								</div>
								</li>
							</ul>
							<input type="hidden" name="MM_insert" value="signupform">
              </form> -->
            </dp iv>     
        </div>
    </section> 
</div>       
</div> 
<!--==============================aside=================================-->
  <?php include("side.php");?>
<!--==============================footer=================================-->
  <footer>
      <p>Copyright © 2017 Toll Gate All Rights Reserved.</p>
  </footer>	       
</body>
   

  
</html>