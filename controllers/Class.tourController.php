<?php

/**
 * Created by PhpStorm.
 * User: mv
 * Date: 18.10.2016
 * Time: 09:03
 */
class tourController extends Controller
{
    function tour()
    {
        if ($this->getAdminUser()) {
            $this->redirect('login', 'login');
            exit;
        }
    }
    function inscription(){
        if ($this->getAdminUser()) {
            $this->redirect('inscription', 'inscription');
            exit;
        }
    }

    function favorite()
    {
        if ($this->getAdminUser()) {
            $this->redirect('favorite', 'favorite');
            exit;
        }
    }

    function hiking()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $this->badassSafer($_POST['showHike']);
            if($id != -1){
                $_SESSION['tourId'] = $id;
                if (!self::checkActiveUser())
                    $this->redirect('tour', 'hikeShowOff');
                else
                    $this->redirect('tour', 'hikeShow');
            }
        }
    }

    function showIns(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $this->badassSafer($_POST['showTour']);
            $_SESSION['tourId'] = $id;
            $this->redirect('tour', 'hikeShow');
        }

    }

    function hikingFromHome(){
        if(isset($_SESSION['tourId'])){
            if (!self::checkActiveUser())
                $this->redirect('tour', 'hikeShowOff');
            else
                $this->redirect('tour', 'hikeShow');
        }
    }


    function hikeShow(){

    }

    function hikeShowOff(){

    }

    private function setTransportIds($transportLength){
        $transportIds = array();
        for ($i = 0; $i < $transportLength; $i++) {
            if (isset($_POST['transport' . $i])) {
                $transportIds[] = $i + 1;
            }
        }
        return $transportIds;
    }

    private function setTypeTourIds($typeTourLength){
        $typetourIds = array();
        for ($i = 0; $i < $typeTourLength; $i++) {
            if (isset($_POST['typetour' . $i])) {
                $typetourIds[] = $i + 1;
            }
        }
        return $typetourIds;
    }

    function insertTour()
    {
        /*
        Tour::updateTourImage(1, $_FILES['img']['tmp_name'], $_FILES['img']['type']);
        $image = Tour::selectTourImage(1);
        $_SESSION['testImage'] = $image;
        $this->redirect('admin', 'hikeImageTest');

        exit();*/

        if (isset($_POST['hikeName']) && isset($_POST['difficulty']) && isset($_POST['subtitle'])
            && isset($_POST['duration']) && isset($_POST['locationDep']) && isset($_POST['postcodeDep'])
            && isset($_POST['locationArriv']) && isset($_POST['postcodeArriv'])
            && isset($_POST['price']) && isset($_POST['stat']) && isset($_POST['descDE']) && isset($_POST['descFR'])
            && isset($_POST['sdate']) && isset($_POST['edate']) && isset($_POST['deptime'])
            && isset($_POST['artime']) && strcmp($_FILES['img']['tmp_name'], "") != 0
            && isset($_POST['exdate']) && isset($_POST['a_places'])
        ) {

            $transportLength = Transport::selectTransportLength();
            $typeTourLength = TypeTour::selectTypeTourLength();

            $transportIds = $this->setTransportIds($transportLength);
            $typetourIds = $this->setTypeTourIds($typeTourLength);

            $idLocationDep = loginController::getIdLocationFromZipAndLocationName($_POST['locationDep'], $_POST['postcodeDep']);
            $idLocationArriv = loginController::getIdLocationFromZipAndLocationName($_POST['locationArriv'], $_POST['postcodeArriv']);

            $insertedTourDescId = 0;
            if(Tour::insertTourDescription($_POST['descDE'], $_POST['descFR'], $insertedTourDescId)){
                $tour = new Tour('', $_POST['sdate'], $_POST['edate'], $_POST['duration'], $_POST['hikeName'], $_POST['subtitle'],
                    $_POST['deptime'], $_POST['artime'], $_POST['price'], $_POST['difficulty'], $_POST['stat'],
                    $insertedTourDescId, $_POST['descDE'], $_POST['descFR'], '', $idLocationDep,
                    $idLocationArriv);

                $insertedTourId = 0;
                if(Tour::insertTour($tour, $insertedTourId)){
                    if((count($typetourIds) != 0))TypeTour::insertTypeTour($insertedTourId, $typetourIds);
                    if((count($transportIds) != 0))Transport::insertTransportTour($insertedTourId, $transportIds);
                    if(!Tour::updateTourImage($insertedTourId, $_FILES['img']['tmp_name'], $_FILES['img']['type']))$this->redirect('admin', 'showHike');

                    // gez: get expiration date and available places
                    $edate = $this->badassSafer($_POST['exdate']);
                    $ap = $this->badassSafer($_POST['a_places']);
                    $status = $this->badassSafer($_POST['stat']);
                    $notes = null;
                    if (isset($_POST['notes_guide']))
                        $notes = $this->badassSafer($_POST['notes_guide']);

                    // gez: create obj to insert
                    $inscription = new Inscription(null, $insertedTourId, $ap, $ap, $edate, $status, $notes);
                    Inscription::insertInscription($inscription);
                    $this->redirect('admin', 'showHike');
                }
                else $this->redirect('admin', 'showHike');
            }
            else $this->redirect('admin', 'showHike');
        }
        else $this->redirect('admin', 'showHike');
    }

    function updateTour(){

        if (isset($_POST['hikeName']) && isset($_POST['difficulty']) && isset($_POST['subtitle'])
            && isset($_POST['duration']) && isset($_POST['locationDep']) && isset($_POST['postcodeDep'])
            && isset($_POST['locationArriv']) && isset($_POST['postcodeArriv'])
            && isset($_POST['price']) && isset($_POST['stat']) && isset($_POST['descDE']) && isset($_POST['descFR'])
            && isset($_POST['sdate']) && isset($_POST['edate']) && isset($_POST['deptime'])
            && isset($_POST['artime']) && isset($_POST['exdate']) && isset($_POST['a_places'])
        ) {
            $manageTourInfos = $_SESSION['manageTour'];

            $idLocationDep = loginController::getIdLocationFromZipAndLocationName($_POST['locationDep'], $_POST['postcodeDep']);
            $idLocationArriv = loginController::getIdLocationFromZipAndLocationName($_POST['locationArriv'], $_POST['postcodeArriv']);

            $tour = new Tour($manageTourInfos['idTour'], $_POST['sdate'], $_POST['edate'], $_POST['duration'], $_POST['hikeName'], $_POST['subtitle'],
                $_POST['deptime'], $_POST['artime'], $_POST['price'], $_POST['difficulty'], $_POST['stat'],
                $manageTourInfos['idTourDesc'], $_POST['descDE'], $_POST['descFR'], '', $idLocationDep,
                $idLocationArriv);

            if(strcmp($_FILES['img']['tmp_name'], "") != 0){
                Tour::updateTourImage($manageTourInfos['idTour'], $_FILES['img']['tmp_name'], $_FILES['img']['type']);
            }

            $transportLength = Transport::selectTransportLength();
            $typeTourLength = TypeTour::selectTypeTourLength();

            $transportIds = $this->setTransportIds($transportLength);
            $typetourIds = $this->setTypeTourIds($typeTourLength);
            var_dump((count($transportIds) == 0));
            //if((count($transportIds) == 0))$this->redirect('admin', 'manageHike');
            if((count($typetourIds) == 0))$this->redirect('admin', 'manageHike');

            TypeTour::removeTypesFromTour($manageTourInfos['idTour']);
            Transport::removeTransportsFromTour($manageTourInfos['idTour']);

            Tour::updateTour($tour);

            if((count($typetourIds) != 0))TypeTour::insertTypeTour($manageTourInfos['idTour'], $typetourIds);
            if((count($transportIds) != 0))Transport::insertTransportTour($manageTourInfos['idTour'], $transportIds);

            // gez: get expiration date and available places
            $edate = $this->badassSafer($_POST['exdate']);
            $ap = $this->badassSafer($_POST['a_places']);
            $status = $this->badassSafer($_POST['stat']);
            $notes = "";
            if (isset($_POST['notes_guide']) && is_null($_POST['notes_guide']))
                $notes = $this->badassSafer($_POST['notes_guide']);

            //evaluate free space
            $participants = Participant::getNumberOfParticipants($tour->getIdTour());
            var_dump($participants);
            // new space has to be greater than the already registered participant!
            if ($ap >= $participants){
                $free_space = $ap - $participants;
                // gez: create obj to insert
                $inscription = new Inscription(null, $tour->getIdTour(), $ap, $free_space, $edate, $status, $notes);
                var_dump($inscription);
                Inscription::updateInscription($inscription);
            }else{
                $_SESSION['available'] = 'Die Anzahl möglicher Teilnehmer muss grösser als die bereits gebuchten Teilnehmer sein!';
            }

            $this->redirect('admin', 'manageHike');
        }
        else $this->redirect('admin', 'manageHike');
    }
}