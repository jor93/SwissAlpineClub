<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 14.10.2016
 * Time: 09:26
 */
$header = Controller::checkHeader();
include_once $header;

?>
<script>
    $(document).ready(function () {
        $('#menu_insmanage').addClass('active');
    });

    function showInscription($idInscription){
        document.getElementById("saver").value = $idInscription;
        document.getElementById("manageinscription").submit();
    }
</script>



<div class="main-1">
    <div class="container">
        <div class="register">
            <form id="manageinscription" action="<?php echo URL_DIR.'admin/manageinscription';?>" method="post" enctype="multipart/form-data">
                <div class="register-top-grid">
                    <h3><?php echo $lang['MANAGEINSCRIPTION_TITLE']; ?></h3>
                </div>

                <main class="cd-main-content">
                    <div class="cd-tab-filter-wrapper">
                        <div class="cd-tab-filter">
                            <div class="cd-filter-block">
                                <div class="cd-filter-content">
                                    <input type="search" placeholder="search...">
                                </div> <!-- cd-filter-content -->
                            </div> <!-- cd-filter-block -->
                        </div> <!-- cd-tab-filter -->
                    </div> <!-- cd-tab-filter-wrapper -->

                    <section class="cd-gallery">
                        <ul>
                            <?php elementsController::getInscriptions(); ?>
                            <li class="gap"></li>
                            <li class="gap"></li>
                            <li class="gap"></li>
                        </ul>
                        <div class="cd-fail-message"><?php echo $lang['NO_RESULTS']; ?></div>
                    </section> <!-- cd-gallery -->
                </main> <!-- cd-main-content -->
            </form>
        </div>
    </div>
</div>

<script src="/<?php echo SITE_NAME; ?>/js/main.js"></script> <!-- Resource jQuery -->
<script src="/<?php echo SITE_NAME; ?>/js/jquery.mixitup.min.js"></script>
<script src="/<?php echo SITE_NAME; ?>/js/jquery-ui.js"></script>

<?php
include_once ROOT_DIR . '/views/footer.inc';
?>
