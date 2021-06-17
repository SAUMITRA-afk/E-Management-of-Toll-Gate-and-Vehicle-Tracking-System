<?php require_once('../Connections/tollgate.php'); ?>
<?php
error_reporting(0);
session_start();
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

$colname_view_company = "-1";
if (isset($_SESSION['id'])) {
  $colname_view_company = $_SESSION['id'];
}
mysql_select_db($database_tollgate, $tollgate);
$query_view_company = "SELECT * FROM tolladd ";
//echo $query_view_company;
$view_company = mysql_query($query_view_company, $tollgate) or die(mysql_error());
$row_view_company = mysql_fetch_assoc($view_company);
$totalRows_view_company = mysql_num_rows($view_company);

// mysql_select_db($database_tollgate, $tollgate);
// $query_view_company1 = "SELECT * FROM tollgatedetail where sno='".$_GET['sno']."' ORDER BY sno ASC";
// $view_company1 = mysql_query($query_view_company1, $tollgate) or die(mysql_error());
// $row_view_company1 = mysql_fetch_assoc($view_company1);
// $totalRows_view_company1 = mysql_num_rows($view_company1);
// $id=$view_company1['sno'];
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
                                       View Toll Gate List
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                         
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>Toll Name</th>
                                                <th>Toll Area</th>                                      
                                                
                                                <th>Zipcode</th>

                                                <th>Email</th>
                                                  <th>Contact No</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php do{?>
                                        <tr>                                                
                                                <td><?php echo $row_view_company['tollname']; ?></td>
                                                <td><?php echo $row_view_company['tollarea']; ?></td> 
                                                  <td><?php echo $row_view_company['zipcode']; ?></td> 

                                                 <td><?php echo $row_view_company['tollemail']; ?></td> 
                                                    <td><?php echo $row_view_company['phone']; ?></td> 




                                              <!--   <td><img src="<?php echo $row_view_company['image']; ?>"  width="30" height="30"/></td>
                                                 <td class="da-icon-column">
                                                
                                                    <a href="view_tollgate.php?sno=<?php echo $row_view_company['sno']; ?>"><img src="images/icons/color/magnifier.png" /></a>
                                                  
                                                    <a href="update_tollgate.php?sno=<?php echo $row_view_company['sno']; ?>"><img src="images/icons/color/pencil.png" /></a>
                                                  
                                                </td>
                                            </tr> -->
                                            <?php }while($row_view_company = mysql_fetch_assoc($view_company)); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    	       
                               
                              <!--  <div class="grid_2">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        TOLL GATE DETAILS
                                  </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                       
                                        <div class="da-form-inline">
                                        <div class="da-form-row">
                                                <label>Image<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                <img src="<?php echo $row_view_company1['image']; ?>" width="300" height="100" alt="" /></div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>TOLL GATE ID<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_company1['tid']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>TOLL GATE Name<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_company1['tname']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Location<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_company1['location']; ?>
                                                </div>
                                            </div>                                        
                                            
                                            
                                            
                                            <div class="da-form-row">
                                                <label>Address<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_company1['address']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Postal Code<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_company1['postal']; ?>
                                                </div>
                                            </div>
                                            
                                         
                                            <div class="da-form-row">
                                                <label>Website URL<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_company1['URL']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Country <span class="required"></span></label>
                                                <div class="da-form-item default">
                                                    
                                                     <?php echo $row_view_company1['country']; ?>
                                                    
                                                </div>
                                        </div>
                                                <div class="da-form-row">
                                                <label>Mobile<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_company1['mobile']; ?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Phone<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_company1['phone']; ?> 
                                                </div>
                                            </div>                                            
                                            
                                            <div class="da-form-row">
                                                <label>Email ID<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                   <?php echo $row_view_company1['mailid']; ?>
                                                </div>
                                            </div>                            
                                            
                                            
                                            <div class="da-form-row">
                                                <label>Fax No<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                                  <?php echo $row_view_company1['faxno']; ?>                         
                                                </div>
                                            </div>
                                            
                              <div class="da-form-row">
                                                <label>Start Date<span class="required"></span></label>
                                                <div class="da-form-item default">
                                                    <?php echo $row_view_company1['start_date']; ?>
                                                </div>
                                            </div>
                                             -->
                                       
                                        
                                        
                                           
                                            
                                           
                                    
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
mysql_free_result($view_company);
?>
