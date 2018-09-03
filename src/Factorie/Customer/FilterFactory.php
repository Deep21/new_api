<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/09/18
 * Time: 23:23.
 */

namespace App\Factorie\Customer;

use App\Service\FilterInterface;
use App\Service\UpFilter;
use Symfony\Component\HttpFoundation\Request;

class FilterFactory implements FilterFactoryInterface
{

    /**
     * @param  Request $request
     * @return FilterInterface|null
     */
    public static function create(Request $request)
    {
        $filter = null;
        switch ($request->get('action')) {
        case 'up':
            $filter = new UpFilter();
            break;

        case 'down':
            break;

        case 'custom':
            break;
        }

        return $filter;
    }

}
