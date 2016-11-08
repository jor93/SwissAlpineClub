<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 27.09.2016
 * Time: 14:54
 */
$header = Controller::checkHeader();
include_once $header;

if (isset($_SESSION['tourId'])) {
    echo "Tour-ID: " . $_SESSION['tourId'] . "!";
    $tour = Tour::selectTour($_SESSION['tourId']);
    $image = Tour::selectTourImage($_SESSION['tourId']);
    $inscription = Inscription::selectInscriptionByIdTour($_SESSION['tourId']);
    $_SESSION['idInscription'] = $inscription->getIdInscription();
}
?>
<script>
        $(document).ready(function () {
            $('#menu_hikeShow').addClass('active');
        });

        function fill(clickedid) {
            var valueSelected = 0;
            var valueBefore = 0;
            // set all back
            for(i=1;i<6;i++){
                valueBefore = document.getElementById(i);
                // if it is selected from before set the original id
                if (valueBefore == null){
                    document.getElementById("selected"+i).setAttribute("id", i);
                }
                // set back the filled tag of the stars
                document.getElementById(i).className="";
            }
            // fill the stars
            for(i=1;i<=clickedid;i++){
                document.getElementById(i).className="filled";
                valueSelected = i;
            }
            // change the id tag to handle the value afterwards
            document.getElementById(valueSelected.toString()).setAttribute("id", "selected"+valueSelected);

        }

        function validateRating() {
            // first get ratingstars
            var valueSelected = 0;
            for(i=1;i<6;i++){
                // get the selected star
                valueSelected = document.getElementById("selected"+i);

                // save value
                if (valueSelected != null){
                    valueSelected = i;
                    break;
                }
            }
            // get the comment
            var valueComment = document.getElementById('input_comment').value;

            // save into db - call controllers
            $.ajax({
                type: 'post',
                url: '<?php echo URL_DIR.'inscription/validateRating';?>',
                data:{ selectedStar : valueSelected,
                    givenComment: valueComment},
                success: function(response) {
                    alert(response);
                }
            });
            location.reload();
        }

        function selectAccount() {
            // validate the checkbox
            var value = 0;
            if (document.getElementById('checkb').checked)
                value = 1;
            else
                value = 0;

            // notify the controller if the user is selected
            $.ajax({
                type: 'post',
                url: '<?php echo URL_DIR.'inscription/setAccountToParticipants';?>',
                data:{ acc_part : value},
                success: function(response) {
                    //alert(response);
                }
            });
        }

        $(document).ready(function() {
            // available places to restrict adding friends
            var free_space = $("#av_space").text();
            var u = parseInt(free_space);
            var max_fields = u; //maximum input boxes allowed

            // wrapper and button declaration
            var wrapper = $(".participantsInputs"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            // index/values to set the panels with right index
            var x = 1; //initlal array!
            var nrInputs = 1;

            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: '<?php echo URL_DIR.'inscription/setIndexInputs';?>',
                    data:{ index : x},
                    success: function(response) {
                        //alert(response);
                    }
                });

                // check if i want to take part -> if yes -1 from max_fields
                var myself = $("#checkb:checked").val();
                if (myself && x == 1)
                    max_fields-=1;

                if (nrInputs > max_fields)
                    alert('Sie können maximal ' + max_fields + ' zusätzliche Personen buchen!');

                if(nrInputs <= max_fields){ //max input box allowed
                    var first = x +'' + 1;
                    var second = x + '' + 1;
                    var third =  x + '' + 1;
                    var f = parseInt(first);
                    var b = parseInt(second);
                    var c = parseInt(third);
                    nrInputs++;

                    $(wrapper).append('' +
                        '<div><input type="text" name="participantFirstname['+x+']" placeholder="Vorname'+x+'" required/>' +
                        '<input type="text" name="participantLastname['+x+']"placeholder="Nachname'+x+'"required/>' +
                        '</br>' +
                        '<fieldset>' +
                        '<input type="radio" name="participantAbo'+f+'[]" value="1" >GA'+x+'</input>' +
                        '<input type="radio" name="participantAbo'+b+'[]" value="2" >HalbTax</input>' +
                        '<input type="radio" name="participantAbo'+c+'[]" value="3" checked >NIX</input>' +
                        '</fieldset>' +
                        '</br>' +
                        '<a href="#" class="remove_field">Remove</a></div>'); //add input box
                }
                x++; //text box increment
            });
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); nrInputs--;
            })
        });
</script>
    <div class="main-1">
        <div class="container">
            <div class="register">
                <img alt="Embedded Image"
                     src="data:<?php echo $image['mime'] ?>;base64,<?php echo base64_encode($image['data']); ?> "
                     style="margin-left: auto;margin-right: auto; display: block;width: 50%"/>
                <h3>IHRE BEWERTUNG</h3>
                <div class="rating">
                    <span id="5" title="ausgezeichnet" onclick="fill(this.id)" >☆</span>
                    <span id="4" title="sehr gut" onclick="fill(this.id)">☆</span>
                    <span id="3" title="gut" onclick="fill(this.id)">☆</span>
                    <span id="2" title="genügend" onclick="fill(this.id)">☆</span>
                    <span id="selected1" title="schlecht" onclick="fill(this.id)" class="filled">☆</span>
                </div>
                <?php echo elementsController::avgRatings();?>
                <div class="register-top-grid" style="padding-left: 70px">
                    </br>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['HIKESHOW_TOUR']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="tour"><?php echo $tour->getTitle(); ?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['HIKESHOW_DESC_DE']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="descDE"><?php echo $tour->getLanguageDescriptionDE(); ?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['HIKESHOW_DESC_FR']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="descFR"><?php echo $tour->getLanguageDescriptionFR(); ?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['HIKESHOW_DIFF']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="dif"><?php $length = $tour->getDifficulty();
                            for ($i = 0; $i < $length; $i++) {
                                echo "*";
                            } ?>
                        </label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['HIKESHOW_LOCATION']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label
                            id="loc"><?php echo $tour->getLocationDep()->getPostcode() . " " . $tour->getLocationDep()->getLocationName() . " / " .
                                $tour->getLocationArriv()->getPostcode() . " " . $tour->getLocationArriv()->getLocationName() ?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['HIKESHOW_DATE']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="date"><?php echo $tour->getStartDate() . ": " . $tour->getDepartTime() . " / " .
                                $tour->getEndDate() . ": " . $tour->getArrivalTime() ?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['HIKESHOW_STATUS']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="stat"><?php if ($_SESSION['lang'] == 'de') echo $tour->getStatus()->getStatusDE();
                            else if ($_SESSION['lang'] == 'fr') echo $tour->getStatus()->getStatusFR(); ?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['HIKESHOW_PRICE']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="price"><?php echo "CHF: " . $tour->getPrice() . ".-" ?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['HIKESHOW_PLACE']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="av_space"><?php echo $inscription->getFreeSpace(); ?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['HIKESHOW_ANMELDESCHLUSS']; ?></span>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <label id="expiration"><?php echo $inscription->getExpirationDate(); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br>

    <div class="main-1">
        <div class="container">
            <div class="register">
                <form action="<?php echo URL_DIR . 'inscription/validateParticipants_Inscription'; ?>" method="post">
                    <div class="register-top-grid">
                        <h3><?php echo $lang['HIKESHOW_INSCRIPTION']; ?></h3>

                        <a class="news-letter">
                            <label class="checkbox">
                                <input type="checkbox" id="checkb" name="rememberMe" onclick="selectAccount()"><i> </i>
                                <?php echo $lang['HIKESHOW_JOIN']; ?>
                            </label>
                        </a>
                        <label class="error"><?php
                            if (isset($_SESSION['error_msg'])){
                                if ($_SESSION['error_msg'] == 1)
                                    echo $lang['SHOWHIKE_ACCOUNT_ALREADY_INSCRIPTED'];
                                if ($_SESSION['error_msg'] == 2)
                                    echo $lang['SHOWHIKE_ACCOUNT_ALREADY_INSCRIPTION'];
                                if ($_SESSION['error_msg'] == 3)
                                    echo $lang['SHOWHIKE_INSCRIPTION_NO_SPACE_PART'];
                                if ($_SESSION['error_msg'] == 4)
                                    echo $lang['SHOWHIKE_INSCRIPTION_NO_SPACE'];
                                if ($_SESSION['error_msg'] == 5)
                                    echo $lang['SHOWHIKE_INSCRIPTION_BOOKED_OUT'];
                                if ($_SESSION['error_msg'] == 6)
                                    echo $lang['SHOWHIKE_INSCRIPTION_CANCELED'];
                            }
                            ?>
                        </label>
                        <div class="participants" style="width: 100%;">

                            <span><?php echo $lang['HIKESHOW_FRIENDS']; ?></span>

                            <div class="participantsInputs" style="width: 100%;">
                                <button class="add_field_button"><?php echo $lang['HIKESHOW_MORE_FRIENDS']; ?></button>
                                </br>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="register-but">
                            <input type="submit" value="<?php echo $lang['HIKESHOW_SAVE']; ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="register">
            <div class="register-top-grid">
                <h3><?php echo $lang['HIKESHOW_RATING']; ?></h3>
                <label class="error">
                    <?php
                    if (isset($_SESSION['error_account_rating'])) {
                        echo $lang['SHOWHIKE_ACCOUNT_ALREADY_RATED'];
                    }
                    ?>
                </label>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <!-- gez rating comment -->
                    <textarea id="input_comment" rows="3" placeholder="Hier könnte deine Meinung veröffentlicht werden..."
                              style="width: 400px;"></textarea>
                    <button onclick="validateRating()" class="add_comment_field"><?php echo $lang['HIKESHOW_RATING_PUBLIC']; ?></button>
                    </br>
                    </br>
                    <div class="rating">
                        <?php echo elementsController::comments();?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
unset($_SESSION['error_msg']);
unset($_SESSION['account_participant']);
unset($_SESSION['error_account_rating']);
include_once ROOT_DIR . 'views/footer.inc';
?>