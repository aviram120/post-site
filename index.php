<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>Post</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet"  type="text/css" href="style/style.css">
</head>
<body >

<?php include("resources/functions.php") ?>

<br>
<div class="header-content" >
   <div class="panel panel-default">
        <div class="panel-heading">
            Post Manger
        </div>
        <div class="panel-body">
			<?php getAllPost(); ?>
			<br><br>
			<button onclick="location.href='newpost.php';">Add Post </button>
        </div>
    </div>
</div>

</body>
</html>

