<?php
require 'database-config.php'; //Database Connection
session_start();

if(isset($_POST['username']))
{
	$username = $_POST['username'];
}

if(isset($_POST['password']))
{
	$password = $_POST['password'];
}

//check whether the entered username/password pair exist in the database
$q = 'SELECT * FROM  users WHERE username=:username AND password=:password';
$query = $dbh->prepare($q);
$query->execute(array(':username' => $username, ':password' => $password));

if($query->rowCount() == 0)
{ 
	header('Location: login.php?err=1'); 
}

else
{
	//fetch the result as associative array
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	//Store the fetched details into $_SESSION
	$_SESSION['sess_user_id'] = $row['id'];
	$_SESSION['sess_username'] = $row['username'];
	$_SESSION['sess_userrole'] = $row['role'];
	
	if( $_SESSION['sess_userrole'] == "admin")
	{
		header('Location: adminhome.php');
	}
	else
	{
		header('Location: index.php');
	}
}?>