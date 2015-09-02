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
.bigText {
    height:250px;
	width: 80%;
}

</style>

</head>
<body >

<form action="newpost.php" method="post">
	<br>
	<div class="center" >
	   <div class="panel panel-default">
			<div class="panel-heading">
				Add New Post
			</div>
			<div class="panel-body" >			
					<table style="width:90%" >
						<tr>
							<td width='20%'> Post Title: <br><br> </td>
							<td><input  type="text" name="title" style="width:40%"> <br><br></td>									
						</tr>
						<tr>
							<td > Content: <br><br></td>
							<td > <textarea name="content" rows="4" cols="60" style="width:100%"> </textarea> <br><br></td>					
						</tr>			
					</table>
					
					 <br>
					 <table >
						<tr>
							<td><button type="submit" style="width:60px" name="submit" >Add</button> <br></td>
							<td><button style="width:60px">Delete</button></td>									
						</tr>			 
					 </table>			
			</div>
		</div>
	</div>
</form>
<?php
if (isset($_POST['submit']))
{
	$con=mysql_connect("localhost","aviram","12345");//password=12345
	if (!$con)
	{
		die("can not connect:".mysql_error());
	}

	mysql_select_db("postDB",$con);
	
	$sql="INSERT INTO postTbale(title,content,id) VALUES('$_POST[title]','$_POST[content]',NULL)";
	
	mysql_query($sql,$con);
	if (!$con)
	{
		die("error:".mysql_error());
	}

	mysql_close($con);	
}

?>

</body>
</html>

