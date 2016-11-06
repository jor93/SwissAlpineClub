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
                <form method="post" action="<?php echo URL_DIR.'admin/showInscription';?>">
                    <div class="register-top-grid">
                        <!-- Error message label general -->

                            <?php elementsController::getInscription(); ?>


                </form>
            </div>
        </div>
    </div>


<?php include_once ROOT_DIR.'views/footer.inc'; ?>