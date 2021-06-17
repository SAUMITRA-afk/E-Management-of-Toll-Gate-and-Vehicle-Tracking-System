<?php require_once('../Connections/insurance.php'); ?>
<?php
//error_reporting(0);
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

$colname_view_admin = "-1";
if (isset($_SESSION['staffid'])) {
  $colname_view_admin = $_SESSION['staffid'];
}

mysql_select_db($database_insurance, $insurance);
$query_view_admin = sprintf("SELECT * FROM staff_details WHERE grpid ='grp01' ORDER BY sno ASC");
//echo $query_view_admin;
$view_admin = mysql_query($query_view_admin, $insurance) or die(mysql_error());
$row_view_admin = mysql_fetch_assoc($view_admin);
$totalRows_view_admin = mysql_num_rows($view_admin);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="plugins/elastic/jquery.elastic.min.js"></script>
<script type="text/javascript" src="js/demo/demo.form.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="js/core/dandelion.customizer.js"></script>

<title>Buddy_Zone - Admin Pannel</title>

</head>

<body>

	<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
  <div id="da-wrapper" class="fluid">
    
        <!-- Header -->
        <?php include('header.php');?>
    
        <!-- Content -->
        <div id="da-content">
            
            <!-- Container -->
            <div class="da-container clearfix">
            
                <!-- Sidebar -->
                <div id="da-sidebar-separator"></div>
                <div id="da-sidebar">
                
                    <!-- Main Navigation -->
                    <?php include('sidemenu.php');?>
                    
                </div>
                
                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                	<!-- Content Area -->
                	<form method="POST" action="<?php echo $editFormAction; ?>"  enctype="multipart/form-data" id="da-ex-validate1" class="da-form" name="staff_details">                  
                      <div id="da-content-area">
                     
                    	<div class="grid_2">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        ADMIN DETAILS
                                  </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        
                                        <div class="da-form-inline">
                                        <div class="da-form-row">
                                                <label>Image<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                               <img src="<?php echo $row_view_admin['image']; ?>" width="300" height="100" /> 
                                                </div>
                                            </div>
                                                        <div class="da-form-row">
                                                <label>Staff ID<span class="required">*</span></label>
                                                <div class="da-form-item default"><?php echo $row_view_admin['staffid']; ?></div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['name']; ?>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="da-form-row">
                                                <label>Date of Birth<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['dob']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Age<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['age']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Gender<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['gender']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Address<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['address']; ?>
                                                </div>
                                            </div>
                                           
                                           
                                            
                                           
                                    
                                </div>
                               
                             
                            </div>
                        </div>
                        </div>
                    	<div class="grid_2">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        ADMIN DETAILS <span style="float:right; text-decoration:underline;"><a href="updatepro.php">Update</a></span><span style="float:right; padding-right:20px; text-decoration:underline;"><a href="admindelete.php">Delete</a></span>
                                    </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	    
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <div class="da-form-inline">
                                           <div class="da-form-row">
                                                <label>Phone<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                  <?php echo $row_view_admin['phone']; ?>
                                                </div>
                                          </div>
                                            <div class="da-form-row">
                                                <label>Mobile<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['mobile']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Date of Joining<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['doj']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Email ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['mailid']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Salary<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                  <?php echo $row_view_admin['salary']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Country <span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['country']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Location<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['location']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Password<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['passwrd']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Desination<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['designation']; ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                              </div>
                                        
                                    
                          </div>
                               
                            </div>
                        </div>
                      
                </form>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include('footer.php');?>
    </div>
</body>
</html>
<?php
mysql_free_result($view_admin);
?>
