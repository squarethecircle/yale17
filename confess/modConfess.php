<?php 
$text=$_POST['content'];
$time=time();
$hash=md5($text+strval($time)+strval(rand()));
$con=mysqli_connect("localhost","username","password","confessions");
if (!$con)
  {
  die('Not connected : ' . mysql_error());
  }
$safetext=mysqli_real_escape_string($con,$text);
mysqli_query($con,"INSERT INTO submitted (hash, content, time)
VALUES ('$hash','$safetext','$time');");
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:confessions@yale17.com';
$message="Confession:<br>".$text."<br>
<a href=\"http://www.yale17.com/confess/decision.php?entry=".$hash."&decision=1
\">Approve</a><br>
<a href=\"http://www.yale17.com/confess/decision.php?entry=".$hash."&decision=0
\">Reject</a>";

$moderatorEmails=array("asdf@gmail.com");
foreach ($moderatorEmails as $address){
	mail($address,"New Confession",$message,$headers);
	}























?>
