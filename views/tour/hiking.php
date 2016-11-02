<?php
/**
 * Created by PhpStorm.
 * User: sandro
 * Date: 28.09.2016
 * Time: 14:25
 */

    include_once ROOT_DIR.'views/header.inc';
?>

<script>
    $(document).ready(function () {
        $('#menu_hiking').addClass('active');
    });
</script>


    <main class="cd-main-content">
        <div class="cd-tab-filter-wrapper">
            <div class="cd-tab-filter">
                <ul class="cd-filters">
                    <li class="placeholder">
                        <a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
                    </li>
                    <li class="filter"><a class="selected" href="#0" data-type="all">All</a></li>
                    <li class="filter" data-filter=".fav1"><a href="#0" data-type="color-1">Favorites</a></li>
                </ul> <!-- cd-filters -->
            </div> <!-- cd-tab-filter -->
        </div> <!-- cd-tab-filter-wrapper -->

        <section class="cd-gallery">
            <ul>
                <?php echo elementsController::selectToursOFF();?>
            </ul>
            <div class="cd-fail-message">No results found</div>
        </section> <!-- cd-gallery -->

        <div class="cd-filter">
            <form>
<!--                <div class="cd-filter-block">
                    <h4>Search</h4>

                    <div class="cd-filter-content">
                        <input type="search" placeholder="search...">
                    </div>  cd-filter-content
                </div>  cd-filter-block -->
                <div class="cd-filter-block">

                    <h4>Date</h4>
                    <div class="cd-filter-content cd-filters list">
                        <input type="text" id="datepicker" readonly style="background: url(/<?php echo SITE_NAME; ?>/images/calendar-128.png) no-repeat scroll center right; background-size: 2.5em; " size="30">
                    </div>
                </div>


                <div class="cd-filter-block">

                    <h4>Duration</h4>
                    <div class="cd-filter-content cd-filters list">
                        <p>
                            <input type="text" id="amount" readonly style="border:0">
                        </p>

                        <div id="slider-range"></div>
                    </div>
                </div>


                <div class="cd-filter-block">
                    <h4>Art der Tour</h4>


                    <ul class="cd-filter-content cd-filters list">
                        <?php echo elementsController::filterTourCheckbox(); ?>
                    </ul> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block">
                    <h4>Region</h4>

                    <div class="cd-filter-content">
                        <div class="cd-select cd-filters">
                            <select class="filter" name="selectThis" id="selectThis">
                                <option value="">Alle Regionen</option>
                                <option value=".region1">Oberwallis</option>
                                <option value=".region2">Mittelwallis</option>
                                <option value=".region3">Unterwallis</option>
                                <option value=".region4">Ausserkantonal</option>
                            </select>
                        </div> <!-- cd-select -->
                    </div> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block">
                    <h4>Difficulty</h4>

                    <div class="cd-filter-content">
                        <div class="cd-select cd-filters">
                            <select class="filter" name="selectThis" id="selectThis">
                                <option value="">All difficulties</option>
                                <option value=".diff1">*</option>
                                <option value=".diff2">**</option>
                                <option value=".diff3">***</option>
                                <option value=".diff4">****</option>
                                <option value=".diff5">*****</option>
                            </select>
                        </div> <!-- cd-select -->
                    </div> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block">
                    <h4>Radio buttons</h4>

                    <ul class="cd-filter-content cd-filters list">
                        <li>
                            <input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
                            <label class="radio-label" for="radio1">All</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
                            <label class="radio-label" for="radio2">Choice 2</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
                            <label class="radio-label" for="radio3">Choice 3</label>
                        </li>
                    </ul> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->
            </form>

            <a href="#0" class="cd-close">Close</a>
        </div> <!-- cd-filter -->

        <a href="#0" class="cd-filter-trigger">Filters</a>
    </main> <!-- cd-main-content -->

    <script src="/<?php echo SITE_NAME; ?>/js/jquery-2.1.1.js"></script>
    <script src="/<?php echo SITE_NAME; ?>/js/main.js"></script> <!-- Resource jQuery -->
    <script src="/<?php echo SITE_NAME; ?>/js/jquery.mixitup.min.js"></script>
    <script src="/<?php echo SITE_NAME; ?>/js/jquery-ui.js"></script>


<?php
include_once ROOT_DIR.'views/footer.inc';
?>