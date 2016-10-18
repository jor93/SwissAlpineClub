<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
     
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>SAC</title>
		<link href="/<?php echo SITE_NAME; ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/<?php echo SITE_NAME; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/<?php echo SITE_NAME; ?>/css/slider.css" rel="stylesheet" type="text/css" media="all" />
		<meta name="/viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700,800' rel='stylesheet' type='text/css'>
		<script src="/<?php echo SITE_NAME; ?>/js/jquery.min.js"></script>
		<link href="/<?php echo SITE_NAME; ?>/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
		<script src="/<?php echo SITE_NAME; ?>/js/jquery.magnific-popup.js" type="text/javascript"></script>
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
				});
			});
		</script>
	</head>  
	<body>
	<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-top">
				<div class="header-right">

				</div>
				<div class="header-left">
					<ul>
						<li id="menu_registration"><a href="registration.php">Registration</a></li>
						<li id="menu_login"><a href="login.php">Login</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="container">
			<div class="logo">
				<a href="index.html"><img src="../images/logo.png" class="img-responsive" alt="" /></a>
			</div>
			<div class="head-nav">
				<span class="menu"> </span>
				<ul>
					<li id="menu_home"><a href="home.php">Home</a></li>

					<li id="menu_hikemanage"><a href="hikemanage.php">Manage Hikes</a></li>
					<li id="menu_about"><a href="about.php">About</a></li>
					<li id="menu_contact"><a href="contact.php">Contact</a></li>
					<div class="clearfix"> </div>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<!-- script-for-nav -->
			<script>
				$( "span.menu" ).click(function() {
					$( ".head-nav ul" ).slideToggle(300, function() {
						// Animation complete.
					});
				});
			</script>
			<!-- script-for-nav -->
		</div>
	</div>
	<div class="banner1">
		<div class="container">
		</div>
	</div>
	<!-- header -->


