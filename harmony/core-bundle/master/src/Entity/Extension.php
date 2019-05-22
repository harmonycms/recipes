<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity="Harmony\Bundle\CoreBundle\Model\Config", mappedBy="extension",
     *     orphanRemoval=true, cascade={"persist", "remove"})
     * @var Collection $configs
     */
    protected $configs;

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }
}