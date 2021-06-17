<!-- <?php require_once('../Connections/tollgate.php'); ?> -->
<?php




    if(isset($_POST['submit'])):
    
  $post_year= $_POST['year'];
    $post_vehicle = $_POST['vehicle'];
    $post_amount= $_POST['amount'];
    $post_area= $_POST['area'];
   

    $link = new mysqli('localhost','root','','tollgate');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

     $sql = "UPDATE tollfare SET amount ='$post_amount', year=' $post_year'  WHERE vehicle= '$post_vehicle'  And  tolllarea='$post_area'";
                       
       //echo $sql;    

    $result = $link->query($sql); 
    // echo $result;

    if($result > 0):
        echo '<script type="text/javascript">alert("updated Successfully");</script>';
    else:
        echo '<script type="text/javascript">alert("Unsuccessful ");</script>';
    endif;

    $link->close();
    die();
    endif; 




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
   <form  method="post">                  
                      <div id="da-content-area">
                     
                    	<div class="grid_3">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        Update TollFare
                                  </span>
                                </div>
                              
                             
                                    
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        
                                        <div class="da-form-inline">
                                                        <div class="da-form-row">
                                                <label>Year<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                   <select  name="year">
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
</select>


                                                </div>
                                            </div><br>
                                            <div class="da-form-row">
                                                <label>Vehicle<span class="required">*</span></label>
                                                <div class="da-form-item default">

                                                   <select  name="vehicle">
  <option value="Car">Car</option>
  <option value=">Bike">Bike</option>
  <option value="Bus">Bus</option>
  <option value="Truck">Truck</option>
   <option value="Light Commercial Vehicle">Light Commercial Vehicle</option>
</select>




                                                </div>
                                            </div><br>
                                            <div class="da-form-row">
                                                <label>Amount<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                  <input type="text" name="amount"/>
                                                </div>
                                            </div><br>


 <div class="da-form-row">
                                                <label>Toll Area<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                  <input type="text" name="area"/>
                                                </div>
                                            </div><br>









<div class="da-button-row">
                                        	<input type="submit" value="Update TollFare" name="submit" class="da-button red" />
                                        </div>


                                </div>
                               
                             
                            </div>
                        </div>
                        </div>
                    	
                        </div>
                     
                </form>
                    	
                        
          </div>
                    
                </div>
            
        </div>
        
        <!-- Footer -->
        <?php include('footer.php');?>
        
    </div>
   
</body>

</html>

