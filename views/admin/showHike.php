<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 14.10.2016
 * Time: 09:26
 */
include_once ROOT_DIR. 'views/headeradmin.inc';
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

    $( function() {
        $( "#sdate" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
        $( "#edate" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
        $( "#exdate" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    } );

    function validateQty(event) {
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode == 8 || event.keyCode == 46
            || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 9) {
            return true;
        }
        else if ( key < 48 || key > 57 ) {
            return false;
        }
        else return true;
    };

    $(document).ready(function () {
        $('#checkBtn').click(function() {
            checked = $("input[id=typetour]:checked").length;

            if(!checked) {
                document.getElementById('selectCheck').style.display = 'block';
                return false;
            }
            else{
                document.getElementById('selectCheck').style.display = 'none';
            }
        });
    });


</script>

<div class="main-1">
    <div class="container">
        <div class="register">
            <form id="editForm" action="<?php echo URL_DIR.'tour/insertTour';?>" method="post" enctype="multipart/form-data">
                <div class="register-top-grid">
                    <h3>HIKE INFORMATION</h3>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Hike</span>
                        <input type="text" id="hike" name="hikeName" required>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>difficulty</span>
                        <select name="difficulty" id="lang">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Subtitle</span>
                        <input type="text" id="subtitle" name="subtitle" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Duration</span>
                        <input type="text" onkeypress='return validateQty(event);' id="dur" name="duration" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Location Departure</span>
                        <input type="text" id="locationDep" name="locationDep" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Postcode Departure</span>
                        <input type="text" id="postcodeDep" name="postcodeDep" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Location Arrival</span>
                        <input type="text" id="loc" name="locationArriv" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Postcode arrival</span>
                        <input type="text" id="postcodeArriv" name="postcodeArriv" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Price</span>
                        <input type="text" onkeypress='return validateQty(event);' id="price" name="price" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description Deutsch</span>
                        <input type="text" id="desc" name="descDE" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description Franzoesisch</span>
                        <input type="text" id="desc" name="descFR" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Start Date</span>
                        <input type="text" id="sdate" name="sdate" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>End Date</span>
                        <input type="text" id="edate" name="edate" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Departure Time</span>
                        <input type="text" id="deptime" name="deptime" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Arrival Time</span>
                        <input type="text" id="artime" name="artime" required>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Status</span>
                        <select name="stat" id="stat">
                        <?php elementsController::statusSelect(false, 0);?>
                        </select>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Transport</span>
                        <?php elementsController::transportCheckbox(false, 0);?>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Tour Type</span>
                        <?php elementsController::typeTourCheckbox(false, 0);?>
                        <label id="selectCheck" class="error" style="display:none">Please choose at least one type</label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Image</span>
                        <input type="file" id="img" name="img" accept="image/gif, image/jpeg, image/png">
                    </div>

                    <!-- gez: for inscription necessary infos! -->
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Expiration Date</span>
                        <input type="text" id="exdate" name="exdate" required style="background: url(<?php echo SITE_NAME; ?>/images/calendar-128.png) no-repeat scroll center right; background-size: 2.5em; " size="30">
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Available Places</span>
                        <input type="text" onkeypress='return validateQty(event);' id="a_places" name="a_places" required>
                        <?php if (isset($_SESSION['available'])){
                            echo $lang['SHOWHIKE_AVAILABLE_PLACES_ERROR'];
                        } ?>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Notes for tourguide</span>
                        <input type="text" id="notes_guide" name="notes_guide">
                    </div>
                </div>

                <div class="register-but">
                    <input type="submit" id="checkBtn" value="submit" onclick="check()">
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once ROOT_DIR . 'views/footer.inc';
?>
