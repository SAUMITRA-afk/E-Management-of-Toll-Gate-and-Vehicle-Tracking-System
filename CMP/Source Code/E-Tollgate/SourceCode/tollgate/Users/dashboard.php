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
$query_view_admin = sprintf("SELECT * FROM userdetails WHERE cid='". $_SESSION['id']."' ORDER BY sno ASC");
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
                     <?php
													$d=date("d"."/"."m"."/"."Y");
											
													if($row_view_admin['validitydate'] == $d)
													{
														
													 echo "<blink><font style='color:#900; font-weight:bold; font-size:14px'>Valid Date Over , Please Renew the Plan Or Pay In Next Toll Booth</font></blink>";
													 
													}
													
													  ?>
                     <br/><br/>    
                      <div id="da-content-area">
                    
                    	<div class="grid_2">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                       PERSONAL DETAILS AND TOLL PASS DETAILS
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
                                                <label>User ID<span class="required">*</span></label>
                                                <div class="da-form-item default"><?php echo $row_view_admin['cid']; ?></div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['cname']; ?>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="da-form-row">
                                            <br />
                                                <label>Password<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['passwd']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Mailid<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['mailid']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>License No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['licno']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Vechile No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['vecno']; ?>
                                                </div>
                                            </div>
                                        
                                           <div class="da-form-row">
                                                <label>Vechile Type<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                  <?php echo $row_view_admin['vectype']; ?>
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
                                         PERSONAL DETAILS AND TOLL PASS DETAILS <span style="float:right; text-decoration:underline;"><a href="updatepro.php">Update</a></span>
                                    </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	    
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                            <div class="da-form-row">
                                                <label>Permit TYype<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['permittype']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Permit No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['permitno']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>From<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['from']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>To<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                  <?php echo $row_view_admin['to']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Amount <span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['amount']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Bank Name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['bankname']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Account No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_admin['accno']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-inline">
                                           <div class="da-form-row">
                                                <label>Credit Card No	<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                  <?php echo $row_view_admin['creditno']; ?>
                                                </div>
                                          </div>
                                            <div class="da-form-row">
                                                <label>Valid Date<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_admin['validitydate']; ?>
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
