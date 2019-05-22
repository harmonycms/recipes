<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Harmony\Bundle\CoreBundle\Model\Extension as BaseExtension;

/**
 * Class Extension
 *
 * @ORM\Entity
 * @ORM\Table(name="container_extension")
 * @package App\Entity
 */
class Extension extends BaseExtension
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