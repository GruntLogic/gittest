<?php
if(isset($_REQUEST['submit']))
{
	$config = parse_ini_file('../config.ini');
	$con = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
	##$con=mysqli_connect("localhost", "JonathanAdmin","0311*Dog", "data_from_the_base");
	
	$id=$_GET['id'];
	
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
	
	if( empty($_REQUEST['productName']))
	{
		echo "Image name required";
	}
	
	else
	{
		$iname = $_REQUEST['productName'];
		mysqli_query($con, "UPDATE product SET productName='$iname' WHERE id='$id'");
		header("Location:adminhome.php");
	}
	//updating new image file is not required. however, if upload a new image, validate it
	if ($_FILES)
	{
		$file=$_FILES['file']['name'];
		$size= $_FILES['file']['size'];
		
		if($size >5000000)
		{ echo "Image size must not be greater than 500kb";}
		
		//store allowed filetype
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		
		//explode 'file name' and 'extension'
		$temp = explode(".", $_FILES["file"]["name"]);
		
		$extension = end($temp);
		// checking the file types
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
				// on passing all validations: (1) delete the old img file (2) Move new file from temp loc to the directory (3) update the db
				
				$query = mysqli_query($con,"SELECT fileName FROM product WHERE id='id'");
				
				$imageFile = mysqli_fetch_assoc($query);
				
				//unlink() deletes file
				unlink("upload/".$imageFile['fileName']);
				
				move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
				
				mysqli_query($con,"UPDATE product set fileName = '$file' WHERE id='$id'");
				header("Location:adminhome.php");
	}
}
	}
	msqli_close($con);
}?>