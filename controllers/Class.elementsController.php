<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 18.10.2016
 * Time: 12:43
 */


class elementsController extends Controller {

    public static function nrParticipantInputs(){
        $number = $_SESSION['msg'];
        for ($i = 0; $i < $number; ++$i) {
            echo "<input type='text' required>";
        }
    }

    public static function favoritesSelect(){
        $currentUser = self::getActiveUserWithoutCookie();
        $idAcc = $currentUser->getIdAccount();
        $answer = Favorite::getAllFavorites($idAcc);
        foreach ($answer as $item) {
            echo "</br><label>'id Favorite =  $item[0]'</label>";
            echo "</br><label>'id Account = $item[1]'</label>";
            echo "</br><label>'id Tour = $item[2]'</label>";
            echo "<button id='star' onclick='letsgo($item[0])' style='border: 0; background: transparent'><img src='../images/star.png' width='20' height='20' /></button>";
            echo "</br><span>-----------------------------------</span>";
        }
    }

    public static function transportCheckbox(){
        $answer = Transport::getTranportByLanguage($_SESSION['lang']);
        $length = count($answer);
        for ($i = 0; $i < $length; ++$i) {
            echo "<input type='checkbox' name='transport" . $i . "' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
            echo "</br>";
        }
    }

    public static function statusSelect(){
        $answer = Status::getStatusByLanguage($_SESSION['lang']);
        $length = count($answer);
        for ($i = 0; $i < $length; ++$i) {
            echo "<option value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1] . "</option>";
        }
    }

    public static function typeTourCheckbox(){
        $answer = TypeTour::getTypeTourByLanguage($_SESSION['lang']);
        $length = count($answer);
        for ($i = 0; $i < $length; ++$i) {
            echo "<input type='checkbox' name='typetour" . $i . "' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
            echo "</br>";
        }
    }

    public static function aboSelect(){
        $answer = Abonnement::getAboByLanguage($_SESSION['lang']);
        $length = count($answer);
        for ($i = 0; $i < $length; ++$i) {
            echo "<option value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1] . "</option>";
        }
    }

    public static function langSelect(){
        // get language if possible
        $language = loginController::getPreferredLanguage();
        // variables for views
        $array = array('en','de','fr');
        $tr = array('English','Deutsch','Français');
        // add new option for each language and check if it matches the preferred language
        for($i = 0; $i <= 2; ++$i) {
            echo "<option value='" . $array[$i] ."'" . (strcmp($language,$array[$i])==0 ? 'selected' : '') . ">" . $tr[$i] . "</option>";
        }
    }
}