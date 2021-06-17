<?php
require_once('Connections/ehall.php');
$oid=$_GET['id'];

mysql_select_db($database_ehall, $ehall);
$query_sublist = "SELECT * FROM tollfare where vehicle='Car'";
$sublist = mysql_query($query_sublist, $ehall) or die(mysql_error());
$row_sublist = mysql_fetch_assoc($sublist);
$totalRows_sublist = mysql_num_rows($sublist);	
if($_GET['type']==1)
{							 
?>
      
                            
                 <div class="row-form">
                                    <div class="span2">Select Subject :</div>
                                    <div class="span3">
                             <select name="sub_1" id="sub_1"  class="validate[required]" style="width: 100%;" ><option value="">Choose Subject</option>
                             <?php do{?>
                               <option value="<?php echo $row_sublist['amount']; ?>"><?php echo $row_sublist['amount']; ?></option>
                               <?php }while($row_sublist = mysql_fetch_assoc($sublist));?>
                               </select>
                                    </div>
                                     
                                      
                                </div>
                               <?php }elseif($_GET['type']==2){?> 
                                <div class="row-form">
                                    <div class="span2">Select second Subject :</div>
                                    <div class="span3">
                             <select name="sub_2" id="sub_2" class="validate[required]" style="width: 100%;" ><option value="">Choose Subject</option>
                             <?php do{?>
                               <option value="<?php echo $row_sublist['sub_name']; ?>"><?php echo $row_sublist['sub_name']; ?></option>
                               <?php }while($row_sublist = mysql_fetch_assoc($sublist));?>
                               </select>
                                    </div>
                                     
                                      
                                </div>
                                <?php }?>