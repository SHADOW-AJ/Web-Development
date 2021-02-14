<?php
$id = $_GET['id'];
$f=$_GET['f']??null;
if($f=='yes')
{
    $hostname='localhost';
	$username='root';
	$password='';
	$database_name='web';
	$conn=mysqli_connect($hostname,$username,$password,$database_name);
	if( mysqli_query($conn, "delete from `student_details` where `username`=$id") && mysqli_query($conn, "delete from `user` where `id`=$id") )
	{
		header("Location:form.php");
		exit;
	}
}
elseif( $f=='no')
{
	header("Location:form.php");
		exit;
}
?>
<html>
<head>
	<title>DELETE</title>
	<style>
		body{
			background-image: url(https://img5.goodfon.com/wallpaper/nbig/c/44/puzzle-pieces-simple-background-minimalism.jpg);
		}
		th{
			color: red;
		}
	</style>
</head>
<body>
<table>
	<tr>
		<th colspan="2">This Action cant be Undone. Are you Sure ?</th>
	</tr>
	<tr>
		<td ><a href="delete.php?id=<?php echo $id?>&f=<?php echo "yes"?>" ><input type="button"  value="Yes"></a></td>
		<td ><a href="delete.php?f=<?php echo "no"?> " ><input type="button"  value="No"></a></td>
    </tr>
</table>
</body>
</html>