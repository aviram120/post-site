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
            Show Post
        </div>
        <div class="panel-body">
		
			<?php getPostByID(); ?>
			<button onclick="location.href='index.php';">Back</button>		
        </div>
    </div>
</div>
<?php
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
		echo "<td width='20%'> Post Title:  </td>";
		echo "<td>".$record['title']."</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td> Content:</td>";
		echo "<td>".$record['content']."</td>";
		echo "</tr>";
		echo "</table><br>";
	}
	mysql_close($con);	
}
?>

</body>
</html>

