<?php require_once('Connections/tollgate.php'); ?>
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

mysql_select_db($database_tollgate, $tollgate);
$query_maininfo = "SELECT * FROM tollgatedetail";
$maininfo = mysql_query($query_maininfo, $tollgate) or die(mysql_error());
$row_maininfo = mysql_fetch_assoc($maininfo);
$totalRows_maininfo = mysql_num_rows($maininfo);
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
    <header>
        <div class="logos"><a href="index.php"><img src="images/logo.png" alt=""></a></div>
        <nav>  
            <ul class="menu">
          <li ><a href="index.php">Home</a></li>
                <li ><a href="about.php">Get Direction</a></li>
                <li class="current"><a href="contacts.php">Contacts</a></li>
                </ul>
         </nav>
    </header>   
  <!--==============================content================================-->

<section id="content"><div class="ic"></div>
        <div class="slogan top-1">
        	<p>We <span class="clr-1">provide</span> you with the <span class="clr-1">highest</span>  level of <span class="clr-1">services</span></p>
            <a href="#" class="button-2">Contact Details</a>
        </div>
        <div class="page5-row1">
            <div class="page5-col-1 border-right">
            	<h2><span class="clr-1">W</span>hy Us</h2>
                
                <ul class="list-1">
                	<li><a href="#">24 X 7 Support</a></li>
                    <li><a href="#">Friendly Service</a></li>
                    <li><a href="#">Fast Service</a></li>
                </ul>
      </div>
            <div class="page5-col-2">
            	<h2><span class="clr-1">C</span>ontact info</h2>
                <dl class="adr">
                    <dt class="clr-1"><strong>Main Branch</strong></dt><br/><br/>
                    <dd><strong><?php echo $row_maininfo['tid']; ?> : <?php echo $row_maininfo['tname']; ?></strong></dd><br/><br/>
                    <dd><span>Location:</span><strong><?php echo $row_maininfo['location']; ?></strong></dd><br/><br/>
                    <dd><span>Address:</span><strong><?php echo $row_maininfo['address']; ?></strong></dd><br/><br/>
                    <dd><span>PostCode:</span><strong><?php echo $row_maininfo['postal']; ?></strong></dd><br/><br/>
                    <dd><span>Url:</span><strong><?php echo $row_maininfo['URL']; ?></strong></dd><br/><br/>
                    <dd><span>Country:</span><strong><?php echo $row_maininfo['country']; ?></strong></dd><br/><br/>
                    <dd><span>Phone No:</span><strong><?php echo $row_maininfo['phone']; ?></strong></dd><br/><br/>
                    <dd><span>Email ID:</span><strong><?php echo $row_maininfo['mailid']; ?></strong></dd><br/><br/>
                    <dd><span>Fax No:</span><strong><?php echo $row_maininfo['faxno']; ?></strong></dd><br/><br/>
                </dl> 
                 
          </div>    
        </div>
    </section> 
</div>       
</div> 
<!--==============================aside=================================-->
  <?php include("side.php");?>
<!--==============================footer=================================-->
  <footer>
      <p>Copyright © 2013 Toll Gate All Rights Reserved.</p>
  </footer>	       
</body>
   

  
</html>
<?php
mysql_free_result($maininfo);
?>
