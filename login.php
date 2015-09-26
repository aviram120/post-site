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
		<form action="login.php" method="post" >	
			 User Name:
			<br> <input name="userName" type="text" id="login_username" maxlength="30" required><br>

			Password:<br><input name="pwd" id="login_password" title="Password must contain at least 4 characters" type="password" required minlength="4" onchange="
			this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
			<br>
			<br><br>
			
			<button  type="submit"  name="submit" class="btn btn-medium btn-theme"><i class="icon-bolt"></i>Sign in</button>
			<button  type="reset"   class="btn btn-medium btn-theme"><i class="icon-bolt"></i>Reset</button>	


			<br/><br/>
			<a href="forgetPass.php">Forgot Password\User name?</a>
			<br>
			<br><br>
		</form>
			<!-- end my -->
					
	</div>
	</section>
<?php
if (isset($_COOKIE['usedID']))//if try to login whill connected
{
	unset($_COOKIE['usedID']);
	setcookie("usedID", "", time() - 3600,"/");
	
	header("Location: login.php");
	die();
}	
if (isset($_POST['submit']))
{
	$con=makeConnection();
	
	//check if the username is exsist
	$checkUser=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `username`='$_POST[userName]'"));
	if ($checkUser!='0')
	{
		if ($checkUser['password']==md5($_POST['pwd']))
		{
			$usedID=base64_encode($checkUser['id']);
			//set cookie
			setcookie("usedID",$usedID,time()+24*60*60,"/");
			header("Location: postMaganer.php");
		}
		else
		{
			 echo "<font color='red'> ERROR: Wrong UserName or Password!</font>";
		}
	}
	else
	{
		echo "<font color='red'> ERROR: Wrong UserName or Password!</font>";
	}
}
?>

	<?php include("resources/tamplates/front/footer.php") ?>