<?php

/**
 * Created by PhpStorm.
 * User: gez
 * Date: 22.10.2016
 * Time: 20:45
 */
class inscriptionController extends Controller
{
    function inscription(){
        if($this->getActiveUser()){
            $this->redirect('inscription', 'inscription');
            exit;
        }
    }

    function validateParticipants(){
        // max participants
        $nrParticipants = 10;
        $nrAbosType = 3;

        $firstname = null;
        $lastname = null;
        $abo = null;
        $inscription = null;

        for ($i = 0; $i < $nrParticipants; $i++){
            // if there is no one more set break
            if (isset($_POST['participantFirstname'][$i])) {
                echo '</br>firstname : ' . $_POST['participantFirstname'][$i];
                echo '</br>lastname : ' . $_POST['participantLastname'][$i];
                $key = $i + 1 . '' . 1;
                $temp = (int)$key;
                if (isset($_POST['participantAbo' . $temp])) {
                    echo '</br>abo ----> ' . $_POST['participantAbo' . $temp][0];
                    echo '</br>----------------------------------------';
                }
            }
        }
    }
}