<?php 
session_start();
$role = $_SESSION['sess_userrole'];

if(!isset($_SESSION['sess_username']) && $role!="admin")
{
	header('Location: login.php?err=2');
}
include('searchHeader.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Page</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

</head>


<body>
	<div id="container">
		<div class="con2">
			<?php
				$config = parse_ini_file('../config.ini');
				$con = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
				##$con=mysqli_connect("localhost", "JonathanAdmin","0311*Dog", "data_from_the_base");		
			
				$queryCar=mysqli_query($con, "SELECT * FROM carousel ORDER BY id ASC");
				$queryProd=mysqli_query($con, "SELECT * FROM product ORDER BY id ASC");
				$queryArr=mysqli_query($con, "SELECT * FROM arrivals ORDER BY id ASC");
			
				$get_carousel=mysqli_fetch_assoc($queryCar);
				$get_product=mysqli_fetch_assoc($queryProd);
				$get_arrivals=mysqli_fetch_assoc($queryArr);
			?>
			
			<table align="center" cellspacing="0" width="300" border="0">
				<center>
					<h2><a href="form_upload.php">Data Entry</a></h2>
				</center>
				<center><h1><strong><u>Carousel</u></strong></h1></center>
				<?php do {?>
				<tr bordercolor="#FFFFFF">
					<td colspan="2" align="center">
						<?php echo '<img src="upload/'.$get_carousel['filename'].'" width="200" height="175">'; ?>
					</td>
					<td><a href="edit_carousel.php?id=<?php echo $get_carousel['id']; ?>" style="text-decoration: none"> Edit </a></br></br><a href="delete_carousel.php?id=<?php echo $get_carousel['id']; ?>" style="text-decoration: none"> Delete </a></td>
				</tr>
				<tr><td colspan="2" align="center"><h2><font face="Jokerman"><?php echo strtoupper($get_carousel['imageName']); ?> </font></h2></td>
				</tr>
				<?php } while ($get_carousel=mysqli_fetch_assoc($queryCar));
				
				?>
			</table>
			
			<table align="center" cellspacing="0" width="300" border="0">
				<center><h1><strong><u>Product</u></strong></h1></center>
				<?php do {?>
				<tr bordercolor="#FFFFFF">
					<td colspan="2" align="center">
						<?php echo '<img src="upload/'.$get_product['fileName'].'" width="200" height="175">'; ?>
					</td>
					<td><a href="edit_product.php?id=<?php echo $get_product['id']; ?>" style="text-decoration: none"> Edit </a></br></br><a href="delete_product.php?id=<?php echo $get_product['id']; ?>" style="text-decoration: none"> Delete </a></td>
				</tr>
				<tr><td colspan="2" align="center"><h2><font face="Jokerman"><?php echo strtoupper($get_product['productName']); ?> </font></h2></td>
				</tr>
				<?php } while ($get_product=mysqli_fetch_assoc($queryProd));
				
				?>
			</table>
			
			<table align="center" cellspacing="0" width="300" border="0">
				<center><h1><strong><u>New Arrivals</u></strong></h1></center>
				<?php do {?>
				<tr bordercolor="#FFFFFF">
					<td colspan="2" align="center">
						<?php echo '<img src="upload/'.$get_arrivals['fileName'].'" width="200" height="175">'; ?>
					</td>
					<td><a href="edit_arrivals.php?id=<?php echo $get_arrivals['id']; ?>" style="text-decoration: none"> Edit </a></br></br><a href="delete_arrivals.php?id=<?php echo $get_arrivals['id']; ?>" style="text-decoration: none"> Delete </a></td>
				</tr>
				<tr><td colspan="2" align="center"><h2><font face="Jokerman"><?php echo strtoupper($get_arrivals['description']); ?> </font></h2></td>
				</tr>
				<?php } while ($get_arrivals=mysqli_fetch_assoc($queryArr));
				mysqli_close($con);
				?>
			</table>
			
			
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's Javascript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	
	
</body>
</html>