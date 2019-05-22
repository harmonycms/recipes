<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Harmony\Bundle\CoreBundle\Model\Config as BaseConfig;
use Harmony\Bundle\CoreBundle\Model\Extension;

/**
 * Class Config
 *
 * @ORM\Entity
 * @ORM\Table(name="container_config")
 * @package App\Entity
 */
class Config extends BaseConfig
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Config", mappedBy="parent")
     * @var Collection $children
     */
    protected $children;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Config", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", onDelete="CASCADE")
     * @var BaseConfig $parent
     */
    protected $parent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Extension", inversedBy="configs")
     * @ORM\JoinColumn(name="extension_id", onDelete="CASCADE")
     * @var Extension $extension
     */
    protected $extension;

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }
}