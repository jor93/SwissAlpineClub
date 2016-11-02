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
        /*
        if($this->getActiveUser()){
            $this->redirect('forgotpw', 'resetpw');
            exit;
        }
        */
        $this->redirect('forgotpw', 'resetpw');
    }

    function resetpassword()
    {
        $pw_new = $this->badassSafer($_POST['pw']);
        $cpw = $this->badassSafer($_POST['cpw']);

        $checkpwd = $this->validatePWs($pw_new, $cpw);

        // get the current user if he is logged in!
        $currentUser = $this->getActiveUserWithoutCookie();

        if ($checkpwd) {
            if (isset($_SESSION['action_url']) && isset($_SESSION['encrypt_url']) && !$currentUser){
                // get the values from the mail
                $action_url = $_SESSION['action_url'];
                $encrypt_url = $_SESSION['encrypt_url'];
                echo '</br>action : ' . $action_url;
                echo '</br>encrypt : ' . $encrypt_url;

                // get the id from db ----> OLD
                //$result = Account::selectAccountIdByMDA($encrypt_url);
                //$result = md5(90*13+4);
                //echo '</br>idAccount : ' . $result['idAccount'];

                $idAcc = Encryption::decode($encrypt_url);

                echo '</br>------------';
                echo '</br> id : ' . $idAcc;

                $pw_encode = sha1($pw_new);
                Account::resetpwDB($pw_encode, $idAcc);

                // unset the session for other use
                unset($_SESSION['action_url']);
                unset($_SESSION['encrypt_url']);
                echo '</br>SESSION UNSETS!!';
            }else {
                // if he is logged in!
                $idAcc = $currentUser->getIdAccount();
                $pw_encode = sha1($pw_new);
                Account::resetpwDB($pw_encode, $idAcc);
                $this->redirect('profile', 'showuser');
            }
        }
        // if password convention is false!!
        $this->redirect('login', 'resetpw');
    }

    function validatePWs($pw_new, $cpw){
        // check if the pwd's are equal
        if ($pw_new != $cpw){
            // the repeated pwd is not equal to the first one
            $_SESSION['msg'] = 2;
            return false;
        }else{
            // check the conditions of the pwd
            $weak = loginController::checkPasswordStrength($pw_new);
            // successfully changed
            $_SESSION['msg'] = 1;
            if (!$weak){
                // it is too weak
                $_SESSION['msg'] = 3;
                return false;
            }
        }
        return true;
    }

    function checkMailControl(){
        // call controller login and read result
        $email_input = $this->badassSafer($_POST['mail']);
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
        $result = Account::getUserData($email_input);
        $temp = $result->fetch();
        // create object account
        $user = new Account();
        $user->setFirstname($temp[1]);
        $user->setLastname($temp[2]);
        $user->setEmail($temp[3]);
        $user->setLanguage($temp[7]);

        // send the mail for the current user
        $this->sendMail($user, 1);
    }

    static function prepMail(Account $temp, $origin){
        echo '</br>' . $temp->getEmail();
        echo '</br>' . $temp->getFirstname();
        echo '</br>' . $temp->getLastname();
        echo '</br>' . $temp->getLanguage();

        include_once(ROOT_DIR.'models/Class.PrepMail.php');
        $obj = new PrepMail($temp->getEmail(), $temp->getFirstname(), $temp->getLastname(), null, null, $temp->getLanguage());

        $_SESSION['lang'] = $obj->getLang();
        $language = $obj->getLang();
        include_once(ROOT_DIR.'views/common.php');

        $Results = Account::selectAccountByEmail($temp->getEmail());

        if(count($Results) >= 1) {
            //$encrypt = md5(1290*3+$Results['idAccount']);
            include_once(ROOT_DIR . 'models/Class.Encryption.php');
            $encrypt = Encryption::encode($Results['idAccount']);

            if ($origin == 1) {
                $link_resetpw = URL_DIR . 'login/resetpw?' . 'encrypt=' . $encrypt . '&action=reset';

                // set the email content - forgot pw
                if ($language == 'de') {
                    // here comes the mail content
                    $txt = $lang['FORGOTPW_MAIL_CLICK_LINK'];
                    $body = '<a href="' . $link_resetpw . '">' . $txt . '</a>';
                    $obj->setMsgSubject($lang['FORGOTPW_MAIL_SUBJECT']);
                    $obj->setMsgMail($lang['FORGOTPW_MAIL_BODY_P1'] . $body . $lang['FORGOTPW_MAIL_BODY_P2']);
                } else {
                    $txt = $lang['FORGOTPW_MAIL_CLICK_LINK'];
                    $body = '<a href="' . $link_resetpw . '">' . $txt . '</a>';
                    $obj->setMsgSubject($lang['FORGOTPW_MAIL_SUBJECT']);
                    $obj->setMsgMail($lang['FORGOTPW_MAIL_BODY_P1'] . $body . $lang['FORGOTPW_MAIL_BODY_P2']);
                }
            } else if ($origin == 3) {
                $link_activate = URL_DIR . 'login/activateAccount?' . 'encrypt=' . $encrypt . '&action=activate';

                // set the email content - forgot pw
                if ($language == 'de') {
                    // here comes the mail content
                    $txt = $lang['CONFIRMATION_MAIL_CLICK_LINK'];
                    $body = '</br><a href="' . $link_activate . '">' . $txt . '</a>';
                    $obj->setMsgSubject($lang['CONFIRMATION_MAIL_SUBJECT']);
                    $obj->setMsgMail($lang['CONFIRMATION_MAIL_BODY'] . $body);
                } else {
                    $txt = $lang['CONFIRMATION_MAIL_CLICK_LINK'];
                    $body = '</br><a href="' . $link_activate . '">' . $txt . '</a>';
                    $obj->setMsgSubject($lang['CONFIRMATION_MAIL_SUBJECT']);
                    $obj->setMsgMail($lang['CONFIRMATION_MAIL_BODY'] . $body);
                }
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

        // 1 = forgotpw   3 = confirmation mail
        if($origin == 1 || $origin == 3){
            // forgot pw - get data and put into
            $obj = self::prepMail($temp, $origin);
            // set data
            $emailTo = $obj->getEmailTo();
            $fullname = $obj->getFullname();
            $msgSubject = $obj->getMsgSubject();
            $msgMail = $obj->getMsgMail();
            echo '</br>' . $emailTo;
            echo '</br>' . $fullname;
            echo '</br>' . $msgSubject;
            echo '</br>' . $msgMail;

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
}