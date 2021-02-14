<?php
$hostname='localhost';
$username='root';
$password='';
$database_name='web';
$conn=mysqli_connect($hostname,$username,$password,$database_name);
if(isset($_POST["submit"])){
	$n=$_POST["name"];
	$e=$_POST["email"];
	$g=$_POST["gender"];
	$ct=$_POST["city"];
	$cou=$_POST["course"];    
	$y=$_POST["year"];
    $sql="INSERT INTO user (username,email,gender,city) VALUES ('$n','$e','$g','$ct')";
	mysqli_query($conn,$sql);
	$res=mysqli_query($conn,"select * from user where email='$e'");
	$row=mysqli_fetch_array($res);
	$id=$row['id'];
	$sql="INSERT INTO student_details (username,branch,year) VALUES ($id,'$cou',$y)";
	mysqli_query($conn,$sql);
} 
	$sql="select u.id,u.username,u.email,u.gender,u.city,s.branch,s.year from user as u, student_details as s where u.id=s.username";
	$res=mysqli_query($conn,$sql); 
?>
<html>
<head>
	<title>FORM</title>
	<style>
		body{
			background-image: url(https://img5.goodfon.com/wallpaper/nbig/c/44/puzzle-pieces-simple-background-minimalism.jpg);
		}
		h2{
			text-align: center;
			color: purple;
		}
		body>table:last-child{
			border:3px solid green;
			border-collapse: collapse;
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
<h2>Please Enter Your Details</h2>
<form method="POST" action="form.php">
<table  align="center"  cellspacing=" 25">
	<tr>
		<th>Name*</th>
		<td><input type="text" placeholder=" Name" style="width: 395px" name="name" required></td>
	</tr>
	<tr>
		<th>E-Mail Address*</th>
		<td><input type="email" placeholder="Mail@gmail.com" style="width: 395px " name="email" required></td>
	</tr>
	<tr>
		<th>Gender*</th>
		<td style="color: grey">
		<input type="radio" name="gender" value="Male" checked>Male
		<input type="radio" name="gender" value="Female">Female
		<input type="radio" name="gender" value="Other">Other</td>
	</tr>
	<tr>
		<th>City*</th>
		<td><select style="width: 403px" name="city">
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
		<td><select style="width: 403px" name="course">
		<option>Btech</option>
		<option>Bca</option>
		<option>Bcom</option>
		<option>Bba</option>
		<option>Bsc</option>
		<option>Other</option>
	    </select></td>
	<tr>
		<th>Year*</th>
		<td><input type="number" placeholder="Year" style="width: 395px " name="year" minlength="4" required></td>
	</tr>
	</tr>
		<td></td>
		<td><input id="submit" type="submit"  value="submit" name="submit"></td>
	</tr>
</table>
</form>
<?php if( $res->num_rows >0):?>
<h2>Check Your Details</h2>

	<table  align="center" cellpadding="10" >
			<tr style="border: 3px solid green">
				<th style="border: 3px solid green">Name</th>
				<th style="border: 3px solid green">E-Mail</th>
				<th style="border: 3px solid green">Gender</th>
				<th style="border: 3px solid green">City</th>
				<th style="border: 3px solid green">Branch</th>
				<th style="border: 3px solid green">Year</th>
				<th style="border: 3px solid green" colspan="2">Button</th>
			</tr>
			<?php while ( $row=mysqli_fetch_array($res)): ?>
			<tr style="border: 3px solid green">
			   <td style="border: 3px solid green; color: orange"><?php echo $row['username'] ?></td>
			   <td style="border: 3px solid green; color: orange"><?php echo $row['email'] ?></td>
			    <td style="border: 3px solid green; color: orange"><?php echo $row['gender'] ?></td>
			   <td style="border: 3px solid green; color: orange"><?php echo $row['city'] ?></td>
			   <td style="border: 3px solid green; color: orange"><?php echo $row['branch'] ?></td>
			   <td style="border: 3px solid green; color: orange"><?php echo $row['year'] ?></td>
			   <td style="border: 3px solid green; color: orange"><a href="edit.php?id=<?php echo $row['id']?> " ><input type="button" name="edit" value="edit"></a></td>
			   <td style="border: 3px solid green; color: orange"><a href="delete.php?id=<?php echo $row['id']?> " ><input type="button" name="delete" value="delete"></a></td>
			</tr>
		<?php endwhile;?>
	</table>
<?php endif;?>
</body>
</html>
