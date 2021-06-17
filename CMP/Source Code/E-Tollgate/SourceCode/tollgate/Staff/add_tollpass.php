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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


$colname_stf = "-1";
if (isset($_SESSION['id'])) {
  $colname_stf = $_SESSION['id'];
}
mysql_select_db($database_tollgate, $tollgate);
$query_stf = sprintf("SELECT * FROM staffdetails WHERE staffid = %s", GetSQLValueString($colname_stf, "text"));
$stf = mysql_query($query_stf, $tollgate) or die(mysql_error());
$row_stf = mysql_fetch_assoc($stf);
$totalRows_stf = mysql_num_rows($stf);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "company_details")) {
	$sid=$row_stf['staffid'];
	$grp="grp03";
	$date1=date("d/m/y");
$time=date("H:i:s");
	
	
	
  $insertSQL = sprintf("INSERT INTO userdetails (bid, stfid, `date`, `time`, cid, cname, passwd, mailid, grp, licno, vecno, vectype, permittype, permitno, `from`, `to`, amount, validitydate) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['bid'], "text"),
                       GetSQLValueString($sid, "text"),
                       GetSQLValueString($date1, "text"),
                       GetSQLValueString($time, "text"),
                       GetSQLValueString($_POST['cid'], "text"),
                       GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($_POST['passwd'], "text"),
                       GetSQLValueString($_POST['emailid'], "text"),
                       GetSQLValueString($grp, "text"),
                       GetSQLValueString($_POST['lno'], "text"),
                       GetSQLValueString($_POST['vno'], "text"),
                       GetSQLValueString($_POST['vtype'], "text"),
                       GetSQLValueString($_POST['ptype'], "text"),
                       GetSQLValueString($_POST['pno'], "text"),
                       GetSQLValueString($_POST['from'], "text"),
                       GetSQLValueString($_POST['to'], "text"),
                       GetSQLValueString($_POST['amount'], "text"),
                       GetSQLValueString($_POST['vdate'], "text"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result1 = mysql_query($insertSQL, $tollgate) or die(mysql_error());
  
  
  $insertSQL1 = sprintf("INSERT INTO logindetails (uname,passwd,id,fullname,grp ) VALUES (%s,%s, %s, %s, %s)",
                       GetSQLValueString($_POST['cid'], "text"),
                       GetSQLValueString($_POST['passwd'], "text"),
                       GetSQLValueString($_POST['cid'], "text"),
					   GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($grp, "text"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result11X = mysql_query($insertSQL1, $tollgate) or die(mysql_error());



  $insertGoTo = "add_tollpass.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}



$colname_staff = "-1";
if (isset($_SESSION['id'])) {
  $colname_staff = $_SESSION['id'];
}
mysql_select_db($database_tollgate, $tollgate);
$query_staff = sprintf("SELECT * FROM staffdetails WHERE staffid = %s ORDER BY staffid ASC", GetSQLValueString($colname_staff, "text"));
//echo $query_staff;
$staff = mysql_query($query_staff, $tollgate) or die(mysql_error());
$row_staff = mysql_fetch_assoc($staff);
$totalRows_staff = mysql_num_rows($staff);
$bid=$row_staff['branchid'];


mysql_select_db($database_tollgate, $tollgate);
$query_branch = "SELECT * FROM tollboothdetails WHERE bid = '$bid'";
//echo $query_branch;
$branch = mysql_query($query_branch, $tollgate) or die(mysql_error());
$row_branch = mysql_fetch_assoc($branch);
$totalRows_branch = mysql_num_rows($branch);


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
                                                    <select id="pass1" type="text" name="bid" >
                                                    
                                                      <?php
do {  
?>
                                                      <option value="<?php echo $row_branch['bid']?>" selected="selected"><?php echo $row_branch['bname']?></option>
                                                      <?php
} while ($row_branch = mysql_fetch_assoc($branch));
  $rows = mysql_num_rows($branch);
  if($rows > 0) {
      mysql_data_seek($branch, 0);
	  $row_branch = mysql_fetch_assoc($branch);
  }
?>
                                                  </select>
                                                </div>
                            </div>
                                        <div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>User ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="cid" type="text" id="uid" />
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>User Name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="cname" type="text" id="uname" />
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Password<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="passwd" />
                                                </div>
                                            </div>                                        
                                            <div class="da-form-row">
                                                <label>Email ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="emailid" />
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
                                                    <input type="text" name="lno" />
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Vechile No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="vno" />
                                                </div>
                                            </div>                                            
                                            <div class="da-form-row">
                                                <label>Vechile Type<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <select id="pass1" type="text" name="vtype" >
                                                      <option value="Bus"> Bus</option>
                                                      <option value="Bike"> Bike</option>
                                                      <option value="Car"> Car</option>
                                                      <option value="lorry"> lorry</option>
                                                  </select>
                                                </div>
                            </div>
                            <div class="da-form-row">
                                                <label>Permit Type<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <select id="pass1" type="text" name="ptype" >
                                                      <option value="Own Board"> Own Board</option>
                                                      <option value="Travels"> Travels</option>
                                                  </select>
                                                </div>
                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Permit No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="pno"/>
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
                                                    <input type="text" name="from" />
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>To<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="to" />
                                                </div>
                                            </div>                                            
                                            <div class="da-form-row">
                                                <label>Amount<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="amount" />
                                                </div>
                                            </div>  
                                            <div class="da-form-row">
                                                <label>Valid Date<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="vdate" class="datepicker" />
                                                </div>
                                            </div>   
                            
                                        <div class="da-button-row">
                                        	<input type="submit" value="Add Company" class="da-button red" />
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
<?php
mysql_free_result($stf);

mysql_free_result($branch);

mysql_free_result($staff);
?>
