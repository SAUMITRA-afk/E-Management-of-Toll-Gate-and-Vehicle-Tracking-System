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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "company_details")) {
  $updateSQL = sprintf("UPDATE userdetails SET amount=%s, bankname=%s, pid=%s, accno=%s, creditno=%s, validitydate=%s WHERE cid=%s",
                       GetSQLValueString($_POST['amt'], "text"),
                       GetSQLValueString($_POST['bank'], "text"),
                       GetSQLValueString($_POST['pid'], "text"),
                       GetSQLValueString($_POST['accno'], "text"),
                       GetSQLValueString($_POST['cno'], "text"),
                       GetSQLValueString($_POST['val'], "text"),
                       GetSQLValueString($_POST['cid'], "text"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result1 = mysql_query($updateSQL, $tollgate) or die(mysql_error());

  $updateGoTo = "dashboard.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}


if (isset($_SESSION['id'])) {
  $colname_Recordset1 = $_SESSION['id'];
}
mysql_select_db($database_tollgate, $tollgate);
$query_Recordset1 = "SELECT * FROM plan ORDER BY sno ASC";
$Recordset1 = mysql_query($query_Recordset1, $tollgate) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_tollgate, $tollgate);
$query_replan = "SELECT * FROM plan WHERE sno = '".$_GET['sno']."' ORDER BY sno ASC";
$replan = mysql_query($query_replan, $tollgate) or die(mysql_error());
$row_replan = mysql_fetch_assoc($replan);
$totalRows_replan = mysql_num_rows($replan);
$to=$row_Recordset1['mailid'];



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
                    <div class="da-form">
                	<div id="da-content-area">
                    
                    	<div class="grid_2">
                        	<div class="da-panel collapsible">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/black/16/list.png" alt="" />
                                     Plan Details
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                         
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>Plan ID</th>
                                                <th>year</th>                                      
                                                <th>Amount</th>
                                                <th>Benefits</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
										do{ ?>
                                        <tr>                                                
                                                <td><?php echo $row_Recordset1['sno']; ?></td>
                                                <td><?php echo $row_Recordset1['year1']; ?></td>                                         
                                                       <td><?php echo $row_Recordset1['amount1']; ?>   </td>
                                                <td><?php echo $row_Recordset1['benifits']; ?></td>
                                                 <td class="da-icon-column">
                                                
                                                   <a href="plan.php?sno=<?php echo $row_Recordset1['sno']; ?>"><img src="images/icons/color/magnifier.png" /></a>
                                                </td>
                                        </tr>
                                            <?php }while($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
   	           <form name="company_details" action="<?php echo $editFormAction; ?>"  method="POST" id="da-ex-validate_branch" class="da-form" enctype="multipart/form-data">
                               
                               <div class="grid_2">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        Add or Reneval Plans
                            </div>
                              
                                <div class="da-panel-content">
                                	
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>User ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="cid" type="text" id="uid" value="<?php echo $_SESSION['id']; ?>" readonly="readonly" />
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label> Plan Id<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="pid" type="text" id="pid" value="<?php echo $row_replan['year1']; ?>" readonly="readonly" />
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Amount<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="amt" type="text" value="<?php echo $row_replan['amount1']; ?>" readonly="readonly" />
                                                </div>
                                            </div>                                        
                                            <div class="da-form-row">
                                                <label>Bank name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="bank" type="text" value="" />
                                                </div>
                                            </div> 
                                            <div class="da-form-row">
                                                <label>Account No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="accno" type="text" value="" />
                                                </div>
                                            </div> 
                                            <div class="da-form-row">
                                                <label>Card No<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="cno" type="text" value="" />
                                                </div>
                                            </div> 
                                            <div class="da-form-row">
                                                <label>Validity<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="val" type="text" value="" class="datepicker" />
                                                </div>
                                            </div> 
                                            <div class="da-button-row">
                                        	<input type="submit" value="Pay.." class="da-button red" />
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>
                               <input type="hidden" name="MM_update" value="company_details" />
                 </form>
                  </div>
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
mysql_free_result($message);

mysql_free_result($Recordset1);

mysql_free_result($replan);
?>
