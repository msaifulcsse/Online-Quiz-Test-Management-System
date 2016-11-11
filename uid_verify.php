<?php  
 require_once('mysql_conn.php');
 if(isset($_POST['uid']))  
 {  
    $uid = $_POST['uid'];
      $sql = "SELECT * FROM users WHERE user_id = '$uid'";  
      $result = mysql_query($sql);


      if ($uid == "") {
            echo '<strong style="color: red">' . $uid . '</strong>'.'<strong style="color:red"> is taken or null</strong><br><input type="hidden" id="check_uid" name="check_uid" value=""/>';
      }
      else if(mysql_fetch_array($result) > 0)  
      {  
           echo '<strong style="color: red">' . $uid . '</strong>'.'<strong style="color:red"> is taken</strong><br><input type="hidden" id="check_uid" name="check_uid" value=""/>';
      }  
      else  
      {  
           echo '<strong style="color: green">' . $uid . '</strong>'.'<strong style="color:green"> is OK</strong><br><input type="hidden" id="check_uid" name="check_uid" value="ok" required/>';
      }
 } 
/*
if(isset($_POST["name2check"]) && $_POST["name2check"] != ""){
    include_once 'mysql_conn.php';
    $username = $_POST['name2check']; 
    $sql_uname_check = mysql_query("SELECT id FROM users WHERE user_id='$username' LIMIT 1"); 
    $uname_check = mysql_num_rows($sql_uname_check);
    if (strlen($username) < 4) {
      echo '<strong style="color: red">'.' 4 - 15 characters please '.'</strong>';
      exit();
    }
  if (is_numeric($username[0])) {
      echo '<strong style="color: red">'.' First character must be a letter '.'</strong>';
      exit();
    }
    if ($uname_check < 1) {
      echo '<strong style="color: green">' . $username . '</strong>'.'<strong style="color:green"> is OK</strong>';
      exit();
    } else {
      echo '<strong style="color: red">' . $username . '</strong>'.'<strong style="color:red"> is taken</strong>';
      exit();
    }
}*/
?>  