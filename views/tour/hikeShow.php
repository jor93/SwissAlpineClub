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
        $('#menu_hikeShow').addClass('active');
    });

    function fill(clickedid) {
        for(i=1;i<6;i++){
            document.getElementById(i).className="";
        }
       for(i=1;i<=clickedid;i++){
           document.getElementById(i).className="filled";
       }


    }

</script>

<div class="main-1">
    <div class="container">
        <div class="register">

            <img src="/<?php echo SITE_NAME; ?>/images/matterhorn.jpg" style="margin-left: auto;margin-right: auto; display: block;width: 80%" />
            <div class="rating">
                <span id="5" onclick="fill(this.id)">☆</span>
                <span id="4" onclick="fill(this.id)">☆</span>
                <span id="3" onclick="fill(this.id)">☆</span>
                <span id="2" onclick="fill(this.id)">☆</span>
                <span id="1" onclick="fill(this.id)" class="filled">☆</span>

            </div>

                <div class="register-top-grid" style="padding-left: 70px">

                    </br>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Tour</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="tour"><p>Tour Name</p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="desc"><p>TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText</br>TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText</p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Difficulty</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="dif"><p>1</p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Location Departure / Arrival</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="loc"><p>Sierre / Brig</p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Date Departure / Arrival</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="date"><p>25.6.2016 08:50 /26.6.2016 16:00</p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Status</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="stat"><p>Gebucht</p></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Price</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="price"><p>70.- per Person</p></label>
                    </div>


                </div>



        </div>
    </div>
</div>
</br>

<?php include_once ROOT_DIR.'views/footer.inc'; ?>
