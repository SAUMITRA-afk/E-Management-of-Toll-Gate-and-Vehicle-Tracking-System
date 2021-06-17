

 <?php

    


    if(isset($_POST['register'])):

   

     

    $post_name = $_POST['name'];
    $post_password = $_POST['password'];
    $post_gender= $_POST['gender'];
    $post_state = $_POST['state'];
    $post_address = $_POST['address'];
  $post_email_id = $_POST['email_id'];
  $post_mobile = $_POST['mobile'];
  $post_zipcode= $_POST['zipcode'];




 






 // $post_image= $_POST['images1'];
    $link = new mysqli('localhost','root','','tollgate');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);


      if(strlen( $_POST['mobile'])!='10')
  {

 echo "<script>alert('Enter a correct Mobile number');</script>";
}
else
  
    $sql = "INSERT INTO register(name, password, gender,state,address,email_id,mobile,zipcode,images) VALUES('".$post_name."', '".$post_password."', '". $post_gender."', '". $post_state."','".  $post_address."','".  $post_email_id."','". $post_mobile."','". $post_zipcode."','".  $file_loc."')";

    //echo $sql;    

    $result = $link->query($sql); 

    if($result > 0):
         echo '<script type="text/javascript">alert("Successfully Registered");</script>';
    else:
         echo '<script type="text/javascript">alert("Unsuccessful");</script>';
    endif;

    $link->close();
    die();
    endif; 
  
    ?>



    <!DOCTYPE html>
    <html>

  
     <head>

    <title>Toll Gate</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link href='http://fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Passion+One:400,700' rel='stylesheet' type='text/css'>

<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="css/themes.css" rel="stylesheet" type="text/css">
<link href="css/typography.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/shCore.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/jquery.jqplot.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css">
<link href="css/data-table.css" rel="stylesheet" type="text/css">
<link href="css/form.css" rel="stylesheet" type="text/css">
<link href="css/ui-elements.css" rel="stylesheet" type="text/css">
<link href="css/wizard.css" rel="stylesheet" type="text/css">
<link href="css/sprite.css" rel="stylesheet" type="text/css">
<link href="css/gradient.css" rel="stylesheet" type="text/css">


<!-- Jquery -->
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.ui.touch-punch.js"></script>
<script src="js/chosen.jquery.js"></script>
<script src="js/uniform.jquery.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-colorpicker.js"></script>
<script src="js/sticky.full.js"></script>
<script src="js/jquery.noty.js"></script>
<script src="js/selectToUISlider.jQuery.js"></script>
<script src="js/fg.menu.js"></script>
<script src="js/jquery.tagsinput.js"></script>
<script src="js/jquery.cleditor.js"></script>
<script src="js/jquery.tipsy.js"></script>
<script src="js/jquery.peity.js"></script>
<script src="js/jquery.simplemodal.js"></script>
<script src="js/jquery.jBreadCrumb.1.1.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/jquery.idTabs.min.js"></script>
<script src="js/jquery.multiFieldExtender.min.js"></script>
<script src="js/jquery.confirm.js"></script>
<script src="js/elfinder.min.js"></script>
<script src="js/accordion.jquery.js"></script>
<script src="js/autogrow.jquery.js"></script>
<script src="js/check-all.jquery.js"></script>
<script src="js/data-table.jquery.js"></script>
<script src="js/ZeroClipboard.js"></script>
<script src="js/TableTools.min.js"></script>
<script src="js/jeditable.jquery.js"></script>
<script src="js/duallist.jquery.js"></script>
<script src="js/easing.jquery.js"></script>
<script src="js/full-calendar.jquery.js"></script>
<script src="js/input-limiter.jquery.js"></script>
<script src="js/inputmask.jquery.js"></script>
<script src="js/iphone-style-checkbox.jquery.js"></script>
<script src="js/meta-data.jquery.js"></script>
<script src="js/quicksand.jquery.js"></script>
<script src="js/raty.jquery.js"></script>
<script src="js/smart-wizard.jquery.js"></script>
<script src="js/stepy.jquery.js"></script>
<script src="js/treeview.jquery.js"></script>
<script src="js/ui-accordion.jquery.js"></script>
<script src="js/vaidation.jquery.js"></script>
<script src="js/mosaic.1.0.1.min.js"></script>
<script src="js/jquery.collapse.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jquery.autocomplete.min.js"></script>
<script src="js/localdata.js"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.jqplot.min.js"></script>
<script src="js/chart-plugins/jqplot.dateAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.cursor.min.js"></script>
<script src="js/chart-plugins/jqplot.logAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.canvasTextRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.highlighter.min.js"></script>
<script src="js/chart-plugins/jqplot.pieRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.barRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.pointLabels.min.js"></script>
<script src="js/chart-plugins/jqplot.meterGaugeRenderer.min.js"></script>
<script src="js/custom-scripts.js"></script>
    
  <link href="css/drop_menu.css" rel="stylesheet" type="text/css" /> 
   <link href="css/user.css" rel="stylesheet" type="text/css" />
   
 
</head>
 
   <body>
<div class="bg">
<div class="bg-2">
  <!--==============================header=================================-->
    <?php include("header.php");  ?> 

    
<!--   <table>   <img src="images/register3.png" alt="Smiley face" align="right"> -->
     <img src="images/register1.png" alt="Smiley face" height="160" width="300"> 
      <center><img src="images/register2.png" alt="Smiley face" height="160" width="300"></center> 
   <center>

    <table>
        
          
            <form  method="post" enctype="multipart/form-data"> 
     
            <tr>
            
                    <td>
                      UserName:  
                    </td>

                    <td>
                       <input type="text" name="name"/> 
                    </td>
                    </tr>
                    <tr>
                        <td>
                       Password: 
                    </td>
                    <td>
                        <input type="text" name="password"/>
                    </td>
                    </tr>
                     <tr>
                    <td>
                       Gender:  
                    </td>
                    <td>
                       <input type="text" name="gender"/>  
                    </td>
                </tr>

  <tr>
                    <td>
                       state:  
                    </td>
                    <td>
                       <input type="text" name="state"/>  
                    </td>
                </tr>






                
                <tr>
                    <td>
                       Address:  
                    </td>
                    <td>
                       <input type="text" name="address"/>  
                    </td>
                </tr>
                <tr>
                   <td>
                     Email_Id:   
                   </td> 
                   <td>
                       <input type="text" name="email_id"/>
                   </td>
                </tr>


                    <tr>
                   <td>
                        Mobile No:
                   </td> 
                   <td>
                       <input type="text" name="mobile"/>
                   </td>
                </tr>
               

  <tr>
                   <td>
                        Zipcode:
                   </td> 
                   <td>
                       <input type="text" name="zipcode"/>
                   </td>
                </tr>

                                   
                
                        
                    <tr>
                    <td>
                        <button type="submit" name="register" Register>Register</button>
                    </td>
                </tr>
                
     </table>  </form>  </center>


    
  <footer>


      Copyright © 2017 Toll Gate All Rights Reserved.
  </footer>       
   
</body>
  
</html>
