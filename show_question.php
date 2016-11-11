<?php
	
	include "mysql_conn.php";
	session_start();
	$userid = $_SESSION["student"];

	$sql = "SELECT * FROM `user_info` WHERE `user_id`='$userid'";
	$result = mysql_query($sql);
	$data = mysql_fetch_array($result);
	$user_name = $data["full_name"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard || Show Question Paper</title>
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
	<script src="jquery-1.12.3.min.js"></script>
</head>
<body>
<h3><b>Student Name: </b><i><?php echo $user_name; ?></i></h3>
<hr/>
<center>
	Select Subject:
	<select onchange="load_subject();" id="subject" name ="subject">
		<option value="all">All Subject</option>
        <option value="English">English</option>
        <option value="Bangla">Bangla</option>
        <option value="Math">Math</option>
        <option value="Physics">Physics</option>
        <option value="Chemistry">Chemistry</option>
    </select> 
    <br>
    <?php 
    	$sql = "SELECT * FROM `mcq_paper` ORDER BY `subject` ASC";
    	$result = mysql_query($sql);
    ?>
    <table>
    	<thead>
    		<tr>
	    		<td><b>Subject</b></td>
	    		<td><b>Question Paper Name</b></td>
	    		<td><b>Test Time</b></td>
    		</tr>
    	</thead>
    	<tbody id='list'>
    	<?php 
	    	while ($ques = mysql_fetch_array($result)) {
	    		echo "<tr>".
	    		"<td>".$ques['subject']."</td>".
	    		"<td><a href='question_paper.php?paper_id=".$ques['id']."'>".$ques['paper_name']."</a></td>".
	    		"<td>".$ques['paper_time']."</td>".
	    		"</tr>";
		 	}
    	?>
    	</tbody>
    	<tbody id="list_1">
    	</tbody>
    	
    </table>
</center>
<hr/>
<br>
<a href="s_dashboard.php">Go To Your Dashboard</a>
<br>
<a href="logout.php">Logout</a>
</body>
<script type="text/javascript">

	$(document).ready(function(){
		$("#list_1").hide();
	});

	function load_subject() {
		$("#list").hide();
		var subject = $('#subject').val();
		if (subject === "all") {
			$("#list").show();
		}
		else{
			//alert("selected Subject: "+subject);
			$("#list_1").show();
			
			$.ajax({
				type: "POST",
				url: "ajax_loaded_table.php",
				data: { subject : subject },
				dataType: "html",
				success: function (data) {
					//alert(data);
					//$("#list").hide();
					$("#list_1").html(data);
				}
			});

		}
		//alert("selected Subject: "+subject);

	}

</script>
</html>