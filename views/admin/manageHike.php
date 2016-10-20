<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 14.10.2016
 * Time: 09:26
 */
include_once ROOT_DIR. '/views/headeradmin.inc';
?>
<script>
    $(document).ready(function () {
        $('#menu_manageHike').addClass('active');
    });

    function edit () {
        document.getElementById("hike").removeAttribute("disabled");
        document.getElementById("lang").removeAttribute("disabled");
        document.getElementById("high").removeAttribute("disabled");
        document.getElementById("dur").removeAttribute("disabled");
        document.getElementById("loc").removeAttribute("disabled");
        document.getElementById("meeting").removeAttribute("disabled");
        document.getElementById("price").removeAttribute("disabled");
        document.getElementById("desc").removeAttribute("disabled");
        document.getElementById("sdate").removeAttribute("disabled");
        document.getElementById("edate").removeAttribute("disabled");
        document.getElementById("deptime").removeAttribute("disabled");
        document.getElementById("artime").removeAttribute("disabled");
        document.getElementById("stat").removeAttribute("disabled");
        document.getElementById("field").removeAttribute("disabled");
        document.getElementById("fieldtour").removeAttribute("disabled");

        document.getElementById("btn-save").style.display = "inline"
        document.getElementById("btn-edit").style.display = "none";

    }
    function save () {
        document.getElementById("hike").disabled = true;
        document.getElementById("lang").disabled = true;
        document.getElementById("high").disabled = true;
        document.getElementById("dur").disabled = true;
        document.getElementById("loc").disabled = true;
        document.getElementById("meeting").disabled = true;
        document.getElementById("price").disabled = true;
        document.getElementById("desc").disabled = true;
        document.getElementById("sdate").disabled = true;
        document.getElementById("edate").disabled = true;
        document.getElementById("deptime").disabled = true;
        document.getElementById("artime").disabled = true;
        document.getElementById("stat").disabled = true;
        document.getElementById("field").disabled = true;
        document.getElementById("fieldtour").disabled = true;

        document.getElementById("btn-save").style.display = "none"
        document.getElementById("btn-edit").style.display = "inline";

    }

</script>

<div class="main-1">
    <div class="container">
        <div class="register">
            <form action="<?php echo URL_DIR.'tour/insertTour';?>" method="post" enctype="multipart/form-data">
                <div class="register-top-grid">
                    <h3>MANAGE HIKE</h3>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Hike</span>
                        <input type="text" id="hike" name="hike" disabled>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>difficulty</span>
                        <select name="lang" id="lang" disabled>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Height</span>
                        <input type="text" id="high" name="high" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Duration</span>
                        <input type="text" id="dur" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Meeting Point</span>
                        <input type="text" id="meeting" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Location</span>
                        <input type="text" id="loc" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Price</span>
                        <input type="text" id="price" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Description</span>
                        <input type="text" id="desc" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Start Date</span>
                        <input type="text" id="sdate" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>End Date</span>
                        <input type="text" id="edate"  disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Departure Time</span>
                        <input type="text" id="deptime" disabled>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Arrival Time</span>
                        <input type="text" id="artime" disabled>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Status</span>
                        <select name="stat" id="stat" disabled>
                        <?php elementsController::statusSelect();?>
                        </select>
                    </div>



                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Transport</span>
                        <fieldset id="field" disabled>
                        <?php elementsController::transportCheckbox();?>
                        </fieldset>
                    </div>


                    <div class="wow fadeInRight" data-wow-delay="0.4s">
                        <span>Tour Type</span>
                        <fieldset id="fieldtour" disabled>
                            <?php elementsController::typeTourCheckbox();?>
                        </fieldset>
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Image</span>
                        <input type="file" id="img" accept="image/gif, image/jpeg, image/png" disabled>
                    </div>



                </div>

                <div class="register-but">

                    <a href="#" id ="btn-save" onclick="save()" class="btn btn-primary" style="display: none">Save</a>
                    <a href="#" id ="btn-edit" onclick="edit()" class="btn btn-primary">Edit</a>


                </div>

            </form>
        </div>
    </div>
</div>



<?php
include_once ROOT_DIR . '/views/footer.inc';
?>
