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
	<h1> Question Remove </h1>
	<hr/>
	<table border='1'>
	<tr><th>Subject</th><th>Question Paper Name</th><th>Test Time</th><th>Action</th></tr>	
		
		<?php

			$sql = "SELECT * FROM `mcq_paper`";
			$result = mysql_query($sql);
			if ($result) {
				while($row = mysql_fetch_assoc($result)) {
					$uid=$row["id"];
					echo "<tr> <td>". $row["subject"]."</td> <td>" . $row["paper_name"]. "</td> <td>" . $row["paper_time"]."</td>".
						"<td><a href='question_remove.php?user_id_de=".$uid."'>Remove</a></td>".
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
	if(isset($_GET["user_id_de"]))
	{
		$uid = $_GET["user_id_de"];
		$sql5= "select * from `mcq_question` where `paper_id`= '$uid'";
		$reaut = mysql_query($sql5);
		
		while($row = mysql_fetch_array($reaut)){
			$qes = $row['qus_id'];
			$sql2 = "select * from `mcq_option` where `qus_id`= '$qes'";
			$reaut1 = mysql_query($sql2);
			while($row1 = mysql_fetch_array($reaut1)){
				$opte = $row1['opt_id'];
				$sql3 = "DELETE FROM `mcq_option` WHERE opt_id=$opte";
				mysql_query($sql3);
			}
			$sql1 = "DELETE FROM `mcq_question` WHERE qus_id=$qes";
			mysql_query($sql1);
		}
		$sql4 = "DELETE FROM `mcq_paper` WHERE id=$uid";
		if(!mysql_query($sql4))
		{
			echo "Error in user_info: " . $sql . "<br>" . mysql_error($conn);
		}

		else
			echo $msg= 'Declined';

		
		header("Location: question_remove.php");
	}
	
	?>