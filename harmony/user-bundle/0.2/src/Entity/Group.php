<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Bundle\UserBundle\Model\Group as BaseGroup;

/**
 * Class Group
 * @ORM\Entity()
 * @ORM\Table(name="user_group")
 *
 * @package App\Entity
 */
class Group extends BaseGroup
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
}