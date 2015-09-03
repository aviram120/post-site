<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>Post</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<style type="text/css">
	.center {
    margin: auto;
    width: 50%;
    padding: 10px;

}
</style>

</head>
<body >


	<br>
	<div class="center" >
	   <div class="panel panel-default">
			<div class="panel-heading">
				Edit Post
			</div>
			<div class="panel-body">		
				<form  method="post">
				<?php getPostByID(); ?>
				<table >
					<tr>
						
							<td><button style="width:60px" type="submit" name="submitAddToDB" >Edit</button> <br></td>
						</form>
						<form action="index.php">
						<td><button style="width:60px" onclick="location.href='index.php';">Back</button></td>
						</form>						
					</tr>
				</table>
			</div>
		</div>
	</div>

<?php

if (isset($_POST['submitAddToDB']))
{
	$idPost=$_GET['id'];

	$con=mysql_connect("localhost","aviram","12345");//password=12345
	if (!$con)
	{
		die("can not connect:".mysql_error());
	}

	mysql_select_db("postDB",$con);
	
	$sql="UPDATE postTbale SET title='$_POST[title]',content='$_POST[content]' WHERE id=".$idPost;
	
	mysql_query($sql,$con);
	if (!$con)
	{
		die("error:".mysql_error());
	}

	mysql_close($con);	
	
	header("Location: index.php");
	die();	
}

function getPostByID()
{	
	$idPost=$_GET['id'];
	
	$con=mysql_connect("localhost","aviram","12345");//password=12345
	if (!$con)
	{
		die("can not connect:".mysql_error());
	}

	mysql_select_db("postDB",$con);
	
	$sql="SELECT*FROM postTbale WHERE id=".$idPost;
	$myData=mysql_query($sql,$con);

	while($record=mysql_fetch_array($myData))
	{
		
		echo "<table style='width:90%' >";
		echo "<tr>";
		echo "<td width='20%'> Post Title:  <br><br></td>";
		echo "<td><input  type='text' name='title' style='width:40%'  value='".$record['title']."' required> <br><br></td>";		
		echo "</tr>";
		
		echo "<tr>";
		echo "<td> Content:</td>";
		echo "<td > <textarea name='content' rows='4' cols='60' style='width:100%' required>".$record['content']." </textarea> <br><br></td>";
		echo "</tr>";
		echo "</table><br>";	
	}
	mysql_close($con);	
}

?>


</body>
</html>

