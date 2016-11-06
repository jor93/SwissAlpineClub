<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 30.09.2016
 * Time: 10:14
 */
include_once ROOT_DIR . 'views/header.inc';

$account = $_SESSION['account'];

?>

<script>
    $(document).ready(function () {
        $('#menu_profile').addClass('active');
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

        document.getElementById('editForm').submit();

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

<div class="main">
    <div class="container">
        <div class="about">
            <h4 style="padding-left: 6%">Welcome</h4>


                <div class="register-top-grid" style="padding-left: 70px">

                    </br>
                    <form id="editForm" action="<?php echo URL_DIR.'showuser/updateUserAccount';?>" method="post">
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>E-Mail</span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="mail" name="mail" required disabled
                               value="<?php echo $account->getEmail(); ?>">
                    </div>

                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Vorname</span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="fname" name="fname" required disabled
                               value="<?php echo $account->getFirstname(); ?>">
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Nachname</span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="lname" name="lname" required disabled
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
                        <span>Ort</span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="loc" name="loc" required disabled
                               value="<?php echo $account->getLocation()->getLocationName(); ?>">
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>PLZ</span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="plz" name="plz" required disabled
                               value="<?php echo $account->getLocation()->getPostcode(); ?>">
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
                        <input class="proedit" type="text" id="lang" name="lang" required disabled
                               value="<?php echo $account->getLanguage(); ?>">
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <span>Land</span>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <input class="proedit" type="text" id="country" name="country" required disabled
                               value="<?php echo $account->getCountry()->getNameCountry(); ?>">
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <div class="register-but">
                        <input type="submit" value="Change PW">
                    </div>
                    </div>
                    <div class="wow fadeInLeft" data-wow-delay="0.4s">
                        <div class="register-but">
                            <input onclick="edit()" id="btn-edit" type="submit" value="Edit">
                            <input onclick="save()" id="btn-save" type="submit" value="Save" style="display: none">
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
