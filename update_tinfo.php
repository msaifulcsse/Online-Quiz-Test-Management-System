<?php
session_start();
    if (!isset($_SESSION["teacher"])) {
        header('Location: index.php');
        exit;
    }

    require_once('mysql_conn.php');

    $sql = "SELECT * FROM users";
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result))
    {
        $user_id= $row['user_id'];
        if($_SESSION["teacher"] == $user_id)
        {
            $getUid = $row['user_id'];
            $getPass = $row['pass'];
            $getRole = $row['role'];
        }
        
    }

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
<head><title>Teacher Dashboard || Online Quiz Test</title></head>
<body>
<center>
<h1>Teacher Dashboard</h1>
<hr>
<h2>Edit Your Profile Info.</h2>
<hr>
<form action="update_tinfo1.php" method="POST">
<table>
    <tr>
        <th>Full Name: </th>
        <td><input type="text" id="fname" name="fname" value="<?php echo $getName ?>"></td>
        <td><label id="fname"></label></td>
    </tr>
    <tr>
        <th>User ID: </th>
        <td><input type="text" id="uid" name="uid" value="<?php echo $getUid ?>" disabled></td>
        <td><label id="uid"></label></td>
    </tr> 
    
    <tr>
        <th>Email: </th>
        <td><input type="text" id="email" name="email" value="<?php echo $getEmail ?>"></td>
        <td><label id="email"></label></td>
    </tr> 
     <tr>
        <th>Gender: </th>
         <td><input type="text" id="gender" name="gender" value="<?php echo $getGen ?>" disabled></td>
    </tr>
    <tr>
        <th>DOB: </th>
        <td><input type="date" id="dob" name="dob" value="<?php echo $getDOB ?>"></td>
        <td><label id="dob"></label></td>
    </tr> 

    <tr>
        <th>You Role As: </th>
        <td><input type="text" id="role" name="role" value="<?php echo $getRole ?>" disabled></td>
    </tr>
    <tr>
            <th>Current Education Level: </th>
            <td><input type="text" name="cedu" value="<?php echo $getEdu ?>" disabled>
            </td>
        </tr>
    <tr>
        <th>Change Education Level: </th>
        <td><select id="edu" name="edu">
            <option>Phd</option>
            <option>Master's</option>
            <option>Graduate</option>
            <option>Under Graduate</option>
            <option>College</option>
            <option>School</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Phone: </th> 
        <td><input type="text" id="phone" name="phone" value="<?php echo $getPhn ?>"></td>
        <td><label id="phone"></label></td>
    </tr>
    <tr>
        <th>Address: </th> 
        <td><textarea id="address" name="address" cols="22" rows="4"><?php echo $getAdrs ?></textarea></td>
        <td><label id="address"></label></td>
    </tr>
    <tr>
        <th>Password: </th> 
        <td><input type="text" id="pass" name="pass" value="<?php echo $getPass ?>"></td>
        <td><label id="pass"></label></td>
    </tr>
    
    <tr>
        <th> </th>
        <td><input type="submit" name="submit" value="Update"></td>
    </tr>
</table>
</form>
<hr/><br>
<a href="t_dashboard.php">Go To Your Dashboard</a>
<br>
<a href="logout.php">Logout</a>
</center>
</body>
</html>