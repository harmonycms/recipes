<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Harmony\Bundle\RoutingBundle\Model\Route as RouteModel;

/**
 * Class Route
 * @MongoDB\Document()
 *
 * @package App\Document
 */
class Route extends RouteModel
{

    /**
     * Unique id of this route.
     *
     * @MongoDB\Id(strategy="auto")
     * @var string
     */
    protected $id;

    /**
     * @MongoDB\Field()
     * @MongoDB\Index(name="name_idx", unique=true)
     * @var string $name
     */
    protected $name;

    /**
     * @MongoDB\Field(type="integer")
     * @var int sort order of this route when it is returned by the route provider
     */
    protected $position = 0;

    /**
     * Get the repository path of this url entry.
     *
     * @return null|string|int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the name.
     *
     * @param string $name
     *
     * @return Route
     */
    public function setName(string $name): Route
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the name.
     *
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the sort order of this route.
     *
     * @param int $position
     *
     * @return Route
     */
    public function setPosition(int $position): Route
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the sort order of this route.
     *
     * @return null|int
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}