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
$query_view_company = "SELECT * FROM userdetails where cid ='".$_SESSION['id']."' ORDER BY sno DESC";
$view_company = mysql_query($query_view_company, $tollgate) or die(mysql_error());
$row_view_company = mysql_fetch_assoc($view_company);
$totalRows_view_company = mysql_num_rows($view_company);


if(isset($_POST['hf_id']))
{
	$id=$_REQUEST['hf_id'];
	
	$qry_del="delete from userdetails where sno='$id' ";
	//echo $qry_del;
	$result_del=mysql_query($qry_del, $insurance) or die(mysql_error());
	
	header(sprintf("Location: delete_tollpass.php"));

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
                                    Get Direction 
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                         <form name="regitstraion_form"  method="POST" id="regitstraion_form" class="form_container left_label">
                         <input type="hidden" name="hf_id" id="hf_id" />
                                    <table width="100%" border="1" align="center">
  <tr>
    <td width="20%">&nbsp;</td>
    <td width="79%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span style="font-weight: bold; font-size: 16px; color: #900;">Get Direction </span><a href="https://maps.google.co.in/maps?hl=en&ll=10.782836,78.288503&spn=6.062641,10.821533&t=m&z=7">Click Here...</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><iframe width="700" height="500" frameborder="7" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?hl=en&amp;ie=UTF8&amp;ll=10.782836,78.288503&amp;spn=6.062641,10.821533&amp;t=m&amp;z=7&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?hl=en&amp;ie=UTF8&amp;ll=10.782836,78.288503&amp;spn=6.062641,10.821533&amp;t=m&amp;z=7&amp;source=embed" style="color:#900; text-align:left; font-size:12px; font-weight:bold"><br/>View Larger Map...</a></small></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
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
