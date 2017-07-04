<!doctype html>

<!-- Startpage originally by Adam Leung (Centribo), fork on Github: https://github.com/centribo -->

<html>
	<head>
	<!-- Randomly selects a startpage image and updates the style sheet. Template document can be used for other random changes -->
		<?php $images = scandir("Images/");
		$selectimg = rand(2,count($images)-1); $style = file_get_contents('styleTemplate.css'); $style = str_replace('BACK_IMG', $images[$selectimg], $style);
		$handle = fopen('Style.css', 'w') or die('fopen failed'); fwrite($handle, $style) or die('fwrite failed'); ?>

		<meta charset="utf-8">
		<title>Start</title>
		<link rel="stylesheet" href="Style.css">
		<script src="jquery-3.2.1.min.js"></script>
	</head>

	<body>
		<div class="bg">
		<!-- Change to have your name here, or alternatively just comment it out -->
		<div id="name">Hello, Name</div>

		
		<!-- Time & Date -->
		<div id="time">
			<script type="text/javascript">
				var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
				var months = ['January','February','March','April','May','June','July','August','September','October','November','December']

				var now = new Date();
				var day = days[now.getDay()];
				var month = months[now.getMonth()];
				var date = now.getDate();
				var year = now.getFullYear();
				// Change how date is formatted here. See Javascript date refernce for more details
				document.write(day + ", " + month + " " + date + ", " +  year)
			</script>
		</div>

		<!-- Drop-down menu for links -->
			<!-- Use ul to declare a sub-menu, and li to declare a entry -->
		<nav id="links_container">
			<ul>
				<li>Everday
					<ul>
						<li><a href="http://www.reddit.com">Reddit</a></li>
						<li><a href="http://www.youtube.com">YouTube</a></li>
						<li><a href="http://www.facebook.com">Facebook</a></li>
						<li><a href="https://calendar.google.com/">Google Calendar</a></li>	
					</ul>
				</li>
				<li>School
					<ul>
						<li><a href="https://learn.uwaterloo.ca">LEARN</a></li>
						<li><a href="https://quest.pecs.uwaterloo.ca/psp/SS/?cmd=login&languageCd+ENG">Quest</a></li>
						<li><a href="https://piazza.com/">Piazza</a></li>
						<li><a href="https://odyssey.uwaterloo.ca/">Odyssey</a></li>
					</ul>
				</li>
				<li>Programming
					<ul>
						<li><a href="http://www.github.com">Github</a></li>
					</ul>
				</li>
			</ul>
		</nav>

		<!-- Submits images to the webserver and adds it to the list of background images -->
		<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="fileToUpload" id="fileToUpload" />
		<input type="submit" name="submit" value="Upload Image">
		</form>		


		<!-- Search bar for general searching -->
		<form name="search" action="" method="get">
		<input type="text" name="search" id="searchName" value="search">
		</form>
		<button id="searchSub">Search</button>
		</div>


		<!-- Redirects search request to google search -->
		<script>
			$(document).ready(function(){
				$("#searchSub").click(function(){
					var url = $("#searchName").val();
					window.location.href = "http://google.ca/search?q=" + url;
				});
			});
		</script>

	</body>
</html>
