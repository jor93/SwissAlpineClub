<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 28.09.2016
 * Time: 14:01
 */
$header = Controller::checkHeader();
include_once $header;
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
					<h3><?php echo $lang['LOGIN_TITLE'];?></h3>
					<p><?php echo $lang['LOGIN_DESC'];?></p>
					<a class="acount-btn" href="<?php echo URL_DIR.'login/register';?>"><?php echo $lang['LOGIN_CREATEACC'];?></a>
				</div>
				<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
					<h3><?php echo $lang['LOGIN_REG'];?></h3>
					<p><?php echo $lang['LOGIN_REG_DESC'];?></p>
					<form action="<?php echo URL_DIR.'login/connection';?>" method="post">
						<div>
							<span><?php echo $lang['LOGIN_MAIL'];?><label>*</label></span>
							<input type="email" id="mail" name="email" required>
						</div>
						<div>
							<span><?php echo $lang['LOGIN_PW'];?><label>*</label></span>
							<input type="password" id="pw" name="password" required>
						</div>

						<a class="forgot" href="<?php echo URL_DIR.'login/forgotpw';?>"><?php echo $lang['LOGIN_PW_FORGOT'];?></a>
						<a class="clearfix" ></a>

						<a class="news-letter">
							<label class="checkbox">
								<input type="checkbox" id="checkb" name="rememberMe" checked=""><i> </i><?php echo $lang['LOGIN_STAY'];?></label>
						</a>
						<Label class="error"><?php if(isset($_SESSION['wrongUserError'])) echo $_SESSION['wrongUserError']; unset($_SESSION['wrongUserError']) ?></Label>
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