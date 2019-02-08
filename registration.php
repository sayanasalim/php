<?php
include 'connection.php';
session_start();
if (isset($_POST['submits']))
{
   //echo"hai";
   $username=$_POST["username"]; //username value from the form
   $email=$_POST["email"];
    $add=$_POST["add"];
   $pass=$_POST["psw"];
   $password=md5($_POST["psw"]);
       $sql1="INSERT INTO `login`(`username`, `password`,`status`) VALUES ('$username','$pass',1)";
            $result1=mysqli_query($con,$sql1);
            $l_id="SELECT `l_id` FROM `login` WHERE `username`='$username'";
            $result2=mysqli_query($con,$l_id);
            while($row=mysqli_fetch_array($result2))
            {

                 $a=$row["l_id"];
                 $sql="INSERT INTO `registration`(`l_id`,`email`,`address`) VALUES($a,'$email','$add')";

                 
                  $result3=mysqli_query($con,$sql);
                   
                 
            }
            if($result3)
                    {
                        
                         echo"<script> alert('Registration Successful,Please Login')
						 window.location.href = 'index.php';</script>";
                    }
           
}
?>
<html>
    <head>
        <title>SignUp</title>
        <style>
            * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
        </style>
    </head>
    <body>
 <center> 
<table bgcolor=white border=0 width=100% height=6%>
<tr><td>
<table>
</table>
<td><table bgcolor=white border=0 width=80%>
<tr><td align=center width=30% font color=red size=5><a href=index.php  style="color:red; text-decoration:none;"><b>Home</b>  
            <td align=center width=30% font color=red size=5><a href=registration.php    style="color:red; text-decoration:none;"><b>Registration</b>
                    <td align=center width=30% font color=red size=5><a href=login.php style="color:red; text-decoration:none;"><b>Login</b>
</table>
</table>
 </center>
        <form method="post" name="reg">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
 <label for="User Name"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
<label for="User Name"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="add" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <hr>

   <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
   <button type="submit" class="registerbtn" name="submits">Register</button>
  </div>

  <div class="container signin">
      <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
        
    </body>
</html>
