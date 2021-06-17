  <?php 

  
     
      
    
 $hostname = 'localhost';
        $dbname   = 'tollgate';
        $username = 'root'; 
        
        mysql_connect('localhost', 'root', '') or DIE('Connection Not FOUND..!');
        mysql_select_db('tollgate') or DIE('Database name is not available!');
        
        // $query ="SELECT  amount  FROM tollfare WHERE year=' $post_year' , vehicle=' $post_vehicle' , tolllarea='  $post_location'";

// Get array of users   
$select_users = "SELECT * FROM tollfare";

if (!mysql_query($select_users)) {
die('Error: ' . mysql_error());
} //all good so far

$select_users_result = mysql_query($select_users);
?>

<select id="selectbox" name="navn" onchange="populateData(this.value)">
   <option>USER</option>
<?php   

$klubb[] = array();
$klasse[] = array();
while ($row = mysql_fetch_array($select_users_result, MYSQL_ASSOC)) {

 echo "<option value='" . $row['vehicle'] . "'>". $row['vehicle'] ."</option>";

//echoing these vars will output all rows for the column specified...
 echo "hooo".$row['vehicle'];
$klubb = $row['tolllarea'];   
$klasse = $row['amount']; 

}

mysql_close();

?>  
</select>

<tr>
    <td>Klubb: </td>
    <td><input id="klubb" type="text" name="klubb" class="cred_input" <?php echo $klubb = $row['tolllarea'];   ?> />

    </td>
</tr>
<tr>
    <td>Klasse: </td>
    <td><input id="klasse" type="text" name="klasse" class="cred_input" /> </td>
</tr>

<?hp inclued("file.php")?>

<script>

function populateData()
        {
            //alert('in populateData');
            y = document.getElementById("selectbox");
         document.getElementById("klasse").value =  [y.selectedIndex];
        document.getElementById("klubb").value = [y.selectedIndex];

        }   
</script>

<!-- <script type="text/javascript">
$('select').on('change', function() {
  var selectedVal = this.value; // or $(this).val()
   $(document).ready(function() {
      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "file.php?selectedVal="+selectedVal,             
        dataType: "html",   //expect html to be returned                
        success: function(response){   
            $("#some_container").html(response);            
        }
    });
});
});
</script>
 -->