<?php require_once('fbheader.php'); ?>
<html>
	<head>
		<script src="inc/jquery.js"></script>
		<script src="page.js"></script>
		<link rel="stylesheet" type="text/css" href="inc/style.css" />
		<script src="inc/dockinterface.js"></script>
		<link rel="stylesheet" type="text/css" href="inc/dockstyle.css" />
	</head>
	<body>
		<div id="screen"></div>
		<div id="panels"></div>
		
		<a href="http://yalecollege.yale.edu/content/class-2017" target="_blank"><img id="home" src="gfx/home_<?php $l = array("small", "beveled"); echo $l[array_rand($l)]; ?>.png" /></a>
		
		<!-- DOCK -->
		<div class="dock" id="dock">
			<div class="dockcontainer">
			</div>
		</div>
		
		<div id="sig">Designed by Qingyang Chen. &copy; 2013.</div>
		
		<?php require_once('fbroot.php'); ?>
	</body>
</html>