<?php
$s=0;
if(isset($_POST["submit"])){
	$s=$_POST['n']+$_POST['m'];
} 
?>
<html>
<head>
	<title>Sum</title>
</head>
<body>
<h2>Please Enter Your Values</h2>
<form method="POST" action="sum.php">
<table cellpadding="10">
	<tr>
		<th>NUM-1</th>
		<td><input type="integer" placeholder="value" style="width: 395px" name="m" required></td>
	</tr>
	<tr>
		<th>NUM-2</th>
		<td><input type="integer" placeholder="value" style="width: 395px" name="n" required></td>
	</tr>
	</tr>
		<td></td>
		<td><input id="submit" type="submit"  value="submit" name="submit"></td>
	</tr>
</table>
</form>
<?php if($s !=0):?>
  <h2>Sum : <?php echo $s;?></h2>
<?php endif;?>
</body>
</html>