<?php
/**
 * Created by PhpStorm.
 * User: sandro
 * Date: 28.09.2016
 * Time: 14:25
 */

$header = Controller::checkHeader();
include_once $header;
?>

<script>
    $('#menu_hiking').addClass('active');

    function letsgo($selectedFavorite){
        document.getElementById("saver").value = -1;
        // transfer the id from favorite you wanna delete
        $.ajax({
            type: 'post',
            url: '<?php echo URL_DIR.'favorite/handleFavorites';?>',
            data:{ selectedFav : $selectedFavorite},
            success: function(response) {
                alert(response);
            }
        });
    }

    function showHike($idHike){
        document.getElementById("saver").value = $idHike;
        document.getElementById("manageHikings").submit();
    }
</script>


    <main class="cd-main-content">
        <div class="cd-tab-filter-wrapper">
            <div class="cd-tab-filter">
                <ul class="cd-filters">
                    <li class="placeholder">
                        <a data-type="all" href="#0"><?php echo $lang['HIKING_ALL']; ?> </a> <!-- selected option on mobile -->
                    </li>
                    <li class="filter"><a class="selected" href="#0" data-type="all"><?php echo $lang['HIKING_ALL']; ?></a></li>
                    <li class="filter" data-filter=".fav1"><a href="#0" data-type="color-1"><?php echo $lang['HIKING_FAVORITES']; ?></a></li>
                </ul> <!-- cd-filters -->
            </div> <!-- cd-tab-filter -->
        </div> <!-- cd-tab-filter-wrapper -->


        <form id="manageHikings" action="<?php echo URL_DIR.'tour/hiking';?>" method="post" enctype="multipart/form-data">
        <section class="cd-gallery">
            <ul>
                <?php echo elementsController::favoritesSelect();?>
            </ul>
            <div class="cd-fail-message"><?php echo $lang['NO_RESULTS']; ?></div>
        </section> <!-- cd-gallery -->
        </form>
        <div class="cd-filter">
            <form>
<!--                <div class="cd-filter-block">
                    <h4>Search</h4>

                    <div class="cd-filter-content">
                        <input type="search" placeholder="search...">
                    </div>  cd-filter-content
                </div>  cd-filter-block -->
                <div class="cd-filter-block">

                    <h4><?php echo $lang['HIKING_DATE']; ?></h4>
                    <div class="cd-filter-content cd-filters list">
                        <input type="text" id="datepicker" readonly style="background: url(/<?php echo SITE_NAME; ?>/images/calendar-128.png) no-repeat scroll center right; background-size: 2.5em; " size="30">
                    </div>
                </div>


                <div class="cd-filter-block">

                    <h4><?php echo $lang['HIKING_DURATION']; ?></h4>
                    <div class="cd-filter-content cd-filters list">
                        <p>
                            <input type="text" id="amount" readonly style="border:0">
                        </p>

                        <div id="slider-range"></div>
                    </div>
                </div>


                <div class="cd-filter-block">
                    <h4><?php echo $lang['HIKING_TYPE']; ?></h4>


                    <ul class="cd-filter-content cd-filters list">
                        <?php echo elementsController::filterTourCheckbox(); ?>
                    </ul> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block">
                    <h4><?php echo $lang['HIKING_REGION']; ?></h4>

                    <div class="cd-filter-content">
                        <div class="cd-select cd-filters">
                            <select class="filter" name="selectThis" id="selectThis">
                                <option value=""><?php echo $lang['HIKING_ALLREGIONS']; ?></option>
                                <option value=".region1"><?php echo $lang['HIKING_OW']; ?></option>
                                <option value=".region2"><?php echo $lang['HIKING_MW']; ?></option>
                                <option value=".region3"><?php echo $lang['HIKING_UW']; ?></option>
                                <option value=".region4"><?php echo $lang['HIKING_AK']; ?></option>
                            </select>
                        </div> <!-- cd-select -->
                    </div> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block">
                    <h4><?php echo $lang['HIKING_DIFF']; ?></h4>

                    <div class="cd-filter-content">
                        <div class="cd-select cd-filters">
                            <select class="filter" name="selectThis" id="selectThis">
                                <option value=""><?php echo $lang['HIKING_ALLDIFF']; ?></option>
                                <option value=".diff1">*</option>
                                <option value=".diff2">**</option>
                                <option value=".diff3">***</option>
                                <option value=".diff4">****</option>
                                <option value=".diff5">*****</option>
                            </select>
                        </div> <!-- cd-select -->
                    </div> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->


            </form>

            <a href="#0" class="cd-close"><?php echo $lang['HIKING_CLOSE']; ?></a>
        </div> <!-- cd-filter -->

        <a href="#0" class="cd-filter-trigger"><?php echo $lang['HIKING_FILTER']; ?></a>
    </main> <!-- cd-main-content -->

    <script src="/<?php echo SITE_NAME; ?>/js/jquery-2.1.1.js"></script>
    <script src="/<?php echo SITE_NAME; ?>/js/main.js"></script> <!-- Resource jQuery -->
    <script src="/<?php echo SITE_NAME; ?>/js/jquery.mixitup.min.js"></script>
    <script src="/<?php echo SITE_NAME; ?>/js/jquery-ui.js"></script>


<?php
include_once ROOT_DIR.'views/footer.inc';
?>