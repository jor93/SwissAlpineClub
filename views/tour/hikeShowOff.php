<?php
/**
 * Created by PhpStorm.
 * User: gez
 * Date: 07.11.2016
 * Time: 08:44
 */
$header = Controller::checkHeader();
include_once $header;

if (isset($_SESSION['tourId'])) {
    echo "Tour-ID: " . $_SESSION['tourId'] . "!";
    $tour = Tour::selectTour($_SESSION['tourId']);
    $image = Tour::selectTourImage($_SESSION['tourId']);
    $inscription = Inscription::selectInscriptionByIdTour($tour->getIdTour());
    $_SESSION['idInscription'] = $inscription->getIdInscription();
}


?>

<div class="main-1">
    <div class="container">
        <div class="register">
            <img alt="Embedded Image"
                 src="data:<?php echo $image['mime'] ?>;base64,<?php echo base64_encode($image['data']); ?> "
                 style="margin-left: auto;margin-right: auto; display: block;width: 50%"/>

            <?php echo elementsController::avgRatings();?>
            <div class="register-top-grid" style="padding-left: 70px">
                </br>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span><?php echo $lang['HIKESHOW_TOUR']; ?></span>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <label id="tour"><?php echo $tour->getTitle(); ?></label>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span><?php echo $lang['HIKESHOW_DESC_DE']; ?></span>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <label id="descDE"><?php echo $tour->getLanguageDescriptionDE(); ?></label>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span><?php echo $lang['HIKESHOW_DESC_FR']; ?></span>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <label id="descFR"><?php echo $tour->getLanguageDescriptionFR(); ?></label>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span><?php echo $lang['HIKESHOW_DIFF']; ?></span>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <label id="dif"><?php $length = $tour->getDifficulty();
                        for ($i = 0; $i < $length; $i++) {
                            echo "*";
                        } ?></label>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span><?php echo $lang['HIKESHOW_LOCATION']; ?></span>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <label
                        id="loc"><?php echo $tour->getLocationDep()->getPostcode() . " " . $tour->getLocationDep()->getLocationName() . " / " .
                            $tour->getLocationArriv()->getPostcode() . " " . $tour->getLocationArriv()->getLocationName() ?></label>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span><?php echo $lang['HIKESHOW_DATE']; ?></span>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <label id="date"><?php echo $tour->getStartDate() . ": " . $tour->getDepartTime() . " / " .
                            $tour->getEndDate() . ": " . $tour->getArrivalTime() ?></label>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span><?php echo $lang['HIKESHOW_STATUS']; ?></span>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <label id="stat"><?php if ($_SESSION['lang'] == 'de') echo $tour->getStatus()->getStatusDE();
                        else if ($_SESSION['lang'] == 'fr') echo $tour->getStatus()->getStatusFR(); ?></label>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span><?php echo $lang['HIKESHOW_PRICE']; ?></span>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <label id="price"><?php echo "CHF: " . $tour->getPrice() . ".-" ?></label>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span><?php echo $lang['HIKESHOW_PLACE']; ?></span>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <label id="av_space"><?php echo $inscription->getFreeSpace(); ?></label>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span><?php echo $lang['HIKESHOW_ANMELDESCHLUSS']; ?></span>
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <label id="expiration"><?php echo $inscription->getExpirationDate(); ?></label>
                </div>
            </div>
        </div>
    </div>
</div>
</br>
<div class="container">
    <div class="register">
        <div class="register-top-grid">
            <h3><?php echo $lang['HIKESHOW_RATING']; ?></h3>
            <div class="wow fadeInLeft" data-wow-delay="0.4s">
                <div class="rating">
                    <?php echo elementsController::comments();?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once ROOT_DIR . 'views/footer.inc';
?>