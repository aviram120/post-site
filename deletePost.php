<?php include("resources/functions.php") ?>
<?php

	if (isset($_COOKIE['usedID']))
	{
		$idPost=$_GET['id'];

		$usedIdEncode=$_COOKIE['usedID'];//get userID from cookie
		$usedIdDencode=base64_decode($usedIdEncode);
		
		$con=makeConnection();
		
		$sqlCheakIfPublish=mysql_fetch_array(mysql_query("SELECT*FROM postTbale WHERE id=".$idPost));
		$user=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$usedIdDencode'"));
		
		if  (($sqlCheakIfPublish['isPublish']=='0') and //if is unpulish post
			($sqlCheakIfPublish['username']==$user['username']) or ($usedIdDencode=='1') )//is it the same username
		{
			$sql="DELETE FROM postTbale WHERE id=".$idPost;
			
			mysql_query($sql,$con);
			if (!$con)
			{
				die("error:".mysql_error());
			}

			mysql_close($con);	
			
			header("Location: postMaganer.php");
			die();
		}
		else
		{
			mysql_close($con);	
			header("Location: error.php");
			die();
		}
		
	}
	else
	{
		header("Location: error.php");
		die();
	}

	
?>