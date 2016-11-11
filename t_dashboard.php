<?php
session_start();
	if (!isset($_SESSION["teacher"])) {
		header('Location: index.php');
		exit;
	}

	require_once('mysql_conn.php');

	$sql1 = "SELECT * FROM user_info";
	$result1 = mysql_query($sql1);
	while($row = mysql_fetch_array($result1))
	{
		$user_id= $row['user_id'];
		if($_SESSION["teacher"] == $user_id)
		{
			$getUid = $row['user_id'];
			$getName = $row['full_name'];
			$getEmail = $row['email'];
			$getEdu = $row['edu'];
			$getDOB = $row['dob'];
			$getGen = $row['gender'];
			$getPhn = $row['phone'];
			$getAdrs = $row['address'];
		}
		
	}
?>

<html>
<head>
<title>Teacher Dashboard || Online Quiz Test</title>
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
<h1>Teacher Dashboard</h1>
<hr>
<a href="update_tinfo.php">Edit Profile</a> &nbsp
<a href="my_question.php">My Questions</a> &nbsp
<a href="paper_name.php">Submit New Q&A</a> &nbsp
<a href="logout.php">Logout</a>
<hr>
<table border="1">
   <tr>
      <th>Your ID: </th>
	  <td>
	     <?php
		   echo $getUid;
		 ?>
	  </td>
   </tr>
   <tr>
      <th>Your Name: </th>
	  <td>
	     <?php
		   echo $getName;
		 ?>
	  </td>
   </tr>
   <tr>
      <th>Email: </th>
	  <td>
	     <?php
		   echo $getEmail;
		 ?>
	  </td>
   </tr>
    <tr>
      <th>Education(Level): </th>
	  <td>
	     <?php
		   echo $getEdu;
		 ?>
	  </td>
   </tr>
    <tr>
      <th>Date-Of-Birth: </th>
	  <td>
	     <?php
		   echo $getDOB;
		 ?>
	  </td>
   </tr>
   <tr>
      <th>Gender: </th>
	  <td>
	     <?php
		   echo $getGen;
		 ?>
	  </td>
   </tr>
     <tr>
      <th>Phone: </th>
	  <td>
	     <?php
		   echo $getPhn;
		 ?>
	  </td>
   </tr>
   <tr>
      <th>Address: </th>
	  <td>
	     <?php
		   echo $getAdrs;
		 ?>
	  </td>
   </tr>
   
</table>
<hr>
</center>
</body>
</html>