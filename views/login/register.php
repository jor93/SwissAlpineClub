<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 27.09.2016
 * Time: 14:54
 */
include_once ROOT_DIR.'views/header.inc';

if(isset($_SESSION['saved']))
    $sav = $_SESSION['saved'];
else
    $sav = null;
?>
    <script>
        $(document).ready(function () {
            $('#menu_registration').addClass('active');
        });

        function check() {
            var mail = document.getElementById("mail");
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(mail.value)) {
                document.getElementById("label_fail_mail").style.visibility = "visible"

            }
            var pw = document.getElementById("pw1");
            var pwc = document.getElementById("pw2");

            if(pw.value != pwc.value){
                document.getElementById("label_fail_pw").style.display = "inherit";
            }

        }
    </script>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

<?php
$query = "select distinct CONCAT(Postcode, ', ' ,LocationName) from location;";
$data = array();
$data = SQL::getInstance()->select($query)->fetchAll();
$length = count($data);
for ($i = 0; $i < $length; ++$i) {
    $data2[$i] = $data[$i][0];
}
echo '<script>var myarray = '.json_encode($data2) .';</script>';

?>

  <script type="text/javascript">
      var MIN_LENGTH = 2;
      $( document ).ready(function() {
          $("#plz").keyup(function() {
              var keyword = $("#plz").val();
              if (keyword.length >= MIN_LENGTH) {
;                  $(document).ready(function() {
                      $( "#plz" ).autocomplete({
                            source: myarray,
                            select: function (event, ui) {
                                event.preventDefault();
                                var s = ui.item.value;
                                $("#plz").val(s.substring(0, s.indexOf(',')));
                                $("#loc").val(s.substring(s.indexOf(',')+2, s.length));
                            }
                      });
                  });
              }
          });
      });
    </script>

<br />

    <div class="main-1">
        <div class="container">
            <div class="register">
                <form method="post" action="<?php echo URL_DIR.'login/register';?>">
                    <div class="register-top-grid">
                        <!-- Error message label general -->
                        <label id="label_fail_exec" class="error">
                            <?php
                            if(errorController::showErrorFromSession(1) === true) echo $lang['REGISTER_ERROR_1'];
                            if(errorController::showErrorFromSession(3) === true) echo $lang['REGISTER_ERROR_3'] . "<a href='forgotpw'>" . $lang['REGISTER_FORGOT_PW'] . "</a>";
                            ?> </label>

                        <h3><?php echo $lang['REGISTER_TITLE'];?></h3>
                        <div class="wow fadeInLeft" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_FNAME'];?><label>*</label></span>
                            <input type="text" class="ok" id="fname" name="firstname" value="<?php echo $sav[0];?>" required>
                            <span id="label_fail_fname" class="error"><?php if(errorController::showErrorFromSession(6) === true) echo $lang['REGISTER_ERROR_6'];?></span>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_LNAME'];?><label>*</label></span>
                            <input type="text" id="lname" name="lastname" value="<?php echo $sav[1];?>" required>
                            <span id="label_fail_lname" class="error"><?php if(errorController::showErrorFromSession(7) === true) echo $lang['REGISTER_ERROR_7'];?></span>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_EMAIL'];?><label>*</label></span>
                            <input type="email" id="mail" name="email" value="<?php echo $sav[2];?>" required>
                            <span id="label_fail_mail" class="error"><?php  if(errorController::showErrorFromSession(2) === true) echo $lang['REGISTER_ERROR_2'];?></span>
                        </div>
                        <div class="wow fadeInLeft" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_ADDRESS'];?><label>*</label></span>
                            <input type="text" id="address" name="address" value="<?php echo $sav[3];?>" required>
                            <span id="label_fail_address" class="error" ></span>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_PLZ'];?><label>*</label></span>
                            <input type="text" id="plz" name="zip" value="<?php echo $sav[4];?>" required>
                            <span id="label_fail_zip" class="error" ></span>
                        </div>
                        <div class="wow fadeInLeft" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_LOCATION'];?><label>*</label></span>
                            <input type="text" id="loc" name="location" value="<?php echo $sav[5];?>" required>
                            <span id="label_fail_location" class="error" ></span>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_COUNTRY'];?><label>*</label></span>
                            <select name="country">
                                <?php
                                // get location if possible
                                $country = loginController::getLocation();
                                if($sav[8]!=null)
                                    $index = $sav[8];
                                else
                                    $index =-1;
                                // count countries
                                $length = count($_SESSION['country'])-1;
                                // add new option for each country and check if it matches to location
                                if($index == -1){
                                    for($i = 0; $i <= $length; ++$i)
                                        echo "<option value='" . $_SESSION['country'][$i][0]  ."'" .(strcmp($country,$_SESSION['country'][$i][2])==0  ? 'selected' : '') . ">" . $_SESSION['country'][$i][1] . "</option>";
                                }
                                else{
                                    for($i = 0; $i <= $length; ++$i)
                                        echo "<option value='" . $_SESSION['country'][$i][0]  ."'" .($index-1 == $i ? 'selected' : '') . ">" . $_SESSION['country'][$i][1] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_PHONE'];?><label>*</label></span>
                            <input type="text"  id="phone" name="phone" value="<?php echo $sav[6];?>" required>
                            <span id="label_fail_phone" class="error" ></span>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_LANG'];?><label>*</label></span>
                            <select name="lang">
                                <?php if($sav[7] != null) $index = $sav[7]; else $index = "un"; elementsController::langSelect($index); ?>
                            </select>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_ABO'];?><label>*</label></span>
                            <select name="abo">
                                <?php if($sav[9] != null) $index = $sav[9]; else $index =-1; elementsController::aboSelect($index-1); ?>
                            </select>
                        </div>

                    </div>
                    <div class="register-bottom-grid">
                        <h3><?php echo $lang['REGISTER_TITLE_2'];?></h3>
                        <div class="wow fadeInLeft" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_PWD'];?><label>*</label></span>
                            <input type="password" id="pw1" name="pwd1" required>
                            <span id="label_fail_pw1_notSame" class="error" ><?php  if(errorController::showErrorFromSession(4) === true) echo $lang['REGISTER_ERROR_4'];?></span>
                            <span id="label_fail_pw1_weak" class="error" ><?php  if(errorController::showErrorFromSession(5) === true) echo $lang['REGISTER_ERROR_5'];?></span>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span><?php echo $lang['REGISTER_PWD_2'];?><label>*</label></span>
                            <input type="password" id="pw2" required name="pwd2">
                            <span id="label_fail_pw2" class="error" ></span>
                        </div>
                    </div>

                    <div class="clearfix"> </div>
                    <div class="register-but">
                        <input type="submit" value="<?php echo $lang['REGISTER_SUBMIT'];?>">
                    </div>

                    <div class="g-recaptcha" data-sitekey="6LfhNQoUAAAAABf3Ia4vpBFtWclI7akUB7EH976f"></div>


                </form>
            </div>
        </div>
    </div>


<?php include_once ROOT_DIR.'views/footer.inc'; ?>