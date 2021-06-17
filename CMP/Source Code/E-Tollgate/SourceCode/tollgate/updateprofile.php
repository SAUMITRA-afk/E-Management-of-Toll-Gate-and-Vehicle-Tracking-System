
<?php

session_start();
$uname = $_SESSION['username'];


      if(isset($_POST['register'])):

   

     

    $post_name = $_POST['name'];
    $post_password = $_POST['password'];
    $post_gender= $_POST['gender'];
    $post_state = $_POST['state'];
    $post_address = $_POST['address'];
  $post_email_id = $_POST['email_id'];
  $post_mobile = $_POST['mobile'];
  $post_zipcode= $_POST['zipcode'];




    $link = new mysqli('localhost','root','','tollgate');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql = "UPDATE register SET name ='  $post_name', password='  $post_password ',gender=' $post_gender' ,state='  $post_state',address=' $post_address',
    email_id='$post_email_id',mobile=' $post_mobile' ,zipcode='$post_zipcode' WHERE name= '$uname'";
                      
                             
                          

     // echo $sql;    

    $result = $link->query($sql); 

    if($result > 0):
        echo '<script type="text/javascript">alert(" Profile Updated Successfully");</script>';
    else:
        echo '<script type="text/javascript">alert("Unsuccessful ");</script>';
    endif;

    $link->close();
    die();
    endif; 
    ?>

    <!DOCTYPE html>
    <html style="background-color: #d8f0f9;">
   
     <head>
<style>
body
{
color:#4728B4;
}
input[type=submit], select {
    width: 155px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
font-color:darkblue;
color:white;
background-color:Green;
}



button[type=submit], select {
    width: 155px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
font-color:darkblue;
color:white;
background-color:Green;
}


input[type=text], select {
    width: 255px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
font-color:darkblue;
color:white;
}

td
{
  color:darkblue;
  font-size: 24px;
}

</style>
 </head>
    <body>

  <!--==============================header=================================-->
    <?php include("header2.php");  ?> 

    
<!--   <table>   <img src="images/register3.png" alt="Smiley face" align="right"> -->
    


    <center><img src="images/update.jpg" style="width:255px"                alt="Smiley face" align="middle"> </center><br>
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
                        <button type="submit" name="register" >Update Profile</button>
                    </td>
                </tr>
                
     </table>  </form>  </center>


    
<!--   <footer>


      Copyright © 2017 Toll Gate All Rights Reserved.
  </footer>       
    -->
</body>
  
</html>
