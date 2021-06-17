<?php require_once('../Connections/tollgate.php'); ?>

<?php
$msg=0;
$sts3=0;
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

mysql_select_db($database_tollgate, $tollgate);
$query_userinfo1 = "SELECT * FROM userdetails WHERE cid ='".$_POST['cid']."' ORDER BY cid ASC";
//echo $query_userinfo1;
$userinfo1 = mysql_query($query_userinfo1, $tollgate) or die(mysql_error());
$row_userinfo1 = mysql_fetch_assoc($userinfo1);
$totalRows_userinfo1 = mysql_num_rows($userinfo1);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}










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
                    <form name="company_details" action="<?php echo $editFormAction; ?>"  method="POST" id="da-ex-validate_branch" class="da-form" enctype="multipart/form-data">
                	<div id="da-content-area">
                    <div class="grid_4">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        Search User Toll Pass Details
                                    </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	   
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <?php if ($msg==1) {echo "<div class='da-message success'>
                                        Sucessfully Created...
                                    </div>";}?>
                                        <div class="da-form-inline">
                                            
                                      <div class="da-form-row">
                                                <label>User ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="cid" />
                                                </div>
                                            </div>
                                           
                                        <div class="da-button-row">
                                        	<input type="submit" value="Search.." class="da-button red" />
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
                                        User Details
                            </div>
                              
                                <div class="da-panel-content">
                                	
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <?php if ($msg==1) {echo "<div class='da-message success'>
                                        Sucessfully Created Company Deatils...
                                    </div>";}?>
                                     <div class="da-form-row">
                                                <label>Branch<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_userinfo1['bid']; ?>
                                                </div>
                            </div>
                                        <div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>User ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                  <?php echo $row_userinfo1['cid']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>User Name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_userinfo1['cname']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Email ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_userinfo1['mailid']; ?>
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
                                        Verification Details
                                    </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	   
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <?php if ($msg==1) {echo "<div class='da-message success'>
                                        Sucessfully Created...
                                    </div>";}?>
                                        <div class="da-form-inline">
                                            
                                      <div class="da-form-row">
                                                <label>License No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_userinfo1['licno']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Vechile No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_userinfo1['vecno']; ?>
                                                </div>
                                            </div>                                            
                                            <div class="da-form-row">
                                                <label>Vechile Type<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_userinfo1['vectype']; ?>
                                                </div>
                            </div>
                            <div class="da-form-row">
                                                <label>Permit Type<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_userinfo1['permittype']; ?>
                                                </div>
                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Permit No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_userinfo1['permitno']; ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        </div>
                                        
                                    
                                </div>
                               
                            </div>
                            
                            <div class="grid_4">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        Transcation Details
                                    </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	   
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <?php if ($msg==1) {echo "<div class='da-message success'>
                                        Sucessfully Created...
                                    </div>";}?>
                                        <div class="da-form-inline">
                                            
                                      <div class="da-form-row">
                                                <label>From<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_userinfo1['from']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>To<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_userinfo1['to']; ?>
                                                </div>
                                            </div>                                            
                                            <div class="da-form-row">
                                                <label>Amount<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_userinfo1['amount']; ?>
                                                </div>
                                            </div>  
                                            <div class="da-form-row">
                                                <label>Valid Date<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php
													$d=date("d"."/"."m"."/"."Y");
											
													if($row_userinfo1['validitydate'] == $d)
													{
														
													 echo "<blink><font style='color:#900; font-weight:bold'>Valid Date Over , Please Renew the Plan Or Pay In Next Toll Booth</font></blink>";
													 
													}
													if($row_userinfo1['validitydate'] != $d)
													{
														echo $row_userinfo1['validitydate'];
													}
													  ?>
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
            
        </div>
        
        <!-- Footer -->
        <?php include('footer.php');?>
        
    </div>
   
</body>
 
</html>
<?php
mysql_free_result($userinfo1);
?>
