<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Parameter
 *
 * @ORM\Entity
 * @package App\Entity
 */
class Parameter extends \Harmony\Bundle\CoreBundle\Model\Parameter
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