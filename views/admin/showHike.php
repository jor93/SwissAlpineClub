<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 14.10.2016
 * Time: 09:26
 */
include_once ROOT_DIR. '/views/headeradmin.inc';
?>
<script>
    $(document).ready(function () {
        $('#menu_showhike').addClass('active');
    });

    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }

</script>

<div class="main-1">
    <div class="container">
        <div class="register">
            <form action="<?php echo URL_DIR.'tour/insertTour';?>" method="post" enctype="multipart/form-data">
                <div class="register-top-grid">
                    <h3>HIKE INFORMATION</h3>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Hike</span>
                        <input type="text" id="hike" name="hike" required>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>difficulty</span>
                        <select name="lang" id="lang">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Height</span>
                        <input type="text" id="high" name="high" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Duration</span>
                        <input type="text" id="dur" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Meeting Point</span>
                        <input type="text" id="meeting" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Location</span>
                        <input type="text" id="loc" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Price</span>
                        <input type="text" id="price" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description</span>
                        <input type="text" id="desc" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Start Date</span>
                        <input type="text" id="sdate" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>End Date</span>
                        <input type="text" id="edate"  required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Departure Time</span>
                        <input type="text" id="deptime" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Arrival Time</span>
                        <input type="text" id="artime" required>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Status</span>
                        <select name="stat" id="stat">
                        <?php elementsController::statusSelect()?>
                        </select>
                    </div>



                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Transport</span>
                        <input type="checkbox" id="train" value="Train"> Zug</br>
                        <input type="checkbox" id="train" value="Bus"> Bus</br>
                        <input type="checkbox" id="lufts" value="Luftseilbahn"> Luftseilbahn</br>
                        <input type="checkbox" id="other" value="other"> andere
                    </div>


                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Tour Type</span>
                        <input type="checkbox" id="schnees" value="Schneeschuhwanderung"> Schneeschuhwanderung</br>
                        <input type="checkbox" id="ski" value="Skitour"> Skitour</br>
                        <input type="checkbox" id="wanderung" value="Wanderung"> Wanderung</br>
                        <input type="checkbox" id="viaf" value="Via Ferrata"> Via Ferrata</br>
                        <input type="checkbox" id="velo" value="Velo - MTB"> Velo - MTB</br>
                        <input type="checkbox" id="winter" value="Winterwanderung im Schnee"> Winterwanderung im Schnee</br>
                        <input type="checkbox" id="alpine" value="Alpine Wanderung"> Alpine Wanderung</br>
                        <input type="checkbox" id="mehrt" value="Mehrtägige Wanderungen"> Mehrtägige Wanderungen</br>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Image</span>
                        <input type="file" id="img" accept="image/gif, image/jpeg, image/png">
                    </div>


                    <div class="wow fadeInRight" data-wow-delay="0.4s">

                    </div>



                </div>

                <div class="register-but">

                    <input type="submit" value="submit" onclick="check()">


                </div>

            </form>
        </div>
    </div>
</div>



<?php
include_once ROOT_DIR . 'views/footer.inc';
?>
