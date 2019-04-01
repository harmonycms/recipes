<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Harmony\Bundle\RoutingBundle\Model\Route as RouteModel;

/**
 * Class Route
 * @ORM\Entity()
 * @ORM\Table(indexes={@ORM\Index(name="name_idx", columns={"name"})})
 *
 * @package App\Entity
 */
class Route extends RouteModel
{

    /**
     * Unique id of this route.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var string
     */
    protected $id;

    /**
     * @ORM\Column(unique="true")
     * @var string $name
     */
    protected $name;

    /**
     * @ORM\Column(type="integer")
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
    public function setName($name): Route
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the name.
     *
     * @return string
     */
    public function getName()
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
    public function setPosition($position): Route
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the sort order of this route.
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }
}