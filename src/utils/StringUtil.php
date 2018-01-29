<?php
namespace app\utils;

use Yii;

/**
 * This is class file for class StringUtil
 * It contains the common string related functions
 *
 * @author Tony Zheng
 **/

class StringUtil
{
    const ALL_DIGITS_LETTERS = 6;

    //const for url regrex
    const URL_REGREX = '/^(ftp|http|https):\/\/([\w-]+\.)+(\w+)(:[0-9]+)?(\/|([\w#!:.?+=&%@!\-\/]+))?$/';

    /**
     * Generate random string of (int)$length length and type $type
     *
     * @param int $length The keyword length, default value is 5.
     * @param int $type The characters type The default is 0
     * @param string $charlist The characters
     *
     * @return string The keyword
     */
    public static function rndString($length = 5, $type = 0, $charlist = '')
    {
        $str = '';
        $length = intval($length);
        // define possible characters
        switch ($type) {
            // custom char list, or comply to charset as defined in config
            case 0:
                $possible = (!empty($charlist)) ? $charlist : self::getCharset();
                break;

            // no vowels to make no offending word, no 0/1/o/l to avoid confusion between letters & digits. Perfect for passwords.
            case 1:
                $possible = "23456789bcdfghjkmnpqrstvwxyz";
                break;

            // Same, with lower + upper
            case 2:
                $possible = "23456789bcdfghjkmnpqrstvwxyzBCDFGHJKMNPQRSTVWXYZ";
                break;

            // all letters, lowercase
            case 3:
                $possible = "abcdefghijklmnopqrstuvwxyz";
                break;

            // all letters, lowercase + uppercase
            case 4:
                $possible = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                break;

            // all digits & letters lowercase
            case 5:
                $possible = "0123456789abcdefghijklmnopqrstuvwxyz";
                break;

            // all digits & letters lowercase + uppercase
            case 6:
                $possible = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                break;
        }

        $i = 0;
        while ($i < $length) {
            $str .= substr($possible, mt_rand(0, strlen($possible) - 1), 1);
            $i++;
        }

        return $str;
    }

    /**
     * Get the config charset
     *
     * @return string The characters
     * @author Harry Sun
     */
    private static function getCharset()
    {
        // The default char list
        $charlist = '0123456789abcdefghijklmnopqrstuvwxyz';

        if (!empty(Yii::$app->params['charlist'])) {
            $charlist = Yii::$app->params['charlist'];
        }

        return $charlist;
    }
}
