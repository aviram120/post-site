<?php include("resources/tamplates/front/header.php") ?>
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
		<form  style="text-align: center">
			
				Mail:<br> <input type="text" name="mailforget" placeholder="email@example.com" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" required>
				<br><br>
				<a class="btn btn-medium btn-theme"><i class="icon-bolt"></i>Send</a>	
				<br><br><br>
		</form>
		<!-- end my -->
					
	</div>
	</section>


	<?php include("resources/tamplates/front/footer.php") ?>