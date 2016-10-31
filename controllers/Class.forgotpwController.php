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
    const PASSWORD = 'zurGlebdGvGubeHgerGoo11!';
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
            $this->redirect('forgotpw', 'resetpassword');
            exit;
        }
    }

    function resetpassword(){
        $pw_new = $_POST['pw'];
        $cpw = $_POST['cpw'];

        // check if the pwd's are equal
        if ($pw_new != $cpw){
            // the repeated pwd is not equal to the first one
            $_SESSION['msg'] = 2;
        }else{
            // successfully changed
            $_SESSION['msg'] = 1;

            // check the conditions of the pwd
            $weak = loginController::checkPasswordStrength($pw_new);

            if (!$weak){
                // it is too weak
                $_SESSION['msg'] = 3;
            }

            // get the current user and identify the his id!
            $currentUser = $this->getActiveUserWithoutCookie();
            $idAcc = $currentUser->getIdAccount();

            $this->resetpwDB($pw_new, $idAcc);
        }
        $this->redirect('login', 'resetpw');
    }

    function checkMailControl(){
        // call controller login and read result
        $email_input = $_POST['mail'];
        //$email_input = $this->badassSafer($_POST['mail']);

        $result = $this->checkMail($email_input);

        // 1 email exists 2 doesnt exists
        if ($result == 1){
            // for the modification of the view --> if send or not
            $this->getUserInfos($email_input);
            $_SESSION['msg'] = 1;
        }else{
            $_SESSION['msg'] = 2;
        }
        $this->redirect('login', 'forgotpw');
    }

    public static function checkMail($email_input){
        $answer = loginController::checkEmailIfExists($email_input);
        // handle the pdo statement object and put into var
        $temp = $answer;
        return $result = $temp[0];
    }

    function getUserInfos($email_input){
        // get infos to send (name, language)
        $account = $this->getUserData($email_input);
        $temp = $account->fetch();
        $this->sendMail($temp, 1);
    }

    static function prepMail($temp, $origin){
        echo '</br>' . $temp[3];
        echo '</br>' . $temp[1];
        echo '</br>' . $temp[2];
        echo '</br>' . $temp[7];
        $obj = new Mail($temp[3], $temp[1], $temp[2], null, null, $temp[7]);
        //echo 'HSADLFHASLDH';


        $_SESSION['lang'] = $obj->getLang();
        $language = $obj->getLang();
        include_once(ROOT_DIR.'views/common.php');

        if ($origin == 1){
            // set the email content - forgot pw
            if ($language == 'de'){
                // here comes the mail content
                $obj->setMsgSubject($lang['FORGOTPW_MAIL_SUBJECT']);
                $obj->setMsgMail($lang['FORGOTPW_MAIL_BODY']);
            }else {
                $obj->setMsgSubject($lang['FORGOTPW_MAIL_SUBJECT']);
                $obj->setMsgMail($lang['FORGOTPW_MAIL_BODY']);
            }
        }else if ($origin == 3){
            // set the email content - forgot pw
            if ($language == 'de'){
                // here comes the mail content
                $obj->setMsgSubject($lang['CONFIRMATION_MAIL_SUBJECT']);
                $obj->setMsgMail($lang['CONFIRMATION_MAIL_BODY']);
            }else {
                $obj->setMsgSubject($lang['CONFIRMATION_MAIL_SUBJECT']);
                $obj->setMsgMail($lang['CONFIRMATION_MAIL_BODY']);
            }
        }
        return $obj;
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

        // from confirmation or forgotpw page?
        if($origin == 1 || $origin == 3){
            // forgot pw
            $obj = self::prepMail($temp, $origin);
            $emailTo = $obj->getEmailTo();
            $fullname = $obj->getFullname();

            // contact formular
        }else if ($origin == 2){
            // contact field - send email to myself with the content of the customer
            $firstname = $temp[0];
            $fullname = $firstname;
            $email_Customer = $temp[1];
            $emailTo = self::USERNAME;
            $msgSubject = 'CUSTOMER DEMAND FROM - ' . $fullname . '(' . $email_Customer . ')';
            $msgMail = $temp[2];

            // add a reply
            $mail->addReplyTo($email_Customer, 'Customer Demand');
            // pwd confirmation
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
    private function resetpwDB($pw_new, $idAcc){
        $update = "UPDATE account SET Password = '$pw_new' WHERE idaccount = '$idAcc';";
        SQL::getInstance()->select($update);
        return;
    }
}