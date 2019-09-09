<?php include("server.php") ?>
<!DOCTYPE html>
<html>
<head>

<title>User Registration</title>
<link rel='stylesheet' type='text/css' href='style.css'>

</head>

<body>
<div class="container">
	<div class="header">

		<h1>Login</h1>
	</div>
	
	<form method="post" action="login.php">
		<div>
			Username  : <input type="text" name="Name" required>
		</div>
		
		<div>
			Password  : <input type="password" name="Password1" required>
		</div>
		
		<input type="submit" name="login_btn">
		
	</form>


<p>Not a user? <a href="registration.php"><b> Register Here</b></a></p>

</div>


</body>

</html>