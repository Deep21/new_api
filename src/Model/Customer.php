<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 05/11/18
 * Time: 00:25.
 */

namespace App\Model;

use JMS\Serializer\Annotation\Type;

class Customer
{
    /**
     * @Type("int")
     */
    public $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
