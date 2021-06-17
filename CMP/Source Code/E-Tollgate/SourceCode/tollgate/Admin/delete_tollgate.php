<?php require_once('../Connections/tollgate.php'); ?>
<?php
$msg =0;
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
$query_view_company = "SELECT * FROM tollgatedetail ORDER BY sno ASC";
$view_company = mysql_query($query_view_company, $tollgate) or die(mysql_error());
$row_view_company = mysql_fetch_assoc($view_company);
$totalRows_view_company = mysql_num_rows($view_company);


if(isset($_POST['hf_id']))
{
	$id=$_REQUEST['hf_id'];
	
	$qry_del="delete from tollgatedetail where tid='$id' ";
	//echo $qry_del;
	$result_del=mysql_query($qry_del, $insurance) or die(mysql_error());
	
	header(sprintf("Location: delete_tollgate.php"));

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
                                       View Toll Gate List
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                         <form name="regitstraion_form"  method="POST" id="regitstraion_form" class="form_container left_label">
                         <input type="hidden" name="hf_id" id="hf_id" />
                         <?php if ($msg==1) {echo "<div class='da-message success'>
                                        Sucessfully Deleted Company Deatils...
                                    </div>";}?>
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>Toll Gate ID</th>
                                                <th>Toll Gate Name</th>                                      
                                                
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php do{?>
                                        <tr>                                                
                                                <td><?php echo $row_view_company['tid']; ?></td>
                                                <td><?php echo $row_view_company['tname']; ?></td>                                                
                                                <td><img src="<?php echo $row_view_company['image']; ?>"  width="30" height="30"/></td>
                                                 <td class="da-icon-column">
                                                
                                                   
                                                    <a href="" onclick="return conf_del('<?php echo $row_view_company['tid']; ?>')"><img src="images/icons/color/cross.png" /></a>
                                                	
                                                </td>
                                            </tr>
                                            <?php }while($row_view_company = mysql_fetch_assoc($view_company)); ?>
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
mysql_free_result($view_company);
?>
