<?php
/**
 * Created by PhpStorm.
 * User: gez
 * Date: 30.09.2016
 * Time: 10:17
 */
class forgotpwController extends Controller
{
    const COMPANY = "Valrando";
    const USERNAME = 'gezu4911@gmail.com';
    const PASSWORD = 'cggf!';
    const HOST = 'smtp.gmail.com';
    const PORT = 587;
    const SMTPSECURE = 'tls';

    function forgotpw(){
        //if a user is active he cannot re-login
        if($this->getActiveUser()){
            $this->redirect('forgotpw', 'forgotpw');
            exit;
        }
    }

    function resetpw(){
        //if a user is active he cannot re-login
        if($this->getActiveUser()){
            $this->redirect('forgotpw', 'forgotpw');
            exit;
        }
    }

    function changes(){
        $pw_new = $_POST['pw'];
        $cpw = $_POST['cpw'];

        // check if the pwd's are equal
        if ($pw_new != $cpw){
            $_SESSION['msg'] = 2;
        }else{
            $_SESSION['msg'] = 1;

            // get current user - noch nicht erledigt!! ID!!
            $currentUser = $_SESSION['account'];
            $this->resetpwDB($pw_new, $currentUser);
            echo $currentUser;
        }

        $this->redirect('forgotpw', 'resetpw');
    }

    function checkMailControl(){
        // call controller login and read result
        $email_input = $_POST['mail'];
        //$email_input = $this->badassSafer($_POST['mail']);

        $result = $this->checkMail($email_input);

        // 1 email exists 2 doesnt exists
        if ($result == 1){
            // for the modification of the view --> if send or not
            $_SESSION['msg'] = 1;
            $this->getUserInfos($email_input);
        }else{
            $_SESSION['msg'] = 2;
        }
        $this->redirect('login', 'forgotpw');
    }

    public static function checkMail($email_input){
        $answer = loginController::checkEmailIfExists($email_input);
        var_dump($answer);
        // handle the pdo statement object and put into var
        $temp = $answer;
        return $result = $temp[0];
    }

    function getUserInfos($email_input){
        // get infos to send (name, language)
        $account = $this->getUserData($email_input);
        $temp = $account->fetch();
        $this->sendMail($temp, true);
    }

    public static function sendMail($temp, $origin){
        $emailTo = null;
        $firstname = null;
        $lastname = null;
        $fullname = null;
        $lastname = null;
        $msgSubject = null;
        $msgMail = null;

        // initialize the phpmailer and the mail
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;

        // from contact or forgotpw page?
        if($origin){
            // forgot pw
            $emailTo = $temp[3];
            $firstname = $temp[1];
            $lastname = $temp[2];
            $fullname = $firstname . " " . $lastname;
            $language = $temp[7];

            // set the email content
            if ($language == 'de'){
                // here comes the mail content
            }else{

            }

            $msgSubject = 'Change Your Passwword';
            $msgMail = 'This is the HTML message body <b>in bold!</b>';
        }else{
            // contact field - send email to myself with the content of the customer
            $firstname = $temp[0];
            $fullname = $firstname;
            $email_Customer = $temp[1];
            $emailTo = self::USERNAME;
            $msgSubject = 'CUSTOMER DEMAND FROM - ' . $fullname . '(' . $email_Customer . ')';
            $msgMail = $temp[2];

            // add a reply
            $mail->addReplyTo($email_Customer, 'Customer Demand');
        }

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->CharSet = 'UTF-8';                             // Encoding for the mail!!
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = self::HOST;                             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = self::USERNAME;                     // SMTP username
        $mail->Password = self::PASSWORD;                     // SMTP password
        $mail->SMTPSecure = self::SMTPSECURE;                 // Enable TLS encryption, `ssl` also accepted
        $mail->Port = self::PORT;                             // TCP port to connect to

        $mail->setFrom(self::USERNAME, self::COMPANY);
        $mail->addAddress($emailTo, $fullname);               // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $msgSubject;
        $mail->Body = $msgMail;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        return;
    }

    // returns all of the data
    private function getUserData($emailToCheck){
        $query = "SELECT * FROM account WHERE email = '$emailToCheck';";
        return SQL::getInstance()->select($query);
    }

    // reset pwd
    private function resetpwDB($pw_new, $currentUser){
        $update = "UPDATE account SET Password = '$pw_new' WHERE idaccount = '$currentUser';";
        return SQL::getInstance()->select($update);
    }
}