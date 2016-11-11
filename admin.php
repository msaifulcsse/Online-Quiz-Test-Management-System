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
<div>
<h1>Teacher</h1><br>
<a href="teacher_list.php">Teacher List</a><br>
<a href="teacher_approve.php">Teacher Approval</a><br>
<a href="teacher_remove.php">Teacher Remove</a><br>
</div>

<div>
<h1>Student</h1><br>
<a href="student_list.php">Student List</a><br>
<a href="student_remove.php">Student Remove</a><br>
</div>

<div>
<h1>Questions</h1><br>
<a href="question_list.php">Question List</a><br>
<a href="question_remove.php">Question Remove</a><br>
</div>

<br>
<a href="logout.php">Logout</a>
</center>
</body>
</html>
