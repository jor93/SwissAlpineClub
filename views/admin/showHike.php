<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 14.10.2016
 * Time: 09:26
 */
$header = Controller::checkHeader();
include_once $header;
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
    $(document).ready(function () {
        $('#menu_showHike').addClass('active');

    });

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

    $(document).ready(function () {
        $('#checkBtn').click(function() {
            if (typeof FileReader !== "undefined") {
                var size = document.getElementById('img').files[0].size;
                if(500000 < size){
                    document.getElementById('selectImageCheck').style.display = 'block';
                    return false;
                }
                else{
                    document.getElementById('selectImageCheck').style.display = 'none';
                }
            }
        });
    });

    $(document).ready(function () {
        $('#checkBtn').click(function() {
            // regular expression to match required time format
            var re = /^\d{1,2}:\d{2}([ap]m)?$/;

            if(document.getElementById('deptime').value != '' && !document.getElementById('deptime').value.match(re)) {
                document.getElementById('selectCheckTimeDep').style.display = 'block';
                return false;
            }

            document.getElementById('selectCheckTimeDep').style.display = 'none';
            return true;
        });
    });

    $(document).ready(function () {
        $('#checkBtn').click(function() {
            // regular expression to match required time format
            var re = /^\d{1,2}:\d{2}([ap]m)?$/;

            if(document.getElementById('artime').value != '' && !document.getElementById('artime').value.match(re)) {
                document.getElementById('selectCheckTimeAr').style.display = 'block';
                return false;
            }

            document.getElementById('selectCheckTimeAr').style.display = 'none';
            return true;
        });
    });


</script>

<div class="main-1">
    <div class="container">
        <div class="register">
            <form id="editForm" action="<?php echo URL_DIR.'tour/insertTour';?>" method="post" enctype="multipart/form-data">
                <div class="register-top-grid">
                    <h3><?php echo $lang['SHOWHIKEADMIN_TITLE']; ?></h3>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_TOUR']; ?></span>
                        <input type="text" id="hike" name="hikeName" required>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_DIFF']; ?></span>
                        <select name="difficulty" id="lang">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_SUBTITLE']; ?></span>
                        <input type="text" id="subtitle" name="subtitle" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_DURATION']; ?></span>
                        <input type="text" onkeypress='return validateQty(event);' id="dur" name="duration" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_ZIPDEP']; ?></span>
                        <input type="text" onkeypress='return validateQty(event);' id="plz_dep" name="postcodeDep" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_LOCDEP']; ?></span>
                        <input type="text" id="loc_dep" name="locationDep" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_ZIPARR']; ?></span>
                        <input type="text" onkeypress='return validateQty(event);' id="plz_arr" name="postcodeArriv" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_LOCARR']; ?></span>
                        <input type="text" id="loc_arr" name="locationArriv" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_PRICE']; ?></span>
                        <input type="text" onkeypress='return validateQty(event);' id="price" name="price" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_DESCDE']; ?></span>
                        <input type="text" id="desc" name="descDE" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_DESCFR']; ?></span>
                        <input type="text" id="desc" name="descFR" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_STARTDATE']; ?></span>
                        <input type="text" id="sdate" name="sdate" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_ENDDATE']; ?></span>
                        <input type="text" id="edate" name="edate" required>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_DEPTIME']; ?></span>
                        <input type="text" id="deptime" name="deptime" required>
                        <label id="selectCheckTimeDep" class="error" style="display:none"><?php echo $lang['SHOWHIKEADMIN_ERRORTIME']; ?></label>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_ARRTIME']; ?></span>
                        <input type="text" id="artime" name="artime" required>
                        <label id="selectCheckTimeAr" class="error" style="display:none"><?php echo $lang['SHOWHIKEADMIN_ERRORTIME']; ?></label>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_STATUS']; ?></span>
                        <select name="stat" id="stat">
                        <?php elementsController::statusSelect(false, 0);?>
                        </select>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_TRANSPORT']; ?></span>
                        <?php elementsController::transportCheckbox(false, 0);?>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_TYPE']; ?></span>
                        <?php elementsController::typeTourCheckbox(false, 0);?>
                        <label id="selectCheck" class="error" style="display:none"><?php echo $lang['SHOWHIKEADMIN_TYPE_DESC']; ?></label>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_IMG']; ?></span>
                        <input type="file" id="img" name="img" accept="image/gif, image/jpeg, image/png" required>
                        <label id="selectImageCheck" class="error" style="display:none"><?php echo $lang['SHOWHIKEADMIN_IMGERROR']; ?></label>
                    </div>

                    <!-- gez: for inscription necessary infos! -->
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_EXPDATE']; ?></span>
                        <input type="text" id="exdate" name="exdate" required style="background: url(<?php echo SITE_NAME; ?>/images/calendar-128.png) no-repeat scroll center right; background-size: 2.5em; " size="30">
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_AVPLACE']; ?></span>
                        <input type="text" onkeypress='return validateQty(event);' id="a_places" name="a_places" required>
                        <?php if (isset($_SESSION['available'])){
                            echo $lang['SHOWHIKE_AVAILABLE_PLACES_ERROR'];
                        } ?>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWHIKEADMIN_NOTES']; ?></span>
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
