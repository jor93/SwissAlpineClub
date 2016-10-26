<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 28.09.2016
 * Time: 14:01
 */
include_once ROOT_DIR.'views/header.inc';
?>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $('#menu_thank').addClass('active');
    });

</script>


<div class="main-1">
    <div class="container">
        <div class="register">
            <form method="post">
                <div class="register-top-grid">


                    <h3>Vielen Dank für die Registrierung</h3>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <p>Sie erhalten in kürze eine Bestätigungsemail.</p>

                    </div>


                </div>

                <div class="clearfix"> </div>
                <div class="register-but">
                    <input type="submit" value="Weiter" onclick="">
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include_once ROOT_DIR.'views/footer.inc';
?>
