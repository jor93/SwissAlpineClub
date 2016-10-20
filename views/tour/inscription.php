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
        $('#menu_inscription').addClass('active');
    });
</script>

<div class="main-1">
    <div class="container">
        <div class="register">
            <form onsubmit="return false">
                <div class="register-top-grid">
                    <h3>HIKE INSCRIPTION</h3>
                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Tour</span>
                        <input type="text" id="tour" name="tour" required>
                    </div>
                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Email Address</span>
                        <input type="email" id="mail" name="email" required>
                        <span id="label_fail_mail" class="error" >The E-Mail address is not valid</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>How many people</span>
                        <input type="number" id="amount" name="amount" required>

                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Date</span>
                        <input type="text" id="date" name="date" required>

                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Information</span>
                        <textarea type="text" id="info" name="information" style="width: 197%; height: 115px;"></textarea>
                    </div>


                </div>
                <div class="clearfix"></div>
                <div class="register-but">

                    <input type="submit" value="submit" onclick="check()">


                </div>

            </form>
        </div>
    </div>
</div>

<?php
include_once ROOT_DIR.'views/footer.inc';
?>
