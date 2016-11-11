<?php
/*session_start();
if (!isset($_SESSION["admin"])) {
	header('Location: index.php');
	exit;
}*/
	require_once('mysql_conn.php');
	$fname = $_REQUEST['fname'];
	$uid = $_REQUEST['uid'];
	$email = $_REQUEST['email'];
	$dob = $_REQUEST['dob'];
	$gender = $_REQUEST['gender'];
    $role = $_REQUEST['role'];
    $edu = $_REQUEST['edu'];
	$phone = $_REQUEST['phone'];
	$address = $_REQUEST['address'];
	$password = $_REQUEST['pass'];
	$msg="";
	
	$sql1 ="INSERT INTO `users` (user_id, pass, role) 
	VALUES ('$uid', '$password', '$role')";
	if(!mysql_query($sql1))
		{
			echo "Error in users: " . $sql1. "<br>" . mysql_error($conn);
		}

	$sql = "INSERT INTO `user_info`(`user_id`, `full_name`, `email`, `edu`, `dob`, `gender`, `phone`, `address`,`active`) VALUES ('$uid','$fname','$email','$edu','$dob','$gender','$phone','$address',0)";
	if(!mysql_query($sql))
		{
			echo "Error in user_info: " . $sql . "<br>" . mysql_error($conn);
		}

	else
		$msg= 'User Successfully Inserted';

?>
<html>
<head><title>User Confirmation || Online Quiz Test</title></head>
<center>
<h1>User Confirmation || Online Quiz Test</h1>
<hr>
<p style="color:green"><?php echo $msg; ?></p>
<a href="index.php">Go To Home Page</a>
</center>
</html>