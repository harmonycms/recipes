<?php

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @MongoDB\ReferenceMany(targetDocument="AppBundle\Document\Group")
     */
    protected $groups;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    /**
     * Get the value of id.
     *
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Groups
     *
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set Groups
     *
     * @param mixed $groups
     *
     * @return User
     */
    public function setGroups($groups): User
    {
        $this->groups = $groups;

        return $this;
    }
}