
<?php 

	unset($_COOKIE['usedID']);
	setcookie("usedID", "", time() - 3600,"/");
	
	header("Location: index.php");
	die();

 ?>