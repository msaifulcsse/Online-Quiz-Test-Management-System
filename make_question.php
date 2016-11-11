<?php 

	include "mysql_conn.php";
	session_start();
	$userid = $_SESSION["teacher"];
	$paper_id = $_SESSION["paper_id"];
	//echo "Paper id:".$paper_id."<br>";
	$sql = "SELECT * FROM `mcq_paper` WHERE `id`='$paper_id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);

	// echo htmlspecialchars($_SERVER["PHP_SELF"]) 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Make Question</title>
</head>
<body>
<h3><b>Paper Name: </b><i><?php echo $row["paper_name"]; ?></i></h3>
<center>
	<h1> Make Question </h1>
	<hr/>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		Question: <br><textarea rows='3' cols='30' name="question"></textarea><br>
		Answare: <input type="text" name="ans" /><br>
		Option1: <input type="text" name="opt[]" /><br>
		Option2: <input type="text" name="opt[]" /><br>
		Option3: <input type="text" name="opt[]" /><br>
		Option4: <input type="text" name="opt[]" /><br>
		<input type="submit" name="submit" value="submit">
	</form>
</center>
<hr/><br>
<a href="t_dashboard.php">Go To Your Dashboard</a>
<br>
<a href="logout.php">Logout</a>
</body>
<?php
if(isset($_POST['submit'])){
	$question = $_POST["question"];
	$ans = $_POST["ans"];

	//echo $question. " " . $ans  ;
	//print_r($data);
	//die();

	$sql = "INSERT INTO `mcq_question`(`paper_id`, `question`, `ans`) VALUES ('$paper_id','$question','$ans')";
	$result = mysql_query($sql);

	$sql = "SELECT * FROM `mcq_question` WHERE `paper_id`='$paper_id' AND `question`='$question'";

	$result = mysql_query($sql);
	//echo $result;
	$data = mysql_fetch_array($result);
	$qus_id = $data['qus_id'];
	
	/*echo $qus_id;

	echo "<pre>";
	print_r($option);
	echo "</pre>";

	?id='.$mselcted_memberI
	$option = $_POST['opt'];*/


	for($i = 0; $i < count($_POST['opt']); $i++) {
		//echo $_POST['id'][$i] . "<br>";

		$sql = "INSERT INTO `mcq_option`(`qus_id`, `opt`) VALUES ('$qus_id','".$_POST['opt'][ $i ]."')";
	    $result = mysql_query($sql);
	}

}
?>

</html>