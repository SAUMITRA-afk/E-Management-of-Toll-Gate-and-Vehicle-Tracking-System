<?php require_once('../Connections/tollgate.php'); ?>
<?php
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

$colname_branch_details = "-1";
if (isset($_SESSION['sno'])) {
  $colname_branch_details = $_SESSION['sno'];
}
mysql_select_db($database_tollgate, $tollgate);
$query_branch_details = "SELECT * FROM tollboothdetails ORDER BY sno ASC";
$branch_details = mysql_query($query_branch_details, $tollgate) or die(mysql_error());
$row_branch_details = mysql_fetch_assoc($branch_details);
$totalRows_branch_details = mysql_num_rows($branch_details);

mysql_select_db($database_tollgate, $tollgate);
$query_branch_details1 = "SELECT * FROM tollboothdetails where sno='".$_GET['sno']."' ORDER BY sno ASC";
$branch_details1 = mysql_query($query_branch_details1, $tollgate) or die(mysql_error());
$row_branch_details1 = mysql_fetch_assoc($branch_details1);
$totalRows_branch_details1 = mysql_num_rows($branch_details1);
$id=$branch_details1['sno'];

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
                                       View Toll Booth List
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                         
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>Toll Booth ID</th>
                                                <th>Toll Booth Name</th>                                      
                                                
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php do{?>
                                        <tr>                                                
                                                <td><?php echo $row_branch_details['bid']; ?></td>
                                                <td><?php echo $row_branch_details['bname']; ?></td>                                                
                                                <td><img src="<?php echo $row_branch_details['image']; ?>"  width="30" height="30"/></td>
                                                 <td class="da-icon-column">
                                                
                                                   <a href="view_booth.php?sno=<?php echo $row_branch_details['sno']; ?>"><img src="images/icons/color/magnifier.png" /></a>
                                                  
                                                   <a href="update_booth.php?sno=<?php echo $row_branch_details['sno']; ?>"><img src="images/icons/color/pencil.png" /></a>
                                                  
                                                </td>
                                        </tr>
                                            <?php }while($row_branch_details = mysql_fetch_assoc($branch_details)); ?>
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
                                        VIEW TOLL BOOTH DETAILS
                                  </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        
<div class="da-form-inline">
                                        <div class="da-form-row">
                                                <label>Image</label>
                                                <div class="da-form-item default">                                                    
                                            	<img src="<?php echo $row_branch_details1['image']; ?>" width="300" height="100" alt="" /></div>
                                          </div>
                                 
                                            <div class="da-form-row">
                                                <label>Toll Booth ID</label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_branch_details1['bid']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Toll Booth Name</label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_branch_details1['bname']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Location</label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_branch_details1['location']; ?>
                                                </div>
                                            </div>                                        
                                            
                                            
                                            
                                            <div class="da-form-row">
                                                <label>Address</label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_branch_details1['address']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Postal Code</label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_branch_details1['postal']; ?>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="da-form-row">
                                                <label>Country </label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_branch_details1['country']; ?>
                                                </div>
                                            </div>
                                    
                                        
                                            <div class="da-form-row">
                                                <label>Mobile</label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_branch_details1['mobile']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Phone</label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_branch_details1['phone']; ?>
                                                </div>
                                            </div>                                            
                                            
                                            <div class="da-form-row">
                                                <label>Email ID</label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_branch_details1['mailid']; ?>
                                                </div>
                                            </div>                            
                                            
                                            
                                            <div class="da-form-row">
                                                <label>Fax No</label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_branch_details1['faxno']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>No Of Staff</label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_branch_details1['no_of_staff']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Start Date</label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_branch_details1['start_date']; ?>
                                                </div>
                                            </div>
                                            
                                        
                                           
                                    
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
mysql_free_result($branch_details);
mysql_free_result($branch_details1);
?>
