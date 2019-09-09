<?php
session_start();


$username="";
$email="";

$errors=array();

$db =new mysqli('localhost','root','','student');
if ($db->connect_error)
{
    die("Connection failed: " . $db->connect_error);
} 


if(isset($_POST['reg_btn']))
{
	
$username=$db->real_escape_string($_POST['Name']);
$email=$db->real_escape_string($_POST['Email']);
$password1=$db->real_escape_string($_POST['Password1']);
$password2=$db->real_escape_string($_POST['Password2']);

    
if(empty($username))
{array_push($errors, "Username is required");}
if(empty($email))
{array_push($errors, "Email is required");}
if(empty($password1))
{array_push($errors, "Password1 is required");}

If($password1!=$password2)
{array_push($errors, "Password do not match");}


$user_check_query="SELECT * FROM user WHERE Name='$username' or Email='$email' LIMIT 1";
$results=$db->query($user_check_query);
$user=$results->fetch_assoc();

if($user)
{
	if($user['Name']===$username)
	{
		array_push($errors,"useername already exists");
	}
	if($user['Email']===$email)
	{
		array_push($errors,"email already registered");
	}
}

if(count($errors)==0)
{
	$password=md5($password1);
	$query= "INSERT INTO user(Name, Email, Password) VALUES('$username','$email','$password')";

	if ($db->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}


$_SESSION['username']=$username;
$_SESSION['success']="you are now logged in";
header("location:index.php");
}
}
//login user

if(isset($_POST['login_btn']))
{
	
	$username= $db->real_escape_string($_POST['Name']);
	$password= $db->real_escape_string($_POST['Password1']);
	if(empty($username)){
		array_push($errors,"Username is required");
	}
	if(empty($password)){
		array_push($errors,"Password is required");
	}
	if(count($errors)==0)
	{
		$password=md5($password);
		$query="SELECT * FROM user WHERE Name='$username' AND Password='$password'";
		$results=$db->query($query);
		if($results->num_rows){
			$_SESSION['username']=$username;
			$_SESSION['success']="logged in successfully";
			echo $_SESSION['success'];
			header("location:index.php");
		}else{
			array_push($errors, "Username and Password do not match");
		}
	}

}



?>