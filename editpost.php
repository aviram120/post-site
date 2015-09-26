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
						<li class="active"><a href="postMaganer.php">Post Menager</a></li>
                        <li ><a href="newPost.php">Make Post</a></li>
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
		
		<form  method="post" >
			<?php getPostByID(); ?>
			<table >
				<tr>
					<td><button  type="submit"  name="submitAddToDB" class="btn btn-medium btn-theme"><i class="icon-bolt"></i>Edit</button><br></td>
				</form>
							
					<form action="postMaganer.php">
					<td><a  onclick="location.href='postMaganer.php';" class="btn btn-medium btn-theme"><i class="icon-bolt"></i> Back</a></td>	
					</form>						
				</tr>
			</table>
			
		<!-- end my -->
		<br>		
	</div>
	</section>


<?php
if (isset($_POST['submitAddToDB']))
{
	$idPost=$_GET['id'];
	$con=makeConnection();

	
	$sql="UPDATE postTbale SET title='$_POST[title]',content='$_POST[content]' WHERE id=".$idPost;
	
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