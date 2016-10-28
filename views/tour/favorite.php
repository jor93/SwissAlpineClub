<?php
/**
 * Created by PhpStorm.
 * User: gez
 * Date: 18.10.2016
 * Time: 08:38
 */
include_once ROOT_DIR. 'views/header.inc';
?>
<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $('#menu_registration').addClass('active');
    });

    function letsgo($selectedFavorite){
        var imgsrc = '../images/star.png';
        document.getElementById("star").src == imgsrc;

        // transfer the id from favorite you wanna delete
        $.ajax({
            type: 'post',
            url: '<?php echo URL_DIR.'favorite/handleFavorites';?>',
            data:{ selectedFav : $selectedFavorite},
            success: function(response) {
                alert(response);
            }
        });

    }
</script>


<div class="main">
    <div class="container">
        <?php elementsController::favoritesSelect();?>
    </div>
</div>





<?php
include_once ROOT_DIR . 'views/footer.inc';
?>
