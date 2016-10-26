<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 28.09.2016
 * Time: 14:01
 */
include_once ROOT_DIR.'views/header.inc';
?>

<script language="jquery" type="text/javascript">
    $(document).ready(function () {
        $('#menu_registration').addClass('active');
    });

    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".participantsInputs"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 0; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            x++; //text box increment
            if (x > max_fields)
                alert('Sie können maximal ' + max_fields + ' zusätzliche Personen buchen!');

            if(x <= max_fields){ //max input box allowed
                $(wrapper).append('<div><input type="text" name="mytext[]" placeholder="Vorname"/><input type="text" name="mytext[]"placeholder="Nachname"/><input type="text" name="mytext[]"placeholder="Vergünstigungen"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>

<div class="main-1">
    <div class="container">
        <div class="register">
            <form onsubmit="return false">
                <div class="register-top-grid">
                    <h3>PERSONAL INFORMATION</h3>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Tour</span>
                        <label type="text" id="tour" name="tour" disabled>
                    </div>
                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Status</span>
                        <label type="email" id="mail" name="email" disabled>
                            <span id="label_fail_mail" class="error" >The E-Mail address is not valid</span>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>How many people</span>
                        <label type="number" id="amount" name="amount" required>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Anmeldefrist</span>
                        <label type="text" id="date" name="date" disabled>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Information</span>
                        <label type="text" id="info" name="information" style="width: 100%; height: 115px;" disabled>
                    </div>
                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Wie viele Teilnehmer möchte ich anmelden (exkl. mir)?</span>
                    </div>
                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Nehme ich auch teil?</span>
                        <input type="checkbox" id="me" name="me" required>
                    </div>

                    <div class="participants"style="width: 100%;">

                        <span>Meine Freunde:</span>

                        <div class="participantsInputs" style="width: 100%;">
                            <button class="add_field_button">Add More Fields</button>
                            </br>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="register-but">
                        <input type="submit" value="Speichern" onclick="letsgo()">
                    </div>



                </div>


            </form>
        </div>
    </div>


</div>

<?php
include_once ROOT_DIR.'views/footer.inc';
?>
