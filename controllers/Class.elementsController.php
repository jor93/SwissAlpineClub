<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 18.10.2016
 * Time: 12:43
 */


class elementsController extends Controller {

    public static function selectToursOFF(){
        // call db
        $answer = Tour::selectAllTours();

        foreach ($answer as $item){
            $tourImage = Tour::selectTourImage($item[0]);

            $temp = "data:" . $tourImage['mime'] . ";base64," . base64_encode($tourImage['data']);
            // set strings for filters
            $duration = "duration" . $item[3];
            $region = "region" . $item[18];

            $finalClass = "'mix " . $duration . ' ' . $region . "'";

            echo "<li class=$finalClass><img alt='Embedded Image' src=$temp /></li>";
        }


    }

    public static function nrParticipantInputs(){
        $number = $_SESSION['msg'];
        for ($i = 0; $i < $number; ++$i) {
            echo "<input type='text' required>";
        }
    }

    public static function favoritesSelect(){
        // id current user
        $currentUser = self::getActiveUserWithoutCookie();
        $idAcc = $currentUser->getIdAccount();
        // call db
        $answer = Favorite::getAllFavorites($idAcc);
        foreach ($answer as $item) {
            echo "</br><label>'id Favorite =  $item[0]'</label>";
            echo "</br><label>'id Account = $item[1]'</label>";
            echo "</br><label>'id Tour = $item[2]'</label>";
            echo "<button id='star' onclick='letsgo($item[0])' style='border: 0; background: transparent'><img src='../images/star.png' width='20' height='20' /></button>";
            echo "</br><span>-----------------------------------</span>";
        }
    }

    //idTour just necessary if you edit the transport
    public static function transportCheckbox($edit, $idTour){
        $answer = Transport::getTranportByLanguage($_SESSION['lang']);
        $length = count($answer);

        if(!(bool)$edit) {
            for ($i = 0; $i < $length; ++$i) {
                echo "<input type='checkbox' name='transport" . $i . "' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
                echo "</br>";
            }
        }
        else{
            $idsTour = Transport::getTransportIdsFromTour($idTour);
            for ($i = 0; $i < $length; ++$i) {
                if(self::checkTranportIds(($i+1), $idsTour)){
                    echo "<input type='checkbox' name='transport" . $i . "' value='" . $answer[$i][0] . "'" . " checked>" . $answer[$i][1];
                    echo "</br>";
                }
                else{
                    echo "<input type='checkbox' name='transport" . $i . "' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
                    echo "</br>";
                }
            }
        }
    }

    private static function checkTranportIds($id, $idsTour){
        for ($i = 0; $i < count($idsTour); ++$i) {
            if($id === $idsTour[$i][0]) return true;
        }
        return false;
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