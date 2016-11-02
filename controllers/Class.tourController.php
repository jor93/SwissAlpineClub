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
        if ($this->getAdminUser()) {
            $this->redirect('hiking', 'hiking');
            exit;
        }
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
            && isset($_POST['duration']) && isset($_POST['locationDep']) && isset($_POST['locationArriv'])
            && isset($_POST['price']) && isset($_POST['stat']) && isset($_POST['descDE']) && isset($_POST['descFR'])
            && isset($_POST['sdate']) && isset($_POST['edate']) && isset($_POST['deptime'])
            && isset($_POST['artime']) && strcmp($_FILES['img']['tmp_name'], "") != 0
        ) {

            $transportLength = Transport::selectTransportLength();
            $typeTourLength = TypeTour::selectTypeTourLength();

            $transportIds = $this->setTransportIds($transportLength);
            $typetourIds = $this->setTypeTourIds($typeTourLength);

            $insertedTourDescId = 0;
            if(Tour::insertTourDescription($_POST['descDE'], $_POST['descFR'], $insertedTourDescId)){
                $tour = new Tour('', $_POST['sdate'], $_POST['edate'], $_POST['duration'], $_POST['hikeName'], $_POST['subtitle'],
                    $_POST['deptime'], $_POST['artime'], $_POST['price'], $_POST['difficulty'], $_POST['stat'],
                    $insertedTourDescId, $_POST['descDE'], $_POST['descFR'], '', $_POST['locationDep'],
                    $_POST['locationArriv']);

                $insertedTourId = 0;
                if(Tour::insertTour($tour, $insertedTourId)){
                    TypeTour::insertTypeTour($insertedTourId, $typetourIds);
                    Transport::insertTransportTour($insertedTourId, $transportIds);
                    Tour::updateTourImage($insertedTourId, $_FILES['img']['tmp_name'], $_FILES['img']['type']);
                }
            }
        }
    }

    function updateTour(){
        if (isset($_POST['hikeName']) && isset($_POST['difficulty']) && isset($_POST['subtitle'])
            && isset($_POST['duration']) && isset($_POST['locationDep']) && isset($_POST['locationArriv'])
            && isset($_POST['price']) && isset($_POST['stat']) && isset($_POST['descDE']) && isset($_POST['descFR'])
            && isset($_POST['sdate']) && isset($_POST['edate']) && isset($_POST['deptime'])
            && isset($_POST['artime'])
        ) {
            $manageTourInfos = $_SESSION['manageTour'];
            $tour = new Tour($manageTourInfos['idTour'], $_POST['sdate'], $_POST['edate'], $_POST['duration'], $_POST['hikeName'], $_POST['subtitle'],
                $_POST['deptime'], $_POST['artime'], $_POST['price'], $_POST['difficulty'], $_POST['stat'],
                $manageTourInfos['idTourDesc'], $_POST['descDE'], $_POST['descFR'], '', $_POST['locationDep'],
                $_POST['locationArriv']);

            if(strcmp($_FILES['img']['tmp_name'], "") != 0){
                Tour::updateTourImage($manageTourInfos['idTour'], $_FILES['img']['tmp_name'], $_FILES['img']['type']);
            }

            $transportLength = Transport::selectTransportLength();
            $typeTourLength = TypeTour::selectTypeTourLength();

            $transportIds = $this->setTransportIds($transportLength);
            $typetourIds = $this->setTypeTourIds($typeTourLength);

            TypeTour::removeTypesFromTour($manageTourInfos['idTour']);
            Transport::removeTransportsFromTour($manageTourInfos['idTour']);

            Tour::updateTour($tour);

            TypeTour::insertTypeTour($manageTourInfos['idTour'], $typetourIds);
            Transport::insertTransportTour($manageTourInfos['idTour'], $transportIds);

            $this->redirect('admin', 'showHike');
        }
    }


    function hikeShow(){

    }

}