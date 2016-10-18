<?php
/**
 * Created by PhpStorm.
 * User: gez
 * Date: 18.10.2016
 * Time: 08:38
 */
include_once 'views/header.inc';
?>


<div class="main">
    <div class="container">



        <form action="<?php echo URL_DIR.'favorite/handleFavorites';?>" method="post">
            <div class="register-but">
                <input type="submit" name="Submit" value="<?php echo $lang['FORGOTPW_SEND']; ?>" />
            </div>
        </form>
    </div>
</div>





<?php
include_once 'views/footer.inc';
?>
