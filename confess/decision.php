<link rel="stylesheet" type="text/css" href="../inc/style.css">
<h1>Yale Confessions</h1>
<p>Thank you for moderating!</p>

<?php 
$decision=$_GET["decision"];
$hash=$_GET["entry"];
$con=mysqli_connect("localhost","username","password","confessions");
if (!$con)
  {
  die('Not connected : ' . mysql_error());
  }
if ($decision==0)
	mysqli_query($con,"DELETE FROM submitted WHERE hash = '$hash';");
if ($decision==1){
	$dupecheck=mysqli_query($con,"SELECT * FROM approved WHERE hash = '$hash';");
	if (mysqli_num_rows($dupecheck)==0){
		mysqli_query($con,"INSERT approved
				SELECT * FROM submitted WHERE hash='$hash';");
	}}
	
?>