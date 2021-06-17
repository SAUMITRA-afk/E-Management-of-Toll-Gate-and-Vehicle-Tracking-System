<?php require_once('../Connections/tollgate.php'); ?>
<?php
session_start();
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


$adid=$_SESSION['id'];
mysql_select_db($database_tollgate, $tollgate);
$query_admin_list = sprintf("SELECT * FROM staffdetails WHERE staffid ='$adid' ORDER BY sno ASC");
//echo $query_admin_list;
$admin_list = mysql_query($query_admin_list, $tollgate) or die(mysql_error());
$row_admin_list = mysql_fetch_assoc($admin_list);
$totalRows_admin_list = mysql_num_rows($admin_list);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Viewport metatags -->
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- iOS webapp metatags -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<!-- iOS webapp icons -->
<link rel="apple-touch-icon" href="touch-icon-iphone.png" />
<link rel="apple-touch-icon" sizes="72x72" href="touch-icon-ipad.png" />
<link rel="apple-touch-icon" sizes="114x114" href="touch-icon-retina.png" />

<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="css/fluid.css" media="screen" />
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/dandelion.theme.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/dandelion.css" media="screen" />
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen" />

<!-- jQuery JavaScript File -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.all.css" media="screen" />

<!-- Plugin Files -->

<!-- FileInput Plugin -->
<script type="text/javascript" src="js/jquery.fileinput.js"></script>
<!-- Placeholder Plugin -->
<script type="text/javascript" src="js/jquery.placeholder.js"></script>
<!-- Mousewheel Plugin -->
<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
<!-- Scrollbar Plugin -->
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
<!-- Tooltips Plugin -->
<script type="text/javascript" src="plugins/tipsy/jquery.tipsy-min.js"></script>
<link rel="stylesheet" href="plugins/tipsy/tipsy.css" />

<!-- Validation Plugin -->
<script type="text/javascript" src="plugins/validate/jquery.validate.min.js"></script>

<!-- Chosen Plugin -->
<script type="text/javascript" src="plugins/chosen/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="plugins/chosen/chosen.css" media="screen" />

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="plugins/elastic/jquery.elastic.min.js"></script>
<script type="text/javascript" src="js/demo/demo.form.js"></script>
<script type="text/javascript" src="js/demo/demo.validation.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="js/core/dandelion.customizer.js"></script>

<!-- DataTables Plugin -->
<script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="js/demo/demo.tables.js"></script>



<!-- Spinner Plugin -->
<script type="text/javascript" src="jui/js/jquery.ui.spinner.min.js"></script>

<!-- Chosen Plugin -->
<script type="text/javascript" src="plugins/chosen/chosen.jquery.js"></script>
<link rel="stylesheet" href="plugins/chosen/chosen.css" media="screen" />

<!-- Picklist Plugin -->
<script type="text/javascript" src="js/core/plugins/picklist/jquery.picklist.min.js"></script>
<link rel="stylesheet" href="js/core/plugins/picklist/jquery.picklist.css" media="screen" />

<!-- Colorpicker Plugin -->
<script type="text/javascript" src="plugins/colorpicker/colorpicker.js"></script>
<link rel="stylesheet" href="plugins/colorpicker/colorpicker.css" media="screen" />

<!-- elRTE Plugin -->
<script type="text/javascript" src="plugins/elrte/js/elrte.min.js"></script>
<link rel="stylesheet" href="plugins/elrte/css/elrte.css" media="screen" />

<!-- elFinder Plugin -->
<script type="text/javascript" src="plugins/elfinder/js/elfinder.min.js"></script>
<link rel="stylesheet" href="plugins/elfinder/css/elfinder.css" media="screen" />



    <script src="date_js/jquery-1.8.2.js"></script>
    <script src="date_js/jquery-ui.js"></script>
   
    <script>
    $(function() {
        $( ".datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
    </script>


<script language="javascript">
function conf_del(id)
{
	var ret=confirm("Are You Want to Delete the User... ?");
	if(ret)
	{   
		document.getElementById('hf_id').value=id;
		document.regitstraion_form.submit();
		
	}
	return false;
}
</script>

<title>Toll Gate</title>

</head>

<body>

	<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
	<div id="da-wrapper" class="fluid">
    
        <!-- Header -->

<div id="da-header">
        
        	<div id="da-header-top">
                
                <!-- Container -->
                <div class="da-container clearfix">
                    
                    <!-- Logo Container. All images put here will be vertically centere -->
                    <div id="da-logo-wrap">
                        <div id="da-logo">
                            <div id="da-logo-img" style="color: #FFF; font-weight: bold; font-size: 24px;">
                                <p>
                                  ADMIN PANNEL
                               </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Header Toolbar Menu -->
                    <!-- Header Toolbar Menu -->
                    <div id="da-header-toolbar" class="clearfix">
                        <div id="da-user-profile">
                          <div id="da-user-avatar">
                                <img src="<?php echo $row_admin_list['image']; ?>" alt="" width="100" height="100" />
                            </div>
                            <div id="da-user-info">
                                <?php echo $row_admin_list['name']; ?>
                                <span class="da-user-title">Admin</span>
                            </div>
                            <ul class="da-header-dropdown">
                                <li class="da-dropdown-caret">
                                    <span class="caret-outer"></span>
                                    <span class="caret-inner"></span>
                                </li>
                                <li class="da-dropdown-divider"></li>
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li class="da-dropdown-divider"></li>
                                <li><a href="updatepro.php">Update Your Profile</a></li>
                               
                            </ul>
                        </div>
                        <div id="da-header-button-container">
                        	<ul>
                        	  <li class="da-header-button logout">
                               	  <a href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                                    
                </div>
            </div>
            
            <div id="da-header-bottom">
                <!-- Container -->
                <div class="da-container clearfix">
                
                	<div id="da-search">
                    	<form>
                        	<input type="text" placeholder="Search..." />
                        </form>
                    </div>
                	
                    <!-- Breadcrumbs -->
                    <div id="da-breadcrumb">
                        <ul>
                            <li><span style="font-weight: bold; color: #900; font-size: 14px;">Today Date :</span>&nbsp;&nbsp;&nbsp; <span style="font-weight: bold; color: #006; font-size: 14px;"> <?php
echo date("d/m/Y");
?></span></li>
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>

<?php
mysql_free_result($admin_list);
?>
