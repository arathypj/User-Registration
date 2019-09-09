<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>

<title>User Registration</title>
<link rel='stylesheet' type='text/css' href='style.css'>

</head>

<body>

<div class="container">
	<div class="header">

		<h1>Register</h1>
	</div>
	
	<form method="post" action="registration.php">
		
		<div>
			Username  : <input type="text" name="Name" required>
		</div>
		<div>
			Email  : <input type="text" name="Email" required>
		</div>
		<div>
			Password  : <input type="password" name="Password1" required>
		</div>
		<div>
			Re-enter password  : <input type="password" name="Password2"required><br><br>
		</div>	
		<?php include('errors.php')  ?>
		<input type="submit" name="reg_btn">
		
	</form>

	<p>Already a user? <a href="login.php"><b> Log In</b></a></p>

</div>


</body>

</html>