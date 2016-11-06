<?php
/**
 * Created by PhpStorm.
 * User: gez
 * Date: 28.09.2016
 * Time: 14:34
 */

/* --------------------LANGUAGE FILES----------------------- */
//session_start();

if(isSet($_GET['lang']))
{
    $lang = $_GET['lang'];

// register the session and set the cookie
    $_SESSION['lang'] = $lang;

    setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
    $lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
    $lang = $_COOKIE['lang'];
}
else
{
    $lang = 'de';
    $_SESSION['lang'] = $lang;
}

switch ($lang) {
    case 'de':
        $lang_file = 'lang.de.php';
        break;

    case 'fr':
        $lang_file = 'lang.fr.php';
        break;

    default:
        $lang_file = 'lang.de.php';
}
include_once 'lang/'.$lang_file;

?>