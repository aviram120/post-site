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
            Post Manger
        </div>
        <div class="panel-body">
			<?php getAllPost(); ?>
			<br><br>
			<button onclick="location.href='newpost.php';">Add Post </button>
        </div>
    </div>
</div>

<?php
function getAllPost()
{
	$con=mysql_connect("localhost","aviram","12345");//password=12345
	if (!$con)
	{
		die("can not connect:".mysql_error());
	}

	mysql_select_db("postDB",$con);
	
	$sql="SELECT*FROM postTbale";
	$myData=mysql_query($sql,$con);

	echo "<table>";
	while($record=mysql_fetch_array($myData))
	{
		echo "<tr>";
		echo "<td width='90%'><a href='showpost.php?id=".$record['id']."'>".$record['title']."</a></td>"; 
		echo "<td><a href='editpost.php?id=".$record['id']."'>Edit</a></td>";
		echo "</tr>";
	}
	echo "</table>";

	mysql_close($con);	
}

?>

</body>
</html>

