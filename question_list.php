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
<center>
	<h1> Question List </h1>
	<hr/>
	<table border='1'>
	<tr><th>Subject</th><th>Question Paper Name</th><th>Test Time</th></tr>	
		<?php

			$sql = "SELECT * FROM `mcq_paper`";
			$result = mysql_query($sql);
			if ($result) {
				while($row = mysql_fetch_assoc($result)) {
					echo "<tr> <td>". $row["subject"]."</td> <td>" . $row["paper_name"]. "</td> <td>" . $row["paper_time"]."</td> </tr>";
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
