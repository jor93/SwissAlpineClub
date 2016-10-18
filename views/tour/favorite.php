<?php
/**
 * Created by PhpStorm.
 * User: gez
 * Date: 18.10.2016
 * Time: 08:38
 */
include_once 'views/header.inc';
?>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $('#menu_registration').addClass('active');
    });

    function letsgo($selectedFavorite){
        alert($selectedFavorite);

    }
</script>


<div class="main">
    <div class="container">
        <?php elementsController::favoritesSelect();?>
    </div>
</div>





<?php
include_once 'views/footer.inc';
?>
