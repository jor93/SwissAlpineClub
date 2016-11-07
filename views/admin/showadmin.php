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
        $('#menu_profileadmin').addClass('active');
    });

    function save(){

        document.getElementById("mail").disabled = true;
        document.getElementById("fname").disabled = true;
        document.getElementById("lname").disabled = true;
        document.getElementById("address").disabled = true;
        document.getElementById("loc").disabled = true;
        document.getElementById("phone").disabled = true;
        document.getElementById("lang").disabled = true;
        document.getElementById("country").disabled = true;
        document.getElementById("plz").disabled = true;

        document.getElementById("btn-save").style.display = "none"
        document.getElementById("btn-edit").style.display = "inline";

    }

    function edit() {

        document.getElementById("mail").removeAttribute("disabled");
        document.getElementById("fname").removeAttribute("disabled");
        document.getElementById("lname").removeAttribute("disabled");
        document.getElementById("address").removeAttribute("disabled");
        document.getElementById("loc").removeAttribute("disabled");
        document.getElementById("phone").removeAttribute("disabled");
        document.getElementById("lang").removeAttribute("disabled");
        document.getElementById("country").removeAttribute("disabled");
        document.getElementById("plz").removeAttribute("disabled");

        document.getElementById("btn-save").style.display = "inline"
        document.getElementById("btn-edit").style.display = "none";


    }


</script>
<br />

<div class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info">
                <form>
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $lang['SHOWADMIN_TITLE']; ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>

                                <tr>
                                    <td><?php echo $lang['SHOWADMIN_EMAIL']; ?></td>
                                    <td>
                                        <input class="proedit" type="text" id="mail" name="mail" required disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $lang['SHOWADMIN_FN']; ?></td>
                                    <td><input class="proedit" type="text" id="fname" name="fname" required disabled></td>
                                </tr>
                                <tr>
                                    <td><?php echo $lang['SHOWADMIN_LN']; ?></td>
                                    <td><input class="proedit" type="text" id="lname" name="lname" required disabled></td>
                                </tr>
                                <tr>
                                    <td><?php echo $lang['SHOWADMIN_ADDRESS']; ?></td>
                                    <td><input class="proedit" type="text" id="address" name="address" required disabled></td>
                                </tr>
                                <tr>
                                    <td><?php echo $lang['SHOWADMIN_LOC']; ?></td>
                                    <td><input class="proedit" type="text" id="loc" name="loc" required disabled></td>
                                </tr>
                                <tr>
                                    <td><?php echo $lang['SHOWADMIN_ZIP']; ?></td>
                                    <td><input class="proedit" type="text" id="plz" name="plz" required disabled></td>
                                </tr>
                                <td><?php echo $lang['SHOWADMIN_PHONE']; ?></td>
                                <td><input class="proedit" type="text" id="phone" name="phone" required disabled>
                                </td>
                                <tr>
                                    <td><?php echo $lang['SHOWADMIN_LANG']; ?></td>
                                    <td><input class="proedit" type="text" id="lang" name="lang" required disabled></td>
                                </tr>
                                <tr>
                                    <td><?php echo $lang['SHOWADMIN_COUNTRY']; ?></td>
                                    <td><input class="proedit" type="text" id="country" name="country" required disabled></td>
                                </tr>

                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="#" id ="btn-save" onclick="save()" class="btn btn-primary" style="display: none"><?php echo $lang['SHOWADMIN_SAVE']; ?>Save</a>
                    <a href="#" id ="btn-edit" onclick="edit()" class="btn btn-primary"><?php echo $lang['SHOWADMIN_EDIT']; ?></a>
                    <div class="pull-right">
                    <a href="resetpw.php" class="btn btn-primary"><?php echo $lang['SHOWADMIN_CHANGEPW']; ?></a>
                    </div>

                </div>
                    </form>
            </div>
        </div>
    </div>
</div>


<?php
include_once ROOT_DIR . 'views/footer.inc';
?>
