<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 30.09.2016
 * Time: 10:14
 */
$header = Controller::checkHeader();
include_once $header;

$account = $_SESSION['account'];
//var_dump($account->getCountry()->getIdCountry());

?>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
$query = "select distinct CONCAT(Postcode, ', ' ,LocationName) from location;";
$data = array();
$data = SQL::getInstance()->select($query)->fetchAll();
$length = count($data);
for ($i = 0; $i < $length; ++$i) {
    $data2[$i] = $data[$i][0];
}
echo '<script>var myarray = '.json_encode($data2) .';</script>';

?>


<script>
    $(document).ready(function () {
        $('#menu_profil').addClass('active');
    });


    var MIN_LENGTH = 2;
    $( document ).ready(function() {
        $("#plz").keyup(function() {
            var keyword = $("#plz").val();
            if (keyword.length >= MIN_LENGTH) {
                $(document).ready(function() {
                    $( "#plz" ).autocomplete({
                        source: myarray,
                        select: function (event, ui) {
                            event.preventDefault();
                            var s = ui.item.value;
                            $("#plz").val(s.substring(0, s.indexOf(',')));
                            $("#loc").val(s.substring(s.indexOf(',')+2, s.length));
                        }
                    });
                });
            }
        });
    });

    function validateQty(event) {
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode == 8 || event.keyCode == 46
            || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 9) {
            return true;
        }
        else if ( key < 48 || key > 57 ) {
            return false;
        }
        else return true;
    };

    function save(){
        document.getElementById('editForm').submit();

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
        //document.getElementById("mail").removeAttribute("disabled");
        document.getElementById("fname").removeAttribute("disabled");
        document.getElementById("lname").removeAttribute("disabled");
        document.getElementById("address").removeAttribute("disabled");
        document.getElementById("phone").removeAttribute("disabled");
        document.getElementById("lang").removeAttribute("disabled");
        document.getElementById("country").removeAttribute("disabled");
        document.getElementById("plz").removeAttribute("disabled");
        document.getElementById("loc").removeAttribute("disabled");
        document.getElementById("btn-save").style.display = "inline"
        document.getElementById("btn-edit").style.display = "none";
    }

    function forgot(){
        document.getElementById("decider").value = 2;
        document.getElementById("editForm").submit();
    }


</script>
<br />

<div class="main">
    <div class="container">
        <div class="about">
            <?php if(isset($_SESSION['changed'])){ echo $lang['RESETPW_SUCCESS'] . '</br></br>'; $_SESSION['changed'] = null;} ?>
            <h4 style="padding-left: 6%"><?php echo $lang['SHOWUSER_WELCOME']; ?></h4>
            <div class="register-top-grid" style="padding-left: 70px">
                </br>
                <form id="editForm" action="<?php echo URL_DIR.'showuser/updateuseraccount';?>" method="post">
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWUSER_EMAIL']; ?></span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="mail" name="mail" required disabled
                               value="<?php echo $account->getEmail(); ?>">
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWUSER_FNAME']; ?></span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="fname" name="fname" required disabled
                               value="<?php echo $account->getFirstname(); ?>">
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWUSER_NNAME']; ?></span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="lname" name="lname" required disabled
                               value="<?php echo $account->getLastname(); ?>">
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWUSER_ADDRESS']; ?></span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="address" name="address" required disabled
                               value="<?php echo $account->getAddress(); ?>">
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWUSER_ZIP']; ?></span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input onkeypress='return validateQty(event);' class="proedit" type="text" id="plz" name="plz" required disabled
                               value="<?php echo $account->getLocation()->getPostcode(); ?>">
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWUSER_LOC']; ?></span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="loc" name="loc" required disabled
                               value="<?php echo $account->getLocation()->getLocationName(); ?>">
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWUSER_PHONE']; ?></span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="phone" name="phone" required disabled
                               value="<?php echo $account->getPhone(); ?>">
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWUSER_LANG']; ?></span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="lang" name="lang" required disabled
                               value="<?php echo $account->getLanguage(); ?>">
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span><?php echo $lang['SHOWUSER_COUNTRY']; ?></span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <select  class="proedit" id="country" name="country" disabled>
                            <?php
                            $index = $account->getCountry()->getIdCountry();
                            $length = count($_SESSION['country'])-1;
                            for($i = 0; $i <= $length; ++$i)
                                echo "<option value='" . $_SESSION['country'][$i][0]  ."'" .($index-1 == $i ? 'selected' : '') . ">" . $_SESSION['country'][$i][1] . "</option>";
                            ?>
                        </select>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <div class="register-but">
                            <input type="button" id="btn-forgot" onclick="forgot()" value="<?php echo $lang['SHOWUSER_CHANGEPW']; ?>">
                        </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <div class="register-but">
                            <input onclick="edit()" id="btn-edit" type="button" value="<?php echo $lang['SHOWUSER_EDIT']; ?>">
                            <input id="btn-save" type="submit" value="<?php echo $lang['SHOWUSER_SAVE']; ?>" style="display: none">
                        </div>
                    </div>
                    <input type='hidden' id='decider' name='operation' value='0' />
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include_once ROOT_DIR . 'views/footer.inc';
?>
