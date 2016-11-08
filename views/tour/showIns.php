<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 27.09.2016
 * Time: 14:54
 */
$header = Controller::checkHeader();
include_once $header;

?>
    <script>
        $(document).ready(function () {
            $('#menu_hikeShow').addClass('active');
        });

        function showTour($idTour){
            document.getElementById("saver").value = $idTour;
            document.getElementById("manageIns").submit();
        }
    </script>
    <div class="main-1">
        <div class="container">
            <div class="register">
                <form id="manageIns" method="post" action="<?php echo URL_DIR.'tour/showIns';?>">
                <h3><?php echo $lang['MENU_INSCRIPTION'];?></h3>
                <ul>
                    <?php elementsController::showInscriptionPerUser($_SESSION['account']->getIdAccount())?>
                </ul>
                </form>
            </div>
        </div>
    </div>


<?php
include_once ROOT_DIR . '/views/footer.inc';
?>