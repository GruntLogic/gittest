<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Store Page</title>
</head>

<body>
	
<?php include("searchHeader.php")?>
<?php
	$config = parse_ini_file('../config.ini');
	$con = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
	## $con=mysqli_connect("localhost", "JonathanAdmin","0311*Dog", "data_from_the_base");
	$queryCar=mysqli_query($con, "SELECT * FROM carousel ORDER BY id ASC");
	$queryProd=mysqli_query($con, "SELECT * FROM product ORDER BY id ASC");
	$queryArr=mysqli_query($con, "SELECT * FROM arrivals ORDER BY id ASC");
?>
<div class="col-sm-3"></div>
<div class="col-sm-6">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  
  	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
  	</ol>
  	<div class="carousel-inner" rolse="listbox">
  		<?php
		$i=0;
		while($get_carousel=mysqli_fetch_assoc($queryCar))
		{
			if($i<3)
			{
				if($i == 0)
				{
					echo '<div class="item active">
						<img src="upload/'.$get_carousel['filename'].'" alt="'.$get_carousel['imageName'].'">
						<div class="carousel-caption">
							<h3>'.$get_carousel['imageName'].'</h3>
							<p>'.$get_carousel['description'].'</p>
						</div>
					</div>';
				}
				else
				{
					echo '<div class="item">
						<img src="upload/'.$get_carousel['filename'].'" alt="'.$get_carousel['imageName'].'">
						<div class="carousel-caption">
							<h3>'.$get_carousel['imageName'].'</h3>
							<p>'.$get_carousel['description'].'</p>
						</div>
					</div>';
				}
				$i++;
			}
		}
		?>
  	</div>
  	<!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
	<div class="panel-body"></br></br>
		<div class="row">
		
		<?php
			$x=0;
			while($get_product=mysqli_fetch_assoc($queryProd))
			{
				if($x<6)
				{
					echo '<div class="col-sm-4">
							<div class="container">
								<img src="upload/'.$get_product['fileName'].'" style="margin:auto;"/>
								<div class="centered"><p>'.$get_product['productName'].'
								</div>
							</div>
						</div>';
				if($x===2)
				{
					echo '</div><div class="row">';
				}
				}
				$x++;
			}
			echo'</div>
				</div>
			
			
				<div class="container-fluid"></br></br>
					<div class="row">';
			
			$y=0;
			while($get_arrivals=mysqli_fetch_assoc($queryArr))
			{
				if($y<8)
				{
					echo '<div class="col-sm-3">
						<img src="upload/'.$get_arrivals['fileName'].'"/>
						</div>';
					if($y === 3)
					{
						echo '</div><div class="row">';
					}
				}
				$y++;
			}
				echo '</div>
					</div>';
			
			mysqli_close($con);
			?>
			<footer>
					<div>
						<center>
							<a href="index.php"><img src="" style="height: 50px;"></a><p>Copyright 1999-2018</p>
						</center>
					</div>
			</footer>
			
	</div>
	<div class="col-sm-3"></div>
	</div>
</body>
</html>