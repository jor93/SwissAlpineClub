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

<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $('#menu_thank').addClass('active');
    });

</script>


<div class="main-1">
    <div class="container">
        <div class="register">
            <form method="post">
                <div class="register-top-grid">


                    <h3><?php echo $lang['THANK_TITLE']; ?></h3>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <p><?php echo $lang['THANK_TEXT']; ?></p>

                    </div>


                </div>

                <div class="clearfix"> </div>
                <div class="register-but">
                    <input type="submit" value="<?php echo $lang['THANK_BTN']; ?>" onclick="">
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include_once ROOT_DIR.'views/footer.inc';
?>
