<?php
// include lang files
include_once ROOT_DIR.'views/common.php';
?>

<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
     
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>SAC</title>
		<link href="/<?php echo SITE_NAME; ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/<?php echo SITE_NAME; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/<?php echo SITE_NAME; ?>/css/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/<?php echo SITE_NAME; ?>/css/slider.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/<?php echo SITE_NAME; ?>/css/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />
		<meta name="/viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700,800' rel='stylesheet' type='text/css'>
		<script src="/<?php echo SITE_NAME; ?>/js/jquery.min.js"></script>
		<script src="/<?php echo SITE_NAME; ?>/js/jquery-ui.js"></script>
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
	<div class="head">

		<div class="header">
			<div class="container">
				<div class="header-top">
					<div class="header-right">
						<div id="languages">
							<a href="?lang=fr"><img src="/<?php echo SITE_NAME; ?>/images/french.png" width="24px" height="24px" /></a>
							<br />
							<a href="?lang=de"><img src="/<?php echo SITE_NAME; ?>/images/german.png" width="24px" height="24px" /></a>
						</div>
					</div>
					<div class="header-left">
						<ul>
							<li><a href="<?php echo URL_DIR.'login/register';?>">Registration</a></li>
							<li><a href="<?php echo URL_DIR.'login/login';?>">Login</a></li>
							<li><a href="<?php echo URL_DIR.'login/resetpw';?>">asdf</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<div class="logo">
					<a href="<?php echo URL_DIR.'home/home';?>"><img src="/<?php echo SITE_NAME; ?>/images/logo.png" class="img-responsive" alt="" /></a>
					<a href="<?php echo URL_DIR.'tour/inscription';?>">Inscription</a>
				</div>
				<div class="head-nav">
					<span class="menu"> </span>
					<ul>
						<li><a href="<?php echo URL_DIR.'home/home';?>"><?php echo $lang['MENU_NEWS']; ?></a></li>
						<li><a href="<?php echo URL_DIR.'tour/hiking';?>"><?php echo $lang['MENU_EVENTS']; ?></a></li>
						<li><a href="404.html">Blog</a></li>
						<li id="menu_about"><a href="<?php echo URL_DIR.'general/about';?>"><?php echo $lang['MENU_ABOUT']; ?></a></li>
						<li id="menu_contact"><a href="<?php echo URL_DIR.'general/contact';?>"><?php echo $lang['MENU_CONTACT']; ?></a></li>
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
	</div>
	<!-- header -->


