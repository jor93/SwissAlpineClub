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

    function validateparticipants_inscription(){
        // get index of participants
        $maxPart = $_SESSION['index'];

        // get id of tour and inscription
        $idInscription = $_SESSION['idInscription'];
        $countParticipants = 0;

        $account = $_SESSION['account']->getIdAccount();
        // check if account is already inserted for this tour!
        $checkAccForTour = Inscription::checkAccForTour($account, $idInscription);
        // check status
        $checkStatus = Inscription::selectInscriptionByIdInscription($idInscription);

        // 1 = open
        if ($checkStatus->getStatusIdStatus() == 1){
            // check if space is available
            $free_space = $checkStatus->getFreeSpace();
            if ($free_space > 0){
                // insert into db + myself and update acc + inscription
                if (isset($_SESSION['account_participant'])) {
                    if ($checkAccForTour){
                        $_SESSION['error_msg'] = 1;
                    }else{
                        $countParticipants++;
                        // update account_inscription table
                        Inscription::insertInscriptionAccount($account, $idInscription);
                    }
                }else {
                    // if not selected -> he has to be already inscripted!
                    $result = Inscription::selectAccountInscripted($account, $idInscription);
                    if ($result == null) {
                        $_SESSION['error_msg'] = 2;
                        return $this->redirect('tour', 'hikeshow');
                    }
                }
                for ($i = 1; $i <= $maxPart; $i++) {
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
                        $participant = new Participant(null, $firstname, $lastname, $abo, $idInscription, $account);
                        Participant::insertParticipant($participant);

                        // count to modify the available places
                        $countParticipants++;
                    }
                }
                // check if free space is greater than new participants
                if ($free_space >= $countParticipants) {
                    // update free space in db
                    Inscription::updateFreeSpace($idInscription, $countParticipants);
                }else{
                    $_SESSION['error_msg'] = 3;
                }
            }else{
                // booked out
                Inscription::updateStatus($idInscription, 2);
                $_SESSION['error_msg'] = 4;
            }
            // 2 = booked out/already executed
        }else if ($checkStatus->getStatusIdStatus() == 2){
            $_SESSION['error_msg'] = 5;
            // 3 = canceled
        }else if ($checkStatus->getStatusIdStatus() == 3){
            $_SESSION['error_msg'] = 6;
        }
        $this->redirect('tour', 'hikeshow');
    }

    function validaterating(){
        // get the rating from view, user and the tour
        $selectedRating = $this->badassSafer($_POST['star']);
        $givenComment = $this->badassSafer($_POST['input_comment']);

        // get the current user
        $idAcc = $_SESSION['account']->getIdAccount();
        $idTour = $_SESSION['tourId'];

        // check if already rated - if no discard
        $checkAccount = Rating::selectRatingByidAccount($idAcc, $idTour);

        // if true he hasnt added a rate in db
        if ($checkAccount){
            // insert into db
            $currentDate = date("Y-m-d");
            $rating = new Rating(null, $idAcc, $idTour, $selectedRating, $givenComment, $currentDate);
            Rating::insertRating($rating);
            return $this->redirect('tour', 'hikeshow');
        }else{
            $_SESSION['error_account_rating'] = 1;
            return $this->redirect('tour', 'hikeshow');
        }
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