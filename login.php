<?php
include 'connection.php';
session_start();
if (isset($_POST['submitl']))
{
   //echo"hai";
   $username=$_POST["username"];   //username value from the form
   $pass=$_POST["psw"];
  
   $un="SELECT `username`,`password` FROM `login` WHERE `username`='$username' and  password='$pass'";
         $r1=mysqli_query($con,$un);
         $row=mysqli_fetch_array($r1);
 $rr1=$row["username"];
 $rr2=$row["pass"];
 if ($rr1!=$username && $rr2!=$password )
 {
     echo"<script>alert('Username or password is wrong ');</script>)";
 }
 else {
     
//password value from the form
   $sql="select * from login where username='$username' and password='$pass'"; //value querried from the table
         //echo $sql;
   $res=mysqli_query($con,$sql); 
   //query executing function

   if($res)
   {
     if($fetch=mysqli_fetch_array($res)) // role means user , for admin set to 0 and for user set to
     {
      		if($fetch['status']==1)   
		{
			 $_SESSION['l_id']=$fetch['l_id'];	// setting username as session variable
                  header("location:home.php");	//home page or the dashboard page to be redirected
            	}
     }
   }
 }

}

?>
<html>
    <head>
        <title>Login</title>
        <style>
            
/* Bordered form */
form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
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
        <form method="post" name="login">
 
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" name="submitl">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw"> <a href="registration.php">Sign Up</a></span>
  </div>
</form>
    </body>
</html>>

