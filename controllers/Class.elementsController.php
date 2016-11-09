<?php

/**
 * Created by PhpStorm.
 * User: jor
 * Date: 18.10.2016
 * Time: 12:43
 */


class elementsController extends Controller
{
    static function getXForView(){
        if (isset($_SESSION['x'])) {
            $x = $_SESSION['x'];
            echo $x;
        }
        else
            var_dump($_SESSION['x']);
    }

    public static function getInscription()
    {
        // get all inscripted accs and related participants
        $id = $_SESSION['idInscription'];
        $accounts_inscripted = Inscription::getAccsInscriptedByIdInscription($id);
        $length_accs = count($accounts_inscripted);
        $x = 0;
        $a = null;

        // check out lang
        $accLang = self::getAdminUserWithoutCookie()->getLanguage();

        if ($length_accs != null){
            // draw accs
            for ($i = 0; $i < $length_accs; $i++) {
                $x++;
                if ($accLang == 'de')
                    $abo_acc = $accounts_inscripted[$i][5];
                if ($accLang == 'fr')
                    $abo_acc = $accounts_inscripted[$i][6];
                echo "<div class=\"wow fadeInLeft\" data-wow-delay=\"0.4s\" >";

                echo "<input type='text' id='nameAcc" . $x . "' disabled value='" . $accounts_inscripted[$i][1] . ' ' . $accounts_inscripted[$i][2] . "'>";
                echo "<input type='text' id='email" . $x . "' disabled value='" . $accounts_inscripted[$i][3] . "'>";
                echo "<input type='text' id='aboAcc" . $x . "' disabled value='" . $abo_acc . "'>";
                echo "</div>";

                $participants = Participant::getParticipantFromInscriptionAccount($id, $accounts_inscripted[$i][0]);
                $length_parts = count($participants);

                if ($length_parts != 0){
                    // draw participants related to accs
                    for ($j = 0; $j < $length_parts; $j++) {
                        $x++;
                        $a .= ',' . $x;

                        if ($accLang == 'de')
                            $abo = $participants[$j][3];
                        if ($accLang == 'fr')
                            $abo = $participants[$j][4];
                        echo "<div class=\"wow fadeInLeft\" data-wow-delay=\"0.4s\" >";

                        echo "<input type='text' id='firstname" . $x . "' disabled value='" . $participants[$j][1] ."'>";
                        echo "<input type='text' id='lastname" . $x . "' disabled value='" . $participants[$j][2] ."'>";
                        echo "<select id='aboPart" . $x . "' name=abo' disabled>";
                            elementsController::aboSelect($participants[$j][6]-1);
                        echo "</select>";
                        echo "</div>";
                    }
                }else{
                    $x++;
                    $_SESSION['msg_no_part'] = 1;
                }
            }
        }else{
            $_SESSION['msg_no_part'] = 2;
        }
        $_SESSION['x'] = $a;
    }

    public static function getInscriptions()
    {
        $answer = Inscription::selectAllInscriptions();
        $accLang = self::getAdminUserWithoutCookie()->getLanguage();
        $length = count($answer);
        $img = '/' . SITE_NAME . '/images/img-6.jpg';

        for ($i = 0; $i < $length; $i++) {
            $finalClass = "'mix " . $answer[$i][0] . ' ' . $answer[$i][1] . ' ' . $answer[$i][2] . ' ' . $answer[$i][3] . ' ' . $answer[$i][4] . ' ' . $answer[$i][5] . ' ' . $answer[$i][6] . ' ' . $answer[$i][7] .' ' . $answer[$i][8] .' ' . $answer[$i][9] ."'";
            $id = $answer[$i][0];
            if ($accLang == 'de')
                $status = $answer[$i][7];
            if ($accLang == 'fr')
                $status = $answer[$i][8];
            echo "<li class=$finalClass onclick='showInscription($id)'>";
            echo "<div class='hovereffect'>";
            echo "<img alt='No image found' src='$img' />";
            echo "<div class='overlay'>";
            echo "<h5>" .$answer[$i][5] .' ' . $answer[$i][6] . ', ' . $answer[$i][9] . "<br /></h5>";
            echo "<h6>" . $answer[$i][3]."<br />".$answer[$i][4]."<br />". $status. "<br /></h6>";
            echo "</div>";
            echo "</li>";
        }
        echo "<input type='hidden' id='saver' name='showInscription' value='0' />";
    }

    public static function showInscriptionPerUser($accountId){
        $answer = Inscription::getAllInsByAccount($accountId);
        $length = count($answer);

        if($length == 0){
            if(strcmp($_SESSION['lang'],'de')==0)
                echo "<div class='col-md-4'><li>" . 'Sie haben keine Einschreibungen' . "</li></div>";
            else
                echo "<div class='col-md-4'><li>" . 'Pas de inscription!' . "</li></div>";
            return;
        }

        for ($i = 0; $i < $length; $i++) {
            $id = $answer[$i][1];
            echo "<div class='col-md-4'><li>" . $answer[$i][3] . "</li></div>";
            echo "<div class='col-md-8'><li onclick='showTour($id)'>" . $answer[$i][2] . "</li></div>";
            if(strcmp($_SESSION['lang'],'de')==0)
                echo "<div class='col-md-4'><li>" . "Startdatum: " . "</li></div>";
            else
                echo "<div class='col-md-4'><li>" . "Date de début: " . "</li></div>";
            echo "<div class='col-md-8'><li>" . $answer[$i][3] . "</li></div>";
            if(strcmp($_SESSION['lang'],'de')==0)
                echo "<div class='col-md-4'><li>" . "Enddatum: " . "</li></div>";
            else
                echo "<div class='col-md-4'><li>" . "Date de fin: " . "</li></div>";
            echo "<div class='col-md-8'><li>" . $answer[$i][4] . "</li></div>";
        }
        echo "<input type='hidden' id='saver' name='showTour' value='0' />";

    }


    public static function showMenu($showMenu){
        $de = ROOT_DIR . 'views/lang/lang.de.php';
        $fr = ROOT_DIR . 'views/lang/lang.fr.php';
        $alreadyIncluded = false;
        $included_files = get_included_files();
        foreach ($included_files as $filename) {
            if(strcmp($filename,$de) == 0 && strcmp($filename,$fr) == 0) $alreadyIncluded = true;
        }
        if(!$alreadyIncluded) {
            if(isset($_SESSION['lang'])){
                if(strcmp($_SESSION['lang'],'de')==0) include $de;
                else include $fr;
            }
        }

        $user = self::checkActiveUser();
        if(!$showMenu) {
            if (is_bool($user) === true && !$user) {
                echo "<li><a href=" . URL_DIR . "login/register>" . $lang['HEADER_REGISTER'] . "</a></li>";
                echo "<li><a href=" . URL_DIR . "login/login>" . $lang['HEADER_LOGIN'] . "</a></li>";
            } else {
                $name = $_SESSION["account"];
                echo "<li><a href=" . URL_DIR . "profile/showuser>" . $lang['HEADER_LOGGED'] . ' ' . $name->getFullName() . "</a></li>";
                echo "<li><a href=" . URL_DIR . "login/logout>" . $lang['HEADER_LOGOUT'] . "</a></li>";
            }
        }else if($showMenu){
            echo "<li id='menu_home'><a href=".URL_DIR.'home'.">".  $lang['MENU_NEWS'] . "</a></li>";
            echo "<li id='menu_hiking'><a href=".URL_DIR.'tour/hiking'.">". $lang['MENU_TOUR']."</a></li>";
            if((is_bool($user) === true && !$user) || (is_int($user) === true && $user != 10)) {
                echo "<li id='menu_about'><a href=".URL_DIR.'general/about'.">". $lang['MENU_ABOUT'] . "</a></li>";
                echo "<li id='menu_contact'><a href=" .URL_DIR.'general/contact'.">". $lang['MENU_CONTACT'] . "</a></li>";
            }
            if(is_int($user) === true && $user == 1){
                echo "<li id='menu_profil'><a href=".URL_DIR.'profile/showuser'.">". $lang['MENU_PROFIL']."</a></li>";
                echo "<li id='menu_inscription'><a href=".URL_DIR.'tour/showIns'.">". $lang['MENU_INSCRIPTION']."</a></li>";
            } else if (is_int($user) === true && $user == 10){
                echo "<li id='menu_showHike'><a href=".URL_DIR.'admin/showHike'.">".  $lang['MENU_SHOWHIKE'] . "</a></li>";
                echo "<li id='menu_accmanage'><a href=".URL_DIR.'admin/manageAccount'.">".  $lang['MENU_ACCMGMT'] . "</a></li>";
                echo "<li id='menu_insmanage'><a href=".URL_DIR.'admin/manageInscription'.">". $lang['MENU_INSCRIPTIONMGMT'] . "</a></li>";
                echo "<li id='menu_profil'><a href=".URL_DIR.'profile/showuser'.">". $lang['MENU_PROFIL'] . "</a></li>";
            }
        }
    }

    public static function selectToursOFF()
    {
        // call db
        $answer = Tour::selectAllTours();
        self::drawSortList($answer, null);
    }

    public static function getNext3Hikings(){
        $answer = Tour::getNext3Hikings();
        $length = count($answer);

        for ($i = 0; $i < $length; $i++) {
            $id = $answer[$i][0];
            $date = $answer[$i][1];
            $title = $answer[$i][4];
            $subtitle = $answer[$i][5];
            $timefrom = substr($answer[$i][6], 0, -3);
            $timeto = substr($answer[$i][7], 0, -3);
            $day = substr($date, -2);
            $m = substr($date, 5, -3);
            //month
            switch ($m) {
                case 1:
                    $month = "jan";
                    break;
                case 2:
                    if($_SESSION['lang'] == 'fr')
                        $month = "fev";
                    else
                        $month = "feb";
                    break;
                case 3:
                    if($_SESSION['lang'] == 'fr')
                        $month = "mar";
                    else
                        $month = "m&auml;r";
                    break;
                case 4:
                    if($_SESSION['lang'] == 'fr')
                        $month = "avr";
                    else
                        $month = "apr";
                    break;
                case 5:
                    $month = "mai";
                    break;
                case 6:
                    if($_SESSION['lang'] == 'fr')
                        $month = "juin";
                    else
                        $month = "jun";
                    break;
                case 7:
                    if($_SESSION['lang'] == 'fr')
                        $month = "juil";
                    else
                        $month = "jul";
                    break;
                case 8:
                    if($_SESSION['lang'] == 'fr')
                        $month = "aou";
                    else
                        $month = "aug";
                    break;
                case 9:
                    $month = "sep";
                    break;
                case 10:
                    if($_SESSION['lang'] == 'fr')
                        $month = "oct";
                    else
                        $month = "okt";
                    break;
                case 11:
                    $month = "nov";
                    break;
                case 12:
                    if($_SESSION['lang'] == 'fr')
                        $month = "dec";
                    else
                        $month = "dez";
                    break;
                default:
                    $month = $m;
                    break;
            }
            // get tour image from db
            $tourImage = Tour::selectTourImage($id);
            $temp = "data:" . $tourImage['mime'] . ";base64," . base64_encode($tourImage['data']);
            echo "<div class='col-md-4 events-top'>";
            echo "<img onmouseover='' style='cursor: pointer;' onclick='showHike1($id)' alt='No image found' class='img-responsive' src='$temp' />";
            echo "<div class='events-bottom'>";
            echo "<div class='events-left'>";
            echo "<h5>$day</h5>";
            echo "<span>$month</span>";
            echo "</div>";
            echo "<div class='events-right'>";
            echo "<h6>$title</h6>";
            echo "<p>$subtitle<br />$timefrom - $timeto</p>";
            echo "</div>";
            echo "<div class='clearfix'> </div>";
            echo "</div>";
            echo "</div>";
        }
        echo "<input type='hidden' id='saver' name='showHike' value='0' />";
    }

    public static function getAccounts()
    {
        $answer = Account::selectAllAccounts();
        $length = count($answer);
        $img = '/' . SITE_NAME . '/images/profile_pic.png';

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

    public static function avgRatings(){
        // get tour and get all ratings / all accs
        $idTour = $_SESSION['tourId'];
        $ratingsTour = Rating::selectRatingsFromTour($idTour);
        $nrRatings = count($ratingsTour);
        $sumRatings = Rating::getSumRatings($idTour);

        echo "<div class='col-md-12'><span>Total Bewertungen : ". $nrRatings . "</span></div></br>";

        if ($nrRatings != 0){
            $avgRatings = $sumRatings / $nrRatings;
            echo "<label>" . $avgRatings . " von 5 Sternen</label>";
        }
    }

    public static function comments()
    {
        // get all ratings from the current tour
        $idTour = $_SESSION['tourId'];

        $ratingsTour = Rating::selectRatingsFromTour($idTour);

        foreach ($ratingsTour as $item){
            // get account infos to display
            $accountRated = Account::selectAccountById($item['Account_idAccount']);
            echo "<label>" . "Von " . $accountRated['Firstname'] . " " . $accountRated['Lastname'] . " am " . $item['Date_of_comment'] . "</label></br>";

            $prepStars = array();
            for ($j = 1; $j <= 5; $j++) {
                if($item['Rating'] >= $j){
                    $prepStars[$j] = "<span class='filled'>☆</span>";
                }
                else{
                    $prepStars[$j] = "<span class=''>☆</span>";
                }
            }
            echo $prepStars[1] . $prepStars[2] . $prepStars[3] . $prepStars[4] . $prepStars[5];
            if ($item['Comment'] == null)
                $inputComment = '-';
            else
                $inputComment = $item['Comment'];

            echo "<textarea class='' style='width: 500px; height: 100px;' type='text' disabled>" . $inputComment . "</textarea>";
        }
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
            // get tour image from db
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
                        echo "<li class=$finalClass>";
                        echo "<button id='stars' onclick='letsgo($idTours[$x])' style='border: 0; background: transparent'><img id='star' src='../images/star.png' style='width: 15px; height: 15px;' /></button>";
                        echo "<div onclick='showHike($idTours[$x])' class='hovereffect'>";
                        echo "<img class='img-responsive' alt='Embedded Image' src=$temp>";
                        echo "<div class='overlay'>";
                        echo "<h5>$title[$x]<br />$location[$x], $datePick[$x]</h5>";
                        if(strcmp($_SESSION['lang'],'fr')==0)
                            echo "<h6>Difficulté: $diffString<br />Durée: $durations[$x]<br /></h6>";
                        else
                            echo "<h6>Schwierigkeit: $diffString<br />Dauer: $durations[$x]<br /></h6>";
                        echo "</div>";
                        echo "</li>";
                         break;
                    }
                }
                if (!$draw) {
                    $finalClass = "'mix " . $date . ' ' . $duration . ' ' . $diff . ' ' . $region . ' ' . $tourType . "'";
                    echo "<li class=$finalClass>";
                    echo "<button id='stars' onclick='letsgo($idTours[$x])' style='border: 0; background: transparent'><img id='star' src='../images/star2.png' style='width: 15px; height: 15px;' /></button>";
                    echo "<div onclick='showHike($idTours[$x])' class='hovereffect'>";
                    echo "<img class='img-responsive' alt='Embedded Image' src=$temp>";
                    echo "<div class='overlay'>";
                    echo "<h5>$title[$x]<br />$location[$x], $datePick[$x]</h5>";
                    if(strcmp($_SESSION['lang'],'fr')==0)
                        echo "<h6>Difficulté: $diffString<br />Durée: $durations[$x]<br /></h6>";
                    else
                        echo "<h6>Schwierigkeit: $diffString<br />Dauer: $durations[$x]<br /></h6>";
                    echo "</div>";
                    echo "</li>";
                                   }
            } else {
                $finalClass = "'mix " . $date . ' ' . $duration . ' ' . $diff . ' ' . $region . ' ' . $tourType . "'";
                echo "<li onclick='showHike($idTours[$x])' class=$finalClass>";
                echo "<div class='hovereffect'>";
                echo "<img class='img-responsive' alt='Embedded Image' src=$temp>";
                echo "<div class='overlay'>";
                echo "<h5>$title[$x]<br />$location[$x], $newDate</h5>";
                if(strcmp($_SESSION['lang'],'fr')==0)
                    echo "<h6>Difficulté: $diffString<br />Durée: $durations[$x]<br /></h6>";
                else
                    echo "<h6>Schwierigkeit: $diffString<br />Dauer: $durations[$x]<br /></h6>";
                echo "</div>";
                echo "</li>";
            }
        }
        echo "<input type='hidden' id='saver' name='showHike' value='0' />";
    }

    public static function nrParticipantInputs()
    {
        $number = $_SESSION['msg'];
        for ($i = 0; $i < $number; ++$i) {
            echo "<input type='text' required>";
        }
    }

    public static function favoritesWhenLoggedIn(){
        if(self::getActiveUserWithoutCookie()){
            if(strcmp($_SESSION['lang'],'fr')==0) {
                echo "<li class='filter'><a class='selected' href='#0' data-type='all'>Tous</a></li>";
                echo "<li class='filter' data-filter='.fav1'><a href='#0' data-type='fav1'>Favoris</a></li>";
            } else {
                echo "<li class='filter'><a class='selected' href='#0' data-type='all'>Alle</a></li>";
                echo "<li class='filter' data-filter='.fav1'><a href='#0' data-type='fav1'>Favoriten</a></li>";
            }
        }
    }

    public static function favoritesSelect()
    {
        // id current user
        if(self::getActiveUserWithoutCookie()){
            $currentUser = self::getActiveUserWithoutCookie();
            $idAcc = $currentUser->getIdAccount();
            // call db
            $answerFavorites = Favorite::getAllFavorites($idAcc);
        }
        else{
            $answerFavorites = false;
        }
        // get tours
        $answer = Tour::selectAllTours();
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
            if ($id == $idsTour[$i][0]) return true;
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
        if($_SESSION['lang'])
            $answer = TypeTour::getTypeTourByLanguage($_SESSION['lang']);
        else
            $answer = TypeTour::getTypeTourByLanguage('de');

        $length = count($answer);

        if (!(bool)$edit) {
            for ($i = 0; $i < $length; ++$i) {
                echo "<input type='checkbox' id='typetour' name='typetour" . $i . "' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
                echo "</br>";
            }
        } else {
            $idsTour = TypeTour::getTypeIdsFromTour($idTour);

            for ($i = 0; $i < $length; ++$i) {
                if (self::checkTypeTourIds(($i + 1), $idsTour)) {
                    echo "<input type='checkbox' id='typetour' name='typetour" . $i . "' value='" . $answer[$i][0] . "'" . " checked>" . $answer[$i][1];
                    echo "</br>";
                } else {
                    echo "<input type='checkbox' id='typetour' name='typetour" . $i . "' value='" . $answer[$i][0] . "'" . ">" . $answer[$i][1];
                    echo "</br>";
                }
            }
        }
    }

    public static function getTypeTourForHikeShow($idTour){
        if($_SESSION['lang'])
            $answer = TypeTour::getTypeTourByLanguageOfTour($idTour, $_SESSION['lang']);
        else
            $answer = TypeTour::getTypeTourByLanguageOfTour($idTour, 'de');

        $length = count($answer);
        $types = "";

        for ($i = 0; $i < $length; ++$i) {
            if(($i+1) === $length){
                $types .= $answer[$i][2];
            }
            else $types .= $answer[$i][2] . "/ ";
        }

        return $types;
    }

    private static function checkTypeTourIds($id, $idsTour)
    {

        for ($i = 0; $i < count($idsTour); ++$i) {
            if ($id == $idsTour[$i][0]) return true;
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