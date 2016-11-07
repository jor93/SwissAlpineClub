<?php
/**
 * Created by PhpStorm.
 * User: gez
 * Date: 18.10.2016
 * Time: 08:38
 */
Controller::checkHeader();
?>
<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $('#menu_tour').addClass('active');
    });

</script>

<div class="main-1">
    <div class="container">
        <div class="register">
            <form onsubmit="return false">
                <div class="register-top-grid">
                    <h3><?php echo $lang['TOUR_TITLE']; ?></h3>
                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span><?php echo $lang['TOUR_TOUR']; ?></span>
                        <input type="text" id="tour" name="tour" required>
                    </div>
                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span><?php echo $lang['TOUR_STATUS']; ?></span>
                        <input type="text" id="status" name="status" required>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['TOUR_MEMBERS']; ?><label>*</label></span>
                        <input type="number" id="member" name="member" required>

                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['TOUR_GA']; ?><label>*</label></span>
                        <input type="number" id="ga" name="ga" required>

                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['TOUR_HT']; ?><label>*</label></span>
                        <input type="number" id="halb" name="halb" required>

                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['TOUR_NOTHING']; ?><label>*</label></span>
                        <input type="number" id="no" name="no" required>

                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['TOUR_INFO']; ?></span>
                        <textarea style="width: 527px; height: 76px" type="TEXT" id="info" name="info" required></textarea>

                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="register-but">

                    <input type="submit" value="<?php echo $lang['TOUR_BTN']; ?>" onclick="check()">


                </div>

            </form>
        </div>
    </div>
</div>

<?php
include_once 'views/footer.inc';
?>
