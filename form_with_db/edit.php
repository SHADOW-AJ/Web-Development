<?php
$hostname='localhost';
$username='root';
$password='';
$database_name='web';
$conn=mysqli_connect($hostname,$username,$password,$database_name);
$id=$_GET['id'];
$sql="select u.username,u.email,u.gender,u.city,s.branch,s.year from user as u, student_details as s where u.id=s.username and u.id=$id";
$res=mysqli_query($conn,$sql); 
$row=mysqli_fetch_array($res);
$g=$row['gender'];
if(isset($_POST["submit"])){
	$n=$_POST["name"];
	$e=$_POST["email"];
	$g=$_POST["gender"];
	$ct=$_POST["city"];
	$cou=$_POST["course"];    
	$y=$_POST["year"];
    $sql="UPDATE `user` set `username`='$n',`email`='$e',`gender`='$g',`city`='$ct' where id=$id";
	mysqli_query($conn,$sql);
	$sql="UPDATE student_details set branch='$cou',year=$y where  username=$id";
	mysqli_query($conn,$sql);
	header("Location:form.php?");
	exit();
} 
?>
<html>
<head>
	<title>EDIT</title>
	<style>
		body{
			background-image: url(https://img5.goodfon.com/wallpaper/nbig/c/44/puzzle-pieces-simple-background-minimalism.jpg);
		}
		h2{
			text-align: center;
			color: purple;
		}
		th{
			color: red;
		}
		#submit{
			color: white;
			background-color: skyblue;
			width: 200px
		}
	</style>
</head>
<body>
<h2>Please Update Your Details</h2>
<form method="POST" action="edit.php?id=<?php echo $id?>">
<table  align="center"  cellspacing=" 25">
	<tr>
		<th>Name*</th>
		<td><input type="text" placeholder=" Name" style="width: 395px" name="name" value="<?php echo $row['username'] ?>" required></td>
	</tr>
	<tr>
		<th>E-Mail Address*</th>
		<td><input type="email" placeholder="Mail@gmail.com" style="width: 395px " name="email" value="<?php echo $row['email'] ?>"required></td>
	</tr>
	<tr>
		<th>Gender*</th>
		<td style="color: grey">
		<input type="radio" name="gender" value="Male" <?php if($g=="Male"){ echo "checked";} ?>>Male
		<input type="radio" name="gender" value="Female" <?php if($g=="Female"){ echo "checked";}?> >Female
		<input type="radio" name="gender" value="Other"<?php if($g=="Other"){ echo "checked";} ?>>Other
    </td>
	</tr>
	<tr>
		<th>City*</th>
		<td><select style="width: 403px" name="city">
		<option hidden><?php echo $row['city']?></option>
		<option>Dehradun</option>
		<option>Delhi</option>
		<option>Jaipur</option>
		<option>Lucknow</option>
		<option>Mumbai</option>
		<option>Hyderabad</option>
		<option>Kolkata</option>
		<option>Chennai</option>
		<option>Bhopal</option>
		<option>Leh</option>
	    </select></td>
	</tr>
	<tr>
		<th>Branch*</th>
		<td><select style="width: 403px" name="course" >
		<option hidden><?php echo $row['branch']?></option>
		<option>Btech</option>
		<option>Bca</option>
		<option>Bcom</option>
		<option>Bba</option>
		<option>Bsc</option>
		<option>Other</option>
	    </select></td>
	<tr>
		<th>Year*</th>
		<td><input type="number" placeholder="Year" style="width: 395px " name="year" minlength="4" value="<?php echo $row['year'] ?>" required></td>
	</tr>
	</tr>
		<td></td>
		<td><input id="submit" type="submit"  value="update" name="submit"></td>
	</tr>
</table>
</form>
</body>
</html>