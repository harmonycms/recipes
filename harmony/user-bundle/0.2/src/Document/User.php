<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\UserBundle\Model\User as BaseUser;

/**
 * @MongoDB\Document
 */
class User extends BaseUser
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * Get the value of id.
     *
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }
}