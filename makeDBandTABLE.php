
<?php

	$con=mysql_connect("localhost","aviram","12345");//password=12345
	if (!$con)
	{
		die("can not connect:".mysql_error());
	}

	//creat db
	if(mysql_query("CREATE DATABASE postDB",$con))
	{
		echo "your DB create<br>";	
	}
	else
	{
		echo "Error: ".mysql_error();
		echo "<br>";
	}

	if (mysql_select_db("postDB",$con))
	{
		//CREATE TABLE
		$sql="CREATE TABLE postTbale(
		title text,
		content text,
		id int(10) PRIMARY KEY AUTO_INCREMENT,
		isPublish int(10)
		)";
		echo "your Table create<br>";		
	}
	else
	{
		echo "Error: ".mysql_error();
		echo "<br>";
	}
	



	mysql_query($sql,$con);

	mysql_close($con);

?>


