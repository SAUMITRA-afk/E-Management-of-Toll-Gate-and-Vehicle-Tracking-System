<?php require_once('../Connections/tollgate.php'); ?>
<?php
session_start();
error_reporting(0);
$msg =0;
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "company_details")) {
	
	$image=$_FILES['image']['name'];
  $image_name=$_POST['staffid'];
  $newname="../staff_image/".$image_name.$image;
  move_uploaded_file( $_FILES["image"]["tmp_name"],$newname);	
	
	
	
  $updateSQL = sprintf("UPDATE userdetails SET cname=%s, image=%s, passwd=%s, mailid=%s WHERE cid=%s",
                       GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($newname, "text"),
                       GetSQLValueString($_POST['passwd'], "text"),
                       GetSQLValueString($_POST['emailid'], "text"),
                       GetSQLValueString($_POST['cid'], "text"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result1 = mysql_query($updateSQL, $tollgate) or die(mysql_error());
  
  
  
  $updateSQL1 = sprintf("UPDATE logindetails SET fullname=%s, passwd=%s WHERE id=%s",
                       GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($_POST['passwd'], "text"),
                       GetSQLValueString($_POST['cid'], "text"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result11 = mysql_query($updateSQL1, $tollgate) or die(mysql_error());
  
  

  $updateGoTo = "updatepro.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_user = "-1";
if (isset($_SESSION['id'])) {
  $colname_user = $_SESSION['id'];
}
mysql_select_db($database_tollgate, $tollgate);
$query_user = sprintf("SELECT * FROM userdetails WHERE cid = %s ORDER BY cid ASC", GetSQLValueString($colname_user, "text"));
$user = mysql_query($query_user, $tollgate) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);
$totalRows_user = mysql_num_rows($user);


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
                                        User Details
                            </div>
                              
                                <div class="da-panel-content">
                                	
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <?php if ($msg==1) {echo "<div class='da-message success'>
                                        Sucessfully Created Company Deatils...
                                    </div>";}?>
                                        <div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>User ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="cid" type="text" id="uid" value="<?php echo $row_user['cid']; ?>" readonly="readonly" />
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label> Name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="cname" type="text" id="uname" value="<?php echo $row_user['cname']; ?>" />
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Password<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="passwd" type="text" value="<?php echo $row_user['passwd']; ?>" />
                                                </div>
                                            </div>                                        
                                            <div class="da-form-row">
                                                <label>Email ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="emailid" type="text" value="<?php echo $row_user['mailid']; ?>" />
                                                </div>
                                            </div>
                                           <div class="da-form-row">
                                                <label>Upload Image<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    
                                            	<input type="file" class="da-custom-file" name="image" />
                                                </div>
                                            </div>
                                            <div class="da-button-row">
                                        	<input type="submit" value="Update.." class="da-button red" />
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>
<input type="hidden" name="MM_insert" value="company_details" />
<input type="hidden" name="MM_update" value="company_details" />
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
mysql_free_result($user);

mysql_free_result($stfdetail);

mysql_free_result($view_admin);
?>
