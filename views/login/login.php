<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 28.09.2016
 * Time: 14:01
 */
include_once ROOT_DIR.'views/header.inc';
?>
	<script>
		$(document).ready(function () {
			$('#menu_login').addClass('active');
		});

		function checkLogin() {
			var mail = document.getElementById("mail");
			var pw = document.getElementById("pw");


			if(document.getElementById("checkb").checked) {

				return true;
			}
			else {

				document.getElementById("checkb").focus();
				return false;
			}
		}
	</script>
	<br />

	<div class="login-page">
		<div class="container">
			<div class="account_grid">
				<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
					<h3>NEW CUSTOMERS</h3>
					<p>By creating an account on this site, you will be able to book our guided tours</p>
					<a class="acount-btn" href="registration.php">Create an Account</a>
					<a href="<?php echo URL_DIR.'login/resetpw';?>">testing reset pw</a>
				</div>
				<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
					<h3>REGISTERED CUSTOMERS</h3>
					<p>If you have an account with us, please log in.</p>
					<form action="<?php echo URL_DIR.'login/connection';?>" method="post">
						<div>
							<span>Email Address<label>*</label></span>
							<input type="email" id="mail" name="email" required>
						</div>
						<div>
							<span>Password<label>*</label></span>
							<input type="password" id="pw" name="password" required>
						</div>

						<a class="forgot" href="<?php echo URL_DIR.'login/forgotpw';?>">Forgot Your Password?</a>
						<a class="clearfix" ></a>

						<a class="news-letter">
							<label class="checkbox">
								<input type="checkbox" id="checkb" name="rememberMe" checked=""><i> </i>Stay logged in
							</label>
						</a>
						<a>
							<input type="submit" value="Login" onclick="checkLogin()">
						</a>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

<?php
include_once ROOT_DIR.'views/footer.inc';
?>