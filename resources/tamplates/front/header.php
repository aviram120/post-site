<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PostSite</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet"> 
<link href="css/style.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>


<div  class="navbar navbar-default navbar-static-top" >
            <div class="container" >
                <div class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav" >

						<?php userNameIsConected(); ?> 
                    </ul>
                </div>
            </div>
        </div>
<body>
<?php
function userNameIsConected()
{
	$flag=false;
	
	if (isset($_COOKIE['usedID']))
	{
		
		$usedIdEncode=mysql_real_escape_string($_COOKIE['usedID']);		
		$con=makeConnectionForStart();

		$usedIdDencode=base64_decode($usedIdEncode);
		$user=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$usedIdDencode'"));
		if ($user!='0')//connected
		{
			echo "<br>";
			echo 'Hello, '.$user['username'].'. You can ';	
			echo "<a href='logout.php'>Logout </a>";
			echo "here";		
		}
		else
		{
			$flag=true;
		}
	}
	else
	{
			$flag=true;
	}
	
	
	if ($flag)
	{
		echo "<li><a href='login.php'>sign in</a></li>";
		echo "<li><a href='register.php'>sign up</a></li>";
	}
}
function makeConnectionForStart()
{
	$con=mysql_connect("localhost","aviram","12345");//password=12345
	if (!$con)
	{
		die("can not connect:".mysql_error());
	}

	mysql_select_db("postDB",$con);
	
	return $con;
}	
?>