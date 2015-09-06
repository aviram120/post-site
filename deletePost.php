<?php

	$idPost=$_GET['id'];

	$con=mysql_connect("localhost","aviram","12345");//password=12345
	if (!$con)
	{
		die("can not connect:".mysql_error());
	}

	mysql_select_db("postDB",$con);
	
	$sql="DELETE FROM postTbale WHERE id=".$idPost;
	
	mysql_query($sql,$con);
	if (!$con)
	{
		die("error:".mysql_error());
	}

	mysql_close($con);		
	header("Location: postMaganer.php");
	die();
?>