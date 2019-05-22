<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\CoreBundle\Model\Config as BaseConfig;
use Harmony\Bundle\CoreBundle\Model\Extension;

/**
 * Class Config
 * @MongoDB\Document(collection="container_config")
 *
 * @package App\Entity
 */
class Config extends BaseConfig
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="App\Entity\Config", mappedBy="parent")
     * @var Collection $children
     */
    protected $children;

    /**
     * @MongoDB\ReferenceOne(targetDocument="App\Entity\Config", inversedBy="children", cascade={"remove"})
     * @var BaseConfig $parent
     */
    protected $parent;

    /**
     * @MongoDB\ReferenceOne(targetDocument="App\Entity\Extension", inversedBy="configs", cascade={"remove"})
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