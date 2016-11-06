<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 30.09.2016
 * Time: 10:14
 */
include_once ROOT_DIR. '/views/headeradmin.inc';

$account = $_SESSION['accountToChange'];
$loc = Location::selectLocation($account->getLocation());

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

<script type="text/javascript">
    if(<?php echo ($account->getActivated() == 0); ?>){
        document.getElementById("active").style.color='red';
    }else {
        document.getElementById("active").style.color='green';
    }

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

    function edit() {

        document.getElementById("fname").removeAttribute("disabled");
        document.getElementById("lname").removeAttribute(disabled);
        document.getElementById("address").removeAttribute(disabled);
        document.getElementById("plz").removeAttribute(disabled);
        document.getElementById("loc").removeAttribute(disabled);
        document.getElementById("phone").removeAttribute(disabled);
        document.getElementById("lang").removeAttribute(disabled);
        document.getElementById("country").removeAttribute(disabled);
        document.getElementById("abo").removeAttribute(disabled);

    }
</script>


<br />
<div class="main">
    <div class="container">
        <div class="about">
            <h4 style="padding-left: 6%">Welcome</h4>
            <div class="register-top-grid" style="padding-left: 70px">
                </br>
                <form id="editForm" action="<?php echo URL_DIR.'admin/showAccount';?>" method="post">
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span>E-Mail</span>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <input class="proedit" type="text" id="mail" name="email" required disabled
                           value="<?php echo $account->getEmail(); ?>">
                </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span>Vorname</span>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <input class="proedit" type="text" id="fname" name="firstname" required disabled
                           value="<?php echo $account->getFirstname(); ?>">
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span>Nachname</span>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <input class="proedit" type="text" id="lname" name="lastname" required disabled
                           value="<?php echo $account->getLastname(); ?>">
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span>Adresse</span>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <input class="proedit" type="text" id="address" name="address" required disabled
                           value="<?php echo $account->getAddress(); ?>">
                </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>PLZ</span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="plz" name="zip" required disabled
                               value="<?php echo $loc->getPostcode(); ?>">
                    </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span>Ort</span>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <input class="proedit" type="text" id="loc" name="location" required disabled
                           value="<?php echo $loc->getLocationName(); ?>">
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span>Telefonnummer</span>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <input class="proedit" type="text" id="phone" name="phone" required disabled
                           value="<?php echo $account->getPhone(); ?>">
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span>Sprache</span>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <select class="proedit" name="lang" id="lang" name="lang" disabled>
                        <?php elementsController::langSelect($account->getLanguage()); ?>
                    </select>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span>Land</span>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <select  class="proedit" id="country" name="country" disabled>
                        <?php
                        $index = $account->getCountry();
                        $length = count($_SESSION['country'])-1;
                        for($i = 0; $i <= $length; ++$i)
                            echo "<option value='" . $_SESSION['country'][$i][0]  ."'" .($index-1 == $i ? 'selected' : '') . ">" . $_SESSION['country'][$i][1] . "</option>";

                        ?>
                    </select>
                </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Abo</span>
            </div>
            <div class="wow fadeInLeft" data-wow-delay="0.4s">
                <select class="proedit" id="abo" name="abo" disabled>
                    <?php elementsController::aboSelect($account->getAbonnement()-1); ?>
                </select>
            </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Activated</span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit " type="text" id="active" name="active" required disabled
                               value="<?php echo ($account->getActivated() == 0 ? 'not activated' : 'activated'); ?>">
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Last Login</span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="lastlog" name="lastlog" required disabled
                               value="<?php echo $account->getLastLogin(); ?>">
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Runlevel</span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <select  class="proedit" id="runlevel" name="runlevel" disabled>
                            <?php
                            $index = $account->getRunlevel();
                            for($i = 1; $i <= 10; ++$i)
                                echo "<option value='" . $i  ."'" .($index-1 == $i ? 'selected' : '') . ">" . $i . "</option>";
                            ?>
                        </select>
                    </div>

                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <div class="register-but">
                        <input type="submit" value="Change PW">
                    </div>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <div class="register-but">
                        <input onclick="edit()" id="btn-edit" type="button" value="Edit">
                        <input onclick="save()" id="btn-save" type="submit" value="Save" style="display: none">
                        <input onclick="delete()" id="btn-edit" type="submit" value="Delete" >
                    </div>
                </div>
                    </form>

            </div>




        </div>
    </div>
</div>
</div>





<?php
include_once ROOT_DIR . 'views/footer.inc';
?>
