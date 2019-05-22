<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\CoreBundle\Model\Extension as BaseExtension;

/**
 * Class Extension
 * @MongoDB\Document(collection="container_extension")
 *
 * @package App\Entity
 */
class Extension extends BaseExtension
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Harmony\Bundle\CoreBundle\Model\Config", mappedBy="extension",
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