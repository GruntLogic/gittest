<?php
//define db related vars
	$host = 'localhost';
	$user = 'JonathanAdmin';
	$pass = '0311*Dog';
	$database = 'data_from_the_base';

//try to connect to db
$dbh = new PDO('mysql:host=' .$host.';
						dbname=' .$database, $user, $pass);

if(!$dbh)
{
	echo "unable to connect to database";
}
/* end of config */
?>