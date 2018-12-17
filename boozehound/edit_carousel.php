<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Carousel</title>
</head>

<body>
<?php
	$config = parse_ini_file('../config.ini');
	$con = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
	##$con=mysqli_connect("localhost", "JonathanAdmin","0311*Dog", "data_from_the_base");
	
	$id=$_GET['id'];
	
	$query=mysqli_query($con,"SELECT * FROM carousel WHERE id= '$id'");
	
	for($i=0; $get_data=mysqli_fetch_assoc($query); $i++)
	{ ?>
	<div id="container"><div class="content">
		<form action="update_carousel_submit.php?id=<?php echo $get_data['id']; ?>" method="post" enctype="multipart/form-data">	
			<fieldset>
				<table width="420" border="0" align="center">
					<legend>UPDATE DATA
					<tr><td>Current Image Name</td>
					<td width="229"><input type="text" name="imageName" value="<?php echo $get_data['imageName']; ?>"/></br></td></tr>
				
				<tr><td colspan="2"></br></br>Current Image </td></tr>
			<tr><td colspan="2" align="center"><img src="upload/<?php echo $get_data['filename']; ?>" width="150" height="150"></td></tr>
		<tr><td></br>Replace with New Image: </td>
	<td align="right"></br><input type="file" name="file" id="file"></br></td></tr><tr><td>&nbsp;</td></tr>
				<tr><td colspan="2" align="center"><button name="submit">Submit</button>
				<?php } mysqli_close($con);?>
</br></br><a href="adminhome.php?">View Data</a></br>
				<a href="form_upload.php">Add new data</a></td></tr>
					
				</form></fieldset></table></legend>
	</div></div>

</body>
</html>