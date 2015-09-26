<?php include("resources/tamplates/front/header.php") ?>
<?php include("resources/functions.php") ?>
<div id="wrapper">

	<!-- start header -->
		<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li> 						
						<li><a href="postMaganer.php">Post Menager</a></li>
                        <li class="active"><a href="newPost.php">Make Post</a></li>
                        <li><a href="myAccount.php">My Posts</a></li>
                        <li><a href="contact.php">Contact</a></li>
						<li><a href="about.php">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle"></h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<!-- my -->
		<?php userIsConected(); ?> 
		
		<form action="newPost.php" method="post" >
			<table style="width:90%" >
				<tr>
					<td width='20%'> Post Title: <br><br> </td>
					<td><input  type="text" name="title" style="width:40%" required> <br><br></td>									
				</tr>
					<tr>
						<td > Content: <br><br></td>
						<td > <textarea name="content" rows="4" cols="60" style="width:100%" required> </textarea> <br><br></td>					
					</tr>			
			</table>					
				<br>
			<table >
				<tr>
					<td><button  type="submit"  name="submit" class="btn btn-medium btn-theme"><i class="icon-bolt"></i>Add</button><br></td>										
				</tr>			 
			</table>	
		</form>
		<!-- end my -->
		<br>		
	</div>
	</section>


<?php

if (isset($_POST['submit']))
{
	$con=makeConnection();	
	
	if (isset($_COOKIE['usedID']))//get userID from cookie
	{
		$usedIdEncode=mysql_real_escape_string($_COOKIE['usedID']);		

		$usedIdDencode=base64_decode($usedIdEncode);
		$user=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$usedIdDencode'"));
		if ($user!='0')//connected
		{
			$usernameDB=$user['username'];	
		}
	}
	
	$sql="INSERT INTO postTbale(title,content,id,username) VALUES('$_POST[title]','$_POST[content]',NULL,'$usernameDB')";
	
	mysql_query($sql,$con);
	if (!$con)
	{
		die("error:".mysql_error());
	}

	mysql_close($con);
	header("Location: postMaganer.php");
	die();
}
?>
	<?php include("resources/tamplates/front/footer.php") ?>