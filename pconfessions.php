<?php require_once('fbheader.php'); ?>

<?php if ($ingroup) { 
	// Replace code below with what is displayed to verified users. ?>

<head>
</head>
<body>
<h1>Yale Confessions</h1>
<p id=instructions>Rules:  Don't be a dick.  Your submissions are anonymous, but all content is moderated.</p>
<form action="" method="">
	
	<div id=div1> <textarea name="content" style="height: 122px; width: 460px" id="text1"></textarea><br><br>
	<button type="button" style="height: 30px; width: 60px;"> Submit </button></div>
	<div hidden id=div2 >
		<p>Submitted!</p>
	</div> 
</form>
<br><br>

<?php 
$con=mysqli_connect("localhost","username","password","confessions");
if (!$con)
  {
  die('Not connected : ' . mysql_error());
  }
$result=mysqli_query($con,"SELECT * FROM approved;");
$numresults=mysqli_num_rows($result);
for($i=0;$i<$numresults;$i++){
$confessions=mysqli_fetch_array($result, MYSQLI_NUM);
echo("<p>".$confessions[1]."</p><p>".date("F j, Y, g:i a",$confessions[2])."<br></p><p><br></p>");
}

?>
</body>
<script>
var submitted=false;
	$(document).ready(function(){
		$("button").click(function(){
			
			if ($("#text1").val()!=""&&submitted==false){
			submitted=true;
			$.post("confess/modConfess.php",
			{
			content:$("#text1").val()
			},
			function() {
				$("#div1").fadeOut();
				$("#instructions").hide();
				$("#div2").fadeIn();
				

		});
	}});
	
	});
	

</script>
<?php } else {
	// Replace code below with what is displayed to the public.
	require_once('fblogin.php'); 
} ?>

<?php require_once('fbroot.php'); ?>
