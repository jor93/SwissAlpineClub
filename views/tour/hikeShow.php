<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 27.09.2016
 * Time: 14:54
 */
include_once ROOT_DIR.'views/header.inc';

$tour = Tour::selectTour(35);
$image = Tour::selectTourImage(35);

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

    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".participantsInputs"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 0; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            x++; //text box increment
            y = 0;
            if (x > max_fields)
                alert('Sie können maximal ' + max_fields + ' zusätzliche Personen buchen!');

            if(x <= max_fields){ //max input box allowed
                var first = x +'' + 1;
                var second = x + '' + 1;
                var third =  x + '' + 1;
                var f = parseInt(first);
                var b = parseInt(second);
                var c = parseInt(third);
                $(wrapper).append('' +
                    '<div><input type="text" name="participantFirstname[]" placeholder="Vorname" required/>' +
                    '<input type="text" name="participantLastname[]"placeholder="Nachname"required/>' +
                    '</br>' +
                    '<fieldset>' +
                    '<input type="radio" name="participantAbo'+f+'[]" value="1" >GA</input>' +
                    '<input type="radio" name="participantAbo'+b+'[]" value="2" >HalbTax</input>' +
                    '<input type="radio" name="participantAbo'+c+'[]" value="3" checked >NIX</input>' +
                    '</fieldset>' +
                    '</br>' +
                    '<a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

</script>
<!--
<div class="main-1">
    <div class="container">
        <div class="register">

            <img alt="Embedded Image" src="data:<?php echo $image['mime']?>;base64,<?php echo base64_encode($image['data']); ?> " style="margin-left: auto;margin-right: auto; display: block;width: 50%" />
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
                        <label id="tour"><?php echo $tour->getTitle();?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description DE</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="descDE"><?php echo $tour->getLanguageDescriptionDE();?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description FR</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="descFR"><?php echo $tour->getLanguageDescriptionFR();?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Difficulty</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="dif"><?php $length = $tour->getDifficulty();for($i=0;$i<$length;$i++){echo "*";}?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Location Departure / Arrival</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="loc"><?php echo $tour->getLocationDep()->getPostcode() . " " . $tour->getLocationDep()->getLocationName(). " / " .
                                $tour->getLocationArriv()->getPostcode() . " " .$tour->getLocationArriv()->getLocationName()?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Date Departure / Arrival</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="date"><?php echo $tour->getStartDate() . ": " . $tour->getDepartTime() . " / " .
                            $tour->getEndDate() . ": " . $tour->getArrivalTime()?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Status</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="stat"><?php if($_SESSION['lang'] == 'de')echo $tour->getStatus()->getStatusDE();
                                                else if($_SESSION['lang'] == 'fr')echo $tour->getStatus()->getStatusFR();?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Price per Person</span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="price"><?php echo "CHF: " . $tour->getPrice() . ".-"?></label>
                    </div>
                </div>
        </div>
    </div>
</div>
-->
</br>

<div class="main-1">
    <div class="container">
        <div class="register">
            <form action="<?php echo URL_DIR.'inscription/validateParticipants';?>" method="post">
                <div class="register-top-grid">
                    <h3>FÜR EINE TOUR EINSCHREIBEN</h3>

                    <a class="news-letter">
                        <label class="checkbox">
                            <input type="checkbox" id="checkb" name="rememberMe" checked=""><i> </i> Nehme ich auch teil?
                        </label>
                    </a>
                    <div class="participants"style="width: 100%;">

                        <span>Meine Freunde:</span>

                        <div class="participantsInputs" style="width: 100%;">
                            <button class="add_field_button">Add More Fields</button>
                            </br>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="register-but">
                        <input type="submit" value="Speichern">
                    </div>



                </div>


            </form>
        </div>
    </div>


</div>

<?php include_once ROOT_DIR.'views/footer.inc'; ?>
