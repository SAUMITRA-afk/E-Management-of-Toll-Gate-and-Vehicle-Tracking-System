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

$colname_staff_list = "-1";
if (isset($_SESSION['sno'])) {
  $colname_staff_list = $_SESSION['sno'];
}
mysql_select_db($database_tollgate, $tollgate);
$query_staff_list = sprintf("SELECT * FROM staffdetails ORDER BY sno ASC", GetSQLValueString($colname_staff_list, "int"));
$staff_list = mysql_query($query_staff_list, $tollgate) or die(mysql_error());
$row_staff_list = mysql_fetch_assoc($staff_list);
$totalRows_staff_list = mysql_num_rows($staff_list);

mysql_select_db($database_tollgate, $tollgate);
$query_staff_list1 = "SELECT * FROM staffdetails where staffid='".$_GET['staffid']."' ORDER BY staffid ASC";
$staff_list1 = mysql_query($query_staff_list1, $tollgate) or die(mysql_error());
$row_staff_list1 = mysql_fetch_assoc($staff_list1);
$totalRows_staff_list1 = mysql_num_rows($staff_list1);

$bid=$row_staff_list1['branchid'];
mysql_select_db($database_tollgate, $tollgate);
$query_branch = "SELECT * FROM tollboothdetails where bid='$bid' ORDER BY sno ASC";
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
                    <div class="da-form">
                	<div id="da-content-area">
                    
                    	<div class="grid_2">
                        	<div class="da-panel collapsible">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/black/16/list.png" alt="" />
                                      VIEW STAFF LIST
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                         
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>Staff ID</th>
                                                <th>Name</th>                                      
                                                <th>Designation</th>
                                                <th>Image</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
										
										
										do{ if($row_staff_list['grpid']<>"grp05"){?>
                                        <tr>                                                
                                                <td><?php echo $row_staff_list['staffid']; ?></td>
                                                <td><?php echo $row_staff_list['name']; ?></td>                                                <td> <?php
													 if($row_staff_list['grpid']=="grp01"){
														echo "ADMIN"; } 
													if($row_staff_list['grpid']=="grp02"){
														echo "CEO"; }
													if($row_staff_list['grpid']=="grp03"){
														echo "Manager"; }
														if($row_staff_list['grpid']=="grp04"){
														echo "Staff"; }	
														?></td>
                                                <td><img src="<?php echo $row_staff_list['image']; ?>"  width="30" height="30"/></td>
                                                 <td class="da-icon-column">
                                                
                                                   <a href="view_staff.php?staffid=<?php echo $row_staff_list['staffid']; ?>"><img src="images/icons/color/magnifier.png" /></a>
                                                  
                                                   <a href="update_staff.php?staffid=<?php echo $row_staff_list['staffid']; ?>"><img src="images/icons/color/pencil.png" /></a>
                                                  
                                                </td>
                                        </tr>
                                            <?php }}while($row_staff_list = mysql_fetch_assoc($staff_list)); ?>
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
                                        VIEW STAFF DETAILS
                                  </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        
                                        <div class="da-form-inline">
                                         
                                            <div class="da-form-row">
                                                <label>Image<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    
                                            	<img src="<?php echo $row_staff_list1['image']; ?>" width="300" height="100"/>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Position<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_staff_list1['designation']; ?>
                                                </div>
                                            </div>
                                                        <div class="da-form-row">
                                                <label>Staff ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                               <?php echo $row_staff_list1['staffid']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Password<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_staff_list1['passwrd']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                 <?php echo $row_staff_list1['name']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Desination<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                     <?php
													 if($row_staff_list1['grpid']=="grp01"){
														echo "ADMIN"; } 
													if($row_staff_list1['grpid']=="grp02"){
														echo "CEO"; }
													if($row_staff_list1['grpid']=="grp03"){
														echo "Manager"; }
														if($row_staff_list1['grpid']=="grp04"){
														echo "Staff"; }	
														?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Branch Name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_branch['bname']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Date of Birth<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_staff_list1['dob']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Age<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_staff_list1['age']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Gender<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_staff_list1['gender']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Address<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_staff_list1['address']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Phone<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                 <?php echo $row_staff_list1['phone']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Mobile<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_staff_list1['mobile']; ?>
                                                </div>
                                            </div>
                                           
                              
                                        
                                            <div class="da-form-row">
                                                <label>Date of Joining<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_staff_list1['doj']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Email ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_staff_list1['mailid']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Salary<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_staff_list1['salary']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Country <span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_staff_list1['country']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Location<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_staff_list1['location']; ?>
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
mysql_free_result($staff_list);
mysql_free_result($staff_list1);
mysql_free_result($branch);
?>
