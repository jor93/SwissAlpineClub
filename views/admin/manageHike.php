<?php
/**
 * Created by PhpStorm.
 * User: vm
 * Date: 14.10.2016
 * Time: 09:26
 */
include_once ROOT_DIR. '/views/headeradmin.inc';

$tour = Tour::selectTour(36);
$manageTourInfos = array();
$manageTourInfos['idTour'] = $tour->getIdTour();
$manageTourInfos['idTourDesc'] = $tour->getIdLanguageDescription();
$_SESSION['manageTour'] = $manageTourInfos;
?>
<script>
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
    } );

    function edit () {
        document.getElementById("hike").removeAttribute("disabled");
        document.getElementById("lang").removeAttribute("disabled");
        document.getElementById("sub").removeAttribute("disabled");
        document.getElementById("dur").removeAttribute("disabled");
        document.getElementById("loc").removeAttribute("disabled");
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

        document.getElementById("btn-save").style.display = "inline";
        document.getElementById("btn-edit").style.display = "none";

    }
    function save () {

        document.getElementById('manageTour').submit();

        document.getElementById("btn-save").style.display = "none";
        document.getElementById("btn-edit").style.display = "inline";

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
                        <input type="text" id="hike" name="hikeName" value="<?php echo $tour->getTitle();?>" disabled>
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
                        <input type="text" id="sub" name="subtitle" value="<?php echo $tour->getSubtitle();?>" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Duration</span>
                        <input type="text" id="dur" name="duration" value="<?php echo $tour->getDuration();?>" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Location Departure</span>
                        <input type="text" id="meeting" name="locationDep" value="<?php echo $tour->getLocationDep()->getLocationName();?>" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Location Arrival</span>
                        <input type="text" id="loc" name="locationArriv" value="<?php echo $tour->getLocationArriv()->getLocationName();?>" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Price</span>
                        <input type="text" id="price" name="price" value="<?php echo $tour->getPrice();?>" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description DE</span>
                        <input type="text" id="descDE" name="descDE" value="<?php echo $tour->getLanguageDescriptionDE();?>" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description FR</span>
                        <input type="text" id="descFR" name="descFR" value="<?php echo $tour->getLanguageDescriptionFR();?>" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Start Date</span>
                        <input type="text" id="sdate" name="sdate" value="<?php echo $tour->getStartDate();?>" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>End Date</span>
                        <input type="text" id="edate" name="edate" value="<?php echo $tour->getEndDate();?>" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Departure Time</span>
                        <input type="text" id="deptime" name="deptime" value="<?php echo $tour->getDepartTime();?>" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Arrival Time</span>
                        <input type="text" id="artime" name="artime" value="<?php echo $tour->getArrivalTime();?>" disabled>
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
                        </fieldset>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Image</span>
                        <input type="file" id="img" name="img" accept="image/gif, image/jpeg, image/png" disabled>
                    </div>

                </div>

                <div class="register-but">
                    <a id ="btn-save" onclick="save()" class="btn btn-primary" style="display: none">Save</a>
                    <a id ="btn-edit" onclick="edit()" class="btn btn-primary">Edit</a>
                </div>

            </form>
        </div>
    </div>
</div>



<?php
include_once ROOT_DIR . '/views/footer.inc';
?>
