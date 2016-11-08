<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 14.10.2016
 * Time: 09:26
 */
$header = Controller::checkHeader();
include_once $header;
?>
<!-- 404 -->
	<div class="main">
		<div class="container">
		<!--start-plans-404page---->
			<div class="error-page">
				<p>Page Not Found!</p>
				<h3>404</h3>
				<a href="<?php echo URL_DIR.'home';?>" class="go">Go home</a>
			</div>
			<!--End-plans-404page---->	
		</div>
	</div>
<!-- 404 -->

<?php
include_once ROOT_DIR . 'views/footer.inc';
?>