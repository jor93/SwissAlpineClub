<?php
/**
 * Created by PhpStorm.
 * User: sandro
 * Date: 26.09.2016
 * Time: 10:26
 */

$header = Controller::checkHeader();
include_once $header;
?>
<script>
    $(document).ready(function () {
        $('#menu_about').addClass('active');
    });
</script>
<br />

<div class="main">
    <div class="container">
        <div class="about">
            <h4 style="padding-left: 6%"><?php echo $lang['ABOUT_TAG']; ?></h4>
            <div class="about-bottom">

                <div class="register-top-grid" style="padding-left: 70px">

                    </br>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['ABOUT_NAME']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="tour"><p><?php echo $lang['ABOUT_NAME_FULL']; ?></p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['ABOUT_FOUNDATION']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="desc"><p>1943</p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['ABOUT_BASED']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="dif"><p>CH-1951<?php echo $lang['ABOUT_BASED_SION']; ?></p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['ABOUT_UMBRELLA_GROUP']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="loc"><p><?php echo $lang['ABOUT_CH_HIKS']; ?></p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['ABOUT_CERTIFICATION']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="date"><p>ISO 9001 - ISO 14001 - Valais Excellence</p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['ABOUT_OPERATIONS']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="stat"><p> <?php echo $lang['ABOUT_OPERATIONS_DESC']; ?></p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['ABOUT_QUANTITY_MEMBERS']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="price"><p>2000</p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['ABOUT_MEMBER_CONTRIBUTION']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="av_space"><?php echo $lang['ABOUT_MEMBER_CONTRIBUTION_DESC']; ?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['ABOUT_MEMBER_ADVANTAGE']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="expiration">

                            <ul style="list-style-type: disc">
                                <li>
                                    <p style="width: 539px;"><?php echo $lang['ABOUT_MEMBER_ADVANTAGE_1']; ?></p>
                                </li>
                                <li>
                                    <p style="width: 539px;"><?php echo $lang['ABOUT_MEMBER_ADVANTAGE_2']; ?></p>
                                </li>
                                <li>
                                    <p style="width: 539px;"><?php echo $lang['ABOUT_MEMBER_ADVANTAGE_3']; ?></p>
                                </li>
                                <li>
                                    <p style="width: 539px;"><?php echo $lang['ABOUT_MEMBER_ADVANTAGE_4']; ?></p>
                                </li>
                                <li>
                                    <p style="width: 539px;"><?php echo $lang['ABOUT_MEMBER_ADVANTAGE_5']; ?></p>
                                </li>
                            </ul>
                        </label>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['ABOUT_CONSTITUTION']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="av_space"><?php echo $lang['ABOUT_CONSTITUTION_DESC']; ?></label>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<?php
include_once ROOT_DIR.'views/footer.inc';
?>
