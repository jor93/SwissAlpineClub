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
                <li class="mix color-1 fav1 check1 radio2 region3 duration-2"><img src="/<?php echo SITE_NAME; ?>/images/img-1.jpg" alt="Image 1"></li>
                <li class="mix color-2 check2 radio2 region2 duration-5"><img src="/<?php echo SITE_NAME; ?>/images/img-2.jpg" alt="Image 2"></li>
                <li class="mix color-1 check3 radio3 region1 duration-7"><img src="/<?php echo SITE_NAME; ?>/images/img-3.jpg" alt="Image 3"></li>
                <li class="mix color-1 check3 radio2 region2 duration-7"><img src="/<?php echo SITE_NAME; ?>/images/img-4.jpg" alt="Image 4"></li>
                <li class="mix color-1 check1 radio3 region2 duration-3"><img src="/<?php echo SITE_NAME; ?>/images/img-5.jpg" alt="Image 5"></li>
                <li class="mix color-2 fav1 check2 radio3 region1 duration-4"><img src="/<?php echo SITE_NAME; ?>/images/img-6.jpg" alt="Image 6"></li>
                <li class="mix color-2 check2 radio2 region3 duration-1"><img src="/<?php echo SITE_NAME; ?>/images/img-7.jpg" alt="Image 7"></li>
                <li class="mix color-1 check1 radio3 region2 duration-8"><img src="/<?php echo SITE_NAME; ?>/images/img-8.jpg" alt="Image 8"></li>
                <li class="mix color-2 check1 radio2 region1 duration-7"><img src="/<?php echo SITE_NAME; ?>/images/img-9.jpg" alt="Image 9"></li>
                <li class="mix color-1 check3 radio2 region3 duration-7"><img src="/<?php echo SITE_NAME; ?>/images/img-10.jpg" alt="Image 10"></li>
                <li class="mix color-1 check3 radio3 region2 duration-7"><img src="/<?php echo SITE_NAME; ?>/images/img-11.jpg" alt="Image 11"></li>
                <li class="mix color-2 check1 radio3 region1 duration-7"><img src="/<?php echo SITE_NAME; ?>/images/img-12.jpg" alt="Image 12"></li>
                <li class="gap"></li>
                <li class="gap"></li>
                <li class="gap"></li>
            </ul>
            <div class="cd-fail-message">No results found</div>
        </section> <!-- cd-gallery -->

        <div class="cd-filter">
            <form>
                <div class="cd-filter-block">
                    <h4>Search</h4>

                    <div class="cd-filter-content">
                        <input type="search" placeholder="search...">
                    </div> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->
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
                    <h4>Check boxes</h4>

                    <ul class="cd-filter-content cd-filters list">
                        <li>
                            <input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
                            <label class="checkbox-label" for="checkbox1">Option 1</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
                            <label class="checkbox-label" for="checkbox2">Option 2</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
                            <label class="checkbox-label" for="checkbox3">Option 3</label>
                        </li>
                    </ul> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block">
                    <h4>Select</h4>

                    <div class="cd-filter-content">
                        <div class="cd-select cd-filters">
                            <select class="filter" name="selectThis" id="selectThis">
                                <option value="">Choose an option</option>
                                <option value=".region1">Oberwallis</option>
                                <option value=".region2">Mittelwallis</option>
                                <option value=".region3">Unterwallis</option>
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