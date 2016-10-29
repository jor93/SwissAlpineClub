<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 18.10.2016
 * Time: 12:43
 */


class elementsController extends Controller
{

    public static function selectToursOFF()
    {
        // call db
        $answer = Tour::selectAllTours();
        self::drawSortList($answer, null);
    }

    public static function drawSortList($answer, $answerFavorites)
    {
        $gelaber = $answerFavorites;
        $idFavorites = array();
        $idTours = array();
        $durations = array();
        $regions = array();

        $i = 0;
        // get all ids from table tour
        while ($temp = $answer->fetch(PDO::FETCH_ASSOC)) {
            $Tour_idTour = $temp['idTour'];
            $idTours[$i] = $Tour_idTour;
            $durations[$i] = $temp['Duration'];
            $regions[$i] = $temp['Region_idRegion'];
            /*
            echo '</br>---------------------------index : ' . $i;
            echo '</br>Tour_idTour : ' . $temp['idTour'];
            echo '</br>Tour_duration : ' . $temp['Duration'];
            echo '</br>Tour_idregion : ' . $temp['Region_idRegion'];
            */
            $i++;
        }

        if ($gelaber != null){
            $j = 0;
            // get all ids from table favorite
            while ($temp = $gelaber->fetch(PDO::FETCH_ASSOC)) {
                $Favorite_idTour = $temp['Tour_idTour'];
                $idFavorites[$j++] = $Favorite_idTour;
                //echo '</br>Favorite_idTour : ' . $Favorite_idTour;
            }
        }

        $countTours = count($idTours);
        $countFavorites = count($idFavorites);
        for ($x = 0; $x < $countTours; $x++) {
            $tourImage = Tour::selectTourImage($idTours[$x]);

            $temp = "data:" . $tourImage['mime'] . ";base64," . base64_encode($tourImage['data']);
            // set strings for filters
            $duration = "duration" . $durations[$x];
            $region = "region" . $regions[$x];

            // offline so favorite does not exist! --> != -1(online)
            if ($gelaber != null && self::getActiveUserWithoutCookie() != null) {
                $draw = false;
                for ($y = 0; $y < $countFavorites; $y++) {
                    // true if in table favorite
                    //echo '</br>------> comparing : ' . $idTours[$x] . ' and ' . $idFavorites[$y];
                    if ($idTours[$x] == $idFavorites[$y]) {
                        $draw = true;
                        //echo '</br>------> went through : ' . $idTours[$x] . ' and ' . $idFavorites[$y];
                        $favorite = "fav1";
                        $finalClass = "'mix " . $favorite . ' ' . $duration . ' ' . $region . "'";
                        echo "<li class=$finalClass><img alt='Embedded Image' src=$temp /></li>";
                        echo "<button id='star' onclick='letsgo($idTours[$x])' style='border: 0; background: transparent'><img src='../images/star2.png' width='20' height='20' /></button>";
                        break;
                    }
                }
                if (!$draw){
                    $finalClass = "'mix " . $duration . ' ' . $region . "'";
                    echo "<li class=$finalClass><img alt='Embedded Image' src=$temp /></li>";
                    echo "<button id='star' onclick='letsgo($idTours[$x])' style='border: 0; background: transparent'><img src='../images/star.png' width='20' height='20' /></button>";
                }
            } else {
                $finalClass = "'mix " . $duration . ' ' . $region . "'";
                echo "<li class=$finalClass><img alt='Embedded Image' src=$temp /></li>";
            }
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
        $answer = Tour::selectAllTours();
        $answerFavorites = Favorite::getAllFavorites($idAcc);
        // lets draw
        self::drawSortList($answer, $answerFavorites);
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