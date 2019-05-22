<?php

namespace App\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\CoreBundle\Model\Parameter as BaseParameter;

/**
 * Class Parameter
 * @MongoDB\Document(collection="container_parameter")
 *
 * @package App\Entity
 */
class Parameter extends BaseParameter
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }
}