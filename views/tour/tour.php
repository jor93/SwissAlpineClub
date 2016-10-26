<?php
/**
 * Created by PhpStorm.
 * User: gez
 * Date: 18.10.2016
 * Time: 08:38
 */
include_once 'views/header.inc';
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
                    <h3>HIKE</h3>
                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Tour</span>
                        <input type="text" id="tour" name="tour" required>
                    </div>
                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Status</span>
                        <input type="text" id="status" name="status" required>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Number of Members<label>*</label></span>
                        <input type="number" id="member" name="member" required>

                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>GA<label>*</label></span>
                        <input type="number" id="ga" name="ga" required>

                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Halb-Tax<label>*</label></span>
                        <input type="number" id="halb" name="halb" required>

                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Nothing<label>*</label></span>
                        <input type="number" id="no" name="no" required>

                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Informationen</span>
                        <textarea style="width: 527px; height: 76px" type="TEXT" id="info" name="info" required></textarea>

                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="register-but">

                    <input type="submit" value="Show" onclick="check()">


                </div>

            </form>
        </div>
    </div>
</div>

<?php
include_once 'views/footer.inc';
?>
