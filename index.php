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
		<div class="panel" id="p1">
			<div class="insidepanel">
				<h1>Forum</h1>
				<p>
					For discussions, textbook/furniture exchange... Suggested by Andrew Bean
				</p>
			</div>
		</div>
		<div class="panel" id="p2">
			<div class="insidepanel">
				<h1>Meet</h1>
				<p>
					Meet random students... Suggested by Bianca Li
				</p>
			</div>
		</div>
		<div class="panel" id="p3">
			<div class="insidepanel">
				<h1>Class Database</h1>
				<p>
					Database to see what classes others are taking... Suggested by Lining Wang
				</p>
			</div>
		</div>
		<div class="panel" id="p4">
			<div class="insidepanel">
				<h1>Calendar</h1>
				<p>
					Suggested by Bianca Li
				</p>
			</div>
		</div>
		<div class="panel" id="p5">
			<div class="insidepanel">
				<h1>Resources</h1>
				<p>
					For the freebies and fb groups links... Suggested by Cameron Yick
				</p>
			</div>
		</div>
		
		<a href="http://yalecollege.yale.edu/content/class-2017" target="_blank"><img id="home" src="gfx/home_<?php $l = array("small", "beveled"); echo $l[array_rand($l)]; ?>.png" /></a>
		
		<!-- DOCK -->
		<div class="dock" id="dock">
			<div class="dockcontainer">
				<a class="dockitem" id="d0"><span>Home</span><img src="gfx/dock/home.png" /></a> 
				<a class="dockitem" id="d1"><span>Forum</span><img src="gfx/dock/forum.png" /></a> 
				<a class="dockitem" id="d2"><span>Meet</span><img src="gfx/dock/meet.png" /></a> 
				<a class="dockitem" id="d3"><span>ClassDB</span><img src="gfx/dock/classDB.png" /></a> 
				<a class="dockitem" id="d4"><span>Calendar</span><img src="gfx/dock/calendar.png" /></a>
				<a class="dockitem" id="d5"><span>Resources</span><img src="gfx/dock/resources.png" /></a>
			</div>
		</div>
		
		<div id="sig">Designed by Qingyang Chen. &copy; 2013.</div>
	</body>
</html>