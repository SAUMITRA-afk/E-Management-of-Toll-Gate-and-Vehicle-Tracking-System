<?php require_once('../Connections/tollgate.php'); ?>
<?php
//error_reporting(0);
$msg =0;
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "update_admin")) {
   
    $image=$_FILES['image']['name'];
  $image_name=$_POST['staffid'];
  $newname="../staff_image/".$image_name.$image;
  move_uploaded_file( $_FILES["image"]["tmp_name"],$newname);	
 	
  $updateSQL = sprintf("UPDATE staffdetails SET name=%s, dob=%s, gender=%s, age=%s, address=%s, phone=%s, mobile=%s, mailid=%s, doj=%s, salary=%s, country=%s, location=%s, passwrd=%s, designation=%s, image=%s WHERE staffid=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['dob'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['age'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['emailid'], "text"),
                       GetSQLValueString($_POST['doj'], "text"),
                       GetSQLValueString($_POST['salary'], "text"),
                       GetSQLValueString($_POST['country'], "text"),
                       GetSQLValueString($_POST['location'], "text"),
                       GetSQLValueString($_POST['pass'], "text"),
                       GetSQLValueString($_POST['designation'], "text"),
                       GetSQLValueString($newname, "text"),
                       GetSQLValueString($_POST['staffid'], "text"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result1 = mysql_query($updateSQL, $tollgate) or die(mysql_error());
  
  
  $updateSQL4 = sprintf("UPDATE logindetails SET fullname=%s, passwd=%s WHERE uname=%s",
                       GetSQLValueString($_POST['name'], "text"),                       
                       GetSQLValueString($_POST['pass'], "text"),
                       GetSQLValueString($_POST['staffid'], "int"));

  mysql_select_db($database_tollgate, $tollgate);
  $Result14 = mysql_query($updateSQL4, $tollgate) or die(mysql_error());

  $updateGoTo = "updatepro.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  $msg =1;//header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_tollgate, $tollgate);
$query_stfdetail = "SELECT * FROM staffdetails ORDER BY sno ASC";
$stfdetail = mysql_query($query_stfdetail, $tollgate) or die(mysql_error());
$row_stfdetail = mysql_fetch_assoc($stfdetail);
$totalRows_stfdetail = mysql_num_rows($stfdetail);

$colname_view_admin = "-1";
if (isset($_SESSION['id'])) {
  $colname_view_admin = $_SESSION['id'];
}

mysql_select_db($database_tollgate, $tollgate);
$query_view_admin = sprintf("SELECT * FROM staffdetails WHERE staffid='001' ORDER BY sno ASC");
//echo $query_view_admin;
$view_admin = mysql_query($query_view_admin, $tollgate) or die(mysql_error());
$row_view_admin = mysql_fetch_assoc($view_admin);
$totalRows_view_admin = mysql_num_rows($view_admin);
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
                	<form method="POST" action="<?php echo $editFormAction; ?>"  enctype="multipart/form-data" id="da-ex-validate1" class="da-form" name="update_admin">                  
                      <div id="da-content-area">
                     
                    	<div class="grid_2">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        UPDATE ADMIN DETAILS
                                  </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	 <?php if ($msg==1) {echo "<div class='da-message success'>
                                        Sucessfully Updated Admin Deatils...
                                    </div>";}?>
                                    
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        
                                        <div class="da-form-inline">
                                                        <div class="da-form-row">
                                                <label>Staff ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input name="staffid" type="text" value="<?php echo $row_view_admin['staffid']; ?>" readonly="readonly"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Name<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="name" value="<?php echo $row_view_admin['name']; ?>"/>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="da-form-row">
                                                <label>Date of Birth<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="dob" value="<?php echo $row_view_admin['doj']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Age<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="age" value="<?php echo $row_view_admin['age']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Gender<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <select type="text" name="gender"  value="<?php echo $row_view_admin['gender']; ?>">
                                                    
                                                      <option>Male</option>
                                                      <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Address<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <textarea type="text" name="address" value=""><?php echo $row_view_admin['address']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Phone<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="phone" value="<?php echo $row_view_admin['phone']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Mobile<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="mobile" value="<?php echo $row_view_admin['mobile']; ?>"/>
                                                </div>
                                            </div>
                                           
                                            
                                           
                                    
                                </div>
                               
                             
                            </div>
                        </div>
                        </div>
                    	<div class="grid_2">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        UPDATE ADMIN DETAILS <span style="background:url(images/up.png) no-repeat; float:right; padding-right:20px; padding-left:20px; text-decoration:underline;"><a href="dashboard.php">Back To View</a></span>
                                    </span>
                                </div>
                              
                                <div class="da-panel-content">
                                	    <?php if ($msg==1) {echo "<div class='da-message success'>
                                        Sucessfully Updated Admin Deatils...
                                    </div>";}?>
                                    	<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
                                        <div class="da-form-inline">
                                        
                                            <div class="da-form-row">
                                                <label>Date of Joining<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="doj" value="<?php echo $row_view_admin['doj']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Email ID<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="emailid" value="<?php echo $row_view_admin['mailid']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Salary<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="salary" value="<?php echo $row_view_admin['salary']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Country <span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <select id="pass1" type="text" name="country" value="<?php echo $row_view_admin['country']; ?>">
                                                     <option value=""></option>
                                            <optgroup label="COUNTRY START FROM [A]">
                                            <option value="Afghanistan">Afghanistan</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
											<option value="Antigua and Barbuda">Antigua and Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
                                            <option value="Australia">Australia</option>
											<option value="Austria">Austria</option>
											<option value="Azerbaijan">Azerbaijan</option>
                                            </optgroup>
                                           <optgroup label="COUNTRY START FROM [B]">
											<option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
											<option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
											<option value="Belgium">Belgium</option>
											<option value="Belize">Belize</option>
											<option value="Benin">Benin</option>
                                            <option value="Bhutan">Bhutan</option>
											<option value="Bolivia">Bolivia</option>
											<option value="Botswana">Botswana</option>
											<option value="Brazil">Brazil</option>
                                            <option value="Brunei">Brunei </option>
											<option value="Bulgaria">Bulgaria</option>
											<option value="Burkina Faso">Burkina Faso</option>
											<option value="Burma">Burma</option>
                                            <option value="Burundi">Burundi</option>
                                      </optgroup>
                                            <optgroup label="COUNTRY START FROM [C]">
											<option value="Cambodia">Cambodia</option>
											<option value="Cameroon">Cameroon</option>
											<option value="Cape Verde">Cape Verde</option>
											<option value="Cayman Islands">Cayman Islands</option>
											<option value="Central African Republic">Central African Republic</option>
											<option value="Chad">Chad</option>
											<option value="Chile">Chile</option>
											<option value="China">China</option>
											<option value="Colombia">Colombia</option>
											<option value="Comoros">Comoros</option>
											<option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
											<option value="Republic of the Congo">Republic of the Congo</option>
											<option value="Cook Islands">Cook Islands</option>
											<option value="Costa Rica">Costa Rica</option>
											<option value="C&ocirc;te d'Ivoire">C&ocirc;te d'Ivoire</option>
											<option value="Croatia">Croatia</option>
											<option value="Cuba">Cuba</option>
											<option value="Cyprus">Cyprus</option>
											<option value="Czech Republic">Czech Republic</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [D]">
											<option value="Denmark">Denmark</option>
											<option value="Djibouti">Djibouti</option>
											<option value="Dominica">Dominica</option>
											<option value="Dominican Republic">Dominican Republic</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [E]">
											<option value="East Timor">East Timor</option>
											<option value="Ecuador">Ecuador</option>
											<option value="Egypt">Egypt</option>
											<option value="El Salvador">El Salvador</option>
											<option value="Equatorial Guinea">Equatorial Guinea</option>
											<option value="Eritrea">Eritrea</option>
											<option value="Estonia">Estonia</option>
											<option value="Ethiopia">Ethiopia</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [F]">
											<option value="Faroe Islands">Faroe Islands</option>
											<option value="Fiji">Fiji</option>
											<option value="Finland">Finland</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [G]">
											<option value="Gabon">Gabon</option>
											<option value="Gambia">Gambia</option>
											<option value="Georgia">Georgia</option>
											<option value="Germany">Germany</option>
											<option value="Ghana">Ghana</option>
											<option value="Greece">Greece</option>
											<option value="Grenada">Grenada</option>
											<option value="Guatemala">Guatemala</option>
											<option value="Guinea">Guinea</option>
											<option value="Guinea-Bissau">Guinea-Bissau</option>
											<option value="Guyana">Guyana</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [H]">
											<option value="Haiti">Haiti</option>
											<option value="Honduras">Honduras</option>
											<option value="Hong Kong">Hong Kong</option>
											<option value="Hungary">Hungary</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [I]">
											<option value="Iceland">Iceland</option>
											<option value="Indonesia">Indonesia</option>
                                            <option value="India" selected="selected">India</option>
											<option value="Iran">Iran</option>
											<option value="Iraq">Iraq</option>
											<option value="Ireland">Ireland</option>
											<option value="Israel">Israel</option>
											<option value="Italy">Italy</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [J]">
											<option value="Jamaica">Jamaica</option>
											<option value="Japan">Japan</option>
											<option value="Jordan">Jordan</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [K]">
											<option value="Kazakhstan">Kazakhstan</option>
											<option value="Kenya">Kenya</option>
											<option value="Kiribati">Kiribati</option>
											<option value="North Korea">North Korea</option>
											<option value="South Korea">South Korea</option>
											<option value="Kuwait">Kuwait</option>
											<option value="Kyrgyzstan">Kyrgyzstan</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [L]">
											<option value="Laos">Laos</option>
											<option value="Latvia">Latvia</option>
											<option value="Lebanon">Lebanon</option>
											<option value="Lesotho">Lesotho</option>
											<option value="Liberia">Liberia</option>
											<option value="Libya">Libya</option>
											<option value="Liechtenstein">Liechtenstein</option>
											<option value="Lithuania">Lithuania</option>
											<option value="Luxembourg">Luxembourg</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [M]">
											<option value="Macedonia">Macedonia</option>
											<option value="Madagascar">Madagascar</option>
											<option value="Malawi">Malawi</option>
											<option value="Malaysia">Malaysia</option>
											<option value="Maldives">Maldives</option>
											<option value="Mali">Mali</option>
											<option value="Malta">Malta</option>
											<option value="Marshall Islands">Marshall Islands</option>
											<option value="Mauritania">Mauritania</option>
											<option value="Mauritius">Mauritius</option>
											<option value="Mexico">Mexico</option>
											<option value="Micronesia">Micronesia</option>
											<option value="Moldova">Moldova</option>
											<option value="Monaco">Monaco</option>
											<option value="Mongolia">Mongolia</option>
											<option value="Montenegro">Montenegro</option>
											<option value="Morocco">Morocco</option>
											<option value="Mozambique">Mozambique</option>
											<option value="Myanmar">Myanmar</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [N]">
											<option value="Namibia">Namibia</option>
											<option value="Nauru">Nauru</option>
											<option value="Nepal">Nepal</option>
											<option value="Netherlands">Netherlands</option>
											<option value="Netherlands Antilles">Netherlands Antilles</option>
											<option value="Nicaragua">Nicaragua</option>
											<option value="Niger">Niger</option>
											<option value="Nigeria">Nigeria</option>
											<option value="Norway">Norway</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [O]">
											<option value="Oman">Oman</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [P]">
											<option value="Pakistan">Pakistan</option>
											<option value="Palau">Palau</option>
											<option value="Panama">Panama</option>
											<option value="Papua New Guinea">Papua New Guinea</option>
											<option value="Paraguay">Paraguay</option>
											<option value="Peru">Peru</option>
											<option value="Philippines">Philippines</option>
											<option value="Poland">Poland</option>
											<option value="Portugal">Portugal</option>
											<option value="Puerto Rico">Puerto Rico</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [Q]">
											<option value="Qatar">Qatar</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [R]">
											<option value="Romania">Romania</option>
											<option value="Russia">Russia</option>
											<option value="Rwanda">Rwanda</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [S]">
											<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
											<option value="Saint Lucia">Saint Lucia</option>
											<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
											<option value="Samoa">Samoa</option>
											<option value="San Marino">San Marino</option>
											<option value="Sao Tome and Principe">Sao Tome and Principe</option>
											<option value="Saudi Arabia">Saudi Arabia</option>
											<option value="Senegal">Senegal</option>
											<option value="Serbia and Montenegro">Serbia and Montenegro</option>
											<option value="Seychelles">Seychelles</option>
											<option value="Sierra Leone">Sierra Leone</option>
											<option value="Singapore">Singapore</option>
											<option value="Slovakia">Slovakia</option>
											<option value="Slovenia">Slovenia</option>
											<option value="Solomon Islands">Solomon Islands</option>
											<option value="Somalia">Somalia</option>
											<option value="South Africa">South Africa</option>
											<option value="Spain">Spain</option>
											<option value="Sri Lanka">Sri Lanka</option>
											<option value="Sudan">Sudan</option>
											<option value="Suriname">Suriname</option>
											<option value="Swaziland">Swaziland</option>
											<option value="Sweden">Sweden</option>
											<option value="Switzerland">Switzerland</option>
											<option value="Syria">Syria</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [T]">
											<option value="Taiwan">Taiwan</option>
											<option value="Tajikistan">Tajikistan</option>
											<option value="Tanzania">Tanzania</option>
											<option value="Thailand">Thailand</option>
											<option value="Togo">Togo</option>
											<option value="Tonga">Tonga</option>
										    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
											<option value="Tunisia">Tunisia</option>
											<option value="Turkey">Turkey</option>
											<option value="Turkmenistan">Turkmenistan</option>
											<option value="Tuvalu">Tuvalu</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [U]">
											<option value="Uganda">Uganda</option>
										    <option value="Ukraine">Ukraine</option>
											<option value="United Arab Emirates">United Arab Emirates</option>
											<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
											<option value="Uruguay">Uruguay</option>
											<option value="Uzbekistan">Uzbekistan</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [V]">
											<option value="Vanuatu">Vanuatu</option>
											<option value="Vatican City">Vatican City</option>
											<option value="Venezuela">Venezuela</option>
											<option value="Vietnam">Vietnam</option>
											<option value="Virgin Islands, British">Virgin Islands, British</option>
											<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [Y]">
											<option value="Yemen">Yemen</option>
                                            </optgroup>
                                            <optgroup label="COUNTRY START FROM [Z]">
											<option value="Zambia">Zambia</option>
											<option value="Zimbabwe">Zimbabwe</option>
                                            </optgroup>

                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Location<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="location" value="<?php echo $row_view_admin['location']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Password<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="pass" value="<?php echo $row_view_admin['passwrd']; ?>"/>
                                                </div>
                                            </div>
                                            
                                            <div class="da-form-row">
                                                <label>Desination<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    <input type="text" name="designation" value="<?php echo $row_view_admin['designation']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Upload Image<span class="required">*</span></label>
                                                <div class="da-form-item default">
                                                    
                                            	<input type="file" class="da-custom-file" name="image" value="<?php echo $row_view_admin['image']; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="da-button-row">
                                        	<input type="submit" value="Update" class="da-button red" />
                                        </div>
                                        </div>
                                        
                                    
                                </div>
                               
                            </div>
                        </div>
                      <input type="hidden" name="MM_update" value="update_admin" />
                  </form>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include('footer.php');?>
    </div>
</body>
</html>
<?php
mysql_free_result($stfdetail);

mysql_free_result($view_admin);
?>
