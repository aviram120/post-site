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
                        <li><a href="newPost.php">Make Post</a></li>
                        <li ><a href="myAccount.php">My Posts</a></li>
                        <li class="active"><a href="contact.php">Contact</a></li>
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
				<h2 class="pageTitle"</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
		<div class="col-md-12">
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:300px;width:100%;"><div id="gmap_canvas" style="height:300px;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.trivoo.net" id="get-map-data">trivoo</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(36.1125468,-115.1767669),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(36.1125468, -115.1767669)});infowindow = new google.maps.InfoWindow({content:"<b>Bellagio Hotel and Casino</b><br/>Las Vegas, NV, <br/> United States" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
								</div>
	</div>
	<div class="row">
								<div class="col-md-6">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do tempor.</p>
									<div class="alert alert-success hidden" id="contactSuccess">
										<strong>Success!</strong> Your message has been sent to us.
									</div>
									<div class="alert alert-error hidden" id="contactError">
										<strong>Error!</strong> There was an error sending your message.
									</div>
									<div class="contact-form">
										<form id="contact-form" role="form" novalidate="novalidate">
											<div class="form-group has-feedback">
												<label for="name">Name*</label>
												<input type="text" class="form-control" id="name" name="name" placeholder="">
												<i class="fa fa-user form-control-feedback"></i>
											</div>
											<div class="form-group has-feedback">
												<label for="email">Email*</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="">
												<i class="fa fa-envelope form-control-feedback"></i>
											</div>
											<div class="form-group has-feedback">
												<label for="subject">Subject*</label>
												<input type="text" class="form-control" id="subject" name="subject" placeholder="">
												<i class="fa fa-navicon form-control-feedback"></i>
											</div>
											<div class="form-group has-feedback">
												<label for="message">Message*</label>
												<textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
												<i class="fa fa-pencil form-control-feedback"></i>
											</div>
											<input type="submit" value="Submit" class="btn btn-default">
										</form>
									</div>
								</div>
								<div class="col-md-6">  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus, vero mollitia velit ad consectetur. Alias, laborum excepturi nihil autem nemo numquam, ipsa architecto non, magni consequuntur quam.
								</p>
								<br/>
								<p><b>Consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus</b></p>
								<br/>
<p>Telephone:+1-888-987-6667 <br>
FAX: +1-888-987-6668 <br>
E-mail: <a href="bellagio@hotelinvegas.com">bellagio@hotelinvegas.com</a></p>
								</div>
							</div>
	</div>
 
	</section>
<?php include("resources/tamplates/front/footer.php") ?>
