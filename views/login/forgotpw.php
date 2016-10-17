<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 30.09.2016
 * Time: 09:09
 */
include_once ROOT_DIR.'views/header.inc';
?>

<!--
<script>
    $(document).ready(function () {
        $('#menu_forgot').addClass('active');
    });

    function checkemail() {
        var mail = document.getElementById("mail");


        document.getElementById("label_successfull").style.visibility = "hidden";
        document.getElementById("label_failed").style.visibility = "hidden";
    }
</script>
-->
<br />

<div class="main-1">
    <div class="container">
        <div class="register">

            <form action="<?php echo URL_DIR.'forgotpw/checkMailControl';?>" method="post">
                <div class="register-top-grid">
                    <h3><?php echo $lang['FORGOTPW_TAG']; ?></h3>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['FORGOTPW_ENTER']; ?></span>
                        <input type="email" id="mail" name="mail" required>
                        <?php
                        if (isset($_SESSION['msg']) && $_SESSION['msg']==1){
                            echo $lang['FORGOTPW_EXISTS'];
                        }else if (isset($_SESSION['msg']) && $_SESSION['msg']==2){
                            echo $lang['FORGOTPW_NOT_EXISTS'];
                        }
                        ;?>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="register-but">
                    <input type="submit" name="Submit" value="<?php echo $lang['FORGOTPW_SEND']; ?>" />
                </div>
            </form>
        </div>
    </div>
</div>

<?php
unset($_SESSION['msg']);
include_once ROOT_DIR.'views/footer.inc';
?>
