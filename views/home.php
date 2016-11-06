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

    function showHike($idHike){
        document.getElementById("saver").value = $idHike;
        document.getElementById("manage3Hikings").submit();
    }
</script>

<div class="container" style="padding-top: 2%">
<div class="slideshow" onload="loop1()" data-transition="fade">
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

</div>

</div>
<div class="curabitur">
    <div class="container">
        <div class="col-md-4 curabitur-top">
            <i class="tent"></i>
            <h4>Wanderungen</h4>
            <p>Wir bieten Ihnen verschiedene Wanderungen an. Von Klettertouren bis Skitouren über mehrtägige geführte Wanderungen überall im Wallis.</p>
            <a href="#" class="btn  btn-1c btn1 btn-1d">More</a>
        </div>
        <div class="col-md-4 curabitur-top">
            <i class="hammer"></i>
            <h4>Ihre Vorteile</h4>
            <p>Wir bieten Ihnen verschiedene Wanderungen mit Familie und Freunden an. Sie können bei uns Ideen für Wanderungen finden oder eine von uns geführte Wanderung buchen.</p>
            <a href="#" class="btn  btn-1c btn1 btn-1d">More</a>
        </div>
        <div class="col-md-4 curabitur-top">
            <i class="timer"></i>
            <h4>Sehen Sie sich Bewertungen an</h4>
            <p>Auf unserer Seite können Sie die Wanderungen genauenstens ansehen und sich die Bewertungen unserer Community ansehen.</p>
            <a href="#" class="btn  btn-1c btn1 btn-1d">More</a>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<!-- curabitur -->

<!-- vide -->
<div class="vide">
    <div class="container">
        <div class="col-md-8 vide-left">
            <h3>Lorem ipsum dolor sit amet, consectetur a maximus metus semper et. </h3>
            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas congue gravida ex,a maximus metus semper et. Curabitur non enim pharetra, dictum tortor quis, hendrerit tortor.</h6>
            <p>Maecenas finibus quis nulla id facilisis. Aenean dignissim magna et est elit porttitor
                gravida lacinia. Fusce elementum massa at eros lacinia imperdiet. Aenean mollis ultricies
                dictum.Praesent suscipit urna eget elit porttitor mollis. Quisque mollis rhoncus ante, eu
                interdum quam vehicula cursus. Nam bibendum odio eu sem semper posuere.  </p>
        </div>
        <div class="col-md-4 vide-right">
            <img src="images/img1.jpg" class="img-responsive" alt="" />
            <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><span> </span></a>
            <div id="small-dialog" class="mfp-hide">
                <iframe src="//player.vimeo.com/video/78016933" width="" height="" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- vide -->
<!-- events -->
<div class="events">
    <div class="container">
        <h2>Upcoming Events</h2>
        <div class="col-md-4 events-top">
            <img src="images/img2.jpg" class="img-responsive" alt="" />
            <div class="events-bottom">
                <div class="events-left">
                    <h5>23</h5>
                    <span>sep</span>
                </div>
                <div class="events-right">
                    <h6>Phasellus laoreet lorem nec</h6>
                    <p>Pellentesque eu congue sapien. Donec hendrerit viverra finibus. Nulla eget sollicitudin leo. Morbi lacinia libero urna necrfaucibus nulla mollis et. </p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 events-top">
            <img src="images/img3.jpg" class="img-responsive" alt="" />
            <div class="events-bottom">
                <div class="events-left">
                    <h5>06</h5>
                    <span>jun</span>
                </div>
                <div class="events-right">
                    <h6>Phasellus laoreet lorem nec</h6>
                    <p>Pellentesque eu congue sapien. Donec hendrerit viverra finibus. Nulla eget sollicitudin leo. Morbi lacinia libero urna necrfaucibus nulla mollis et. </p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 events-top">
            <img src="images/img5.jpg" class="img-responsive" alt="" />
            <div class="events-bottom">
                <div class="events-left">
                    <h5>17</h5>
                    <span>dec</span>
                </div>
                <div class="events-right">
                    <h6>Phasellus laoreet lorem nec</h6>
                    <p>Pellentesque eu congue sapien. Donec hendrerit viverra finibus. Nulla eget sollicitudin leo. Morbi lacinia libero urna necrfaucibus nulla mollis et. </p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>



<?php
include_once 'footer.inc';
?>


