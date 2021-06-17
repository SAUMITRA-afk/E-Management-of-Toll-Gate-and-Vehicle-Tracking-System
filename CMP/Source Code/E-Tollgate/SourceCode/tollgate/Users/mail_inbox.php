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

$colname_use = "-1";
if (isset($_SESSION['id'])) {
  $colname_use = $_SESSION['id'];
}
mysql_select_db($database_tollgate, $tollgate);
$query_use = sprintf("SELECT * FROM userdetails WHERE cid = %s ORDER BY cid ASC", GetSQLValueString($colname_use, "text"));
$use = mysql_query($query_use, $tollgate) or die(mysql_error());
$row_use = mysql_fetch_assoc($use);
$totalRows_use = mysql_num_rows($use);
$to=$row_use['mailid'];

mysql_select_db($database_tollgate, $tollgate);
$query_Recordset1 = "SELECT * FROM message WHERE `to` = '$to' ORDER BY sno DESC";
$Recordset1 = mysql_query($query_Recordset1, $tollgate) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_message = "-1";
if (isset($_GET['sno'])) {
  $colname_message = $_GET['sno'];
}
mysql_select_db($database_tollgate, $tollgate);
$query_message = sprintf("SELECT * FROM message WHERE sno = %s ORDER BY sno ASC", GetSQLValueString($colname_message, "int"));
$message = mysql_query($query_message, $tollgate) or die(mysql_error());
$row_message = mysql_fetch_assoc($message);
$totalRows_message = mysql_num_rows($message);



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
                                      INBOX MESSAGE LIST
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                         
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>From</th>
                                                <th>Subject</th>                                      
                                                <th>Date</th>
                                                <th>Time</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
										do{ ?>
                                        <tr>                                                
                                                <td><?php echo $row_Recordset1['from']; ?></td>
                                                <td><?php echo $row_Recordset1['subj']; ?></td>                                         
                                                       <td><?php echo $row_Recordset1['date']; ?>   </td>
                                                <td><?php echo $row_Recordset1['time']; ?></td>
                                                 <td class="da-icon-column">
                                                
                                                   <a href="mail_inbox.php?sno=<?php echo $row_Recordset1['sno']; ?>"><img src="images/icons/color/magnifier.png" /></a>
                                                </td>
                                        </tr>
                                            <?php }while($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    	       
                               
                               <div class="grid_2">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        VIEW INBOX DETAILS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Message Date : <?php echo $row_message['date']; ?> 
                                  </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        
                                        <div class="da-form-inline">
                                         <br/><br/><br/>
                                            <div class="da-form-row">
                                                <label>From &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;:<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                     <?php echo $row_message['from']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Subject &nbsp;&nbsp;&nbsp; : <span class="required"></span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_message['subj']; ?>
                                                </div>
                                            </div>
                                                        <div class="da-form-row">
                                                <label>Message &nbsp;&nbsp;:<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                <?php echo $row_message['msg']; ?>
                                                </div>
                                            </div><br/><br/><br/>
                                </div>
                            </div>
                        </div>
                        </div>
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
mysql_free_result($use);

mysql_free_result($Recordset1);

mysql_free_result($message);


?>
