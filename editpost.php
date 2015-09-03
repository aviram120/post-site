<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>Post</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet"  type="text/css" href="style/style.css">

</head>
<body >
<?php include("resources/functions.php") ?>


	<br>
	<div class="header-content" >
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


?>


</body>
</html>

