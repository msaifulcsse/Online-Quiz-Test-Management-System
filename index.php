<?php
session_start();
	
require_once('mysql_conn.php');
$err = "";
	if($_SERVER["REQUEST_METHOD"] == "POST")
		{
	 $username = $_POST['uid'];
	 $password = $_POST['pass'];

	$sql = "SELECT * FROM users";
	$result = mysql_query($sql);
		 
		while($row = mysql_fetch_array($result))
		{
		   $un= $row['user_id'];
		   $up= $row['pass'];
		   $acctype = $row['role'];
		   
		   
		   if($un == $username && $up == $password && $acctype=="Admin")
			{
				//echo 'success in admin';
				$_SESSION["admin"] = $username;
				header('Location: admin.php');
				exit;
			}
			else if($un == $username && $up == $password && $acctype=="Teacher")
			{
				$_SESSION["teacher"] = $username;
					header('Location: t_dashboard.php');
					exit;
				/*$sql1 = "SELECT * FROM `user_info`";
				$result1 = mysql_query($sql1);
				$row1 = mysql_fetch_array($result1);
				$active = $row1['active'];
				if ($active ==1) {
					
				}*/
			}
			else if($un == $username && $up == $password && $acctype=="Student")
			{
				$_SESSION["student"] = $username;
				header('Location: s_dashboard.php');
				exit;
				
			}
		   else
			{
				$err = 'Invalid ID or Pass';
			}
		}
	}
?>


<html>
<head><title>Home Page || Online Quiz Test</title></head>
<center>
<h1>Login Page</h1>
<hr>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<table>
<tr>
<th>User ID: </th> 
<td><input type="text" id="uid" name="uid"></td>
</tr>
<tr>
<th>Password: </th>
<td><input type="password" id="pass" name="pass"></td>
</tr>
<tr>
<th> </th>
<td>		<p style="color:red"><?php echo $err; ?></p>
			<input type="submit" name="submit" value="Login">
</td>
</table
</form>
Are you want to be a Teacher or Student?<br>
<a href="signup.php">Sign Up Here</a>
</center>

</html>