<?php


function getAllPost()
{	
	$con=makeConnection();
	$sql="SELECT*FROM postTbale WHERE isPublish='0'";
	$myData=mysql_query($sql,$con);

	echo "<div class='panel-group' id='accordion-alt3'>";
	while($record=mysql_fetch_array($myData))
	{
		

		echo "<div class='panel'>";	
			echo "<div class='panel-heading'>";
				echo "<h4 class='panel-title'>";
					echo "<a data-toggle='collapse' data-parent='#accordion-alt3' href='#collapse".$record['id']."-alt3'>";
					echo "<i class='fa fa-angle-right'></i>".$record['title'];
					
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
function getAllPostpublish()
{	
	$con=makeConnection();
	$sql="SELECT*FROM postTbale WHERE isPublish='1'";
	$myData=mysql_query($sql,$con);

	echo "<table id='table' class='table table-hover table-mc-light-blue'>
      <thead>
        <tr>      
          <th>Titel</th>
          <th>Link</th>
        </tr>
      </thead>
      <tbody>";

	while($record=mysql_fetch_array($myData))
	{
		echo "<tr>";
          echo "<td data-title='Titel'>".$record['title']."</td>";
          echo "<td data-title='Link'><a href='showpost.php?id=".$record['id']."' >Link</a></td>";
        echo "</tr>";
		
	}
	echo "</tbody> 
		</table>";

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
		echo "<div class='post-heading' >";
            echo "<h1>".$record['title']."</h1>";
		echo "</div>";
		
		echo "<p>".$record['content']."</p>";
		echo "<br><br>";

	}
	mysql_close($con);	
}


?>