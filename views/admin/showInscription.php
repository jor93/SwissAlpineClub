<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 27.09.2016
 * Time: 14:54
 */
include_once ROOT_DIR.'views/header.inc';
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
                <h3 style="color: red">SHOW INSCRIPTION</h3>
                <form method="post" action="<?php echo URL_DIR.'admin/showInscription';?>">

                    <div class="register-top-grid">

                            <?php elementsController::getInscription(); ?>
                    <br>

                </form>
            </div>
        </div>
    </div>


<?php include_once ROOT_DIR.'views/footer.inc'; ?>