<?php
/**
 * Created by PhpStorm.
 * User: vm
 * Date: 14.10.2016
 * Time: 09:26
 */
include_once ROOT_DIR. '/views/headeradmin.inc';

$tour = Tour::selectTour(1);
$manageTourInfos = array();
$manageTourInfos['idTour'] = $tour->getIdTour();
$manageTourInfos['idTourDesc'] = $tour->getIdLanguageDescription();
$_SESSION['manageTour'] = $manageTourInfos;

// gez: get the inscription object
$inscription = Inscription::selectInscriptionByIdTour($tour->getIdTour());

//http://www.the-art-of-web.com/javascript/validate-date/
?>
<script>

    var readySubmit = false;

    $(document).ready(function () {
        $('#menu_hiking').addClass('active');
    });

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
        $('#btn-save').click(function() {
            checked = $("input[id=typetour]:checked").length;

            if(!checked) {
                document.getElementById('selectCheck').style.display = 'block';
                readySubmit = false;
                return false;
            }
            else{
                document.getElementById('selectCheck').style.display = 'none';
                readySubmit = true;
            }
        });
    });

    function edit () {
        document.getElementById("hike").removeAttribute("disabled");
        document.getElementById("lang").removeAttribute("disabled");
        document.getElementById("sub").removeAttribute("disabled");
        document.getElementById("dur").removeAttribute("disabled");
        document.getElementById("loc").removeAttribute("disabled");
        document.getElementById("postcodeDep").removeAttribute("disabled");
        document.getElementById("postcodeArriv").removeAttribute("disabled");
        document.getElementById("meeting").removeAttribute("disabled");
        document.getElementById("price").removeAttribute("disabled");
        document.getElementById("descDE").removeAttribute("disabled");
        document.getElementById("descFR").removeAttribute("disabled");
        document.getElementById("sdate").removeAttribute("disabled");
        document.getElementById("edate").removeAttribute("disabled");
        document.getElementById("deptime").removeAttribute("disabled");
        document.getElementById("artime").removeAttribute("disabled");
        document.getElementById("stat").removeAttribute("disabled");
        document.getElementById("field").removeAttribute("disabled");
        document.getElementById("fieldtour").removeAttribute("disabled");
        document.getElementById("img").removeAttribute("disabled");
        document.getElementById("exdate").removeAttribute("disabled");
        document.getElementById("a_places").removeAttribute("disabled");
        document.getElementById("notes_guide").removeAttribute("disabled");

        document.getElementById("btn-save").style.display = "inline";
        document.getElementById("btn-edit").style.display = "none";

    }

    function save () {
        document.getElementById('manageTour').submit();
    }

</script>

<div class="main-1">
    <div class="container">
        <div class="register">
            <form action="<?php echo URL_DIR.'tour/updateTour';?>" id="manageTour" method="post" enctype="multipart/form-data">
                <div class="register-top-grid">
                    <h3>MANAGE HIKE</h3>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Hike</span>
                        <input type="text" id="hike" name="hikeName" value="<?php echo $tour->getTitle();?>" disabled required>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>difficulty</span>
                        <select name="difficulty" id="lang" name="difficulty" disabled>
                            <?php for($i=0; $i<3;$i++){
                                if(($i+1) === $tour->getDifficulty()){
                                    echo "<option value='" . ($i+1) . "' selected=selected>" . ($i+1) . "</option>";
                                }
                                else{
                                    echo "<option value='" . ($i+1) . "'>" . ($i+1) . "</option>";
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Subtitle</span>
                        <input type="text" id="sub" name="subtitle" value="<?php echo $tour->getSubtitle();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Duration</span>
                        <input type="text" onkeypress='return validateQty(event);' id="dur" name="duration" value="<?php echo $tour->getDuration();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Location Departure</span>
                        <input type="text" id="meeting" name="locationDep" value="<?php echo $tour->getLocationDep()->getLocationName();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Postcode Departure</span>
                        <input type="text" id="postcodeDep" name="postcodeDep" value="<?php echo $tour->getLocationDep()->getPostcode();?>" required disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Location Arrival</span>
                        <input type="text" id="loc" name="locationArriv" value="<?php echo $tour->getLocationArriv()->getLocationName();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Postcode arrival</span>
                        <input type="text" id="postcodeArriv" name="postcodeArriv" value="<?php echo $tour->getLocationArriv()->getPostcode();?>" required disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Price</span>
                        <input type="text" onkeypress='return validateQty(event);' id="price" name="price" value="<?php echo $tour->getPrice();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description DE</span>
                        <input class="MyClass" type="text" id="descDE" name="descDE" value="<?php echo $tour->getLanguageDescriptionDE();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description FR</span>
                        <input type="text" id="descFR" name="descFR" value="<?php echo $tour->getLanguageDescriptionFR();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Start Date</span>
                        <input type="text" id="sdate" name="sdate" value="<?php echo $tour->getStartDate();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>End Date</span>
                        <input type="text" id="edate" name="edate" value="<?php echo $tour->getEndDate();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Departure Time</span>
                        <input type="text" id="deptime" name="deptime" value="<?php echo $tour->getDepartTime();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Arrival Time</span>
                        <input type="text" id="artime" name="artime" value="<?php echo $tour->getArrivalTime();?>" disabled required>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Status</span>
                        <select name="stat" id="stat" name="stat" disabled>
                            <?php elementsController::statusSelect(true, $tour->getStatus()->getIdStatus());?>
                        </select>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Transport</span>
                        <fieldset id="field" name="fieldtransport" disabled>
                            <?php elementsController::transportCheckbox(true, $tour->getIdTour());?>
                        </fieldset>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Tour Type</span>
                        <fieldset id="fieldtour" name="fieldtour" disabled>
                            <?php elementsController::typeTourCheckbox(true, $tour->getIdTour());?>
                            <label id="selectCheck" class="error" style="display:none">Please choose at least one type</label>
                        </fieldset>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Image</span>
                        <input type="file" id="img" name="img" accept="image/gif, image/jpeg, image/png" disabled>
                    </div>

                    <!-- gez: for inscription necessary infos! -->
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Expiration Date</span>
                        <input type="text" id="exdate" name="exdate" disabled value="<?php echo $inscription->getExpirationDate();?>" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Available Places</span>
                        <input type="number" id="a_places" name="a_places" disabled value="<?php echo $inscription->getMaxInscriptions();?>" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Notes for tourguide</span>
                        <input type="text" id="notes_guide" name="notes_guide" disabled value="<?php echo $inscription->getInformation();?>">
                    </div>

                </div>

                <div class="register-but">
                    <button id ="btn-save" type="submit" class="btn btn-primary" style="display: none">Save</button>
                    <a id ="btn-edit" onclick="edit()" class="btn btn-primary">Edit</a>
                </div>

            </form>
        </div>
    </div>
</div>



<?php
include_once ROOT_DIR . '/views/footer.inc';
?>
