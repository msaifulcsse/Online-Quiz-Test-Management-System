<?php
	include "mysql_conn.php";
	$sub = $_POST['subject'];
	
	$sql = "SELECT * FROM `mcq_paper` WHERE `subject`='$sub'";
	$result = mysql_query($sql);

	while ($ques = mysql_fetch_array($result)) {
		echo "<tr>".
		"<td>".$ques['subject']."</td>".
		"<td><a href='question_paper.php?paper_id=".$ques['id']."'>".$ques['paper_name']."</a></td>".
		"<td>".$ques['paper_time']."</td>".
		"</tr>";
	}
?>