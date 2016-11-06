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

        document.getElementById('editForm').submit();

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

<<<<<<< Updated upstream
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
=======
<div class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Welcome</h3>
                </div>
                <form id="editForm" action="<?php echo URL_DIR.'showuser/updateUserAccount';?>" method="post">
                    <div class="panel-body">
                        <div class="row">

                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <a href="<?php echo URL_DIR.'tour/favorite';?>">testing favorites</a>
                                    <tr>
                                        <td>E-Mail</td>
                                        <td>
                                            <input class="proedit" type="text" id="mail" name="mail" required disabled
                                                   value="<?php echo $account->getEmail(); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Firstname:</td>
                                        <td><input class="proedit" type="text" id="fname" name="fname" required disabled
                                                   value="<?php echo $account->getFirstname(); ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Lastname</td>
                                        <td><input class="proedit" type="text" id="lname" name="lname" required disabled
                                                   value="<?php echo $account->getLastname(); ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><input class="proedit" type="text" id="address" name="address" required disabled
                                                   value="<?php echo $account->getAddress(); ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td><input class="proedit" type="text" id="loc" name="loc" required disabled
                                                   value="<?php echo $account->getLocation()->getLocationName(); ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>PLZ</td>
                                        <td><input class="proedit" type="text" id="plz" name="plz" required disabled
                                                   value="<?php echo $account->getLocation()->getPostcode(); ?>"></td>
                                    </tr>
                                    <td>Phone Number</td>
                                    <td><input class="proedit" type="text" id="phone" name="phone" required disabled
                                               value="<?php echo $account->getPhone(); ?>">
                                    </td>
                                    <tr>
                                        <td>Language</td>
                                        <td><input class="proedit" type="text" id="lang" name="lang" required disabled
                                                   value="<?php echo $account->getLanguage(); ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td><input class="proedit" type="text" id="country" name="country" required disabled
                                                   value="<?php echo $account->getCountry()->getNameCountry(); ?>"></td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
>>>>>>> Stashed changes
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
