<?php

/**
 * Created by PhpStorm.
 * User: gez
 * Date: 31.10.2016
 * Time: 09:27
 */
class Mail
{
    private $emailTo;
    private $firstname;
    private $lastname;
    private $fullname;
    private $msgSubject;
    private $msgMail;
    private $lang;

    /**
     * Mail constructor.
     * @param $emailTo
     * @param $firstname
     * @param $lastname
     * @param $fullname
     * @param $msgSubject
     * @param $msgMail
     */
    public function __construct($emailTo, $firstname, $lastname, $msgSubject, $msgMail, $lang)
    {
        $this->emailTo = $emailTo;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->fullname = $firstname . " " . $lastname;
        $this->msgSubject = $msgSubject;
        $this->msgMail = $msgMail;
        $this->lang = $lang;
    }

    /**
     * @return mixed
     */
    public function getEmailTo()
    {
        return $this->emailTo;
    }

    /**
     * @param mixed $emailTo
     */
    public function setEmailTo($emailTo)
    {
        $this->emailTo = $emailTo;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param mixed $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @return mixed
     */
    public function getMsgSubject()
    {
        return $this->msgSubject;
    }

    /**
     * @param mixed $msgSubject
     */
    public function setMsgSubject($msgSubject)
    {
        $this->msgSubject = $msgSubject;
    }

    /**
     * @return mixed
     */
    public function getMsgMail()
    {
        return $this->msgMail;
    }

    /**
     * @param mixed $msgMail
     */
    public function setMsgMail($msgMail)
    {
        $this->msgMail = $msgMail;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param mixed $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }
}