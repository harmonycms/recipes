<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\UserBundle\Model\User as BaseUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user")
 * @UniqueEntity(fields="email", message="Email already registered.")
 * @UniqueEntity(fields="username", message="Username already registered.")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
