<?php

/**
 * Created by PhpStorm.
 * User: gez
 * Date: 01.11.2016
 * Time: 20:48
 */
class Encryption
{
    const SKEY = "NickelbackRocks"; // you can change it

    public static function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    public static function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public static function encode($value){
        if(!$value){return false;}
        $text = $value;
        echo 'Halleluja';
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        echo 'fertig Halleluja';
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, self::SKEY, $text, MCRYPT_MODE_ECB, $iv);
        return trim(self::safe_b64encode($crypttext));
    }

    public static function decode($value){
        if(!$value){return false;}
        $crypttext = self::safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, self::SKEY, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }
}