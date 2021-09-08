<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
	<input type="checkbox" id="check">
	<label for="check">
		<i class="fas fa-bars" id="btn"></i>
		<i class="fas fa-times" id="cancel"></i>
	</label>
	<nav class="sidebar">
		<div>
			<img class="logo" src="logo.jpeg">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Login <i class="fas fa-caret-down"></i></a>
					<ul>
						<li><a href="adminlogin.php">Admin login</a></li>
						<li><a href="stafflogin.php">Staff login</a></li>
						<li><a href="studentlogin.php">Student login</a></li>
					</ul>
				</li>
				<li><a href="about.php">About</a></li>
			</ul>
		</div>
	</nav>
	<div class="header">
		<h1>CMRIT
			<div id="div1">
				<a href="Tel://918028524456">Tel : +91 80 28524466 / 77</a>
				<br>
				<a href="mailto:info@cmrit.ac.in">Email : info@cmrit.ac.in</a>
			</div>
		</h1>
	</div>
	<section>
	<!-- Slideshow container -->
	<div class="slideshow-container" id="ss1">

  		<!-- Full-width images with number and caption text -->
  		<div class="mySlides fade">
    		<img src="home.png" style="width:100%">
  		</div>

  		<div class="mySlides fade">
  			<img src="image2.jpg" style="width:100%">
  		</div>

  		<div class="mySlides fade">
    		<img src="image3.jpg" style="width:100%">
  		</div>
  		<div class="mySlides fade">
    		<img src="banner.jpg" style="width:100%">
  		</div>

  		<!-- Next and previous buttons -->
  		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  		<a class="next" onclick="plusSlides(1)">&#10095;</a>
	</div>
	<br>
	<!-- The dots/circles -->
	<div style="text-align:center" id="ss2">
  		<span class="dot" onclick="currentSlide(1)"></span>
  		<span class="dot" onclick="currentSlide(2)"></span>
  		<span class="dot" onclick="currentSlide(3)"></span>
  		<span class="dot" onclick="currentSlide(4)"></span>
	</div>
	<br>
	</section>
	<script>
		var slideIndex = 0;
		showSlides();

		// Next/previous controls
		function plusSlides(n) {
  			showSlides(slideIndex += n);
		}

		function showSlides() {
  			var i;
  			var slides = document.getElementsByClassName("mySlides");
  			var dots = document.getElementsByClassName("dot");
  			for (i = 0; i < slides.length; i++) {
    			slides[i].style.display = "none";
  			}
  			slideIndex++;
  			if (slideIndex > slides.length) {slideIndex = 1}
  			for (i = 0; i < dots.length; i++) {
      			dots[i].className = dots[i].className.replace(" active", "");
  			}
  			slides[slideIndex-1].style.display = "block";
  			dots[slideIndex-1].className += " active";
  			setTimeout(showSlides, 5000); // Change image every 5 seconds

		}
	</script>
	
	<section>
		<div class="col" id="div2">
			<div class="content active">
				<img src="https://www.cmrit.ac.in/wp-content/uploads/sites/2/2013/12/icon_cmrit.png" width="61" height="61" alt="" class="icon">
				<h3> WHY CMRIT?</h3>
				<p> CMRIT is accredited with A+ by the NAAC</p>
				<p><em><a href="https://www.cmrit.ac.in/about-cmrit/">read more &gt;</a></em></p><br><br><br><br>
			</div>
		</div>

		<div class="col announcements" id="div3">
			<div class="announcement active">
				<img src="https://www.cmrit.ac.in/wp-content/uploads/sites/2/2013/12/icon_announcement.png" width="61" height="61" alt="" class="icon">
				<div class="content">
					<h3>ANNOUNCEMENT</h3>
					<p><em><a style="text-decoration: underline;" href="https://www.cmrit.ac.in/wp-content/uploads/sites/2/2020/01/NIRF_2020.pdf">NIRF 2020 </a></em></p>
					<p>CET Mock Examination Papers available!</p>
					<p><em><a href="https://www.cmrit.ac.in/admissions/undergraduate/" target="_blank" rel="noopener noreferrer">click here &gt;</a></em></p><br><br>	
				</div>
			</div>
		</div>

		<div class="col last tweets" id="div4">
			<div class="content active">
				<img src="https://www.cmrit.ac.in/wp-content/uploads/sites/2/2013/12/icon_twitter.png" width="61" height="61" alt="" class="icon">
				<h3>TWEETS</h3>
				<p>A teacher is like a potter who constantly guides and moulds the students who are the clay.Wishing all the teacher…<a href="https://twitter.com/CMRIT_Bengaluru/status/1302132088619937792" target="_blank">https://t.co/jGfvBzKZ25</a></p>
				<div class="tweet-info"><a href="http://twitter.com/CMRIT_Bengaluru" target="_blank">@CMRIT_Bengaluru</a>  |  6 hours ago</div><br><br>
			</div>					
		</div>
	</section>
</body>
</html>