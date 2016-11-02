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
