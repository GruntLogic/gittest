<?php
//define db related vars
	$config = parse_ini_file('../config.ini');
	$con = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
	$host = 'localhost';
	$user = $config['username'];
	$pass = $config['password'];
	$database = $config['dbname'];

//try to connect to db
$dbh = new PDO('mysql:host=' .$host.';
						dbname=' .$database, $user, $pass);

if(!$dbh)
{
	echo "unable to connect to database";
}
/* end of config */
?>