<?php
	include "mysql_conn.php";

	$paper_id = $_GET['paper_id'];
	//echo $paper_id;
	//die();
	$sql = "SELECT * FROM `mcq_paper` WHERE `id`='$paper_id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$t = $row['paper_time'];
	$t = $t * 60;
?>
<!DOCTYPE html>
<html>
<head>
	<noscript>
      <meta http-equiv="refresh" content="<?php echo $t;?>;url=http://localhost/Work/online_quiz/s_dashboard.php" />
    </noscript>
	<title>Test || Question Paper</title>
</head>
<body>
 Time: <span id="seconds"><?php echo $t; ?></span>.
 <script>
      var seconds = document.getElementById('seconds').innerHTML;
      setInterval(
        function(){
          if (seconds <= 1) {
            window.location = 'http://localhost/Work/online_quiz/s_dashboard.php';
          }
          else {
            document.getElementById('seconds').innerHTML = --seconds;
          }
        },
        1000
      );
    </script>
<h3><b>Paper Name: </b><i><?php echo $row["paper_name"]; ?></i></h3>
<br><br>
<form action="result.php" method="POST">
	<input type="hidden" name="paper_id" value="<?php echo $paper_id;?>"></input>
<?php
	
	$sql = "SELECT * FROM `mcq_question` WHERE `paper_id`='$paper_id'";
	$result = mysql_query($sql) ;

	while ($qus = mysql_fetch_array($result)) {
		echo "<label >".$qus['question']."</label><br>";
		$qus_id = $qus['qus_id'];
		$answer = $qus['ans'];
		echo "<input type='hidden' name='qus_id[]' value='".$qus_id."' />";
		echo "<input type='hidden' name='answer[]' value='".$answer."' />";
		$sql1 = "SELECT * FROM `mcq_option` where `qus_id`='".$qus['qus_id']."'";
		$result1 = mysql_query($sql1);
		while ($opt = mysql_fetch_array($result1)) {
			echo "<input type='radio' id='' value='".$opt['opt']."' name='ans".$qus_id."[]'/>".$opt['opt']."  ";
			
		}
		echo "<br>";
	}

?>
	<input type="submit" name="submit" value="submit"></input>
</form>
</center>
<hr/>
<br>
<a href="s_dashboard.php">Go To Your Dashboard</a>
<br>
<a href="logout.php">Logout</a>
</body>
</html>