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
	<div class="container">
		<div class="info">
			<h3 class="bg-primary">Role based Login System in PHP</h3>
			<div class="col-md-6 col-md-offset-3">
				<h4><span class="glyphicon glyphicon-user">Log-in with your credentials</span></h4><br/>
				<div class="block-margin-top">
					<?php
					//Associate array to display 2 types of error message.
					$errors = array( 1=>"Invalid user name or password, Please try again.",
								   	 2=>"Please log-in to access this area.");
					//Get the error_id from URL
					$error_id="0";
					if(isset($_GET['err']))
					{
						$error_id = $_GET['err'];
					}
					if ($error_id ==1)
					{
						echo '<p class="text-danger">'.$errors[$error_id].'</p>';
					}
					elseif ($error_id == 2)
					{
						echo '<p class="text-danger">'.$errors[$error_id].'</p>';
					}?>
					
					
					<form action="authenticate.php" method="POST"
					class="from-signin col-md-8 col-med-offset-2" role="form">
						<input type="text" name="username" class="form-control"
								placeholder="Username" required autofocus><br/>
						<input type="password" name="password" class="form-control"
								placeholder="Password" required><br/>
						<button class="btn btn-lg btn-primary btn-block"
									type="submit">Sign in</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- jQuery (necessary for Bootstrap's Javascript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>