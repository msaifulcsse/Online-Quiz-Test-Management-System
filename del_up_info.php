<?php
	session_start();
	if (!isset($_SESSION["admin"])) {
		header('Location: index.php');
		exit;
	}
?>


<html>
<head>
<title>Admin Panel || Online Quiz Test</title>
</head>
<body>
<center>
<h1>Admin Panel</h1>
<hr>
<table>
	<tr>
		<th>Type of Question:</th>
		<td>
			<select>
				<option></option>
			</select>
		</td>
		<td><a href="deleteinfo.php">Delete</a></td>
		<td><input type="text"></input></td>
		<td><a href="updateinfo.php">Update</a></td>
	</tr>
	<tr>
		<th>Topic of Question:</th>
		<td>
			<select>
				<option></option>
			</select>
		</td>
		<td><a href="deleteinfo.php">Delete</a></td>
		<td><input type="text"></input></td>
		<td><a href="updateinfo.php">Update</a></td>
	</tr>
	<tr>
		<th>Question Category:</th>
		<td>
			<select>
				<option></option>
			</select>
		</td>
		<td><a href="deleteinfo.php">Delete</a></td>
		<td><input type="text"></input></td>
		<td><a href="updateinfo.php">Update</a></td>
	</tr>
	<tr>
		<th>Question Sub-Category:</th>
		<td>
			<select>
				<option></option>
			</select>
		</td>
		<td><a href="deleteinfo.php">Delete</a></td>
		<td><input type="text"></input></td>
		<td><a href="updateinfo.php">Update</a></td>
	</tr>
</table>
<br>
<a href="admin.php">Go To Admin(Main) Page</a>
<br>
<a href="logout.php">Logout</a>
</center>
</body>
</html>
