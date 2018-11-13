<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 13/11/18
 * Time: 16:22
 */

namespace App\Utils;


class Tools
{
    /**
     * Random password generator
     *
     * @param integer $length Desired length (optional)
     * @param string $flag Output type (NUMERIC, ALPHANUMERIC, NO_NUMERIC)
     * @return string Password
     */
    public static function passwdGen($length = 8, $flag = 'ALPHANUMERIC')
    {
        switch ($flag)
        {
            case 'NUMERIC':
                $str = '0123456789';
                break;
            case 'NO_NUMERIC':
                $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            default:
                $str = 'abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
        }
        for ($i = 0, $passwd = ''; $i < $length; $i++)
            $passwd .= Tools::substr($str, mt_rand(0, Tools::strlen($str) - 1), 1);
        return $passwd;
    }

    public static function substr($str, $start, $length = false, $encoding = 'utf-8')
    {
        if (is_array($str))
            return false;
        if (function_exists('mb_substr'))
            return mb_substr($str, (int)$start, ($length === false ? Tools::strlen($str) : (int)$length), $encoding);
        return substr($str, $start, ($length === false ? Tools::strlen($str) : (int)$length));
    }

    public static function strlen($str, $encoding = 'UTF-8')
    {
        if (is_array($str))
            return false;
        $str = html_entity_decode($str, ENT_COMPAT, 'UTF-8');
        if (function_exists('mb_strlen'))
            return mb_strlen($str, $encoding);
        return strlen($str);
    }
}