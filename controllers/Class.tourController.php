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

    function insertTour()
    {

        $transportLength = Transport::selectTransportLength();
        $typeTourLength = TypeTour::selectTypeTourLength();

        /*
                Tour::updateTourImage(1, 'images/banner.jpeg', 'image/jpeg');
                $image = Tour::selectTourImage(1);
                header("Content-Type: image/jpeg");

                echo '<img src="data:image/jpeg;base64,'.base64_encode( $image['data'] ).'"/>';*/

        if (isset($_POST['hikeName']) && isset($_POST['difficulty']) && isset($_POST['subtitle'])
            && isset($_POST['duration']) && isset($_POST['locationDep']) && isset($_POST['locationArriv'])
            && isset($_POST['price']) && isset($_POST['stat']) && isset($_POST['descDE']) && isset($_POST['descFR'])
            && isset($_POST['sdate']) && isset($_POST['edate']) && isset($_POST['deptime'])
            && isset($_POST['artime']) && isset($_FILES['img'])
        ) {

            $transportIds = array();
            for ($i = 0; $i < $transportLength; $i++) {
                if (isset($_POST['transport' . $i])) {
                    $transportIds[] = $i + 1;
                }
            }

            $typetourIds = array();
            for ($i = 0; $i < $typeTourLength; $i++) {
                if (isset($_POST['typetour' . $i])) {
                    $typetourIds[] = $i + 1;
                }
            }

            $insertedTourDescId = 0;
            if(Tour::insertTourDescription($_POST['descDE'], $_POST['descFR'], $insertedTourDescId)){
                $tour = new Tour('', $_POST['sdate'], $_POST['edate'], $_POST['duration'], $_POST['hikeName'], $_POST['subtitle'],
                    $_POST['deptime'], $_POST['artime'], $_POST['price'], $_POST['difficulty'], $_POST['stat'],
                    $insertedTourDescId, $_POST['descDE'], $_POST['descFR'], '', $_POST['locationDep'],
                    $_POST['locationArriv'], '', '');

                $insertedTourId = 0;
                if(Tour::insertTour($tour, $insertedTourId)){
                    TypeTour::insertTypeTour($insertedTourId, $typetourIds);
                    Transport::insertTransportTour($insertedTourId, $transportIds);
                }

            }


            //Picture
            /*
            $handle = $_FILES['img']['tmp_name'];
            $mime = $_FILES['img']['type'];
            var_dump($handle);
            var_dump($mime);
            //Tour::updateTourImage(1, $handle, $mime);
            Tour::updateTourImage(1, 'images\banner.jpg', $mime);

            $image = Tour::selectTourImage(1);
            //header("Content-Type:" . $image['mime']);
            header("Content-Type:" . 'image/jpeg');
            echo $image;
            //var_dump($image['data']);
            //http://www.mysqltutorial.org/php-mysql-blob/
            */
        }

    }
}