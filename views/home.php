<?php
/**
 * Created by PhpStorm.
 * User: sandro
 * Date: 23.09.2016
 * Time: 09:17
 */

include_once 'header.inc';
?>

<script>
    $(document).ready(function () {
        $('#menu_home').addClass('active');
    });

    function showUser($idHike){
        document.getElementById("saver").value = $idHike;
        document.getElementById("manage3Hikings").submit();
    }
</script>

<br />
<body onload="loop1()">
<div class="bildersloder">

    <div class="slideshow" data-transition="fade">
        <input type="radio" name="ss2" id="ss2-item-1" class="slideshow--bullet" checked="checked" />
        <div class="slideshow--item">
            <img src="/<?php echo SITE_NAME; ?>/images/wandern1.jpg" />
            <label for="ss2-item-4" class="slideshow--nav slideshow--nav-previous">Go to slide 4</label>
            <label for="ss2-item-2" class="slideshow--nav slideshow--nav-next">Go to slide 2</label>
        </div>

        <input type="radio" name="ss2" id="ss2-item-2" class="slideshow--bullet" />
        <div class="slideshow--item">
            <img src="/<?php echo SITE_NAME; ?>/images/wandern2.jpg" />
            <label for="ss2-item-1" class="slideshow--nav slideshow--nav-previous">Go to slide 1</label>
            <label for="ss2-item-3" class="slideshow--nav slideshow--nav-next">Go to slide 3</label>
        </div>

        <input type="radio" name="ss2" id="ss2-item-3" class="slideshow--bullet" />
        <div class="slideshow--item">
            <img src="/<?php echo SITE_NAME; ?>/images/wandern3.jpg" />
            <label for="ss2-item-2" class="slideshow--nav slideshow--nav-previous">Go to slide 2</label>
            <label for="ss2-item-4" class="slideshow--nav slideshow--nav-next">Go to slide 4</label>
        </div>

        <input type="radio" name="ss2" id="ss2-item-4" class="slideshow--bullet" />
        <div class="slideshow--item">
            <img src="/<?php echo SITE_NAME; ?>/images/wandern4.jpg" />
            <label for="ss2-item-3" class="slideshow--nav slideshow--nav-previous">Go to slide 3</label>
            <label for="ss2-item-1" class="slideshow--nav slideshow--nav-next">Go to slide 1</label>
        </div>

        <form id="manage3Hikings" action="<?php echo URL_DIR.'home/';?>" method="post" enctype="multipart/form-data">
        <section class="cd-gallery">
            <ul>
                <?php elementsController::getNext3Hikings(); ?>
                <li class="gap"></li>
                <li class="gap"></li>
                <li class="gap"></li>
            </ul>
            <div class="cd-fail-message">No results found</div>
        </section> <!-- cd-gallery -->



    </div>



</div>
</body>

<?php
include_once 'footer.inc';
?>


