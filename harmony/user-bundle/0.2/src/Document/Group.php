<?php

namespace App\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\UserBundle\Model\Group as BaseGroup;

/**
 * Class Group
 * @MongoDB\Document
 *
 * @package App\Entity
 */
class Group extends BaseGroup
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;
}