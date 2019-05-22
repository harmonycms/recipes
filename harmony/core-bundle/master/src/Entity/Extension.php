<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Extension
 *
 * @ORM\Entity
 * @package App\Entity
 */
class Extension extends \Harmony\Bundle\CoreBundle\Model\Extension
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