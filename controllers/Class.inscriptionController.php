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

    function validateParticipants_Inscription(){
        // object array of inputs
        $inputParticipants = array();
        $maxPart = $_SESSION['index'];
        echo 'value : ' . $_SESSION['index'];

        for ($i = 1; $i <= $maxPart; $i++){
            if (isset($_POST['participantFirstname'][$i])) {
                // get value from inputs
                echo '</br>firstname : ' . $_POST['participantFirstname'][$i];
                echo '</br>lastname : ' . $_POST['participantLastname'][$i];
                $firstname = $this->badassSafer($_POST['participantFirstname'][$i]);
                $lastname = $this->badassSafer($_POST['participantLastname'][$i]);

                // get the selected abo from radios
                $key = $i . '' . 1;
                $temp = (int)$key;
                echo '</br>temp' . $temp;
                if (isset($_POST['participantAbo' . $temp])) {
                    echo '</br>abo ----> ' . $_POST['participantAbo' . $temp][0];
                    echo '</br>----------------------------------------';
                    $abo = $this->badassSafer($_POST['participantAbo' . $temp][0]);
                }

                //$tempParticipant = new Participant(null, $firstname, $lastname, $abo, null);
            }
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