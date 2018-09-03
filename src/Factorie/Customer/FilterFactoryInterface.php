<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/09/18
 * Time: 23:21.
 */

namespace App\Factorie\Customer;

use Symfony\Component\HttpFoundation\Request;

interface FilterFactoryInterface
{
    /**
     * @param  Request $request
     * @return mixed
     */
    public static function create(Request $request);
}
