<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Config
 *
 * @ORM\Entity
 * @package App\Entity
 */
class Config extends \Harmony\Bundle\CoreBundle\Model\Config
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
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