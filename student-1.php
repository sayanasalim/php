<!doctype html>
<?php
$con=mysqli_connect("localhost","root","","simple");
?>
<html>
<head>
<meta charset="utf-8">
<title>Student</title>
</head>
<body background="digiresidency/images/slide_5.jpg">
<?php 
if(isset($_POST['update']))
{
	$id=$_POST['id'];
	echo($id);
	$sql2="select * from reg where id='$id'";
	$res1=mysqli_query($con,$sql2);
	$row=mysqli_fetch_array($res1);
	?>
	<form  action="#" name="student" method="post">
	<table border="1" background="digiresidency/images/testimonial_person2.jpg">
	<tr><th>Name:</th><td><input type="text" name="name" id="name" value="<?php echo($row['name']); ?>"></td></tr>
	<tr><th>age:</th><td><input type="text" name="age" id="age" value="<?php echo($row['age']); ?>"></td></tr>
	<tr><th>house:</th><td><input type="text" name="house" id="house" value="<?php echo($row['house']); ?>"></td></tr>
	<tr><th></th><td><input type="hidden" name="uid" value="<?php echo($id);?>">
	<input type="submit" value="update" name="updates"></td></tr>
	</table>
	</form>
<?php
}
else
{?>
	<form  action="#" name="student" method="post">
	<table border="1" background="digiresidency/images/testimonial_person2.jpg">
	<tr><th>Name:</th><td><input type="text" name="name" placeholder="Name"id="name"></td></tr>
	<tr><th>age:</th><td><input type="text" name="age" placeholder="age"id="age"></td></tr>
	<tr><th>house:</th><td><input type="text" name="house" placeholder="house"id=""></td></tr>
	<tr><th></th><td><input type="submit" value="submit" name="submit"></td></tr>
	</table>
	</form>
<?php
}
?>
<br>
<br>
<br>

<?php 
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$age=$_POST['age'];
	$house=$_POST['house'];
$sql="INSERT INTO `tbl_reg`( `name`, `age`, `house`) VALUES ('$name','$age',$house)";
	$res=mysqli_query($con,$sql);
}
	if(isset($_POST['Delete']))
	{
		$id=$_POST["id"];
		$sql="DELETE FROM `reg` WHERE id='$id'";
		$res=mysqli_query($con,$sql);
		
	}
	
if(isset($_POST['updates']))
{
	$name=$_POST['name'];
	$age=$_POST['age'];
	$house=$_POST['house'];
	$id=$_POST['uid'];
	$sql="UPDATE `reg` SET `name`='$name',`age`='$age',`house`='$house' WHERE id='$id'";
	$res=mysqli_query($con,$sql);
}
?>
<?php
	$sql1="Select * from reg";
	$res=mysqli_query($con,$sql1);
	$r=mysqli_num_rows($res);
	if($r)
	{
	?>
<table border="5px">
	<tr><th>ID</th><th>Name</th><th>age</th><th>house</th></tr>
	<?php
	$sql1="Select * from reg";
	$res=mysqli_query($con,$sql1);
	while($row=mysqli_fetch_array($res))
	{
		?>
		<form action="#" method="post">
		<?php
		echo("<tr><th>".$row['id']."</th><th>".$row['name']."</th><th>".$row['age']."</th><th>".$row['house']."</th>");
		?>
		<th><input type="hidden" name="id" value="<?php echo($row['id'])?>">
			<input type="submit" value="update" name="update"</th>
		<th><input type="submit" value="Delete" name="Delete"</th></tr>
	<?php
	}
	}
	?>
</table>
</body>
</html>
