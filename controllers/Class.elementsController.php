<?php

/**
 * Created by PhpStorm.
 * User: jor
 * Date: 18.10.2016
 * Time: 12:43
 */


class elementsController extends Controller
{

    public static function showLoggedInUser(){
        include_once (ROOT_DIR.'views/common.php');
        $user = false;

        if(!$user){
            echo "<li><a href=\"login/register\">" . $lang['HEADER_REGISTER'] . "</a></li>";
            echo "<li><a href=\"login/login\">" . $lang['HEADER_LOGIN'] . "</a></li>";
        }else{
            $name = $_SESSION["account"];
            echo "<li><a href=\"login/register\">" . $lang['HEADER_LOGGED'].  ' ' . $name->getFullName() . "</a></li>";
            echo "<li><a href=\"login/login\">" . $lang['HEADER_LOGOUT'] . "</a></li>";
        }
    }

    public static function selectToursOFF()
    {
        // call db
        $answer = Tour::selectAllTours();
        self::drawSortList($answer, null);
        echo "<input type='hidden' id='saver' name='showHike' value='0' />";

    }

    public static function getNext3Hikings(){
        $answer = Tour::getNext3Hikings();
        $length = count($answer);
        $img = '/' . SITE_NAME . '/images/img-6.jpg';

        for ($i = 0; $i < $length; $i++) {
            $id = $answer[$i][0];
            echo "<li class='' onclick='showHike($id)'><img alt='No image found' src='$img' /></li>";
        }
        echo "<input type='hidden' id='saver' name='showHike' value='0' />";
    }

    public static function getAccounts()
    {
        $answer = Account::selectAllAccounts();
        $length = count($answer);
        $img = '/' . SITE_NAME . '/images/img-6.jpg';

        for ($i = 0; $i < $length; $i++) {
            $finalClass = "'mix " . $answer[$i][0] . ' ' . $answer[$i][1] . ' ' . $answer[$i][2] . ' ' . $answer[$i][3] . ' ' . $answer[$i][4] . ' ' . $answer[$i][5] . ' ' . $answer[$i][6] . ' ' . $answer[$i][7] . ' ' . substr($answer[$i][8], 0, -1) . ' ' . $answer[$i][9] . "'";
            $id = $answer[$i][0];
            echo "<li class=$finalClass onclick='showUser($id)'>";
            echo "<div class='hovereffect'>";
            echo "<img alt='No image found' src='$img' />";
            echo "<div class='overlay'>";
            echo "<h5>" .$answer[$i][1] .' ' . $answer[$i][2] . "<br /></h5>";
            echo "<h6>" . $answer[$i][3]."<br />".$answer[$i][4]."<br />".$answer[$i][7]. ' ' .$answer[$i][6] ."<br />". $answer[$i][8]. "<br />". $answer[$i][5]. "<br />". $answer[$i][9]. "</h6>";
            echo "</div>";
            echo "</li>";
        }
        echo "<input type='hidden' id='saver' name='showUser' value='0' />";
    }

    public static function drawSortList($answer, $answerFavorites)
    {
        $gelaber = $answerFavorites;
        $idFavorites = array();
        $idTours = array();
        $durations = array();
        $title = array();
        $regions = array();
        $datePick = array();
        $location = array();
        $difficulty = array();


        $i = 0;
        // get all ids from table tour
        while ($temp = $answer->fetch(PDO::FETCH_ASSOC)) {
            $Tour_idTour = $temp['idTour'];
            $title[$i] = $temp['Title'];
            $idTours[$i] = $Tour_idTour;
            $durations[$i] = $temp['Duration'];
            $regions[$i] = $temp['Region_idRegion'];
            $datePick[$i] = $temp['Start_date'];
            $location[$i] = $temp['LocationName'];
            $difficulty[$i] = $temp['Difficulty'];

            /*
            echo '</br>---------------------------index : ' . $i;
            echo '</br>Tour_idTour : ' . $temp['idTour'];
            echo '</br>Tour_duration : ' . $temp['Duration'];
            echo '</br>Tour_idregion : ' . $temp['Region_idRegion'];
            */
            $i++;
        }


        if ($gelaber != null) {
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

            $tourTypes = array();
            $duration = "duration" . $durations[$x];
            $region = "region" . $regions[$x];
            $date = "datepick" . $datePick[$x];
            $diff = "diff" . $difficulty[$x];
            $tourType = "tourtype";

            $diffString = "";

            for ($d = 0; $d < $difficulty[$x]; $d++) {
                $diffString = $diffString . "*";
            }


            $tourTypeTemp = Tour::selectTourTypes($idTours[$x]);


            $k = 0;
            while ($test = $tourTypeTemp->fetch(PDO::FETCH_ASSOC)) {
                $tourTypes[$k] = $test['TypeTour_idTypeTour'];
                $k++;
            }


            for ($i = 0; $i < count($tourTypes); $i++) {
                if ($i < 1) {
                    $tourType = $tourType . $tourTypes[$i];
                } else {
                    $tourType = $tourType . " tourtype" . $tourTypes[$i];
                }
            }

            $newDate = date("d.m.Y", strtotime($datePick[$x]));

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
                        $finalClass = "'mix " . $favorite . ' ' . $date . ' ' . $duration . ' ' . $diff . ' ' . $region . ' ' . $tourType . "'";
                        echo "<li onclick='showHike($idTours[$x])' class=$finalClass>";
                        echo "<div class='hovereffect'>";
                        echo "<img class='img-responsive' alt='Embedded Image' src=$temp>";
                        echo "<div class='overlay'>";
                        echo "<h5>$title[$x]<br />$location[$x], $datePick[$x]</h5>";
                        echo "<h6>Schwierigkeit: $diffString<br />Dauer: $durations[$x]<br /></h6>";
                        echo "</div>";
                        echo "</li>";
                        echo "<button id='star' onclick='letsgo($idTours[$x])' style='border: 0; background: transparent'><img src='../images/star2.png' width='20' height='20' /></button>";
                        break;
                    }
                }
                if (!$draw) {
                    $finalClass = "'mix " . $date . ' ' . $duration . ' ' . $diff . ' ' . $region . ' ' . $tourType . "'";
                    echo "<li onclick='showHike($idTours[$x])' class=$finalClass>";
                    echo "<div class='hovereffect'>";
                    echo "<img class='img-responsive' alt='Embedded Image' src=$temp>";
                    echo "<div class='overlay'>";
                    echo "<h5>$title[$x]<br />$location[$x], $datePick[$x]</h5>";
                    echo "<h6>Schwierigkeit: $diffString<br />Dauer: $durations[$x]<br /></h6>";
                    echo "</div>";
                    echo "</li>";
                    echo "<button id='star' onclick='letsgo($idTours[$x])' style='border: 0; background: transparent'><img src='../images/star.png' width='20' height='20' /></button>";
                }
            } else {
                $finalClass = "'mix " . $date . ' ' . $duration . ' ' . $diff . ' ' . $region . ' ' . $tourType . "'";
                echo "<li onclick='showHike($idTours[$x])' class=$finalClass>";
                echo "<div class='hovereffect'>";
                echo "<img class='img-responsive' alt='Embedded Image' src=$temp>";
                echo "<div class='overlay'>";
                echo "<h5>$title[$x]<br />$location[$x], $newDate</h5>";
                echo "<h6>Schwierigkeit: $diffString<br />Dauer: $durations[$x]h<br /></h6>";
                echo "</div>";
                echo "</li>";
            }
        }
    }

    public static function nrParticipantInputs()
    {
        $number = $_SESSION['msg'];
        for ($i = 0; $i < $number; ++$i) {
            echo "<input type='text' required>";
        }
    }

    public static function favoritesSelect()
    {
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
    public static function transportCheckbox($edit, $idTour)
    {
        $answer = Transport::getTranportByLanguage($_SESSION['lang']);
        $length = count($answer);

        if (!(bool)$edit) {
            for ($i = 0; $i < $length; ++$i) {
                echo "<input type='checkbox' name='transport" . $i . "' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
                echo "</br>";
            }
        } else {
            $idsTour = Transport::getTransportIdsFromTour($idTour);
            for ($i = 0; $i < $length; ++$i) {
                if (self::checkTranportIds(($i + 1), $idsTour)) {
                    echo "<input type='checkbox' name='transport" . $i . "' value='" . $answer[$i][0] . "'" . " checked>" . $answer[$i][1];
                    echo "</br>";
                } else {
                    echo "<input type='checkbox' name='transport" . $i . "' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
                    echo "</br>";
                }
            }
        }
    }

    private static function checkTranportIds($id, $idsTour)
    {
        for ($i = 0; $i < count($idsTour); ++$i) {
            if ($id === $idsTour[$i][0]) return true;
        }
        return false;
    }

    public static function statusSelect($edit, $statusId)
    {
        $answer = Status::getStatusByLanguage($_SESSION['lang']);
        $length = count($answer);

        if (!(bool)$edit) {
            for ($i = 0; $i < $length; ++$i) {
                echo "<option value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1] . "</option>";
            }
        } else {
            for ($i = 0; $i < $length; ++$i) {
                if (($i+1) === $statusId) {
                    echo "<option value='" . $answer[$i][0] . "'" . " selected=selected>" . $answer[$i][1] . "</option>";
                } else {
                    echo "<option value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1] . "</option>";
                }
            }
        }
    }

    public static function typeTourCheckbox($edit, $idTour)
    {
        $answer = TypeTour::getTypeTourByLanguage($_SESSION['lang']);
        $length = count($answer);

        if (!(bool)$edit) {
            for ($i = 0; $i < $length; ++$i) {
                echo "<input type='checkbox' name='typetour" . $i . "' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
                echo "</br>";
            }
        } else {
            $idsTour = TypeTour::getTypeIdsFromTour($idTour);
            for ($i = 0; $i < $length; ++$i) {
                if (self::checkTypeTourIds(($i + 1), $idsTour)) {
                    echo "<input type='checkbox' name='typetour" . $i . "' value='" . $answer[$i][0] . "'" . " checked>" . $answer[$i][1];
                    echo "</br>";
                } else {
                    echo "<input type='checkbox' name='typetour" . $i . "' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
                    echo "</br>";
                }
            }
        }
    }

    private static function checkTypeTourIds($id, $idsTour)
    {
        for ($i = 0; $i < count($idsTour); ++$i) {
            if ($id === $idsTour[$i][0]) return true;
        }
        return false;
    }

    public static function filterTourCheckbox()
    {

        $answer = TypeTour::getTypeTourByLanguage($_SESSION['lang']);
        $length = count($answer);
        for ($i = 0, $j = 1; $i < $length; ++$i, $j++) {
            echo "<li>";
            echo "<input class='filter' data-filter='.tourtype" . $j . "' type='checkbox' id='checkbox" . $j . "'" . ">";
            echo "<label class='checkbox-label' for='checkbox" . $j . "'>" . $answer[$i][1] . " </label>";
            echo "</li>";
        }
    }

    public static function aboSelect($defaultIndex)
    {
        $answer = Abonnement::getAboByLanguage($_SESSION['lang']);
        $length = count($answer);
        for ($i = 0; $i < $length; ++$i) {
            echo "<option value='" . $answer[$i][0] . "'" . ($defaultIndex == $i ? 'selected' : '') . ">" . $answer[$i][1] . "</option>";
        }
    }

    public static function langSelect($defaultIndex)
    {
        // get language if possible
        $language = loginController::getPreferredLanguage();
        if (strcmp($defaultIndex, 'un') != 0)
            $language = $defaultIndex;
        // variables for views
        $array = array('en', 'de', 'fr');
        $tr = array('English', 'Deutsch', 'Français');
        // add new option for each language and check if it matches the preferred language
        for ($i = 0; $i <= 2; ++$i) {
            echo "<option value='" . $array[$i] . "'" . (strcmp($language, $array[$i]) == 0 ? 'selected' : '') . ">" . $tr[$i] . "</option>";
        }
    }
}