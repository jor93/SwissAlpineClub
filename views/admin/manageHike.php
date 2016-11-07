<?php
/**
 * Created by PhpStorm.
 * User: vm
 * Date: 14.10.2016
 * Time: 09:26
 */
$header = Controller::checkHeader();
include_once $header;

$tour = Tour::selectTour(1);
$manageTourInfos = array();
$manageTourInfos['idTour'] = $tour->getIdTour();
$manageTourInfos['idTourDesc'] = $tour->getIdLanguageDescription();
$_SESSION['manageTour'] = $manageTourInfos;

// gez: get the inscription object
$inscription = Inscription::selectInscriptionByIdTour($tour->getIdTour());

//http://www.the-art-of-web.com/javascript/validate-date/
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
$query = "select distinct CONCAT(Postcode, ', ' ,LocationName) from location;";
$data = array();
$data = SQL::getInstance()->select($query)->fetchAll();
$length = count($data);
for ($i = 0; $i < $length; ++$i) {
    $data2[$i] = $data[$i][0];
}
echo '<script>var myarray = '.json_encode($data2) .';</script>';

?>

<script>

    var MIN_LENGTH = 2;
    $( document ).ready(function() {
        $("#plz_arr").keyup(function() {
            var keyword = $("#plz_arr").val();
            if (keyword.length >= MIN_LENGTH) {
                ;                  $(document).ready(function() {
                    $( "#plz_arr" ).autocomplete({
                        source: myarray,
                        select: function (event, ui) {
                            event.preventDefault();
                            var s = ui.item.value;
                            $("#plz_arr").val(s.substring(0, s.indexOf(',')));
                            $("#loc_arr").val(s.substring(s.indexOf(',')+2, s.length));
                        }
                    });
                });
            }
        });
    });
    $( document ).ready(function() {
        $("#plz_dep").keyup(function() {
            var keyword = $("#plz_dep").val();
            if (keyword.length >= MIN_LENGTH) {
                ;                  $(document).ready(function() {
                    $( "#plz_dep" ).autocomplete({
                        source: myarray,
                        select: function (event, ui) {
                            event.preventDefault();
                            var s = ui.item.value;
                            $("#plz_dep").val(s.substring(0, s.indexOf(',')));
                            $("#loc_dep").val(s.substring(s.indexOf(',')+2, s.length));
                        }
                    });
                });
            }
        });
    });


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
        document.getElementById("loc_dep").removeAttribute("disabled");
        document.getElementById("plz_dep").removeAttribute("disabled");
        document.getElementById("plz_arr").removeAttribute("disabled");
        document.getElementById("loc_arr").removeAttribute("disabled");
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
                    <h3><?php echo $lang['SHOWHIKEADMIN_TITLE']; ?></h3>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_TOUR']; ?></span>
                        <input type="text" id="hike" name="hikeName" value="<?php echo $tour->getTitle();?>" disabled required>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_DIFF']; ?></span>
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
                        <span><?php echo $lang['SHOWHIKEADMIN_SUBTITLE']; ?></span>
                        <input type="text" id="sub" name="subtitle" value="<?php echo $tour->getSubtitle();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_DURATION']; ?></span>
                        <input type="text" onkeypress='return validateQty(event);' id="dur" name="duration" value="<?php echo $tour->getDuration();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_ZIPDEP']; ?></span>
                        <input type="text" id="plz_dep" name="postcodeDep" value="<?php echo $tour->getLocationDep()->getPostcode();?>" required disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_LOCDEP']; ?></span>
                        <input type="text" id="loc_dep" name="locationDep" value="<?php echo $tour->getLocationDep()->getLocationName();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_ZIPARR']; ?></span>
                        <input type="text" id="plz_arr" name="postcodeArriv" value="<?php echo $tour->getLocationArriv()->getPostcode();?>" required disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_LOCARR']; ?></span>
                        <input type="text" id="loc_arr" name="locationArriv" value="<?php echo $tour->getLocationArriv()->getLocationName();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_PRICE']; ?></span>
                        <input type="text" onkeypress='return validateQty(event);' id="price" name="price" value="<?php echo $tour->getPrice();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_DESCDE']; ?></span>
                        <input class="MyClass" type="text" id="descDE" name="descDE" value="<?php echo $tour->getLanguageDescriptionDE();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_DESCFR']; ?></span>
                        <input type="text" id="descFR" name="descFR" value="<?php echo $tour->getLanguageDescriptionFR();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_STARTDATE']; ?></span>
                        <input type="text" id="sdate" name="sdate" value="<?php echo $tour->getStartDate();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_ENDDATE']; ?></span>
                        <input type="text" id="edate" name="edate" value="<?php echo $tour->getEndDate();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_DEPTIME']; ?></span>
                        <input type="text" id="deptime" name="deptime" value="<?php echo $tour->getDepartTime();?>" disabled required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_ARRTIME']; ?></span>
                        <input type="text" id="artime" name="artime" value="<?php echo $tour->getArrivalTime();?>" disabled required>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_STATUS']; ?></span>
                        <select name="stat" id="stat" name="stat" disabled>
                            <?php elementsController::statusSelect(true, $tour->getStatus()->getIdStatus());?>
                        </select>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_TRANSPORT']; ?></span>
                        <fieldset id="field" name="fieldtransport" disabled>
                            <?php elementsController::transportCheckbox(true, $tour->getIdTour());?>
                        </fieldset>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_TYPE']; ?></span>
                        <fieldset id="fieldtour" name="fieldtour" disabled>
                            <?php elementsController::typeTourCheckbox(true, $tour->getIdTour());?>
                            <label id="selectCheck" class="error" style="display:none">Please choose at least one type</label>
                        </fieldset>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_IMG']; ?></span>
                        <input type="file" id="img" name="img" accept="image/gif, image/jpeg, image/png" disabled>
                    </div>

                    <!-- gez: for inscription necessary infos! -->
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_EXPDATE']; ?></span>
                        <input type="text" id="exdate" name="exdate" disabled value="<?php echo $inscription->getExpirationDate();?>" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_AVPLACE']; ?></span>
                        <input type="number" id="a_places" name="a_places" disabled value="<?php echo $inscription->getMaxInscriptions();?>" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_NOTES']; ?></span>
                        <input type="text" id="notes_guide" name="notes_guide" disabled value="<?php echo $inscription->getInformation();?>">
                    </div>

                </div>

                <div class="register-but">
                    <button id ="btn-save" type="submit" class="btn btn-primary" style="display: none"><?php echo $lang['SHOWADMIN_SAVE']; ?></button>
                    <a id ="btn-edit" onclick="edit()" class="btn btn-primary"><?php echo $lang['SHOWADMIN_EDIT']; ?></a>
                </div>

            </form>
        </div>
    </div>
</div>



<?php
include_once ROOT_DIR . '/views/footer.inc';
?>
