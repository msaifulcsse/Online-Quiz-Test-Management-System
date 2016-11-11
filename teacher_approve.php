<?php
session_start();
	if (!isset($_SESSION["admin"])) {
		header('Location: index.php');
		exit;
		}
	include "mysql_conn.php";
	

?>

<html>
<head>
	<title>Admin Panel || Online Quiz Test</title>
</head>
<body>
<center>
	<h1> Teacher Approve </h1>
	<hr/>
	<table border='1'>
		
		<?php

			$sql = "SELECT t2.* FROM `users` as t1 INNER JOIN `user_info` as t2 on t1.user_id = t2.user_id WHERE `role`= 'Teacher' and `active`=0";
			$result = mysql_query($sql);
			if ($result) {
				while($row = mysql_fetch_assoc($result)) {
					$uid=$row["user_id"];
					echo "<tr> <td>". $row["full_name"]."</td> <td>" . $row["edu"]. "</td> <td>". $row["email"]. "</td> <td>" . $row["phone"]."</td> <td>" . $row["address"]."</td> <td>" . $uid."</td> <td>".
						"<a href='teacher_approve.php?user_id_ap=".$uid."'>Approve</a>".
						"</td><td><a href='teacher_approve.php?user_id_de=".$uid."'>Declined</a></td>".
						"</tr><br>";
				}
			}else {
				echo "Theacher not found..!!";
			}
		?>
	</table>
</center>
<hr/><br>
<a href="admin.php">Go To Your Dashboard</a>
<br>
<a href="logout.php">Logout</a>
</body>
</html>

<?php
	if(isset($_GET["user_id_ap"]))
	{		
			$uid = $_GET["user_id_ap"];
			$sql1 = "UPDATE `user_info` SET `active`=1 WHERE user_id='$uid'";
			if(!mysql_query($sql1))
			{
				echo "Error in user_info: " . $sql . "<br>" . mysql_error($conn);
			}
			else
				echo $msg= 'Approved';

			header("Location: teacher_approve.php");
	}
	else if(isset($_GET["user_id_de"]))
	{
		$uid = $_GET["user_id_de"];
		$sql2 = "DELETE FROM `user_info` WHERE user_id='$uid'";
		if(!mysql_query($sql2))
		{
			echo "Error in user_info: " . $sql . "<br>" . mysql_error($conn);
		}
		$sql3 = "DELETE FROM `users` WHERE user_id='$uid'";
		if(!mysql_query($sql3))
		{
			echo "Error in user_info: " . $sql . "<br>" . mysql_error($conn);
		}

		else
			echo $msg= 'Declined';
		
		header("Location: teacher_approve.php");
	}
	
	?>