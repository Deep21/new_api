<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 02/11/18
 * Time: 15:28.
 */

namespace App\Utils;

class OrderUtil
{
    /**
     * Gennerate a unique reference for orders generated with the same cart id
     * This references, is usefull for check payment
     *
     * @return String
     */
    public static function generateReference()
    {
        return strtoupper(Tools::passwdGen(9, 'NO_NUMERIC'));
    }
}
