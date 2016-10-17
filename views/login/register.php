<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 27.09.2016
 * Time: 14:54
 */
include_once ROOT_DIR.'views/header.inc';
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
<!--    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

    <script>
        $(function() {
            $( "#tags2" ).autocomplete({
                source: 'autocomplete.php' ,
                minLength: 2
            });
        });
    </script>

 <!--   <script type="text/javascript">
        $(document).ready(function() {
            var data= ["Test","java"];
            $( "#tags2" ).autocomplete({source:data});
        });
    </script>
    -->
<br />

    <div class="main-1">
        <div class="container">
            <div class="register">
                <form method="post">
                    <div class="register-top-grid">
                        <!-- Error message label general -->
                        <label id="label_fail_exec" class="error" style="display: inline-block">
                            <?php
                            if(isset($_SESSION['error']))
                            switch ($_SESSION['error']){
                                case 1:
                                    break;
                                default:
                                    'hallo';
                            }
                            ?> </label>

                        <h3>PERSONAL INFORMATION</h3>
                        <div class="wow fadeInLeft" data-wow-delay="0.4s">
                            <span>First Name<label>*</label></span>
                            <input type="text" id="fname" name="firstname" placeholder="Please enter Firstname" required>
                            <span id="label_fail_fname" class="error" >The firstname is not valid</span>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span>Last Name<label>*</label></span>
                            <input type="text" id="lname" name="lastname" placeholder="Please enter Lastname" required>
                            <span id="label_fail_lname" class="error" >The lastname is not valid</span>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span>Email Address<label>*</label></span>
                            <input type="email" id="mail" name="email" placeholder="Please enter E-Mail" required>
                            <span id="label_fail_mail" class="error" >The E-Mail address is not valid</span>
                        </div>
                        <div class="wow fadeInLeft" data-wow-delay="0.4s">
                            <span>Address<label>*</label></span>
                            <input type="text" id="address" name="address" placeholder="Please enter Adress" required>
                            <span id="label_fail_address" class="error" >The address is not valid</span>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span>PLZ/ZIP Code<label>*</label></span>
                            <input type="text" id="tags2" placeholder="Please enter ZIP code" required>
                            <span id="label_fail_zip" class="error" >The zip code is not valid</span>
                        </div>
                        <div class="wow fadeInLeft" data-wow-delay="0.4s">
                            <span>Location<label>*</label></span>
                            <input type="text" id="loc" name="location" placeholder="Please enter Location" required>
                            <span id="label_fail_location" class="error" >The location is not valid</span>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span>Country<label>*</label></span>
                            <select name="country">
                                <?php
                                // get location if possible
                                $country = loginController::getLocation();
                                // count countries
                                $length = count($_SESSION['country'])-1;
                                // add new option for each country and check if it matches to location
                                for($i = 0; $i <= $length; ++$i)
                                    echo "<option value='" . $_SESSION['country'][$i][0]  ."'" .(strcmp($country,$_SESSION['country'][$i][2])==0 ? 'selected' : '') . ">" . $_SESSION['country'][$i][1] . "</option>";
                                ?>
                            </select>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span>Phone<label>*</label></span>
                            <input type="tel" id="phone" name="phone" placeholder="Please enter Phone" required>
                            <span id="label_fail_phone" class="error" >The phone number is not valid</span>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span>Language<label>*</label></span>
                            <select name="lang">
                                <?php
                                // get language if possible
                                $lang = loginController::getPreferredLanguage();
                                // variables for views
                                $array = array('en','de','fr');
                                $tr = array('English','Deutsch','Français');
                                // add new option for each language and check if it matches the preferred language
                                for($i = 0; $i <= 2; ++$i) {
                                    echo "<option value='" . $array[$i] ."'" . (strcmp($lang,$array[$i])==0 ? 'selected' : '') . ">" . $tr[$i] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="register-bottom-grid">
                        <h3>LOGIN INFORMATION</h3>
                        <div class="wow fadeInLeft" data-wow-delay="0.4s">
                            <span>Password<label>*</label></span>
                            <input type="password" id="pw1" name="pwd1" required>
                            <span id="label_fail_pw1_notSame" class="error" >Password does not match</span>
                            <span id="label_fail_pw1_weak" class="error" >Password are to weak</span>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.4s">
                            <span>Confirm Password<label>*</label></span>
                            <input type="password" id="pw2" required name="pwd2">
                            <span id="label_fail_pw2" class="error" ></span>
                        </div>
                    </div>

                    <div class="clearfix"> </div>
                    <div class="register-but">
                        <input type="submit" value="submit" onclick="">
                    </div>

                </form>
            </div>
        </div>
    </div>


<?php include_once ROOT_DIR.'views/footer.inc'; ?>