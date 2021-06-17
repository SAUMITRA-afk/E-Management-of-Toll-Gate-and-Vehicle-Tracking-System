<?php

require_once('Connections/ehall.php');

mysql_select_db($database_ehall, $ehall);

?>
<html>
<head>
</head>
<body>
<script>

function depa1(val) {		
	   
	  
	   var strURL="view.php?id="+val+"&type=1";
		//	alert(strURL);

		var req = getXMLHTTP();
		
		if (req) {
			 
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {	
					    	
						document.getElementById('depart1').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}

				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
	
				
	}

</script>

<form method="POST">
<select name="deprt" id="dep1"  onChange="return depa1(this.value)" ><option value="">Choose the Department</option>
                             
                             
                               <option value="car">car</option>
                                <option value="van">van</option>
                               </select>
							   
							   </div>
                                <div id="depart1"></div>
							   </form>
</body>
</html>