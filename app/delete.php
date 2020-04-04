<?php 
require_once("includes/dbkey.php");
$passportdir = 'uploads/courseware';
$fulldir = '';
if (isset($_GET['ID']) && $_GET['ID'] !== '' && is_numeric($_GET['ID'])) {
	$id = $_GET['ID'];

	// check for target variable and chose the right table, use the right header address
	if(isset($_GET['id']) && $_GET['target'] ){
		$table = "courseware";
		$header_addr = "jss1.php";
	}
	else{
		$table = "courseware";
		$header_addr = "jss1.php";
	}
	
	$delquery = mysqli_query($connect,"SELECT * FROM $table WHERE ID ='$id'");
	if (mysqli_num_rows($delquery)>0) {

		while ($delrow = mysqli_fetch_array($delquery)) {
				$delpassport = $delrow['passport'];
				$fulldir = $passportdir.$delpassport;
				if (file_exists($fulldir)) {
					unlink($fulldir);
				}
				else{

					 header("location:$header_addr?res=noimg");
					 exit;
				}
		}

		 
		 if(mysqli_query($connect,"DELETE FROM $table WHERE ID = '$id'"))
		 {
		 	header("location:$header_addr?res=yes");
		 	exit;
		 }
		 else{

		 	header("location:$header_addr?res=no");
		 	exit;
		 }
	}
	else{

	echo "<h1 align='center'> INVALID URL</h1>";
}
}
else{

	echo "<h1 align='center'> INVALID URL</h1>";
}

?>