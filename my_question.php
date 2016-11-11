<?php

	include "mysql_conn.php";
	session_start();
	$userid = $_SESSION["teacher"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Question</title>
	<style>
		table {
		    border-collapse: collapse;
		    border: 1px solid #000;
		    text-align: left;
		}
		th, td {
		    padding: 10px;
		}
	</style>
</head>
<body>
<h3><b>User Name: </b><i><?php echo $userid; ?></i></h3>
<center>
	<h1> My Question Papers </h1>
	<hr/>
	<table border='1'>
		<tr>
			<td>Subject</td>
			<td>Paper Name</td>
			<td>Paper Time</td>
		</tr>
		<?php

			$sql = "SELECT * FROM `mcq_paper` WHERE `user_id`='$userid'";
			$result = mysql_query($sql);
			if ($result) {
				while($row = mysql_fetch_assoc($result)) {
					echo "<tr> <td>". $row["subject"]."</td> <td>" . $row["paper_name"]. "</td> <td>" . $row["paper_time"]."</td> </tr>";
				}
			}else {
				echo "No paper was created..!!";
			}
		?>
	</table>
</center>
<hr/><br>
<a href="t_dashboard.php">Go To Your Dashboard</a>
<br>
<a href="logout.php">Logout</a>
</body>
</html>