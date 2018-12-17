<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>form_upload</title>
</head>

<body>
<div class="well">
	<div class="content">
		<form action="form_upload.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<table width="350" border="0" align="center">
					<legend> Data Entry
					
					<tr><td><label>Image Name <span class="required">*</span></label></td>
						<td align="center"><input type="text" name="iname" placeholder="Image Name"></br>
						</td>
					</tr>
					
					<tr><td><label for="file">Upload Picture: </label></td>
						<td align="right"><input type="file" name="file" id="file"></br>
						</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					
					<tr><td><label for="table">Choose Table: </label></td>
						<td align="right">
						<input type="radio" name="table" value="carousel" id="table" checked>Carousel</br>
						<input type="radio" name="table" value="product" id="table">Products</br> 
						<input type="radio" name="table" value="arrivals" id="table">New Arrivals <br/>
						</td>
					</tr>
					<tr><td colspan="2" align="center"><button type="submit" name="submit">Submit</button></br></br><a href="adminhome.php?">View Data</a></td></tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr><td colspan="2" align="center">
				<?php
				if(isset($_REQUEST['submit']) && ($_POST['table'] == 'carousel'))
				{
					$config = parse_ini_file('../config.ini');
					$con = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
					##$con=mysqli_connect("localhost", "JonathanAdmin","0311*Dog", "data_from_the_base");
					if(mysqli_connect_errno())
					{
						echo "Failed to connect to MySql: " . mysqli_error();
					}
					
					$iname=$_POST['iname'];
					$file=$_FILES["file"]["name"];
					$size=$_FILES["file"]["size"];
					
					if( empty($iname) || empty($file))
					{
						echo "<label class='err'>All fields required</label>";
					}
					
					//chech file size
					elseif($size > 500000)
					{
						echo "<label class='err'> Image size max is 500kb </label>";
					}
					/* -- Few preparations for Checking the File Type (extension) -- */
					$allowedExts = array("gif", "jpeg", "jpg", "png");
					//Store the allowed extensions in an array

					/* using explode() function, seperate the 'File Name'
					and its 'Extension' into individual elements of an array: $temp */
					$temp = explode(".", $_FILES["file"]["name"]);
					/* The end() function returns the last element of an array.
					As per array $temp, First element: File Name
										Last element: Extension */
					$extension = end($temp);
					/* -- Checking the File Type (extension) -- */
					if ((($_FILES["file"]["type"] == "image/gif")
						|| ($_FILES["file"]["type"] == "image/jpeg")
						|| ($_FILES["file"]["type"] == "image/jpg")
						|| ($_FILES["file"]["type"] == "image/pjpeg")
						|| ($_FILES["file"]["type"] == "image/x-png")
						|| ($_FILES["file"]["type"] == "image/txt")
						|| ($_FILES["file"]["type"] == "image/png"))
						&& ($_FILES["file"]["size"] <= 5000000)
						&& in_array($extension, $allowedExts))
					{
						if ($_FILES["file"]["error"] > 0)
						{
							echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
						}
						//Checks if the specific file already exists in the directory.
						elseif (file_exists("upload/" . $_FILES["file"]["name"]))
						{
							echo $_FILES["file"]["name"] . "Image upload already exists. ";
						}
						
						else
						{
							/* The move_uploaded_file() function moves an
							uploaded file to a new location. */
							move_uploaded_file ( $_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"] );

							//Insert the 'Image name' and 'File Name' to the database
							mysqli_query($con,"INSERT INTO carousel (imageName, filename)
															VALUES ('$iname', '$file')");
							echo "Data Entered Successfully Saved!";
						}
					}
					mysqli_close($con); //Close the Database Connection
					}
						
					elseif(isset($_REQUEST['submit']) && ($_POST['table'] == 'product'))
					{
					$config = parse_ini_file('../config.ini');
					$con = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
					##$con=mysqli_connect("localhost", "JonathanAdmin", "0311*Dog", "data_from_the_base");
					if(mysqli_connect_errno())
					{
						echo "Failed to connect to MySql: " . mysqli_error();
					}

					$iname=$_POST['iname'];
					$file=$_FILES["file"]["name"];
					$size=$_FILES["file"]["size"];

					if( empty($iname) || empty($file))
					{
						echo "<label class='err'>All fields required</label>";
					}

					//chech file size
					elseif($size > 500000)
					{
						echo "<label class='err'> Image size max is 500kb </label>";
					}
					/* -- Few preparations for Checking the File Type (extension) -- */
					$allowedExts = array("gif", "jpeg", "jpg", "png");
					//Store the allowed extensions in an array

					/* using explode() function, seperate the 'File Name'
					and its 'Extension' into individual elements of an array: $temp */
					$temp = explode(".", $_FILES["file"]["name"]);
					/* The end() function returns the last element of an array.
					As per array $temp, First element: File Name
										Last element: Extension */
					$extension = end($temp);
					/* -- Checking the File Type (extension) -- */
					if ((($_FILES["file"]["type"] == "image/gif")
						|| ($_FILES["file"]["type"] == "image/jpeg")
						|| ($_FILES["file"]["type"] == "image/jpg")
						|| ($_FILES["file"]["type"] == "image/pjpeg")
						|| ($_FILES["file"]["type"] == "image/x-png")
						|| ($_FILES["file"]["type"] == "image/txt")
						|| ($_FILES["file"]["type"] == "image/png"))
						&& ($_FILES["file"]["size"] <= 5000000)
						&& in_array($extension, $allowedExts))
					{
						if ($_FILES["file"]["error"] > 0)
						{
							echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
						}
						//Checks if the specific file already exists in the directory.
						elseif (file_exists("upload/" . $_FILES["file"]["name"]))
						{
							echo $_FILES["file"]["name"] . "Image upload already exists. ";
						}

						else
						{
							/* The move_uploaded_file() function moves an
							uploaded file to a new location. */
							move_uploaded_file ( $_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"] );

							//Insert the 'Image name' and 'File Name' to the database
							mysqli_query($con,"INSERT INTO product (productName, fileName)
															VALUES ('$iname', '$file')");
							echo "Data Entered Successfully Saved!";
						}
					}
					mysqli_close($con); //Close the Database Connection
					}
						
						
						elseif(isset($_REQUEST['submit']) && ($_POST['table'] == 'arrivals'))
						{	
						$config = parse_ini_file('../config.ini');
						$con = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
						##$con=mysqli_connect("localhost", "JonathanAdmin", "0311*Dog", "data_from_the_base");
						if(mysqli_connect_errno())
						{
							echo "Failed to connect to MySql: " . mysqli_error();
						}

						$iname=$_POST['iname'];
						$file=$_FILES["file"]["name"];
						$size=$_FILES["file"]["size"];

						if( empty($iname) || empty($file))
						{
							echo "<label class='err'>All fields required</label>";
						}

						//chech file size
						elseif($size > 500000)
						{
							echo "<label class='err'> Image size max is 500kb </label>";
						}
						/* -- Few preparations for Checking the File Type (extension) -- */
						$allowedExts = array("gif", "jpeg", "jpg", "png");
						//Store the allowed extensions in an array

						/* using explode() function, seperate the 'File Name'
						and its 'Extension' into individual elements of an array: $temp */
						$temp = explode(".", $_FILES["file"]["name"]);
						/* The end() function returns the last element of an array.
						As per array $temp, First element: File Name
											Last element: Extension */
						$extension = end($temp);
						/* -- Checking the File Type (extension) -- */
						if ((($_FILES["file"]["type"] == "image/gif")
							|| ($_FILES["file"]["type"] == "image/jpeg")
							|| ($_FILES["file"]["type"] == "image/jpg")
							|| ($_FILES["file"]["type"] == "image/pjpeg")
							|| ($_FILES["file"]["type"] == "image/x-png")
							|| ($_FILES["file"]["type"] == "image/txt")
							|| ($_FILES["file"]["type"] == "image/png"))
							&& ($_FILES["file"]["size"] <= 5000000)
							&& in_array($extension, $allowedExts))
						{
							if ($_FILES["file"]["error"] > 0)
							{
								echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
							}
							//Checks if the specific file already exists in the directory.
							elseif (file_exists("upload/" . $_FILES["file"]["name"]))
							{
								echo $_FILES["file"]["name"] . "Image upload already exists. ";
							}

							else
							{
								/* The move_uploaded_file() function moves an
								uploaded file to a new location. */
								move_uploaded_file ( $_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"] );

								//Insert the 'Image name' and 'File Name' to the database
								mysqli_query($con,"INSERT INTO arrivals (description, fileName)
																VALUES ('$iname', '$file')");
								echo "Data Entered Successfully Saved!";
							}
						}
						mysqli_close($con); //Close the Database Connection
						}
						?>
					</td></tr>
					</legend>
				</table>
			</fieldset>
		</form>
	</div>
</div>
</body>
</html>