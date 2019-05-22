<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Bundle\CoreBundle\Model\Parameter as BaseParameter;

/**
 * Class Parameter
 *
 * @ORM\Entity
 * @ORM\Table(name="container_parameter")
 * @package App\Entity
 */
class Parameter extends BaseParameter
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