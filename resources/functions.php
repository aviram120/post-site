<?php


function getAllPost()
{	
	$con=makeConnection();
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
function makeConnection()
{
	$con=mysql_connect("localhost","aviram","12345");//password=12345
	if (!$con)
	{
		die("can not connect:".mysql_error());
	}

	mysql_select_db("postDB",$con);
	
	return $con;
}	

function getPostByID()//get post from DB (by id-from url)
{	
	$idPost=$_GET['id'];
	
	$con=makeConnection();
	
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
function getPostByIDShow()//print on page all posts from DB
{	
	$idPost=$_GET['id'];
	
	$con=makeConnection();
	
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