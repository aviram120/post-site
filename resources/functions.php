<?php


function getAllPost()
{	//get all post -for 'postMaganer.php' 
	if (isset($_COOKIE['usedID']))
	{//if user is connected
		$con=makeConnection();	
		$usedIdEncode=mysql_real_escape_string($_COOKIE['usedID']);//get userID from cookie
		$usedIdDencode=base64_decode($usedIdEncode);
		$user=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$usedIdDencode'"));
		if ($user!='0')//connected
		{
			$userName=$user['username'];
		}
		
		if ($usedIdDencode==1)//from admin-user(all posts)
		{
			$sql="SELECT*FROM postTbale WHERE isPublish='0'";
		}
		else
		{
			$sql="SELECT*FROM postTbale WHERE isPublish='0'and username='$userName'";
		}
		
		$myData=mysql_query($sql,$con);

		if (mysql_num_rows($myData)==0)//if $myData return nothing
		{
			echo "No data to display-Add 'NEW POST'";
		}
		
		echo "<div class='panel-group' id='accordion-alt3'>";
		while($record=mysql_fetch_array($myData))
		{
			echo "<div class='panel'>";	
				echo "<div class='panel-heading'>";
					echo "<h4 class='panel-title'>";
						echo "<a data-toggle='collapse' data-parent='#accordion-alt3' href='#collapse".$record['id']."-alt3'>";
						echo "<i class='fa fa-angle-right'></i>".$record['title']." (Anthor: ".$record['username'].")";
						
							echo "<div align='right'>";
								echo "<a href='publishPost.php?id=".$record['id']."' ><i class='fa fa-bullhorn' title='Publish Post'></i></a>";
								echo "<a href='editpost.php?id=".$record['id']."' ><i class='fa fa-pencil' title='Edit Post'></i></a>";									
								echo "<a href='showpost.php?id=".$record['id']."' ><i class='fa fa-search-plus' title='Preview'></i></a>";
								echo "<a href='deletePost.php?id=".$record['id']."' ><i class='fa fa-trash-o' title='Delete Post'></i></a>";
							echo "</div>";

						echo "</a>";
					echo "</h4>";
				echo "</div>";
				echo "<div id='collapse".$record['id']."-alt3' class='panel-collapse collapse'>";
					echo "<div class='panel-body'>";
						echo $record['content'];
					echo "</div>";
				echo "</div>";
			echo "</div>";	
			
		}
		echo "</div>";

		mysql_close($con);
	}
	else//not conect
		echo "<font color='red'>ERROR: you mast be connected <br></font>";
}
function getAllPostpublish()
{	//print all post that published-for 'myAccount.php'
	$con=makeConnection();
	$sql="SELECT*FROM postTbale WHERE isPublish='1'";
	$myData=mysql_query($sql,$con);

	echo "<table id='table' class='table table-hover table-mc-light-blue' style='width:100%'>
		  <thead>
			<tr>      
			  <th width='70%'>Titel</th>
			  <th width='15%'>Anthor</th>
			  <th width='15%'>Link</th>
			</tr>
		  </thead>
		  <tbody>";

	while($record=mysql_fetch_array($myData))
	{
		echo "<tr>";
          echo "<td data-title='Titel'>".$record['title']."</td>";
		  echo "<td data-title='Anthor'>".$record['username']."</td>";
          echo "<td data-title='Link'><a href='showpost.php?id=".$record['id']."'>Link</a></td>";
        echo "</tr>";
		
	}
	echo "</tbody> 
		</table>";

	mysql_close($con);	
}
function makeConnection()
{//make connction to BD
	$con=mysql_connect("localhost","aviram","12345");//password=12345
	if (!$con)
	{
		die("can not connect:".mysql_error());
	}

	mysql_select_db("postDB",$con);
	
	return $con;
}	

function getPostByID()//get post from DB (by id-from url)-for 'editPost.php'
{	
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
		
}
function getPostByIDShow()//print on page all posts from DB-for 'showpost.php'
{	
	$flag=false;
	$idPost=$_GET['id'];
	
	$con=makeConnection();
	
	$sqlCheakIfPublish=mysql_fetch_array(mysql_query("SELECT*FROM postTbale WHERE id=".$idPost));

	if  ($sqlCheakIfPublish['isPublish']=='0')//if is unpulish post		 
	{
		$usedIdEncode=$_COOKIE['usedID'];//get userID from cookie
		$usedIdDencode=base64_decode($usedIdEncode);
		$user=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$usedIdDencode'"));
		
		if (($sqlCheakIfPublish['username']==$user['username']) or ($usedIdDencode=='1'))//is it the same username
			$flag=true;
	}
	else
	{
		$flag=true;
	}
	
	if ($flag)
	{
		echo "<div class='post-heading' >";
		echo "<h1>".$slCheakIfPublish['title']."</h1>";
		echo "</div>";
		echo "Written by: ".$sqlCheakIfPublish['username']."<br><br>";
		echo "<p>".$sqlCheakIfPublish['content']."</p>";
		echo "<br><br>";
		mysql_close($con);	
	}
	else
	{
		mysql_close($con);	
		header("Location: error.php");
		die();
	}
}
function userIsConected()
{//check if user is connect-for 'newPost.php'
	if (!isset($_COOKIE['usedID']))
	{
		header("Location: postMaganer.php");
		die();
	}
}
?>