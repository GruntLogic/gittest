<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search Header</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style> .dropdown:hover .dropdown-menu 
		{
			display: block;
		}
	</style>
</head>

<body>
<?php
	$con=mysqli_connect("localhost", "JonathanAdmin","0311*Dog", "data_from_the_base");
	$queryProd=mysqli_query($con, "SELECT * FROM product ORDER BY id ASC");
	$get_product=mysqli_fetch_assoc($queryProd);
?>
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="panel panel-default">
					
					<div class="panel-body"><a class="navbar-brand" href="index.php"><img src="controller.png" height="50 em"></a>
					<form class="navbar-form navbar-left" style="margin-left: 10em;" action="/action_page.php">
						<div class="form-group" >
						<input type="text" class="form-control" placeholder="Search">
						
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
						</form></div>
				</div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<!--  <li><a href="">About</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php do{
										echo '<li ><a href="">'.$get_product['productName'].'</a></li> ';
									}
							while($get_product=mysqli_fetch_assoc($queryProd));
							mysqli_close($con);
							?>
						</ul>
						</li>
						<li><a href="">Selection Guide</a></li>-->
						 <li><a href="login.php">Admin</a></li>
					</ul>
					
				</div>
			</div>
		</nav>
		
	</div>
	<div class="col-sm-3"></div>
</div>
</body>
</html>