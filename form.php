<?php
if(isset($_POST["submit"])){
	$n=$_POST["name"];
	$e=$_POST["email"];
	$pn=$_POST["no"];
	$ct=$_POST["city"];
	$cou=$_POST["course"];    
	$arr=($_POST["c"]);
	$s=count($arr);
	if($s<3)
	{
		echo '<script>alert("Please select atleast 3 options")</script>'; 
		$n="";
		$e="";
		$pn="";
		$ct="";
		$cou="";    
		$arr=array("");
	}
} 
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
<form method="POST" action="resume1.php">
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
		<th>Contact No*</th>
		<td><input type="text" placeholder="Phone Number" style="width: 395px" name="no"  minlength="10" required></td>
	</tr>
	<tr>
		<th>City*</th>
		<td><input type="text" name="city"  style="width: 395px" placeholder="City" required></td>
	</tr>
	<tr>
		<th>Course</th>
		<td><select style="width: 403px" name="course">
		<option>Btech</option>
		<option>Bca</option>
		<option>Bcom</option>
		<option>Bba</option>
		<option>Bsc</option>
		<option>Other</option>
	    </select></td>
	</tr>
	<tr>
		<th>Interests*</th>
		<td style="color: grey">Gaming<input type="checkbox" value="Gaming" name="c[]">
			Touring<input type="checkbox" value="Touring" name="c[]">
			Reading<input type="checkbox" value="Reading" name="c[]">
			Cooking<input type="checkbox" value="Cooking" name="c[]">
			Teaching<input type="checkbox" value="Teaching" name="c[]">
			Other<input type="checkbox" value="Other" name="c[]">
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input id="submit" type="submit"  value="submit" name="submit"></td>
	</tr>
</table>
</form>
<table  align="center" cellpadding="10" >
		<tr style="border: 3px solid green">
			<th style="border: 3px solid green">Name</th>
			<th style="border: 3px solid green">E-Mail</th>
			<th style="border: 3px solid green">Contact</th>
			<th style="border: 3px solid green">city</th>
			<th style="border: 3px solid green">Course</th>
			<th>Interests</th>
		</tr>
		<tr style="border: 3px solid green">
		   <td style="border: 3px solid green; color: orange"><?php echo $n ?></td>
		   <td style="border: 3px solid green; color: orange"><?php echo $e ?></td>
		   <td style="border: 3px solid green; color: orange"><?php echo $pn ?></td>
		   <td style="border: 3px solid green; color: orange"><?php echo $ct ?></td>
		   <td style="border: 3px solid green; color: orange"><?php echo $cou ?></td>
		   <td style="color: orange"><?php 
			   for($x=0;$x<$s;$x++)
			   {
			   	 if($arr[$x]!="")
			   	 {
			   	 	echo $arr[$x];
			   	 	if($x!= $s-1 )
			   	 	{
			   	 		echo " ," ;
			   	 	}
			   	 }
			   } 
			   ?></td>
		</tr>
</table>
</body>
</html>