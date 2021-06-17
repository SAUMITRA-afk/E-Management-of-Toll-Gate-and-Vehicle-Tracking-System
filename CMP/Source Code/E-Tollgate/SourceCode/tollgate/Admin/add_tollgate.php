<?php require_once('../Connections/tollgate.php'); ?>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$msg=0;
$sts3=0;
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

$colname_company_details = "-1";
if (isset($_SESSION['sno'])) {
  $colname_company_details = $_SESSION['sno'];
}


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "company_details")) {
	
	mysql_select_db($database_tollgate, $tollgate);
$query_company_details = sprintf("SELECT * FROM tollgatedetail WHERE tid='".$_POST['cid']."' ORDER BY tid ASC", GetSQLValueString($colname_company_details, "int"));
$company_details = mysql_query($query_company_details, $tollgate) or die(mysql_error());
$row_company_details = mysql_fetch_assoc($company_details);
$totalRows_company_details = mysql_num_rows($company_details);

if($totalRows_company_details >0)
{
	$sts3=1;
}

if(strlen($_POST['mobile'])!='10')
  {

 echo "<script>alert('Enter a correct Mobile number');</script>";
}


 if (!preg_match('/^[0-9]*$/', $_POST['Postal']))
 {

  echo "<script>alert('Enter a valid postal code ');</script>";
 }










else{
	
	$image=$_FILES['image']['name'];
  $image_name=$_POST['cid'];
  $newname="../staff_image/".$image_name.$image;
  move_uploaded_file( $_FILES["image"]["tmp_name"],$newname);

  $insertSQL = sprintf("INSERT INTO tolladd (tollname, tollarea, zipcode, weburl, phone, tollemail, fax, startdate, tollimage) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                   
                       GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($_POST['location'], "text"),
                     
                       GetSQLValueString($_POST['Postal'], "text"),
                       GetSQLValueString($_POST['url'], "text"),
                   
                       GetSQLValueString($_POST['mobile'], "text"),
                       
                       GetSQLValueString($_POST['emailid'], "text"),
                       GetSQLValueString($_POST['fax'], "text"),
                      
                       GetSQLValueString($_POST['start'], "text"),
                       GetSQLValueString($newname, "text"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result1 = mysql_query($insertSQL, $tollgate) or die(mysql_error());

  $insertGoTo = "add_tollgate.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  $msg=1;//header(sprintf("Location: %s", $insertGoTo));
}
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
                    
                    	<div class="grid_2">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        ADD TOLL GATE DETAILS
                                  </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <?php if ($msg==1) {echo "<div class='da-message success'>
                                        Sucessfully Created Company Deatils...
                                    </div>";}?>
                                     <?php if ($sts3==1) {echo "<div class='da-message error'>
                                        Company ID Already Assigned to Another Company...
                                    </div>";}?>
                                        
                                            <div class="da-form-row">
                                                <label>Toll Gate Name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="cname" type="text" id="cname" />
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Location<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="location" />
                                                </div>
                                            </div>                                        
                                            <div class="da-form-row">
                                                <label>Postal Code<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="Postal" />
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Website URL<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="url" />
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
                                        ADD TOLL GATE DETAILS
                                    </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	   
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <?php if ($msg==1) {echo "<div class='da-message success'>
                                        Sucessfully Created Company Deatils...
                                    </div>";}?>
                                        

                                            <div class="da-form-row">
                                                <label>Mobile<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="mobile" />
                                                </div>
                                            </div>
                                          
                                            <div class="da-form-row">
                                                <label>Email ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="emailid" />
                                                </div>
                                            </div>                            
                                            
                                            
                                            <div class="da-form-row">
                                                <label>Fax No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="fax" />
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Start Date<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="start" class="datepicker"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Upload Image<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    
                                            	<input type="file" class="da-custom-file" name="image" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="da-button-row">
                                        	<input type="submit" value="Add Tollgate" class="da-button red" />
                                        </div>
                                        </div>
                                        
                                    
                                </div>
                               
                            </div>
                        </div>
                	<input type="hidden" name="MM_insert" value="company_details" />
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

