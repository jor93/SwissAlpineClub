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

        for ($i = 0; $i <= $nrParticipants; $i++){
            // if there is no one more set break
            if (isset($_POST['participantFirstname'][$i])){
                echo '</br>' . $_POST['participantFirstname'][$i] . '</br>';
                echo $_POST['participantLastname'][$i] . '</br>';

                echo 'HEEEREEEE';
                for ($a = $i-1; $a <= $nrParticipants; $a++){
                    if (isset($_POST['participantAbo'.$a][$i]))
                        $temp = $_POST['participantAbo'.$a][$i] . '</br>';

                    echo 'Value: ' . $temp;
                    break;
                }


/*
                $firstname = $this->badassSafer($_POST['participantFirstname'][$i]);
                $lastname = $this->badassSafer($_POST['participantLastname'][$i]);
                $abo = $this->badassSafer($_POST['participantAbo'.$i][$i]);

                // set into object
                $obj = new Participant(null, $firstname, $lastname, $abo, 1);

                // insert into db
               // Participant::insertParticipant($obj);
*/
            }
        }


        //$this->redirect('tour', 'inscription');
    }

}