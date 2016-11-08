<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 27.09.2016
 * Time: 14:54
 */
$header = Controller::checkHeader();
include_once $header;
?>
    <script>
        $(document).ready(function () {
            $('#menu_registration').addClass('active');
        });
    </script>

    <br />

    <div class="main-1">
        <div class="container">
            <div class="register">
                <h3 style="color: red"><?php echo $lang['SHOWINSCRIPTION_TITLE']; ?></h3>
                <form method="post" action="<?php echo URL_DIR.'admin/showInscription';?>">
                    <div class="register-top-grid">
                        <?php elementsController::getInscription(); ?>
                    <br>
                        <?php
                            if (isset($_SESSION['msg_no_part'])) {
                                if ($_SESSION['msg_no_part'] = 1)
                                    echo $lang['MANAGEINSCRIPTION_NO_PARTICIPANT'];
                                if ($_SESSION['msg_no_part'] = 2)
                                    echo $lang[''];
                            }
                        ?>
                </form>
            </div>
        </div>
    </div>


<?php include_once ROOT_DIR.'views/footer.inc'; ?>