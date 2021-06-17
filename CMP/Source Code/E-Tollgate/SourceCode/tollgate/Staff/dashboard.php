<?php require_once('../Connections/tollgate.php'); ?>
<?php
session_start();
error_reporting(0);
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
if (isset($_SESSION['id'])) {
  $colname_view_admin = $_SESSION['id'];
}

mysql_select_db($database_tollgate, $tollgate);
$query_view_admin = sprintf("SELECT * FROM staffdetails WHERE staffid='". $_SESSION['id']."' ORDER BY sno ASC");
//echo $query_view_admin;
$view_admin = mysql_query($query_view_admin, $tollgate) or die(mysql_error());
$row_view_admin = mysql_fetch_assoc($view_admin);
$totalRows_view_admin = mysql_num_rows($view_admin);
?>

    
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
                     
                     <br/><br/>    
                      <div id="da-content-area">
                    
                    	<div class="grid_2">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        STAFF DETAILS
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
                                        STAFF DETAILS <span style="float:right; text-decoration:underline;"><a href="updatepro.php">Update</a></span>
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
