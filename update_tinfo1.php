<?php
session_start();
    if (!isset($_SESSION["teacher"])) {
        header('Location: index.php');
        exit;
    }

    require_once('mysql_conn.php');
    $sql = "SELECT * FROM user_info";
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result))
    {
        $user_id= $row['user_id'];
        if($_SESSION["teacher"] == $user_id)
        {
        $msg="";
        $name = $_REQUEST['fname'];
        $email = $_REQUEST['email'];
        $dob = $_REQUEST['dob'];
        $edu = $_REQUEST['edu'];
        $phone = $_REQUEST['phone'];
        $address = $_REQUEST['address'];        
        $password = $_REQUEST['pass'];

        $sql1 = "UPDATE `user_info` SET `full_name`='$name',`email`='$email',`edu`='$edu',`dob`='$dob',`phone`='$phone',`address`='$address' WHERE user_id='$user_id'";
                if(!mysql_query($sql1))
                    {
                        echo "Error in user_info: " . $sql. "<br>" . mysql_error($conn);
                    }


        $sql2 ="UPDATE `users` SET `pass`='$password' WHERE user_id='$user_id'";
                if(!mysql_query($sql2))
                    {
                        echo "Error in users: " . $sql1 . "<br>" . mysql_error($conn);
                    }
                else
                {
                    $msg= 'Data Successfully Updated';
                }
        }
        
    }
            
?>
<html>
<head><title>Teacher Dashboard || Online Quiz Test</title></head>
<body>
<center>
<h1>Teacher Dashboard</h1>
<hr>
<h2>Edit Your Profile Info.</h2>
<hr>
    <p style="color:green"><?php echo $msg; ?></p>
<br>
<a href="s_dashboard.php">Go To Your Dashboard</a>
<br>
<a href="logout.php">Logout</a>
</center>
</body>
</html>