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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if (isset($_SESSION['id'])) {
  $colname_Recordset1 = $_SESSION['id'];
}
mysql_select_db($database_tollgate, $instollgateurance);
$query_Recordset1 = sprintf("SELECT * FROM userdetails WHERE cid = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $tollgate) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "company_details")) {
	
$date1=date("m/d/y");
$time=date("H:i:s");
$from=$row_Recordset1['mailid'];
	
  $insertSQL = sprintf("INSERT INTO message (`from`, `to`, subj, msg, `date`, `time`) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($from, "text"),
                       GetSQLValueString($_POST['to'], "text"),
                       GetSQLValueString($_POST['sub'], "text"),
                       GetSQLValueString($_POST['msg'], "text"),
                       GetSQLValueString($date1, "text"),
                       GetSQLValueString($time, "text"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result1 = mysql_query($insertSQL, $tollgate) or die(mysql_error());

  $insertGoTo = "mail_inbox.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_tollgate, $tollgate);
$query_message = "SELECT * FROM message WHERE `from` = 'from' ORDER BY `date` ASC";
$message = mysql_query($query_message, $tollgate) or die(mysql_error());
$row_message = mysql_fetch_assoc($message);
$totalRows_message = mysql_num_rows($message);

$colname_Recordset1 = "-1";

?>

        <!-- Header -->
        <?php include('header.php');?>
    
        <!-- Content -->
        <div id="da-content">
           <form method="POST" action="<?php echo $editFormAction; ?>" id="da-ex-validate_branch" class="da-form" name="branch_details" enctype="multipart/form-data"> 
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
                	<div id="da-content-area">
                    
                    <form name="company_details" action="<?php echo $editFormAction; ?>"  method="POST" id="da-ex-validate_branch" class="da-form" enctype="multipart/form-data">	
       	  <div class="grid_4">

                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        Compose A Message
                                    </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <div class="da-form-inline">
                                        
                                            <div class="da-form-row">
                                                <label>To<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="to" />
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Subject<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="sub" />
                                                </div>
                                            </div>                                            
                              <div class="da-form-row">
                                                <label>Message<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <textarea id="da-ex-wysiwyg" name="msg" type="text" ></textarea>
                                                </div>
                                        </div><br/><br/>
                                        <div class="da-button-row">
                                        	<input type="submit" value="Send Message" class="da-button red" />
                                        </div>
                                        </div>
                                        
                                    
                                </div>
                               
                            </div>
                        	<input type="hidden" name="MM_insert" value="company_details" />
          
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
 </form> 
</html>
<?php
mysql_free_result($message);

mysql_free_result($Recordset1);
?>
