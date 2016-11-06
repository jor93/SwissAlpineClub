<?php

/**
 * Created by PhpStorm.
 * User: gez
 * Date: 22.10.2016
 * Time: 20:45
 */
class inscriptionController extends Controller
{
    private $max_participants;

    function inscription(){
        if($this->getActiveUser()){
            $this->redirect('inscription', 'inscription');
            exit;
        }
    }

    function setIndexInputs(){
        $this->setMaxParticipants($_POST['index']);
        $_SESSION['index'] = $this->getMaxParticipants();
    }

    function setAccountToParticipants(){
        $_SESSION['account_participant'] = $this->badassSafer($_POST['acc_part']);
    }

    function validateParticipants_Inscription(){
        // get index of participants
        $maxPart = $_SESSION['index'];

        // get id of tour and inscription
        $idInscription = $_SESSION['idInscription'];
        $countParticipants = 0;


        $account = self::getActiveUserWithoutCookie()->getIdAccount();

        // myself and update acc + inscription
        if (isset($_SESSION['account_participant'])){
            $countParticipants++;

            // update account_inscription table
            Inscription::insertInscriptionAccount($account, $idInscription);
        }else{
            // if not selected he has to be already inscripted!
            $result = Inscription::selectAccountInscripted($account, $idInscription);
            if ($result == null){
                $_SESSION['error_account'] = 1;
                return $this->redirect('tour', 'hikeShow');
            }
        }

        for ($i = 1; $i <= $maxPart; $i++){
            if (isset($_POST['participantFirstname'][$i])) {
                // get value from inputs
                $firstname = $this->badassSafer($_POST['participantFirstname'][$i]);
                $lastname = $this->badassSafer($_POST['participantLastname'][$i]);

                // get the selected abo from radios
                $key = $i . '' . 1;
                $temp = (int)$key;
                if (isset($_POST['participantAbo' . $temp])) {
                    $abo = $this->badassSafer($_POST['participantAbo' . $temp][0]);
                }

                // prepare and insert into participant
                $participant = new Participant(null, $firstname, $lastname, $abo, $idInscription);
                Participant::insertParticipant($participant);

                // count to modify the available places
                $countParticipants++;
            }
        }
        // update free space in db
        Inscription::updateFreeSpace($idInscription, $countParticipants);
        $this->redirect('tour', 'hikeshow');
    }

    function validateRating(){
        // get the rating from view
        $selectedRating = $this->badassSafer($_POST['selectedStar']);

        if (isset($_POST['givenComment']) && $_POST)
            $givenComment = $this->badassSafer($_POST['givenComment']);
        $idAcc = 2;
        $idTour = 8;
        /*

        // check if already rated - if no discard
        $checkAccount = Rating::selectRatingByidAccount($idAcc, $idTour);

        // if true is already in db
        if ($checkAccount){
            // insert into db
            $rating = new Rating('', $idAcc, $idTour, $selectedRating, $givenComment);
            Rating::insertRating($rating);
        }else{
            $_SESSION['error_alreadyRated'] = 1;
            //return $this->redirect('tour', 'hikeShow');
        }

        // update tour rating - calc the average - load all tours and save into session (in elementscontroller)

        // load the page
*/
    }

    /**
     * @return mixed
     */
    public function getMaxParticipants()
    {
        return $this->max_participants;
    }

    /**
     * @param mixed $max_participants
     */
    public function setMaxParticipants($max_participants)
    {
        $this->max_participants = $max_participants;
    }
}