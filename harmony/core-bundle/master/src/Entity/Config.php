<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Harmony\Bundle\CoreBundle\Model\Config as BaseConfigAlias;

/**
 * Class Config
 *
 * @ORM\Entity
 * @package App\Entity
 */
class Config extends BaseConfigAlias
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Harmony\Bundle\CoreBundle\Model\Config", mappedBy="parent")
     * @var Collection $children
     */
    protected $children;

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }
}