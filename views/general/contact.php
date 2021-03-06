<?php
/**
 * Created by PhpStorm.
 * User: sandro
 * Date: 23.09.2016
 * Time: 09:17
 */

$header = Controller::checkHeader();
include_once $header;
?>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    $(document).ready(function () {
        $('#menu_contact').addClass('active');
    });
</script>
<br />

<!-- contact -->
<div class="contact-data">
    <div class="container">

        <div class="contact-form">
            <div class="company_address">
                <h2><?php echo $lang['CONTACT_LOCATION']; ?></h2>
                <p><b>VALRANDO</b></p>
                <p><?php echo $lang['CONTACT_ASSOCIATION_NAME']; ?></p>
                <p>Pré-Fleuri 6</p>
                <p>Case postale 23</p>
                <p>CH - 1951 Sion</p>

                <p><b><?php echo $lang['CONTACT_OPENING_HOURS']; ?></b></p>
                <p><?php echo $lang['CONTACT_OPENING_TIME']; ?></p>

                <p>Tel. +41 (0)27 / 327 35 80</p>
                <p>Fax +41 (0)27 / 327 35 81</p>
                <br />
            </div>
            <form class="right_form" action="<?php echo URL_DIR.'general/getrequestcustomer';?>" method="post">
                <h2><?php echo $lang['CONTACT_TOUCH']; ?></h2>
                <div>
                    <span><label><?php echo $lang['CONTACT_NAME']; ?></label></span>
                    <span><input name="userName" type="text" class="textbox" required></span>
                </div>
                <div>
                    <span><label><?php echo $lang['CONTACT_EMAIL']; ?></label></span>
                    <span><input name="userEmail" type="email" class="textbox" required></span>
                </div>
                <div>
                    <span><label><?php echo $lang['CONTACT_SUBJECT']; ?></label></span>
                    <span><textarea name="userMsg" required></textarea></span>
                </div>
                <div class="g-recaptcha" data-sitekey="6LfhNQoUAAAAABf3Ia4vpBFtWclI7akUB7EH976f"></div>
                <label class="error">
                    <?php
                    if (isset($_SESSION['error_send_mail']) && $_SESSION['error_send_mail'] == 1)
                        echo $lang['CONTACT_SUCCESSFUL'];
                    if (isset($_SESSION['error_send_mail']) && $_SESSION['error_send_mail'] == 2)
                        echo $lang['CONTACT_ERROR_INPUTS'];
                    ?>
                </label>
                <div>
                    <span><input type="submit" value="<?php echo $lang['CONTACT_SENDMAIL_BUTTON']; ?>" class="myButton"></span>
                    <span>
                        <label>
                            <?php if (isset($_SESSION['msg']))
                                echo $lang['CONTACT_SUCCESSFUL'];
                            ?>
                        </label>
                    </span>
                </div>
            </form>
            <div class="clear"></div>
        </div>
        <div class="content_bottom">

            <div class="contact_info">
                <h2><?php echo $lang['CONTACT_FIND']; ?></h2>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1054.7816722930384!2d7.356509562978801!3d46.22895163135422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478edc3affc2dd07%3A0x1ccdf4b5d6ea4f67!2sAssociation+Valaisanne+de+la+randonn%C3%A9e+VALRANDO!5e1!3m2!1sde!2sch!4v1474973485844" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- contact -->


<?php
unset($_SESSION['msg']);
unset($_SESSION['error_send_mail']);
include_once ROOT_DIR.'views/footer.inc';
?>
