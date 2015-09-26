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
	<form action="register.php" method="post" >	
			User Name:<br> <input type="text" name="userName" maxlength="30" required>
			<br>
			Password:<br><input  id="reg_password" title="Password must contain at least 4 characters" type="password" required minlength="4" name="password" onchange="
			this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
			if(this.checkValidity()) form.pwd2.pattern = this.value;">
			<br>

			Confirm Password:<br><input  title="Please enter the same Password as above" type="password" required minlength="4" name="pwd2" onchange="
			this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
			<br>

			Mail:<br> <input type="text" id="reg_email" name="mail" placeholder="email@example.com" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" required>
		
			<br><br>
			
				<button  type="submit"  name="submit" class="btn btn-medium btn-theme"><i class="icon-bolt"></i>Sign Up</button>
				<button  type="reset"   class="btn btn-medium btn-theme"><i class="icon-bolt"></i>Reset</button>							
	<br><br><br>
		
		</form>
			<!-- end my -->
					
	</div>
	</section>
<?php
if (isset($_POST['submit']))
{	

	$con=makeConnection();
	
	//check if the username is allredy exsist
	$checkUserName=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `username`='$_POST[userName]'"));
	if ($checkUserName!='0')//can't add the user-the username is allready exists
	{
		echo "<font color='red'> ERROR: That UserName already exists! try new UserName</font><br>";
	}
	else
	{
		$checkEmail=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `mail`='$_POST[mail]'"));
		if ($checkEmail!='0')//check if the email is allready exists-by other user
		{
			echo "<font color='red'> ERROR: That E-mail already exists! try new E-mail</font><br>";
		}
		else
		{//add to DB
			$passwordMD5=MD5($_POST['password']);
			$sql="INSERT INTO users(id,username,password,mail) VALUES(NULL,'$_POST[userName]','$passwordMD5','$_POST[mail]')";
			
			mysql_query($sql,$con);
			$usedID=mysql_insert_id();	
						
			$usedID=base64_encode($usedID);
					
			setcookie("usedID",$usedID,time()+24*60*60,"/");
			header("Location: postMaganer.php");
		}
		
	}
		
	if (!$con)
	{
		die("error:".mysql_error());
	}
	mysql_close($con);	
}
?>
<?php include("resources/tamplates/front/footer.php") ?>