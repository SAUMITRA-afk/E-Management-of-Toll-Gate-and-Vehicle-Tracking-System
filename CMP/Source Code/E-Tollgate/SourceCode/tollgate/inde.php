<?php
$link = mysqli_connect('localhost', 'root', '');
	if (!$link){
		echo 'There was an error connecting to database server: ' . mysqli_error($link);
		exit();
	}
	if (!mysqli_select_db($link, 'tollgate')){
		echo 'There was an error selecting practice database: ' . mysqli_error($link);
		exit();
	}
	
	$sql = "SELECT vehicle FROM tollfare ";
	$result = mysqli_query($link, $sql);
	
	if (!$result){
		echo 'There was an error fetching categories: ' . mysqli_error($link);
		exit();
	}
	
	while ($row = mysqli_fetch_array($result)){
		$categories[] = array('catid' => $row['vehicle'], 'cat' => $row['vehicle']);
	}
	
	if (isset($_REQUEST['catDDL'])){
		$catid = $_REQUEST['catDDL'];
		$sql = "SELECT amount,vehicle FROM tollfare WHERE vehicle = '$catid' ORDER BY vehicle";
		$result = mysqli_query($link, $sql);
		
		if (!$result){
			echo 'There was an error fetching subcategories: ' . mysqli_error($link);
			exit();
		}
		
		while ($row = mysqli_fetch_array($result)){
			$subcategories[] = array('catid' => $row['amount'], 'cat' => $row['amount']);
		}
	}
	
	include 'inde1.php';
?>