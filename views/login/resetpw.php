<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 10.10.2016
 * Time: 09:04
 */
$header = Controller::checkHeader();
include_once $header;
?>
    <script>
        $(document).ready(function () {
            $('#menu_resetpw').addClass('active');
        });
    </script>
    <br />

    <div class="main-1">
        <div class="container">
            <div class="register">
                <form action="<?php echo URL_DIR.'forgotpw/resetpassword';?>" method="post">
                    <div class="register-top-grid">
                        <h3><?php echo $lang['RESETPW_TITLE']; ?></h3>
                        <div class="wow fadeInLeft" data-wow-delay="0.4s">
                            <span><?php echo $lang['RESETPW_ENTER']; ?></span>
                            <input type="password" id="pw" name="pw" required>
                            <span><?php echo $lang['RESETPW_ENTER_CONFIRM']; ?></span>
                            <input type="password" id="cpw" name="cpw" required> </br>
                            <label class="error" style="display: inline-block"><?php
                                if (isset($_SESSION['msg']) && $_SESSION['msg']==1){
                                    //echo $lang['RESETPW_SUCCESS'];
                                }else if (isset($_SESSION['msg']) && $_SESSION['msg']==2){
                                    echo $lang['RESETPW_FAILED'];
                                }else if (isset($_SESSION['msg']) && $_SESSION['msg']==3){
                                    echo $lang['RESETPW_WEAK'];
                                }
                                ;?></label>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="register-but">
                        <input type="submit" value="<?php echo $lang['RESETPW_BUTTON_CHANGE']; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
unset($_SESSION['msg']);
include_once ROOT_DIR.'views/footer.inc';
?>