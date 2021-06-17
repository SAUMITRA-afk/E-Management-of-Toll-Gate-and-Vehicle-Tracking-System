 
<?php
    if(isset($_POST['name']) && isset($_POST['email_id']) && isset($_POST['comments'])):
    $post_name = $_POST['name'];
    $post_email = $_POST['email_id'];
    $post_comments = $_POST['comments'];
    
     

    $link = new mysqli('localhost','root','','tollgate');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql = "INSERT INTO feedback(name,email_id, comments) VALUES('".$post_name."', '". $post_email."', '".$post_comments."')";

    //echo $sql;    

    $result = $link->query($sql); 

    if($result > 0):
        echo '<script type="text/javascript">alert("Feedback sended Successfully");</script>';

    else:
       echo '<script type="text/javascript">alert(" Fail to send");</script>';

    endif;

    $link->close();
    die();
    endif; 
    ?>



<html style="background-image:url(images/Contactusback2.png);">
<?php 
include 'header4.php';
?>

<head>
<style>
.center1 {
    margin: auto;
    width: 60%;
    border: 3px solid #0ec0ae;
    padding: 10px;
}
input[type=text], select {
    width: 342px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
font-color:darkblue;
}
input[type=email], select {
    width: 342px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
font-color:darkblue;
}

input[type=submit], select {
    width: 342px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  color:white;
background-color:#0ec0ae;
}
h3
{
color:darkblue;
text-align: center;
}
td
{
  color:Darkblue;
  font-size: 20px;
}
</style>
</head>
<body style="background-image:url(images/background.jpg";>


<table>
    <tr>
        <td>
            <img src="images/feedback.png" alt="contact3" style="width:200px;height:215px;">
        </td>
      
        <td>
          <img src="images/contact2.png" alt="contact3" style="width:483px;height:200px;align=right">
  
        </td>
    </tr>
</table>

<center>
   <table style="background-color: #bcb9b9;padding: 32px 10px 10px 10px;  ">

  <form action="" method="post">
  
  <tr>
      <td>
           Name: 
      </td>
      <td>
       <input type="text" name="name"/>   
      </td>
      <tr>
        <td>
        Email :  
      </td>
      <td>
       <input type="email" name="email_id"/><br><br>   
      </td>  
      </tr>
      
      <tr>
        <td>
        Comments:  
      </td>
      <td>
        <textarea name="comments" rows="5" cols="40"></textarea>  
      </td>  
      </tr>
      <tr>
        <td>
            
        </td>
        <td>
            <input type="submit" value="Send"/></center>
        </td>
      </tr>
      
  </tr>
 </form>  
  </table> <br><br><br><br>

       

</body>
</html> 


<

