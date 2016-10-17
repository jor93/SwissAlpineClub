<?php
/**
 * Created by PhpStorm.
 * User: sandro
 * Date: 28.09.2016
 * Time: 14:25
 */

    include_once '/header.inc';
?>

<script>
    $(document).ready(function () {
        $('#menu_hiking').addClass('active');
    });
</script>


<div class="container">
    <div class="col-lg-3">
        <!-- Filter Controls - Simple Mode -->
        <div class="row">
            <!-- A basic setup of simple mode filter controls, all you have to do is use data-filter="all"
            for an unfiltered gallery and then the values of your categories to filter between them -->
            <ul class="simplefilter">
                Simple filter controls:
                <li class="active" data-filter="all">All</li>
                <li data-filter="1">Cityscape</li>
                <li data-filter="2">Landscape</li>
                <li data-filter="3">Industrial</li>
                <li data-filter="4">Daylight</li>
                <li data-filter="5">Nightscape</li>
            </ul>
        </div>

        <!-- Filter Controls - Multifilter Mode -->
        <div class="row">
            <!-- A basic setup of multifilter controls, when the user toggles a category
            the corresponding items are rendered or hidden -->
            <ul class="multifilter">
            Multifilter controls:
                <li data-multifilter="1">Cityscape</li>
                <li data-multifilter="2">Landscape</li>
                <li data-multifilter="3">Industrial</li>
            </ul>
        </div>

        <!-- Range filter -->
        <div class="row">
            <input
                range-filter
                class="rangefilter"
                data-addui='slider'
                data-min='0'
                data-max='24'
                data-range='true'
                value='0,24'
            />
            <input id="test" value=0 type="text">
        </div>
        <div class="row">
            <div class="input-append date" id="dp3" data-date-format="dd-mm-yyyy">
                <input id="datepicker" class="span2" size="16" type="text" value="">
                <span class="add-on"><i class="icon-th"></i></span>
            </div>
        </div>
        <!-- Shuffle & Sort Controls -->
        <div class="row">
            <ul class="sortandshuffle">
            Sort &amp; Shuffle controls:
                <!-- Basic shuffle control -->
                <li class="shuffle-btn" data-shuffle>Shuffle</li>
                <!-- Basic sort controls consisting of asc/desc button and a select -->
                <li class="sort-btn active" data-sortAsc>Asc</li>
                <li class="sort-btn" data-sortDesc>Desc</li>
                <select data-sortOrder>
                    <option value="domIndex">
                    Position
                    </option>
                    <option value="sortData">
                    Description
                    </option>
                </select>
            </ul>
        </div>
        <!-- Search control -->
        <div class="row search-row">
        Search control:
            <input type="text" class="filtr-search" name="filtr-search" data-search>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
            attribute, which starts from the value 1 and goes up from there -->
            <div class="filtr-container">
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-duration="4" data-category="1, 5" data-sort="Busy streets">
                    <img class="img-responsive" src="../images/img/city_1.jpg" alt="sample image">
                    <span class="item-desc">Busy Streets</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-duration="4" data-category="2, 5" data-sort="Luminous night">
                    <img class="img-responsive" src="../images/img/nature_2.jpg" alt="sample image">
                    <span class="item-desc">Luminous night</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-duration="4" data-category="1, 4" data-sort="City wonders">
                    <img class="img-responsive" src="../images/img/city_3.jpg" alt="sample image">
                    <span class="item-desc">city wonders</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-duration="7" data-category="3" data-sort="In production">
                    <img class="img-responsive" src="../images/img/industrial_1.jpg" alt="sample image">
                    <span class="item-desc">in production</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-duration="2" data-category="3, 4" data-sort="Industrial site">
                    <img class="img-responsive" src="../images/img/industrial_2.jpg" alt="sample image">
                    <span class="item-desc">Montana Hike</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-duration="3" data-category="2, 4" data-sort="Peaceful lake">
                    <img class="img-responsive" src="../images/img/nature_1.jpg" alt="sample image">
                    <span class="item-desc">Gemmiwand</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-duration="4" data-category="1, 5" data-sort="City lights">
                    <img class="img-responsive" src="../images/img/city_2.jpg" alt="sample image">
                    <span class="item-desc">city lights</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-duration="4" data-category="2, 4" data-sort="Dreamhouse">
                    <img class="img-responsive" src="../images/img/nature_3.jpg" alt="sample image">
                    <span class="item-desc">dreamhouse</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-duration="4" data-category="3" data-sort="Sierre - Montana">
                    <img class="img-responsive" src="../images/img/industrial_3.jpg" alt="sample image">
                    <span class="item-desc">restless machines</span>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Include jQuery & Filterizr -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src='../js/Obj.min.js'></script>
    <script src='../js/addSlider.js'></script>
    <script src="../js/jquery.filterizr.js"></script>
    <script src="../js/controls.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>


    <!-- Kick off Filterizr -->
    <script type="text/javascript">
    $(function() {
        //Initialize filterizr with default options
        $('.filtr-container').filterizr();
    });
    </script>

    <!-- Kick off Datepicker -->
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>


<?php
include_once 'footer.inc';
?>