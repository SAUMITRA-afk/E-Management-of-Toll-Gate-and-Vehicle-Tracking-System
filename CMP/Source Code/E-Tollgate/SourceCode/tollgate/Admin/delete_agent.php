<?php require_once('../Connections/insurance.php'); ?>
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

$colname_delete_agent = "-1";
if (isset($_SESSION['sno'])) {
  $colname_delete_agent = $_SESSION['sno'];
}
mysql_select_db($database_insurance, $insurance);
$query_delete_agent = sprintf("SELECT * FROM staff_details where grpid='grp05' ORDER BY sno ASC", GetSQLValueString($colname_delete_agent, "text"));
$delete_agent = mysql_query($query_delete_agent, $insurance) or die(mysql_error());
$row_delete_agent = mysql_fetch_assoc($delete_agent);
$totalRows_delete_agent = mysql_num_rows($delete_agent);

if(isset($_POST['hf_id']))
{
	$id=$_REQUEST['hf_id'];
	
	$qry_del="delete from staff_details where staffid='$id' ";
	//echo $qry_del;
	$result_del=mysql_query($qry_del, $insurance) or die(mysql_error());
	
	header(sprintf("Location: delete_agent.php"));
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
                    <div class="da-form">
                	<div id="da-content-area">
                    
                    	<div class="grid_4">
                        	<div class="da-panel collapsible">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/black/16/list.png" alt="" />
                                      VIEW STAFF LIST
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                         <form name="regitstraion_form"  method="POST" id="regitstraion_form" class="form_container left_label">
                         <input type="hidden" name="hf_id" id="hf_id" />
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
                                        <?php do{?>
                                        <tr>                                                
                                                <td><?php echo $row_delete_agent['staffid']; ?></td>
                                                <td><?php echo $row_delete_agent['name']; ?></td>                                                <td><?php echo $row_delete_agent['designation']; ?></td>
                                                <td><img src="<?php echo $row_delete_agent['image']; ?>"  width="30" height="30"/></td>
                                                 <td class="da-icon-column">                                               
                                                  
                                                  
                                                   <a href="" onclick="return conf_del('<?php echo $row_delete_agent['staffid']; ?>')"><img src="images/icons/color/cross.png" /></a>
                                                  
                                                </td>
                                        </tr>
                                            <?php }while($row_delete_agent = mysql_fetch_assoc($delete_agent)); ?>
                                        </tbody>
                                    </table>
                                    </form>
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
mysql_free_result($delete_agent);



?>
