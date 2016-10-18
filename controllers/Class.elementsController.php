<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 18.10.2016
 * Time: 12:43
 */


class elementsController extends Controller {


    public static function transportCheckbox(){
        $answer = Transport::getTranportByLanguage($_SESSION['lang']);
        $length = count($answer);
        for ($i = 0; $i < $length; ++$i) {
            echo "<input type='checkbox' name='transport' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
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
            echo "<input type='checkbox' name='typetour' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
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