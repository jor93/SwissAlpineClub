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

    function edit() {
        var x = 0;
        $.ajax({
            type: 'get',
            url: '<?php echo URL_DIR.'elements/getXForView';?>',
            success: function(response) {
                //alert(response);
                // read into array
                var x = response.split(",");
                for (var i = 1; i <= x.length; i++) {
                    // enable form
                    document.getElementById("firstname"+x[i]).removeAttribute('disabled');
                    document.getElementById("lastname"+x[i]).removeAttribute('disabled');
                    document.getElementById("aboPart"+x[i]).removeAttribute('disabled');
                }
            }
        });
        // enable save button
        document.getElementById("btn-save").style.display = "inline";
        document.getElementById("btn-cancel").style.display = "inline";
        // hide buttons while editing
        document.getElementById("btn-edit").style.display = "none";
        document.getElementById("btn-delete").style.display = "none";
        document.getElementById("btn-change").style.display = "none";
    }

    function controlGUI(){
        // enable form
        $.ajax({
            type: 'get',
            url: '<?php echo URL_DIR.'elements/getXForView';?>',
            success: function(response) {
                //alert(response);
                // read into array
                var x = response.split(",");
                for (var i = 1; i <= x.length; i++) {
                    // enable form
                    document.getElementById("firstname"+x[i]).disabled = true;
                    document.getElementById("lastname"+x[i]).disabled = true;
                    document.getElementById("aboPart"+x[i]).disabled = true;
                }
            }
        });
        // enable save button
        document.getElementById("btn-save").style.display = "none";
        document.getElementById("btn-cancel").style.display = "none";
        // hide buttons while editing
        document.getElementById("btn-edit").style.display = "inline";
        document.getElementById("btn-delete").style.display = "inline";
        document.getElementById("btn-change").style.display = "inline";
    }

    function save() {
        document.getElementById("decider").value = 0;
        document.getElementById("editForm").submit();

        controlGUI();
    }

    function del() {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById("decider").value = 1;
            document.getElementById("editForm").submit();
        }
    }
    function canc() {
        controlGUI();
    }
</script>

<br />

<div class="main-1">
    <div class="container">
        <div class="register">
            <h3 style="color: red"><?php echo $lang['SHOWINSCRIPTION_TITLE']; ?></h3>
            <form id="editForm" method="post" action="<?php echo URL_DIR.'admin/showInscription';?>">
                <div class="register-top-grid">
                    <?php elementsController::getInscription(); ?>
                    <br>
                    <label class="error">
                        <?php
                            if (isset($_SESSION['msg_no_part'])) {
                                if ($_SESSION['msg_no_part'] = 1)
                                    echo $lang['MANAGEINSCRIPTION_NO_PARTICIPANT'] . '</br>';
                                if ($_SESSION['msg_no_part'] = 2)
                                    echo $lang['MANAGEINSCRIPTION_NO_ACCS'];
                            }
                        ?>
                    </label>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <div class="register-but">
                        <input onclick="edit()" id="btn-edit" type="button" value="<?php echo $lang['SHOWADMIN_EDIT']; ?>">
                        <input onclick="save()" id="btn-save" type="button" value="<?php echo $lang['SHOWADMIN_SAVE']; ?>" style="display: none">
                        <input onclick="del()" id="btn-delete" type="button" value="<?php echo $lang['SHOWADMIN_DELETE']; ?>" >
                        <input onclick="canc()" id="btn-cancel" type="button" value="<?php echo $lang['SHOWADMIN_CANCEL']; ?>"  style="display: none">
                    </div>
                </div>
                <input type='hidden' id='decider' name='operation' value='0' />
            </form>
        </div>
    </div>
</div>


<?php include_once ROOT_DIR.'views/footer.inc';
unset($_SESSION['msg_no_part']);
?>