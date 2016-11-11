<?php

	include "mysql_conn.php";
	session_start();
	$user_id = $_SESSION["student"];

	//print_r($_POST);
	$Result = 0;

	/*$myarray = array( $_POST);
	foreach ($myarray as $key => $value) {

	  echo "<p>".$key."</p>";
	 // echo "<p>".$value."</p>";
	  echo "<pre>";
	  print_r($value);
	  echo "</pre>";
	  echo "<hr />";
	}*/


	$paper_id = $_POST["paper_id"];

	//echo $paper_id;

	$qus_id = $_POST["qus_id"];

	$i = 0;
	foreach ($qus_id as $k => $v) {
		$index = "ans".$v;

		$ans = $_POST[$index];
		if ($ans[0] == $_POST["answer"][$i]) {
			$Result++;
		}
		//echo $ans[0];
		$i++;
	}
	
	//echo $Result;

	$sql = "INSERT INTO `test_ans`(`user_id`, `paper_id`, `result`) VALUES ('$user_id','$paper_id','$Result')";
	mysql_query($sql);
	
?>
<!DOCTYPE html>
<html>
<head>
	<title> Student Result </title>
</head>
<body>
<?php 
	$sql1 = "SELECT * FROM `mcq_paper` WHERE `id`='$paper_id'";
	$result_1 = mysql_query($sql1);
	$name = mysql_fetch_array($result_1);

?>
<center>
	<h2><b>Paper Name: <?php echo $name['paper_name'];?></b></h2><br>
	<h3><b>Result: </b><i><?php echo $Result;?></i></h3>	

</center>
<hr/>
<br>
<a href="s_dashboard.php">Go To Your Dashboard</a>
<br>
<a href="logout.php">Logout</a>
</body>
</html>




