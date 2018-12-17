<?php
$con=mysqli_connect("localhost", "JonathanAdmin","0311*Dog", "data_from_the_base");

$id=$_GET['id'];

$query=mysqli_query($con,"SELECT * FROM product WHERE id='$id'");
$fileName=mysqli_fetch_assoc($query);

//delete from dir
unlink("upload/".$fileName['fileName']);

//delete from database
mysqli_query($con,"DELETE FROM product WHERE id='$id'");
mysqli_close($con);

header("location: adminhome.php");
?>