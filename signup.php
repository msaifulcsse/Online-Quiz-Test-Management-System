<html>
<head>
    <title>SignUp Page || Online Quiz Test</title>
    <script src="jquery-1.12.3.min.js"></script>
    <script src="jquery-validate1.9.0.min.js"></script>
    <script src="uid_verify.js"></script>
    <style>
        .warning{
        font-size: 10px;
        color: red;
        }
    </style>
</head>
<body>
<center>
<h1>Sign Up Page</h1>
<hr>
<form id="regrcv" name="regrcv" action="adduser.php" method="POST">
<table>
    <tr>
        <th>Full Name: </th>
        <td><input type="text" id="fname" name="fname"></td>
        <!--<td><label id="fname"></label></td>-->
    </tr>
    <tr>
        <th>User ID: </th>
        <td><input type="text" id="uid" name="uid" ></td>
        <td id="availability"></td>
        <!--onBlur="checkusername()"  <td><label id="uid"></label></td>-->
    </tr> 
    
    <tr>
        <th>Email: </th>
        <td><input type="text" id="email" name="email"></td>
        <!--<td><label id="email"></label></td>-->
    </tr> 
     <tr>
        <th>Gender: </th>
         <td><select id="gender" name="gender">
            <option value="select">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>DOB: </th>
        <td><input type="date" id="dob" name="dob"></td>
        <!--<td><label id="dob"></label></td>-->
    </tr> 

    <tr>
        <th>Role: </th>
         <td><select id="role" name="role">
            <option value="select">Select Role</option>
            <option value="Teacher">Teacher</option>
            <option value="Student">Student</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Education Level: </th>
        <td><select id="edu" name="edu">
            <option value="select">Select Edu</option>
            <option value="Phd">Phd</option>
            <option value="Master's">Master's</option>
            <option value="Graduate">Graduate</option>
            <option value="Under Graduate">Under Graduate</option>
            <option value="College">College</option>
            <option value="School">School</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Phone: </th> 
        <td><input type="text" id="phone" name="phone"></td>
        <!--<td><label id="phone"></label></td>-->
    </tr>
    <tr>
        <th>Address: </th> 
        <td><textarea id="address" name="address" cols="22" rows="4"></textarea></td>
        <!--<td><label id="address"></label></td>-->
    </tr>
    <tr>
        <th>Password: </th> 
        <td><input type="password" id="pass" name="pass"></td>
        <!--<td><label id="pass"></label></td>-->
    </tr>
    
    <tr>
        <th> </th>
        <td><input type="submit" name="submit" value="Sign Up"></td>
    </tr>
</table>
</form>
</center>
</body>
</html>
<script>
/*function checkusername(){
    var status = document.getElementById("usernamestatus");
    var u = document.getElementById("uid").value;
    if(u != ""){
        status.innerHTML = 'checking...';
        var hr = new XMLHttpRequest();
        hr.open("POST", "uid_verify.php", true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                status.innerHTML = hr.responseText;
            }
        }
        var v = "name2check="+u;
        hr.send(v);
    }
}*/

 
$(document).ready(function(){
    //alert("aas kk ahi ");
    $("#regrcv").validate({
        rules: {
            fname: "required",
            uid: "required",
            check_uid: "required",
            email: {
                required: true,
                email: true
            },
            gender: {
                selectcheck: true
            },
            dob: "required",
            role: {
                selectcheck: true
            },
            edu: {
                selectcheck: true
            },
            phone: {
                required: true,
                minlength: 11
            },
            address: "required",
            pass: {
                required: true,
                minlength: 6
            }
            
        },
        messages: {
            fname: "<br/><p class='warning'>Please enter your full name</p>",
            uid: "<br/><p class='warning'>Please enter your username</p>",
            email: {
                required: "<br/><p class='warning'>Please provide a your email</p>",
                email: "<br/><p class='warning'>Please enter a valid email address</p>"
            },
            gender: {
                selectcheck: "<br/><p class='warning'>Please select a gender</p>"
            },
            dob: "<br/><p class='warning'>Please enter your date of birth</p>",
            role: {
                selectcheck: "<br/><p class='warning'>Please select your role</p>"
            },
            edu: {
                selectcheck: "<br/><p class='warning'>Please select your education level</p>"
            }, 
            phone: {
                required: "<br/><p class='warning'>Please provide a phone number</p>",
                minlength: "<br/><p class='warning'>Your password must be 11 characters long</p>"
            },
            address: "<br/><p class='warning'>Please enter your address</p>",
            pass: {
                required: "<br/><p class='warning'>Please provide a password</p>",
                minlength: "<br/><p class='warning'>Your password must be at least 6 characters long</p>"
            }
            
        },
            submitHandler: function(form) {
                form.submit();
            }
    });

    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != 'select');
    });

    $('#uid').blur(function(){  
        var uid = $('#uid').val();  
       $.ajax({  
            url:"uid_verify.php",  
            type:"POST",  
            data:{uid:uid},  
            dataType:"html",  
            success:function(data)  
            {  
                $('#availability').html(data);
                 //window.location.assign("http://localhost/Work/online_quiz/signup.php");

            }  
        });  
    });

});
   
</script>